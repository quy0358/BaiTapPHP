<?php
$toan = $_POST['toan'] ?? '';
$ly = $_POST['ly'] ?? '';
$hoa = $_POST['hoa'] ?? '';
$diemChuan = $_POST['diem_chuan'] ?? '';
$tongDiem = '';
$ketQua = '';
$thongBao = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (is_numeric($toan) && is_numeric($ly) && is_numeric($hoa) && is_numeric($diemChuan)) {
        $tongDiem = (float) $toan + (float) $ly + (float) $hoa;
        $ketQua = ((float) $toan > 0 && (float) $ly > 0 && (float) $hoa > 0 && $tongDiem >= (float) $diemChuan)
            ? 'Đậu'
            : 'Rớt';
    } else {
        $thongBao = 'Điểm các môn và điểm chuẩn phải là số.';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả thi đại học</title>
</head>
<body>
    <h1>Kết quả thi đại học</h1>
    <form name="ket_qua_thi" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <table bgcolor="#ffe4f0">
            <tr><td><label for="toan">Toán:</label></td><td><input id="toan" name="toan" type="text" value="<?= htmlspecialchars((string) $toan) ?>" required></td></tr>
            <tr><td><label for="ly">Lý:</label></td><td><input id="ly" name="ly" type="text" value="<?= htmlspecialchars((string) $ly) ?>" required></td></tr>
            <tr><td><label for="hoa">Hóa:</label></td><td><input id="hoa" name="hoa" type="text" value="<?= htmlspecialchars((string) $hoa) ?>" required></td></tr>
            <tr><td><label for="diem_chuan">Điểm chuẩn:</label></td><td><input id="diem_chuan" name="diem_chuan" type="text" value="<?= htmlspecialchars((string) $diemChuan) ?>" required></td></tr>
            <tr><td><label for="tong_diem">Tổng điểm:</label></td><td><input id="tong_diem" type="text" value="<?= htmlspecialchars((string) $tongDiem) ?>" readonly></td></tr>
            <tr><td><label for="ket_qua">Kết quả thi:</label></td><td><input id="ket_qua" type="text" value="<?= htmlspecialchars($ketQua) ?>" readonly></td></tr>
            <tr><td colspan="2"><button type="submit">Xem kết quả</button></td></tr>
        </table>
    </form>
    <?php if ($thongBao !== ''): ?><p><?= htmlspecialchars($thongBao) ?></p><?php endif; ?>
</body>
</html>
