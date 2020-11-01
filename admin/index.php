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
		<h2 class="tieude">TRANG QUANG TRỊ NỘI DUNG WEBNEWS</h2>
		<div class="main-content">
			<div class="content"><a href="">Trang chủ</a></div>
			<div class="content"><a href="listtheloai.php">Quảng lí Thể Loại</a></div>
			<div class="content"><a href="listloaitin.php">Quản lí Loại Tin</a></div>
			<div class="content"><a href="listtin.php">Quản lí Tin tức</a></div>
			<div class="content"><a href="">Quản lí Quảng cáo</a></div>
			<div class="float"></div>
		</div>
	</div>
</body>
</html>
