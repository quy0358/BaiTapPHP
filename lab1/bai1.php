<?php
$n = random_int(1, 100);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 1 - Các số chẵn</title>
</head>
<body>
    <h1>Bài 1 - Các số chẵn từ 1 đến N</h1>
    <p>N ngẫu nhiên: <?= $n ?></p>
    <p>Các số chẵn trong khoảng từ 1 đến <?= $n ?>:</p>
    <?php if ($n < 2): ?>
        <p>Không có số chẵn nào.</p>
    <?php else: ?>
        <p>
            <?php for ($i = 2; $i <= $n; $i += 2): ?>
                <?= $i ?>
            <?php endfor; ?>
        </p>
    <?php endif; ?>
</body>
</html>
