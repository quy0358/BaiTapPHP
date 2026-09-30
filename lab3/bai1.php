<?php
$n = $_POST['n'] ?? '';
$mang = [];
$soPhanTuChan = 0;
$soPhanTuNhoHon100 = 0;
$tongSoAm = 0;
$viTriSoKhong = [];
$mangTangDan = [];
$thongBao = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nHopLe = filter_var($n, FILTER_VALIDATE_INT);

    if ($nHopLe === false || $nHopLe <= 0) {
        $thongBao = 'n phải là số nguyên dương.';
    } else {
        for ($i = 0; $i < $nHopLe; $i++) {
            $mang[] = rand(-100, 100);
        }

        foreach ($mang as $viTri => $giaTri) {
            if ($giaTri % 2 === 0) {
                $soPhanTuChan++;
            }
            if ($giaTri < 100) {
                $soPhanTuNhoHon100++;
            }
            if ($giaTri < 0) {
                $tongSoAm += $giaTri;
            }
            if ($giaTri === 0) {
                $viTriSoKhong[] = $viTri + 1;
            }
        }

        $mangTangDan = $mang;
        sort($mangTangDan);
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xử lý mảng ngẫu nhiên</title>
</head>
<body>
    <h1>Xử lý mảng ngẫu nhiên</h1>
    <form name="mang_ngau_nhien" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <label for="n">Nhập n:</label>
        <input id="n" name="n" type="text" value="<?= htmlspecialchars((string) $n) ?>" required>
        <button type="submit">Thực hiện</button>
    </form>
    <?php if ($thongBao !== ''): ?>
        <p><?= htmlspecialchars($thongBao) ?></p>
    <?php elseif ($mang !== []): ?>
        <p>Mảng phát sinh: <?= htmlspecialchars(implode(', ', $mang)) ?></p>
        <p>Số phần tử có giá trị là số chẵn: <?= $soPhanTuChan ?></p>
        <p>Số phần tử có giá trị nhỏ hơn 100: <?= $soPhanTuNhoHon100 ?></p>
        <p>Tổng các phần tử có giá trị là số âm: <?= $tongSoAm ?></p>
        <p>Vị trí các phần tử có giá trị bằng 0: <?= $viTriSoKhong === [] ? 'Không có' : htmlspecialchars(implode(', ', $viTriSoKhong)) ?></p>
        <p>Mảng tăng dần: <?= htmlspecialchars(implode(', ', $mangTangDan)) ?></p>
    <?php endif; ?>
</body>
</html>
