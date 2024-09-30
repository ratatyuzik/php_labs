<?php
$uploadDir = 'uploads/';

if (is_dir($uploadDir)) {
    $files = scandir($uploadDir);
    
    echo "<h1>List of memes in file</h1>";
    
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $filePath = $uploadDir . $file;
            echo "<a href='$filePath' download>$file</a><br>";
        }
    }
} else {
    echo "Hmmmm smth wrong.";
}
?>
