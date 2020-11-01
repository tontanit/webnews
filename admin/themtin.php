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
    $TieuDe = $_POST['TieuDe'];
    $TieuDe_KhongDau = changeTitle($TieuDe);
    $TomTat = $_POST['TomTat'];
    $urlHinh = $_POST['urlHinh'];
    $Ngay = date('Y-m-d');
    $idUser = $_SESSION['idUser'];
    $Content = $_POST['Content'];
    $idLT = $_POST['idLT'];
    $idTL = $_POST['idTL'];
    $SoLanXem = 0;
    $TinNoiBat = $_POST['TinNoiBat'];
    $AnHien = $_POST['AnHien'];
    

    $qr = "INSERT INTO tin
                VALUES (null,'$TieuDe','$TieuDe_KhongDau','$TomTat','$urlHinh', 
                '$Ngay','$idUser','$Content','$idLT','$idTL', '$SoLanXem','$TinNoiBat', '$AnHien') ";
    
    mysqli_query($link, $qr);
    header ('location:./listtin.php');
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="layout.css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
    <script type="text/javascript">
function BrowseServer( startupPath, functionData ){
	var finder = new CKFinder();
	finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
	finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
	finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
	finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
	//finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
	finder.popup(); // Bật cửa sổ CKFinder
        } //BrowseServer

        function SetFileField( fileUrl, data ){
            document.getElementById( data["selectActionData"] ).value = fileUrl;
        }
        function ShowThumbnails( fileUrl, data ){	
            var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
            document.getElementById( 'thumbnails' ).innerHTML +=
            '<div class="thumb">' +
            '<img src="' + fileUrl + '" />' +
            '<div class="caption">' +
            '<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
            '</div>' +
            '</div>';
            document.getElementById( 'preview' ).style.display = "";
            return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
        }
        </script>
    <script type="text/javascript" src="./jquery-3.5.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#idTL').change(function(){
                var id = $(this).val();
                $.get('../loaitin.php',{idTL: id},function(data){
                    $('#idLT').html(data);

                });

            });


        });
    
    </script>
    <title>Document</title>
</head>
<body>
	<div id="quantri">
		<h2 class="tieude">TRANG QUANG TRỊ NỘI DUNG WEBNEWS</h2>
		<form action="" method="post">
		<table>
			<tr>
				<td colspan="2">
					<h3>Thêm Tin</h3>
				</td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Tiêu Đề:</td>
				<td><input type="text" name="TieuDe" value="" ></td>
			</tr>
            <tr>
				<td nowrap="nowrap">Tom Tắt:</td>
				<td><textarea rows="9" cols="70" name="TomTat" ></textarea></td>
			</tr>
            
            <tr>
				<td nowrap="nowrap">urlHinh:</td>
				<td><input type="text" name="urlHinh" value="" ><span>  </span>
                <input onclick="BrowseServer('Images:/','urlHinh')" type="button" name="btnchonfile" id="btnchonfile" action="none" value="Chọn hình"></td>
                
			</tr>

            <tr>
				<td nowrap="nowrap">Nội dung:</td>
				<td><textarea rows="9" cols="70" id="Content" name="Content"></textarea>
                    <script type="text/javascript">
                        var editor = CKEDITOR.replace( 'Content',{
                            uiColor : '#9AB8F3',
                            language:'vi',
                            skin:'v2',	
                            filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
                            filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
                            filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                            filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                    
                            toolbar:[
                            ['Source','-','Save','NewPage','Preview','-','Templates'],
                            ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
                            ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                            ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
                            ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
                            ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
                            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                            ['Link','Unlink','Anchor'],
                            ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
                            ['Styles','Format','Font','FontSize'],
                            ['TextColor','BGColor'],
                            ['Maximize', 'ShowBlocks','-','About']
                            ]
                        });		
                    </script>
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
                <td>
                    <label for="idLT">idLT:</label>
                    <select id="idLT" name="idLT">
                        <?php
                            $loaitin = danhsachloaitin();
                            while ($row_loaitin = mysqli_fetch_array($loaitin)){
                        ?>
                            <option value="<?php echo $row_loaitin['idLT'] ?>"><?php echo $row_loaitin['Ten'] ?></option>
                        
                        <?php 
                            }                        
                        ?> 
                   </select>
                </td>
			</tr>

            <tr>
                    <td nowrap="nowrap">Tin Nổi bật:</td>
                    <td>
                        <input type="radio" id="TinNoiBat" name="TinNoiBat" checked="checked" value="1">
                        <label for="An">Nổi bật</label><br>
                        <input type="radio" id="TinNoiBat" name="TinNoiBat" value="0">
                        <label for="An">Bình thường</label><br>
                    </td>
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
				<td colspan="2" align="center"><input type="submit" name="btnthem" value="Thêm"></td>
			</tr>

		    </table>
		
	    </form>
    </div>
</body>
</html>
