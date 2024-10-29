<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Конвертер изображений</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1>Конвертер изображений</h1>
        <form action="core/upload.php" method="post" enctype="multipart/form-data">
            <label for="image">Выберите изображение для загрузки:</label>
            <input type="file" name="image" id="image" accept="image/*" required>
            <br>
            <label for="format">Выберите формат для конвертации:</label>
            <select name="format" id="format" required>
                <option value="jpg">JPEG</option>
                <option value="png">PNG</option>
                <option value="gif">GIF</option>
                <option value="webp">WEBP</option>
            </select>
            <br>
            <input type="submit" value="Конвертировать">
        </form>
    </div>
</body>

</html>