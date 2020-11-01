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
if (isset($_GET['idTin'])){
    $idTin = $_GET['idTin'];
    settype ($idTin,'int');
  
}
    $qr = " DELETE FROM tin
                 WHERE idTin = '$idTin' ";
                   
    mysqli_query($link, $qr);
    header ('location:./listtin.php');


?>
