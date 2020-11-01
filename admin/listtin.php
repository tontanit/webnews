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
                    <td>idTin</td>
                    
                    <td>TomTat</td>
                    <td>Ten</td>
                    <td>TenTL</td>
                    <td><a href="themtin.php">Thêm</a></td>
                </tr>
                <?php
                $tin = danhsachtin();
                while ($row_tin = mysqli_fetch_array($tin)){
                    ob_start();
                ?>
                <tr>
                    <td> {idTin} <br> {Ngay}</td>
                    
                    <td>
                    <img src="../upload/tintuc/{urlHinh}" alt="" style="wight: 70px; height:70px;">
                    <b>{TieuDe}</b> <br> {TomTat}
                    </td>
                    
                    <td>{Ten}</td>
                    <td>{TenTL}</td>

                    <td>
                    <a href="suatin.php?idTin={idTin}">Sửa</a>  
                    - <a onclick = "return confirm('Bạn có muốn xóa?')" href="xoatin.php?idTin={idTin}">Xóa</a>
                    </td>
                </tr>
                <?php
                    $s = ob_get_clean();
                    $s = str_replace ('{idTin}', $row_tin['idTin'],$s);
                    $s = str_replace ('{TieuDe}', $row_tin['TieuDe'],$s);
                    $s = str_replace ('{TomTat}', $row_tin['TomTat'],$s);
                    $s = str_replace ('{urlHinh}', $row_tin['urlHinh'],$s);
                    $s = str_replace ('{Ngay}', $row_tin['Ngay'],$s);
                    $s = str_replace ('{Ten}', $row_tin['Ten'],$s);
                    $s = str_replace ('{TenTL}', $row_tin['TenTL'],$s);
                    echo $s;
                }
                ?>

            </table>
			
		</div>
	</div>
</body>
</html>
