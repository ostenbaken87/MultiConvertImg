<?php
if(isset($_GET['file']) && isset($_GET['format'])) {
    $file = urldecode($_GET['file']);
    $format = $_GET['format'];

    list($width, $height, $type) = getimagesize($file);

    $sourceImage = null;
    switch ($type) {
        case IMAGETYPE_JPEG:
            $sourceImage = imagecreatefromjpeg($file);
            break;
        case IMAGETYPE_PNG:
            $sourceImage = imagecreatefrompng($file);
            break;
        case IMAGETYPE_GIF:
            $sourceImage = imagecreatefromgif($file);
            break;
        case IMAGETYPE_WEBP:
            $sourceImage = imagecreatefromwebp($file);
            break;
        default:
            echo "Неподдерживаемый тип изображения.";
            exit;
    }

    $newFileName = pathinfo($file, PATHINFO_FILENAME) . '.' . $format;
    switch ($format) {
        case 'jpg':
        case 'jpeg':
            imagejpeg($sourceImage, '../uploads/' . $newFileName);
            break;
        case 'png':
            imagepng($sourceImage, '../uploads/' . $newFileName);
            break;
        case 'gif':
            imagegif($sourceImage, '../uploads/' . $newFileName);
            break;
        case 'webp':
            imagewebp($sourceImage, '../uploads/' . $newFileName);
            break;
    }

    imagedestroy($sourceImage);

    echo "Изображение успешно конвертировано в формат $format.";
} else {
    echo "Неверные параметры запроса.";
}