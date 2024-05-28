<?php

// 1. Перевірити, чи була натиснута кнопка "submit" на формі
if(!isset($_POST["submit"])){
    header("Location: index.php");
}

// 2. Отримаємо ім'я файлу, який користувач вибрав для завантаження
$fileName = $_FILES["fileToUpload"]["name"];
$fileSize = $_FILES["fileToUpload"]["size"];
$fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
$fileExtensions1 = ['txt', '.pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf'];
$fileExtensions2 = ['jpg', 'jpeg', 'png', 'gif'];

// 3. Перевірити, чи файл вже існує в папці "uploads"
if(file_exists("uploads/docs/" . $fileName) || file_exists("uploads/images/" . $fileName)){
    echo "Файл з ім'ям $fileName вже існує.";
}
// 4. Перевірити чи це текстовий файл
elseif(!in_array($fileExtension, $fileExtensions1) && !in_array($fileExtension, $fileExtensions2)){
    echo "Цей тип файлу не підтримується.";
}
// 5. Перевірити розмір файлу
elseif($fileSize > 10000000){
    echo "Файл занадто великий. Максимальний розмір файлу - 10MB.";
}
// Все ОК, завантажуємо файл
else{
    $newFileName = $_POST["fileName"];
    $currentDateTime = date("Y-m-d_H-i-s");


    $newFileName = $newFileName ."_". $currentDateTime . "." . $fileExtension;
    $oldFilePath = $_FILES["fileToUpload"]["tmp_name"];
    if(in_array($fileExtension, $fileExtensions1)) {
        $newFilePath = "uploads/docs/" . $newFileName;
        move_uploaded_file($oldFilePath, $newFilePath);
    }
    elseif (in_array($fileExtension, $fileExtensions2)) {
        $newFilePath = "uploads/images/" . $newFileName;
        move_uploaded_file($oldFilePath, $newFilePath);
    }
    echo "Файл $fileName успішно завантажено.";
}


?>
<p>
    <a href="index.php">Go home</a>
</p>

