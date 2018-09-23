<?php
include_once('functions.php');
 $currentDir =getcwd();
    $uploadDirectory = "school_merits";

    $errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['csv']; // Get all the file extensions
    //$fileExtensions = ['csv','jpg','png']; // Get all the file extensions

    $fileName = $_FILES['merit']['name'];
    $fileSize = $_FILES['merit']['size'];
    $fileTmpName  = $_FILES['merit']['tmp_name'];
    $fileType = $_FILES['merit']['type'];
	$ex=explode('.',$fileName);
	$ext=end($ex);
    $fileExtension = strtolower($ext);

    $uploadPath = $uploadDirectory."/".basename($fileName); 
	   // pf($uploadPath);exit('wait');
	
    if (isset($_POST['submit'])) {

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a csv file";
        }

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                echo "The file " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    }

?>
