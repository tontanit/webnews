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
if (isset($_GET['idTL'])){
    $idTL = $_GET['idTL'];
    settype ($idTL,'int');
  
}
    $qr = " DELETE FROM theloai
            WHERE idTL = '$idTL' ";
                   
    mysqli_query($link, $qr);
    header ('location:./listtheloai.php');


?>
