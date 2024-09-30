<?php
    $uploadDir = "uploads/"; 

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])){
        $file = $_FILES["file"];
        $fileName = basename($file["name"]);
        $fileSize = $file["size"];
        $fileTmpName = $file['tmp_name'];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $abledTypes = ["png", "jpg", "jpeg"];
        $maxSize = 2048;

        $destination = $uploadDir . $fileName;

        if (!in_array($fileType, $allowedTypes)) {
            echo "Only png, jpg or jpeg";
            exit;
        }
    
        if ($fileSize > $maxSize) {
            echo "Size is more then 2mb";
            exit;
        }
    
        if (file_exists($destination)) {
            $fileName = pathinfo($fileName, PATHINFO_FILENAME) . '-' . time() . '.' . $fileType;
            $destination = $uploadDir . $fileName;
        }
    
        if (move_uploaded_file($fileTmpName, $destination)) {
            echo "File was successfully uploaded!";
            echo "<a href='$destination' download>Download file back</a>";
        } else {
            echo "Hmmm smth wrong.";
        }
    }else{
        echo "Hmmm smth wrong.";
    }
?>