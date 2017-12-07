Uploading a file from a web form in PHP is easy. The online manual provides a Handling File Uploads section, and there are several articles on sitepoint.com, including How To Handle File Uploads With PHP by Kevin Yank.

One of the most popular uses is image uploads. Your users can submit photographs from a form without resorting to FTP or other convoluted methods. HTML5 and Flash also permit drag and drop, so the operation is likely to become easier as browsers evolve.

This is where the problems can begin. Camera manufacturers continually brag that they have a larger set of megapixels than their competitors. It's all rubbish, of course ' unless you're a professional photographer or need to print extremely large images, anything over 4MP is fairly pointless and lens quality is much more important. However, even low-end compacts have 12MP and mobile phones have more than 5MP. The result is that a typical snapshot can easily be 6MB in size.

By default, PHP permits a maximum file upload of 2MB. You can ask users to resize their images before uploading but let's face it: they won't. Fortunately, we can increase the limit when necessary.

Two PHP configuration options control the maximum upload size: upload_max_filesize and post_max_size. Both can be set to, say, '10M' for 10 megabyte file sizes.

However, you also need to consider the time it takes to complete an upload. PHP scripts normally time-out after 30 seconds, but a 10MB file would take at least 3 minutes to upload on a healthy broadband connection (remember that upload speeds are typically five times slower than download speeds). In addition, manipulating or saving an uploaded image may also cause script time-outs. We therefore need to set PHP's max_input_time and max_execution_time to something like 300 (5 minutes specified in seconds).

These options can be set in your server's php.ini configuration file so that they apply to all your applications. Alternatively, if you're using Apache, you can configure the settings in your application's .htaccess file:


php_value upload_max_filesize 10M
php_value post_max_size 10M
php_value max_input_time 300
php_value max_execution_time 300

Finally, you can define the constraints within your PHP application:

ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_input_time', 300);
ini_set('max_execution_time', 300);

PHP also provides a set_time_limit() function so you don't need to set max_execution_time directly.

Setting the options in your PHP code is possibly more practical, since you can extend the execution time and increase the file size when your application is expecting a large upload. Other forms would revert to the default 30-second time-out and 2MB limit.


<b>Author: https://www.sitepoint.com/upload-large-files-in-php/</b>
