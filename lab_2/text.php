<?php
$textFile = "log.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['text'])) {
    $text = trim($_POST['text']);
    $file = fopen($textFile, "w"); 
    fwrite($file, $text);
    fclose($file); 
    echo "Text is saved.<br>";
}


if (file_exists($textFile)) {
    echo "<h2>Content of file:</h2>";
    $file = fopen($textFile, "r"); 
    $fileContent = fread($file, filesize($textFile)); 
    fclose($file); 
    echo $fileContent; 
} else {
    echo "Hmmm smth wrong.";
}
?>
