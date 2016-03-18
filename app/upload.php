<?php
    // ini_set('display_errors', true);
    // error_reporting(E_ALL);
    error_reporting(0);
    date_default_timezone_set("Asia/Shanghai");

    $ds          = DIRECTORY_SEPARATOR;
    $storeFolder = 'uploads';

    if (!empty($_FILES))
    {
        $tempFile    = $_FILES['file']['tmp_name'];
        $targetPath  = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
        $uuid        = uniqid().'.'.end(explode(".", $_FILES["file"]["name"]));
        $targetFile  =  $targetPath.$uuid;
        move_uploaded_file($tempFile,$targetFile);
        echo $uuid;
    }
?>