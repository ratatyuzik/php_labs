<?php
    echo "Hello World!"; 

    $num = 52;
    $str = "Barbarian"; 
    $flt = 3.14;
    $bl = TRUE;

    echo "<br> <br> $num, $str, $flt, $bl";

    $textTwo = "I`m";
    $textOne = "human";

    echo "<br>" . $textTwo . " " . $textOne;

    $condition = 5;  
    
    if ($condition % 2 != 0) {
        echo "<br>" . "Not even";
    } else {
        echo "<br>" . "Even";
    }

    for ($i = 0; $i < 10; $i++){
        echo "<br>" . $i;
    }

    echo "<br>";

    $num = 0;

    do{
        echo "<br>$num";
        $num++;
    }while($num != 10);

    $student = [
        "name" => "Renatys",
        "surname" => "Yerominus",
        "ages" => "19",
        "speciality" => "BB"
    ];

    echo "<br>";

    function printStudent($student){
        foreach($student as $key => $value){
            echo "<br> My $key is $value";
        };
    }

    printStudent($student);

    echo "<br>";

    $student["Food"] = "justice";

    printStudent($student);
?>