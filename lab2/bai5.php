<?php
$gioBatDau = $_POST['gio_bat_dau'] ?? '';
$gioKetThuc = $_POST['gio_ket_thuc'] ?? '';
$thanhTien = '';
$thongBao = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!is_numeric($gioBatDau) || !is_numeric($gioKetThuc)) {
        $thongBao = 'Giờ bắt đầu và giờ kết thúc phải là số.';
    } else {
        $batDau = (float) $gioBatDau;
        $ketThuc = (float) $gioKetThuc;

        if ($ketThuc <= $batDau) {
            $thongBao = 'Giờ kết thúc phải lớn hơn giờ bắt đầu.';
        } elseif ($batDau < 10 || $ketThuc > 24) {
            $thongBao = 'Giờ hoạt động của quán từ 10 giờ đến 24 giờ.';
        } elseif ($ketThuc <= 17) {
            $thanhTien = ($ketThuc - $batDau) * 20000;
        } elseif ($batDau >= 17) {
            $thanhTien = ($ketThuc - $batDau) * 45000;
        } else {
            $thanhTien = (17 - $batDau) * 20000 + ($ketThuc - 17) * 45000;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính tiền Karaoke</title>
</head>
<body>
    <h1>Tính tiền Karaoke</h1>
    <form name="karaoke" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <table bgcolor="#ccffff">
            <tr><td><label for="gio_bat_dau">Giờ bắt đầu:</label></td><td><input id="gio_bat_dau" name="gio_bat_dau" type="text" value="<?= htmlspecialchars((string) $gioBatDau) ?>" required> (h)</td></tr>
            <tr><td><label for="gio_ket_thuc">Giờ kết thúc:</label></td><td><input id="gio_ket_thuc" name="gio_ket_thuc" type="text" value="<?= htmlspecialchars((string) $gioKetThuc) ?>" required> (h)</td></tr>
            <tr><td><label for="thanh_tien">Tiền thanh toán:</label></td><td><input id="thanh_tien" type="text" value="<?= htmlspecialchars((string) $thanhTien) ?>" readonly> (VNĐ)</td></tr>
            <tr><td colspan="2"><button type="submit">Tính tiền</button></td></tr>
        </table>
    </form>
    <p>Đơn giá từ 10 giờ đến trước 17 giờ: 20.000 đồng/giờ.</p>
    <p>Đơn giá từ 17 giờ đến 24 giờ: 45.000 đồng/giờ.</p>
    <?php if ($thongBao !== ''): ?><p><?= htmlspecialchars($thongBao) ?></p><?php endif; ?>
</body>
</html>
