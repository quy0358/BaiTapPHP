<?php
$chieuDai = $_POST['chieu_dai'] ?? '';
$chieuRong = $_POST['chieu_rong'] ?? '';
$dienTich = '';
$thongBao = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (is_numeric($chieuDai) && is_numeric($chieuRong)) {
        $dienTich = (float) $chieuDai * (float) $chieuRong;
    } else {
        $thongBao = 'Chiều dài và chiều rộng phải là số.';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Diện tích hình chữ nhật</title>
</head>
<body>
    <h1>Diện tích hình chữ nhật</h1>
    <form name="hinh_chu_nhat" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <table bgcolor="#fff4cc">
            <tr>
                <td><label for="chieu_dai">Chiều dài:</label></td>
                <td><input id="chieu_dai" name="chieu_dai" type="text" value="<?= htmlspecialchars((string) $chieuDai) ?>" required></td>
            </tr>
            <tr>
                <td><label for="chieu_rong">Chiều rộng:</label></td>
                <td><input id="chieu_rong" name="chieu_rong" type="text" value="<?= htmlspecialchars((string) $chieuRong) ?>" required></td>
            </tr>
            <tr>
                <td><label for="dien_tich">Diện tích:</label></td>
                <td><input id="dien_tich" type="text" value="<?= htmlspecialchars((string) $dienTich) ?>" readonly></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Tính</button></td>
            </tr>
        </table>
    </form>
    <?php if ($thongBao !== ''): ?><p><?= htmlspecialchars($thongBao) ?></p><?php endif; ?>
</body>
</html>
