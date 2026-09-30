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

function xuatMang(array $mang): string
{
    return implode(', ', $mang);
}

function thayThe(array $mang, float $giaTriCu, float $giaTriMoi): array
{
    foreach ($mang as $viTri => $giaTri) {
        if ($giaTri == $giaTriCu) {
            $mang[$viTri] = $giaTriMoi;
        }
    }
    return $mang;
}

$chuoiMang = $_POST['chuoi_mang'] ?? '';
$giaTriCu = $_POST['gia_tri_cu'] ?? '';
$giaTriMoi = $_POST['gia_tri_moi'] ?? '';
$mangCu = '';
$mangMoi = '';
$thongBao = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mang = taoMangTuChuoi($chuoiMang);
    if ($mang === null || !is_numeric($giaTriCu) || !is_numeric($giaTriMoi)) {
        $thongBao = 'Mảng và các giá trị thay thế phải là các số hợp lệ.';
    } else {
        $mangCu = xuatMang($mang);
        $mangMoi = xuatMang(thayThe($mang, (float) $giaTriCu, (float) $giaTriMoi));
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thay thế phần tử trong mảng</title>
</head>
<body>
    <h1>Thay thế</h1>
    <form name="thay_the" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <p><label for="chuoi_mang">Nhập các phần tử:</label> <input id="chuoi_mang" name="chuoi_mang" type="text" value="<?= htmlspecialchars((string) $chuoiMang) ?>" required></p>
        <p><label for="gia_tri_cu">Giá trị cần thay thế:</label> <input id="gia_tri_cu" name="gia_tri_cu" type="text" value="<?= htmlspecialchars((string) $giaTriCu) ?>" required></p>
        <p><label for="gia_tri_moi">Giá trị thay thế:</label> <input id="gia_tri_moi" name="gia_tri_moi" type="text" value="<?= htmlspecialchars((string) $giaTriMoi) ?>" required></p>
        <p><button type="submit">Thay thế</button></p>
        <p><label for="mang_cu">Mảng cũ:</label> <input id="mang_cu" type="text" value="<?= htmlspecialchars($mangCu) ?>" readonly></p>
        <p><label for="mang_moi">Mảng sau khi thay thế:</label> <input id="mang_moi" type="text" value="<?= htmlspecialchars($mangMoi) ?>" readonly></p>
    </form>
    <p>Các phần tử trong mảng được ngăn cách bằng dấu phẩy.</p>
    <?php if ($thongBao !== ''): ?><p><?= htmlspecialchars($thongBao) ?></p><?php endif; ?>
</body>
</html>
