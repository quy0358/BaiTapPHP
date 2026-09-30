<?php
function tachDaySo(string $daySo): ?array
{
    $cacGiaTri = array_map('trim', explode(',', $daySo));
    if ($cacGiaTri === [] || in_array('', $cacGiaTri, true)) {
        return null;
    }

    foreach ($cacGiaTri as $giaTri) {
        if (!is_numeric($giaTri)) {
            return null;
        }
    }

    return array_map('floatval', $cacGiaTri);
}

$daySo = $_POST['day_so'] ?? '';
$tongDaySo = '';
$thongBao = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mang = tachDaySo($daySo);
    if ($mang === null) {
        $thongBao = 'Dãy số phải gồm các số ngăn cách nhau bởi dấu phẩy.';
    } else {
        $tongDaySo = 0;
        foreach ($mang as $giaTri) {
            $tongDaySo += $giaTri;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Nhập và tính trên dãy số</title>
</head>
<body>
    <h1>Nhập và tính trên dãy số</h1>
    <form name="tong_day_so" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <p><label for="day_so">Nhập dãy số:</label> <input id="day_so" name="day_so" type="text" value="<?= htmlspecialchars((string) $daySo) ?>" required></p>
        <p><button type="submit">Tổng dãy số</button></p>
        <p><label for="tong">Tổng dãy số:</label> <input id="tong" type="text" value="<?= htmlspecialchars((string) $tongDaySo) ?>" readonly></p>
    </form>
    <p>Các số được nhập cách nhau bằng dấu phẩy.</p>
    <?php if ($thongBao !== ''): ?><p><?= htmlspecialchars($thongBao) ?></p><?php endif; ?>
</body>
</html>
