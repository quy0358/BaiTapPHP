<?php
function quayLai(string $thongBao): never
{
    $noiDung = json_encode($thongBao, JSON_UNESCAPED_UNICODE);
    echo "<!DOCTYPE html><html lang=\"vi\"><head><meta charset=\"UTF-8\"><title>Dữ liệu không hợp lệ</title></head><body>";
    echo "<script>alert($noiDung); window.history.back();</script>";
    echo '</body></html>';
    exit;
}

function cong(float $a, float $b): float
{
    return $a + $b;
}

function tru(float $a, float $b): float
{
    return $a - $b;
}

function nhan(float $a, float $b): float
{
    return $a * $b;
}

function chia(float $a, float $b): float
{
    return $a / $b;
}

$phepTinh = $_POST['phep_tinh'] ?? '';
$giaTriMot = $_POST['so_thu_nhat'] ?? '';
$giaTriHai = $_POST['so_thu_hai'] ?? '';
$cacPhepTinh = ['cong' => 'Cộng', 'tru' => 'Trừ', 'nhan' => 'Nhân', 'chia' => 'Chia'];

if (!isset($cacPhepTinh[$phepTinh]) || !is_numeric($giaTriMot) || !is_numeric($giaTriHai)) {
    quayLai('Dữ liệu nhập không hợp lệ.');
}

$soThuNhat = (float) $giaTriMot;
$soThuHai = (float) $giaTriHai;

if ($phepTinh === 'chia' && $soThuHai == 0) {
    quayLai('Không thể chia cho 0.');
}

$ketQua = match ($phepTinh) {
    'cong' => cong($soThuNhat, $soThuHai),
    'tru' => tru($soThuNhat, $soThuHai),
    'nhan' => nhan($soThuNhat, $soThuHai),
    'chia' => chia($soThuNhat, $soThuHai),
};
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả phép tính</title>
</head>
<body>
    <h1>Kết quả phép tính</h1>
    <p>Phép tính đã chọn: <?= htmlspecialchars($cacPhepTinh[$phepTinh]) ?></p>
    <p>Số thứ nhất: <?= htmlspecialchars((string) $soThuNhat) ?></p>
    <p>Số thứ hai: <?= htmlspecialchars((string) $soThuHai) ?></p>
    <p>Kết quả: <?= htmlspecialchars((string) $ketQua) ?></p>
    <a href="javascript:window.history.back();">Trở về trang trước</a>
</body>
</html>
