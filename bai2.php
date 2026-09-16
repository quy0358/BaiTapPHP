<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 2 - Bảng cửu chương</title>
</head>
<body>
    <h1>Bảng cửu chương từ 1 đến 10</h1>
    <?php for ($so = 1; $so <= 10; $so++): ?>
        <h2>Bảng cửu chương <?= $so ?></h2>
        <ul>
            <?php for ($lan = 1; $lan <= 10; $lan++): ?>
                <li><?= $so ?> × <?= $lan ?> = <?= $so * $lan ?></li>
            <?php endfor; ?>
        </ul>
    <?php endfor; ?>
</body>
</html>
