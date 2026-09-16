<?php
function laSoNguyenTo(int $so): bool
{
    if ($so < 2) {
        return false;
    }

    for ($i = 2; $i * $i <= $so; $i++) {
        if ($so % $i === 0) {
            return false;
        }
    }

    return true;
}

$n = random_int(-100, 100);

if ($n > 0) {
    $uocSo = [];
    for ($i = 1; $i <= $n; $i++) {
        if ($n % $i === 0) {
            $uocSo[] = $i;
        }
    }

    $tongSoNguyenTo = 0;
    for ($i = 2; $i < $n; $i++) {
        if (laSoNguyenTo($i)) {
            $tongSoNguyenTo += $i;
        }
    }

    $can = (int) sqrt($n);
    $laSoChinhPhuong = $can * $can === $n;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 3 - Kiểm tra số N</title>
</head>
<body>
    <h1>Bài 3 - Kiểm tra số N</h1>
    <p>N ngẫu nhiên: <?= $n ?></p>
    <?php if ($n > 0): ?>
        <p><?= $n ?> là số dương.</p>
        <p>Các ước số của <?= $n ?>: <?= implode(', ', $uocSo) ?></p>
        <p><?= $n ?> <?= laSoNguyenTo($n) ? 'là' : 'không phải là' ?> số nguyên tố.</p>
        <p>Tổng các số nguyên tố nhỏ hơn <?= $n ?>: <?= $tongSoNguyenTo ?></p>
        <p><?= $n ?> <?= $laSoChinhPhuong ? 'là' : 'không phải là' ?> số chính phương.</p>
    <?php else: ?>
        <p><?= $n ?> không phải là số dương.</p>
    <?php endif; ?>
</body>
</html>
