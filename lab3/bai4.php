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

function timKiem(array $mang, float $giaTri): int
{
    foreach ($mang as $viTri => $phanTu) {
        if ($phanTu == $giaTri) {
            return $viTri;
        }
    }
    return -1;
}

$chuoiMang = $_POST['chuoi_mang'] ?? '';
$giaTriCanTim = $_POST['gia_tri_can_tim'] ?? '';
$mangHienThi = '';
$ketQua = '';
$thongBao = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mang = taoMangTuChuoi($chuoiMang);
    if ($mang === null || !is_numeric($giaTriCanTim)) {
        $thongBao = 'Mảng và giá trị cần tìm phải là các số hợp lệ.';
    } else {
        $mangHienThi = implode(', ', $mang);
        $viTri = timKiem($mang, (float) $giaTriCanTim);
        $ketQua = $viTri >= 0
            ? "Đã tìm thấy $giaTriCanTim tại vị trí thứ " . ($viTri + 1) . ' của mảng'
            : "Không tìm thấy $giaTriCanTim trong mảng";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm kiếm trong mảng</title>
</head>
<body>
    <h1>Tìm kiếm</h1>
    <form name="tim_kiem" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <p><label for="chuoi_mang">Nhập mảng:</label> <input id="chuoi_mang" name="chuoi_mang" type="text" value="<?= htmlspecialchars((string) $chuoiMang) ?>" required></p>
        <p><label for="gia_tri_can_tim">Nhập số cần tìm:</label> <input id="gia_tri_can_tim" name="gia_tri_can_tim" type="text" value="<?= htmlspecialchars((string) $giaTriCanTim) ?>" required></p>
        <p><button type="submit">Tìm kiếm</button></p>
        <p><label for="mang">Mảng:</label> <input id="mang" type="text" value="<?= htmlspecialchars($mangHienThi) ?>" readonly></p>
        <p><label for="ket_qua">Kết quả tìm kiếm:</label> <input id="ket_qua" type="text" value="<?= htmlspecialchars($ketQua) ?>" readonly></p>
    </form>
    <p>Các phần tử trong mảng được ngăn cách bằng dấu phẩy.</p>
    <?php if ($thongBao !== ''): ?><p><?= htmlspecialchars($thongBao) ?></p><?php endif; ?>
</body>
</html>
