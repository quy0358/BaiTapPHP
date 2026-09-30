<?php
$cacTrang = [
    'trangchu' => 'Trang chủ',
    'gioithieu' => 'Giới thiệu',
    'tintuc' => 'Tin tức',
    'lienhe' => 'Liên hệ',
    'diendan' => 'Diễn đàn',
];
$trang = $_GET['trang'] ?? 'trangchu';
if (!isset($cacTrang[$trang])) {
    $trang = 'trangchu';
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($cacTrang[$trang]) ?></title>
</head>
<body>
    <h1>Website</h1>
    <nav>
        <?php foreach ($cacTrang as $maTrang => $tenTrang): ?>
            <a href="?trang=<?= urlencode($maTrang) ?>"><?= htmlspecialchars($tenTrang) ?></a>
        <?php endforeach; ?>
    </nav>
    <main>
        <?php require __DIR__ . '/' . $trang . '.php'; ?>
    </main>
</body>
</html>
