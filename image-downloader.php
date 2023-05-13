<?php
if (isset($_GET['basic-url'])) {
  $base_url = $_GET['basic-url'];
  //give index url or complete page url
  $html = @file_get_contents($base_url);
  $error_msg="";
  if ($html === false) {
    $error_msg = error_get_last()['message'];
    // echo $error_msg;
  } else 
  {
  
    // Create a DOM object to parse the HTML
    $dom = new DOMDocument();
    @$dom->loadHTML($html);

    // Find all the img/script/link tags in the HTML
    $imgTags = $dom->getElementsByTagName('img');

    // Initialize an array to store the src/href values
    $imgsrcArray = array();

    // Loop through each img tag and get its src attribute
    foreach ($imgTags as $img) {
      $imgsrc = $img->getAttribute('src');
      $imgsrcArray[] = $imgsrc;
    }

    // Loop to get all images and make folder to store it with their basename
    foreach ($imgsrcArray as $imgfilename) {
      $imgfilename_data = file_get_contents($imgfilename);
      if (!file_exists('images')) {
        mkdir('images', 0777, true);
      }
      // Extract the file name from the src value using basename()
      $imgfilename = basename($imgfilename);
      file_put_contents("./images/" . $imgfilename, $imgfilename_data);
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Image Downloader</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <style>
    .image-container {
      display: flex;
      flex-wrap: wrap;
      height: 200px;
    }
    .image-container img {
      max-width: 100%;
      object-fit: cover;
      margin: 10px;
      border: 2px solid red;
      background: rgba(0, 0, 0, 0.075);
    }
    .overflow-scroll {
      height: 400px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class=" d-flex justify-content-between align-items-center ">
    <h1>Imager Downloader</h1><small class="float-right"><a href="https://github.com/vikashkumar1111" target="_blank" class="text-info float-right">vikashkumar1111</a></small>
    </div>
      <br>
      <div class="alert alert-danger<?php if(empty($error_msg)) echo "hide";?>" role="alert">
        <?= $error_msg ?>
      </div>
      <form action="" method="get">
        <div class="mb-3">
          <div class="input-group">
            <span class="input-group-text" id="basic-addon3">https://example.com/users/index.html</span>
            <input type="url" class="form-control" name="basic-url" id="basic-url" value="<?php if(!empty($_GET['basic-url'])) {echo $_GET['basic-url'];} ?>" aria-describedby="basic-addon3 basic-addon4">
          </div>
          <div class="form-text" id="basic-addon4">Please Enter complete Url/Link/href</div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg " id="load1" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Downloading images...">Download Images</button>
      </form>
    <div class="row mt-3 mb-6">
      <div class="col-6 overflow-scroll">
        <ol>
          <?php
           if(!empty($imgsrcArray)){
            $imagArry = $imgsrcArray;
           
          foreach ($imagArry as $url) { ?>
            <li><a href="#"><?php echo "$url"; ?></a></li>
          <?php }}  ?>
        </ol>
        <!-- <?php echo "<pre>";
              print_r($imgsrcArray);
              echo "<br>"; ?> -->
      </div>
      <div class="col-6 overflow-scroll">
        <div class="image-container">
        </div>
      </div>
    </div>
  </div>
  <script>
    // Array of image URLs
    var imageUrls = <?php echo json_encode($imgsrcArray); ?>;

    // Function to create an <img> element and append it to the container
    function createImageElement(src) {
      var img = document.createElement('img');
      img.src = src;
      document.querySelector('.image-container').appendChild(img);
    }

    // Loop through the image URLs and create <img> elements
    imageUrls.forEach(function(url) {
      createImageElement(url);
    });

    document.querySelectorAll('#load1').forEach(function(btn) {
      btn.addEventListener('click', function() {
        var $this = this;
        $this.classList.add('loading');
        setTimeout(function() {
          $this.classList.remove('loading');
        }, 8000);
      });
    });
  </script>
</body>
</html>