
# Image Downloader

The Image Downloader is a PHP-based web application that allows you to download images from a given webpage. It utilizes web scraping techniques using the `file_get_contents()` function and the `DOMDocument` class to extract the image URLs from the HTML of the specified webpage and save them to a local directory.

## Features

- Enter the URL of a webpage containing images.
- The application retrieves the HTML content of the webpage using the `file_get_contents()` function.
- The `DOMDocument` class is used to parse the HTML and extract the URLs of the images.
- The image URLs are stored in an array and displayed as a list on the webpage.
- The application creates a folder named "images" to store the downloaded images.
- Each image is downloaded from its URL and saved in the "images" folder using the `file_put_contents()` function.
- The downloaded images are displayed in a responsive grid layout on the webpage.

## Installation

1. Clone the repository or download the project files to your local machine.
2. Ensure that you have a PHP environment set up (e.g., XAMPP, WAMP, or a web server with PHP support).
3. Place the project files in the document root directory of your PHP server (e.g., `htdocs` in XAMPP).
4. Access the application through a web browser by navigating to the URL where the files are hosted.

## Usage

1. Open the application in a web browser.
2. Enter the complete URL of the webpage containing the images in the input field.
3. Click the "Download Images" button.
4. If any errors occur during the process, an error message will be displayed.
5. The image URLs will be listed on the left side, and the downloaded images will be displayed on the right side of the webpage.
6. The images will also be saved in the "images" folder in the project directory.

**Note:** Make sure the PHP server has the necessary permissions to create directories and save files.

## Dependencies

- Bootstrap v5.3.0-alpha3 (CSS and JS) for styling and layout.


## Screenshots

Include some screenshots of the application in action to provide a visual representation of how it works.

![Screenshot 1](/screenshot.png)


## Contributing

Contributions are welcome! If you have any suggestions, bug reports, or feature requests, please open an issue or submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).

## Author

- [Vikash kumar](https://github.com/vikashkumar1111)

Feel free to customize and enhance this description based on your specific project details and preferences.

If you find this project helpful or like it, please consider giving it a star on GitHub. It would be greatly appreciated! ⭐️
