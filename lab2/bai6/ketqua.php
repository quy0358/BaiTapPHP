<?php
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
$soThuNhat = (float) ($_POST['so_thu_nhat'] ?? 0);
$soThuHai = (float) ($_POST['so_thu_hai'] ?? 0);
$tenPhepTinh = '';
$ketQua = '';

switch ($phepTinh) {
    case 'cong':
        $tenPhepTinh = 'Cộng';
        $ketQua = cong($soThuNhat, $soThuHai);
        break;
    case 'tru':
        $tenPhepTinh = 'Trừ';
        $ketQua = tru($soThuNhat, $soThuHai);
        break;
    case 'nhan':
        $tenPhepTinh = 'Nhân';
        $ketQua = nhan($soThuNhat, $soThuHai);
        break;
    case 'chia':
        $tenPhepTinh = 'Chia';
        $ketQua = $soThuHai == 0 ? 'Không thể chia cho 0' : chia($soThuNhat, $soThuHai);
        break;
    default:
        $tenPhepTinh = 'Không xác định';
        $ketQua = 'Không có kết quả';
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả phép tính</title>
</head>
<body>
    <h1>Kết quả phép tính</h1>
    <p>Phép tính đã chọn: <?= htmlspecialchars($tenPhepTinh) ?></p>
    <p>Số thứ nhất: <?= htmlspecialchars((string) $soThuNhat) ?></p>
    <p>Số thứ hai: <?= htmlspecialchars((string) $soThuHai) ?></p>
    <p>Kết quả: <?= htmlspecialchars((string) $ketQua) ?></p>
    <a href="javascript:window.history.back();">Trở về trang trước</a>
</body>
</html>
