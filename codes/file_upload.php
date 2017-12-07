<form action='upload.php' method='post' enctype='multipart/form-data'>
    Select image to upload:
    <input type='file' name='file' id='file'>
    <input type='submit' id='u_button' name='u_button' value='Upload the File'>
</form>

<?php

	$file_result=';

	if($_FILES['file']['error']>0)
	{
		$file_result .= 'No finle uploaded or invalid file';
		$file_result .= 'Error Code: ' . $_FILES['file']['error'] . '< br >';
	}
	else
	{

		$file_result .= 
			'Upload: ' . $_FILES['file']['name'] . '< br >' .
			'Type: ' . $_FILES['file']['type'] . '< br >' .
			'Size: ' . ($_FILES['file']['size']/1024) . '< br >' .
			'Temp File: ' . $_FILES['file']['tmp_name'] . '< br >';

			move_uploaded_file($_FILES['file']['tmp_name'], $_FILES['file']['name']);

			$file_result .='file uploaded successfully';
	}


?>