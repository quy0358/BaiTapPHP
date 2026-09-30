<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Phép tính trên hai số - kiểm tra dữ liệu</title>
</head>
<body>
    <h1>Phép tính trên hai số</h1>
    <form method="post" action="ketqua.php">
        <p>Chọn phép tính:
            <label><input type="radio" name="phep_tinh" value="cong" checked> Cộng</label>
            <label><input type="radio" name="phep_tinh" value="tru"> Trừ</label>
            <label><input type="radio" name="phep_tinh" value="nhan"> Nhân</label>
            <label><input type="radio" name="phep_tinh" value="chia"> Chia</label>
        </p>
        <p><label for="so_thu_nhat">Số thứ nhất:</label> <input id="so_thu_nhat" name="so_thu_nhat" type="text" required></p>
        <p><label for="so_thu_hai">Số thứ hai:</label> <input id="so_thu_hai" name="so_thu_hai" type="text" required></p>
        <button type="submit">Tính</button>
    </form>
</body>
</html>
