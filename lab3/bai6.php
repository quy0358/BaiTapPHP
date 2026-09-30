<?php
function taoMangTuChuoi(string $chuoi): ?array
{
    $mang = array_map('trim', explode(',', $chuoi));
    if ($mang === [] || in_array('', $mang, true)) {
        return null;
    }

    foreach ($mang as $giaTri) {
        if (!is_numeric($giaTri)) {
            return null;
        }
    }

    return array_map('floatval', $mang);
}

function hoanVi(float &$a, float &$b): void
{
    $tam = $a;
    $a = $b;
    $b = $tam;
}

function sapTang(array $mang): array
{
    $soPhanTu = count($mang);
    for ($i = 0; $i < $soPhanTu - 1; $i++) {
        for ($j = $i + 1; $j < $soPhanTu; $j++) {
            if ($mang[$i] > $mang[$j]) {
                hoanVi($mang[$i], $mang[$j]);
            }
        }
    }
    return $mang;
}

function sapGiam(array $mang): array
{
    $soPhanTu = count($mang);
    for ($i = 0; $i < $soPhanTu - 1; $i++) {
        for ($j = $i + 1; $j < $soPhanTu; $j++) {
            if ($mang[$i] < $mang[$j]) {
                hoanVi($mang[$i], $mang[$j]);
            }
        }
    }
    return $mang;
}

$chuoiMang = $_POST['chuoi_mang'] ?? '';
$tangDan = '';
$giamDan = '';
$thongBao = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mang = taoMangTuChuoi($chuoiMang);
    if ($mang === null) {
        $thongBao = 'Mảng phải gồm các số ngăn cách nhau bởi dấu phẩy.';
    } else {
        $tangDan = implode(', ', sapTang($mang));
        $giamDan = implode(', ', sapGiam($mang));
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sắp xếp mảng</title>
</head>
<body>
    <h1>Sắp xếp mảng</h1>
    <form name="sap_xep" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <p><label for="chuoi_mang">Nhập mảng:</label> <input id="chuoi_mang" name="chuoi_mang" type="text" value="<?= htmlspecialchars((string) $chuoiMang) ?>" required></p>
        <p><button type="submit">Sắp xếp tăng/giảm</button></p>
        <p>Sau khi sắp xếp:</p>
        <p><label for="tang_dan">Tăng dần:</label> <input id="tang_dan" type="text" value="<?= htmlspecialchars($tangDan) ?>" readonly></p>
        <p><label for="giam_dan">Giảm dần:</label> <input id="giam_dan" type="text" value="<?= htmlspecialchars($giamDan) ?>" readonly></p>
    </form>
    <p>Các số được nhập cách nhau bằng dấu phẩy.</p>
    <?php if ($thongBao !== ''): ?><p><?= htmlspecialchars($thongBao) ?></p><?php endif; ?>
</body>
</html>
