<?php
function hienThi(string $ten): string
{
    return htmlspecialchars(trim((string) ($_POST[$ten] ?? '')));
}

$study = $_POST['study'] ?? [];
if (!is_array($study)) {
    $study = [];
}
$study = array_map(static fn ($mon) => htmlspecialchars((string) $mon), $study);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Config</title>
</head>
<body>
    <p>Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập:</p>
    <p>Họ tên: <?= hienThi('fullname') ?></p>
    <p>Address: <?= hienThi('address') ?></p>
    <p>Phone: <?= hienThi('phone') ?></p>
    <p>Gender: <?= hienThi('gender') ?></p>
    <p>Country: <?= hienThi('country') ?></p>
    <p>Study: <?= implode(', ', $study) ?></p>
    <p>Note: <?= nl2br(hienThi('note')) ?></p>
    <button type="button" onclick="window.history.back();">Quay về</button>
</body>
</html>
