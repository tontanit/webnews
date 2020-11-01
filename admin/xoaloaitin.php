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
//XÓA THỂ LOẠI
if (isset($_GET['idLT'])){
    $idLT = $_GET['idLT'];
    	settype ($idLT,'int');
  
}
    $qr = " DELETE FROM loaitin
			WHERE loaitin.idLT = $idLT ";
				
                   
    mysqli_query($link, $qr);
    header ('location:./listloaitin.php');


?>
