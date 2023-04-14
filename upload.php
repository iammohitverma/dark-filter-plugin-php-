<?php

if($_FILES['fileToUpload']['name'] != ""){

    $successResp = array();


    // target dir and file
    $target_dir = "uploads/images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk;

    
    // delete all files from upload
    $files = glob($target_dir.'/*'); // get all file names
        foreach($files as $file){ // iterate files
        if(is_file($file)) {
            unlink($file); // delete file
        }
    }


    /* Getting file name */
    $filename = $_FILES['fileToUpload']['name'];

    //extension
    $extension = pathinfo($filename,PATHINFO_EXTENSION);

    $valid_extension = array("jpg", "jpeg", "png");

    if(in_array($extension, $valid_extension)){
        // $new_name = rand() . "." . $extension;
        $path = $target_dir . $filename;

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo $successResp["msg"] = "Sorry, your file is too large.";
            $uploadOk = 0;
        } elseif (file_exists($target_file)) {
            echo $successResp["msg"] = "Sorry, file already exists.";
            $uploadOk = 0;
        }else{
            if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $path)){
                // echo "Successfully Uploaded";
                $successResp["msg"] = "Successfully Uploaded";
                $successResp["uploadOk"] = "1";
                echo json_encode($successResp);
                return $successResp;
            }
        }

    }else{
        echo $successResp["msg"] = "Please select valid image format";
    }
}else{
    echo $successResp["msg"] = "Please select image";
}
?>
