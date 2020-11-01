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
                    <td>idLT</td>
                    <td>Ten</td>
                    <td>Ten_KhongDau</td>
                    <td>ThuTu</td>
                    <td>AnHien</td>
                    <td>TenTL</td>
                    <td><a href="themloaitin.php">Thêm</a></td>
                </tr>
                <?php
                $loaitin = danhsachloaitin();
                while ($row_loaitin = mysqli_fetch_array($loaitin)){
                    ob_start();
                ?>
                <tr>
                    <td>{idLT}</td>
                    <td>{Ten}</td>
                    <td>{Ten_KhongDau}</td>
                    <td>{ThuTu}</td>
                    <td>{AnHien}</td>
                    <td>{TenTL}</td>

                    <td>
                    <a href="sualoaitin.php?idLT={idLT}">Sửa</a>  
                    - <a onclick = "return confirm('Bạn có muốn xóa?')" href="xoaloaitin.php?idLT={idLT}">Xóa</a>
                    </td>
                </tr>
                <?php
                    $s = ob_get_clean();
                    $s = str_replace ('{idLT}', $row_loaitin['idLT'],$s);
                    $s = str_replace ('{Ten}', $row_loaitin['Ten'],$s);
                    $s = str_replace ('{Ten_KhongDau}', $row_loaitin['Ten_KhongDau'],$s);
                    $s = str_replace ('{ThuTu}', $row_loaitin['ThuTu'],$s);
                    $s = str_replace ('{AnHien}', $row_loaitin['AnHien'],$s);
                    $s = str_replace ('{TenTL}', $row_loaitin['TenTL'],$s);
                    echo $s;
                }
                ?>

            </table>
			
		</div>
	</div>
</body>
</html>
