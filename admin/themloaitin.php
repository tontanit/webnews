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
    $Ten = $_POST['Ten'];
    $Ten_khongdau = changeTitle($Ten);
    $ThuTu  = $_POST['ThuTu'];
        settype ($ThuTu, 'int');
    $AnHien  = $_POST['AnHien'];
        settype ($AnHien, 'int');
    $idTL  = $_POST['idTL'];
        settype ($idTL, 'int');
    

    $qr = "INSERT INTO loaitin
                VALUES (null,'$Ten','$Ten_khongdau','$ThuTu','$AnHien', '$idTL') ";
    
    mysqli_query($link, $qr);
    header ('location:./listloaitin.php');
   
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
					<h3>Thêm Loai Tin</h3>
				</td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Tên Loại tin:</td>
				<td><input type="text" name="Ten" id="Ten" value="" ></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Thứ tự:</td>
				<td><input type="text" name="ThuTu" id="ThuTu" value="" ></td>
			</tr>
			
			<tr>
				<td nowrap="nowrap">Ẩn, Hiện:</td>
				<td>
                    <input type="radio" id="AnHien" name="AnHien" checked="checked" value="1">
                    <label for="An">Hiện</label><br>
                    <input type="radio" id="AnHien" name="AnHien" value="0">
                    <label for="An">Ẩn</label><br>
                </td>
			</tr>
			<tr>
                <td>
                    <label for="idTL">idTL:</label>
                    <select id="idTL" name="idTL">
                    <?php
                        $theloai = danhsachtheloai();
                        while ($row_theloai = mysqli_fetch_array($theloai)){
                    ?>
                    <option value="<?php echo $row_theloai['idTL'] ?>"><?php echo $row_theloai['TenTL'] ?></option>
                    <?php
                        }
                    ?>
                </select>
                </td>
            </tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btnthem" value="Thêm"></td>
			</tr>

		</table>
		
	</form>
</body>
</html>
