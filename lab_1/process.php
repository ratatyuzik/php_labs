<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $first_name = isset($_POST["first_name"]) ? trim($_POST["first_name"]) : "";
        $second_name = isset($_POST["second_name"]) ? trim($_POST["second_name"]) : "";

    if(!is_string($first_name) || !is_string($second_name)){
        echo "Hmmm, smth wrong.";
    }else{
        echo "Hello dear $first_name $second_name";
    }
    }
?>