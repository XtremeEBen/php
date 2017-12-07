function resizeImage($filePath, $destPath)
{

    // //returns completed image to calling script
    list($width, $height) = getimagesize($filePath);
    $newwidth = $width;
    $newheight = $height;

    // // Load
    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $source = imagecreatefromjpeg($filePath);

    // // Resize
    $resizedImage = imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    // Output and free memory the resized image will be 400x300
    $thumb = imagejpeg($thumb, $destPath);

    return $thumb;
}