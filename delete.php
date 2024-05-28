<?php
    if(isset($_GET["file"])){
        $file = $_GET["file"];
        if(file_exists("uploads/images/" . $file)){
                unlink("uploads/images/" . $file);
        }
        header("Location: index.php");
    }
    else{
         header("Location: index.php");
    }

    if(isset($_GET["file"])){
        $file = $_GET["file"];
        if(file_exists("uploads/docs/" . $file)){
            unlink("uploads/docs/" . $file);
        }
        header("Location: index.php");
    }
    else{
        header("Location: index.php");
    }