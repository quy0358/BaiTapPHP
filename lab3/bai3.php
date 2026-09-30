<?php
function taoMang(int $n): array
{
    $mang = [];
    for ($i = 0; $i < $n; $i++) {
        $mang[] = rand(0, 20);
    }
    return $mang;
}

function xuatMang(array $mang): string
{
    return implode(' ', $mang);
}

function tinhTong(array $mang): int
{
    $tong = 0;
    foreach ($mang as $giaTri) {
        $tong += $giaTri;
    }
    return $tong;
}

function timMin(array $mang): int
{
    $min = $mang[0];
    foreach ($mang as $giaTri) {
        if ($giaTri < $min) {
            $min = $giaTri;
        }
    }
    return $min;
}

function timMax(array $mang): int
{
    $max = $mang[0];
    foreach ($mang as $giaTri) {
        if ($giaTri > $max) {
            $max = $giaTri;
        }
    }
    return $max;
}

$n = $_POST['so_phan_tu'] ?? '';
$chuoiMang = '';
$tong = '';
$min = '';
$max = '';
$thongBao = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $soPhanTu = filter_var($n, FILTER_VALIDATE_INT);
    if ($soPhanTu === false || $soPhanTu <= 0) {
        $thongBao = 'Số phần tử phải là số nguyên dương.';
    } else {
        $mang = taoMang($soPhanTu);
        $chuoiMang = xuatMang($mang);
        $tong = tinhTong($mang);
        $min = timMin($mang);
        $max = timMax($mang);
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Phát sinh mảng và tính toán</title>
</head>
<body>
    <h1>Phát sinh mảng và tính toán</h1>
    <form name="phat_sinh_mang" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <p><label for="so_phan_tu">Nhập số phần tử:</label> <input id="so_phan_tu" name="so_phan_tu" type="text" value="<?= htmlspecialchars((string) $n) ?>" required></p>
        <p><button type="submit">Phát sinh và tính toán</button></p>
        <p><label for="mang">Mảng:</label> <input id="mang" type="text" value="<?= htmlspecialchars($chuoiMang) ?>" readonly></p>
        <p><label for="max">GTLN (MAX) trong mảng:</label> <input id="max" type="text" value="<?= htmlspecialchars((string) $max) ?>" readonly></p>
        <p><label for="min">GTNN (MIN) trong mảng:</label> <input id="min" type="text" value="<?= htmlspecialchars((string) $min) ?>" readonly></p>
        <p><label for="tong">Tổng mảng:</label> <input id="tong" type="text" value="<?= htmlspecialchars((string) $tong) ?>" readonly></p>
    </form>
    <p>Các phần tử trong mảng có giá trị từ 0 đến 20.</p>
    <?php if ($thongBao !== ''): ?><p><?= htmlspecialchars($thongBao) ?></p><?php endif; ?>
</body>
</html>
