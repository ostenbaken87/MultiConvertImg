<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $targetDir = "../uploads/";

    // Проверка существования директории и создание, если она не существует
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
    $targetFile = $targetDir . uniqid() . '.' . $imageFileType;

    // Проверка на ошибки загрузки
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // Перенаправление на страницу конвертации
        header("Location: convert.php?file=" . urlencode($targetFile) . "&format=" . $_POST['format']);
    } else {
        echo "Ошибка при загрузке файла.";
    }
} else {
    echo "Неверный метод запроса.";
}
