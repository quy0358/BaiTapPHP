<?php
$mangCan = ['Quý', 'Giáp', 'Ất', 'Bính', 'Đinh', 'Mậu', 'Kỷ', 'Canh', 'Tân', 'Nhâm'];
$mangChi = ['Hợi', 'Tý', 'Sửu', 'Dần', 'Mão', 'Thìn', 'Tỵ', 'Ngọ', 'Mùi', 'Thân', 'Dậu', 'Tuất'];
$mangHinh = ['hoi.svg', 'ty.svg', 'suu.svg', 'dan.svg', 'mao.svg', 'thin.svg', 'ran.svg', 'ngo.svg', 'mui.svg', 'than.svg', 'dau.svg', 'tuat.svg'];

$namDuongLich = $_POST['nam_duong_lich'] ?? '';
$namAmLich = '';
$hinhAnh = '';
$thongBao = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nam = filter_var($namDuongLich, FILTER_VALIDATE_INT);
    if ($nam === false || $nam <= 0) {
        $thongBao = 'Năm dương lịch phải là số nguyên dương.';
    } else {
        $namTinh = $nam - 3;
        $can = $namTinh % 10;
        $chi = $namTinh % 12;
        $namAmLich = $mangCan[$can] . ' ' . $mangChi[$chi];
        $hinhAnh = $mangHinh[$chi];
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tính năm âm lịch</title>
</head>
<body>
    <h1>Tính năm âm lịch</h1>
    <form name="nam_am_lich" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <p>
            <label for="nam_duong_lich">Năm dương lịch:</label>
            <input id="nam_duong_lich" name="nam_duong_lich" type="text" value="<?= htmlspecialchars((string) $namDuongLich) ?>" required>
            <button type="submit">=&gt;</button>
            <label for="nam_am_lich">Năm âm lịch:</label>
            <input id="nam_am_lich" type="text" value="<?= htmlspecialchars($namAmLich) ?>" readonly>
        </p>
    </form>
    <?php if ($hinhAnh !== ''): ?>
        <img src="images/<?= htmlspecialchars($hinhAnh) ?>" alt="Con giáp <?= htmlspecialchars($mangChi[$chi]) ?>" width="180" height="140">
    <?php endif; ?>
    <?php if ($thongBao !== ''): ?><p><?= htmlspecialchars($thongBao) ?></p><?php endif; ?>
</body>
</html>
