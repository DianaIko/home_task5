<?php

    include 'form.php';


$files = scandir("uploads/images");
echo "<h2>Images</h2>";
foreach ($files as $file){
    if(is_file("uploads/images/" . $file)){
        echo "<a href='uploads/images/$file'>$file</a>";
        echo " - ";
        echo "<a href='delete.php?file=$file'>Видалити</a><br>";
    }
}

echo "<h2>Docs</h2>";
$files = scandir("uploads/docs");
foreach ($files as $file){
    if(is_file("uploads/docs/" . $file)){
        echo "<a href='uploads/docs/$file'>$file</a>";
        echo " - ";
        echo "<a href='delete.php?file=$file'>Видалити</a><br>";
    }
}

