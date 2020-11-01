<?php
// Kiểm tra biến session, nếu chưa đăng nhập thì không vào đươc trang quản tri
	ob_start();
	session_start();
	
	if (!isset($_SESSION['idUser']) && $idGroup != 1){
		header('location:../index.php');
	}

	require '../lib/dbcon.php';
	require '../admin/quantri.php';
?>

<?php
// Kiểm tra đã nhấn nút thêm

if (isset($_POST['btnthem'])){
    $TenTL = $_POST['TenTL'];
    $TenTL_khongdau = changeTitle($TenTL);
    $ThuTu  = $_POST['ThuTu'];
        settype ($ThuTu, 'int');
    $AnHien  = $_POST['AnHien'];
        settype ($AnHien, 'int');
   
    $qr = "INSERT INTO theloai
            VALUES (null,'$TenTL','$TenTL_khongdau','$ThuTu','$AnHien') ";
    
    mysqli_query($link, $qr);
    
    header ('location:./listtheloai.php');
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="layout.css">
	
	<title>Document</title>
</head>
<body>
	<div id="quantri">
		<h2 class="tieude">TRANG QUANG TRỊ NỘI DUNG WEBNEWS</h2>
		<form action="" method="post">
		<table>
			<tr>
				<td colspan="2">
					<h3>Thêm Thể loại</h3>
				</td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Tên Thể Loại:</td>
				<td><input type="text" name="TenTL" id="TenTL" value="" ></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Thứ tự:</td>
				<td><input type="text" name="ThuTu" id="ThuTu" value="" ></td>
			</tr>
			
			<tr>
				<td nowrap="nowrap">Ẩn, Hiện:</td>
				<td>
                    <input type="radio" id="AnHien" name="AnHien" checked="checked" value="0">
                    <label for="An">Ẩn</label><br>
                    <input type="radio" id="AnHien" name="AnHien" value="1">
                    <label for="An">Hiện</label><br>
				</td>
			</tr>
			
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btnthem" value="Thêm"></td>
			</tr>

		</table>
		
	</form>
</body>
</html>
