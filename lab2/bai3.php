<?php
$tenChuHo = $_POST['ten_chu_ho'] ?? '';
$chiSoCu = $_POST['chi_so_cu'] ?? '';
$chiSoMoi = $_POST['chi_so_moi'] ?? '';
$donGia = $_POST['don_gia'] ?? '20000';
$thanhTien = '';
$thongBao = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!is_numeric($chiSoCu) || !is_numeric($chiSoMoi) || !is_numeric($donGia)) {
        $thongBao = 'Chỉ số điện và đơn giá phải là số.';
    } elseif ((float) $chiSoMoi < (float) $chiSoCu) {
        $thongBao = 'Chỉ số mới phải lớn hơn hoặc bằng chỉ số cũ.';
    } else {
        $thanhTien = ((float) $chiSoMoi - (float) $chiSoCu) * (float) $donGia;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán tiền điện</title>
</head>
<body>
    <h1>Thanh toán tiền điện</h1>
    <form name="tien_dien" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <table bgcolor="#fff4cc">
            <tr><td><label for="ten_chu_ho">Tên chủ hộ:</label></td><td><input id="ten_chu_ho" name="ten_chu_ho" type="text" value="<?= htmlspecialchars((string) $tenChuHo) ?>" required></td></tr>
            <tr><td><label for="chi_so_cu">Chỉ số cũ:</label></td><td><input id="chi_so_cu" name="chi_so_cu" type="text" value="<?= htmlspecialchars((string) $chiSoCu) ?>" required> (kW)</td></tr>
            <tr><td><label for="chi_so_moi">Chỉ số mới:</label></td><td><input id="chi_so_moi" name="chi_so_moi" type="text" value="<?= htmlspecialchars((string) $chiSoMoi) ?>" required> (kW)</td></tr>
            <tr><td><label for="don_gia">Đơn giá:</label></td><td><input id="don_gia" name="don_gia" type="text" value="<?= htmlspecialchars((string) $donGia) ?>" required> (VNĐ)</td></tr>
            <tr><td><label for="thanh_tien">Số tiền thanh toán:</label></td><td><input id="thanh_tien" type="text" value="<?= htmlspecialchars((string) $thanhTien) ?>" readonly> (VNĐ)</td></tr>
            <tr><td colspan="2"><button type="submit">Tính</button></td></tr>
        </table>
    </form>
    <?php if ($thongBao !== ''): ?><p><?= htmlspecialchars($thongBao) ?></p><?php endif; ?>
</body>
</html>
