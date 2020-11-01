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
		<h2 class="tieude">TRANG QUANG TRỊ THỂ LOẠI</h2>
		<div class="main-content">
			
			<table border='1' aligh>
                <tr>
                    <td>idTL</td>
                    <td>TenTL</td>
                    <td>TenTL_KhongDau</td>
                    <td>ThuTu</td>
                    <td>AnHien</td>
                    <td><a href="Themtheloai.php">Thêm</a></td>
                </tr>
                <?php
                $theloai = danhsachtheloai();
                while ($row_theloai = mysqli_fetch_array($theloai)){
                    ob_start();
                ?>
                <tr>
                    <td>{idTL}</td>
                    <td>{TenTL}</td>
                    <td>{TenTL_KhongDau}</td>
                    <td>{ThuTu}</td>
                    <td>{AnHien}</td>
                    <td>
                    <a href="Suatheloai.php?idTL={idTL}">Sửa</a>  
                    - <a onclick = "return confirm('Bạn có muốn xóa?')" href="Xoatheloai.php?idTL={idTL}">Xóa</a>
                    </td>
                </tr>
                <?php
                    $s = ob_get_clean();
                    $s = str_replace ('{idTL}', $row_theloai['idTL'],$s);
                    $s = str_replace ('{TenTL}', $row_theloai['TenTL'],$s);
                    $s = str_replace ('{TenTL_KhongDau}', $row_theloai['TenTL_KhongDau'],$s);
                    $s = str_replace ('{ThuTu}', $row_theloai['ThuTu'],$s);
                    $s = str_replace ('{AnHien}', $row_theloai['AnHien'],$s);
                    echo $s;
                }
                ?>

            </table>
			
		</div>
	</div>
</body>
</html>
