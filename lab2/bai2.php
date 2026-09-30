<?php
const PI = 3.14;

$banKinh = $_POST['ban_kinh'] ?? '';
$dienTich = '';
$chuVi = '';
$thongBao = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (is_numeric($banKinh) && (float) $banKinh >= 0) {
        $r = (float) $banKinh;
        $dienTich = PI * $r * $r;
        $chuVi = 2 * PI * $r;
    } else {
        $thongBao = 'Bán kính phải là số không âm.';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Diện tích và chu vi hình tròn</title>
</head>
<body>
    <h1>Diện tích và chu vi hình tròn</h1>
    <form name="hinh_tron" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <table bgcolor="#fff4cc">
            <tr>
                <td><label for="ban_kinh">Bán kính:</label></td>
                <td><input id="ban_kinh" name="ban_kinh" type="text" value="<?= htmlspecialchars((string) $banKinh) ?>" required></td>
            </tr>
            <tr>
                <td><label for="dien_tich">Diện tích:</label></td>
                <td><input id="dien_tich" type="text" value="<?= htmlspecialchars((string) $dienTich) ?>" readonly></td>
            </tr>
            <tr>
                <td><label for="chu_vi">Chu vi:</label></td>
                <td><input id="chu_vi" type="text" value="<?= htmlspecialchars((string) $chuVi) ?>" readonly></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Tính</button></td>
            </tr>
        </table>
    </form>
    <?php if ($thongBao !== ''): ?><p><?= htmlspecialchars($thongBao) ?></p><?php endif; ?>
</body>
</html>
