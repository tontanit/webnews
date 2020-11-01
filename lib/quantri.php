<?php

//QUẢN LÝ THỂ LOẠI
// Danh sách thể loại
function danhsachtheloai(){
    require '../lib/dbcon.php';
    $qr = 'SELECT * FROM theloai
            ORDER BY idTL DESC';
    return  mysqli_query($link, $qr);

}

//Sửa thể loại
function chitiettheloai($idTL){
    require '../lib/dbcon.php';
    $qr = " SELECT * FROM theloai
            WHERE idTL = $idTL "; 
           
    return mysqli_query($link, $qr);
}

//QUẢN LÝ LOẠI TIN
function danhsachloaitin(){
	require 'dbcon.php';
    $qr = " SELECT loaitin.idLT, loaitin.Ten, loaitin.Ten_KhongDau, loaitin.ThuTu, loaitin.AnHien, loaitin.idTL, theloai.TenTL 
			FROM loaitin, theloai 
			WHERE loaitin.idTL = theloai.idTL
			ORDER BY loaitin.idLT DESC "; 
           
	return mysqli_query($link, $qr);
}
//Sửa loại tin
function chitietloaitin($idLT){
	require '../lib/dbcon.php';
	$qr = " SELECT * FROM loaitin
			WHERE idLT = $idLT ";
	return mysqli_query($link,$qr);


}

//QUAN LY LOAI TIN
function danhsachtin(){
	require	'../lib/dbcon.php';
	$qr = " SELECT tin.*, Ten, TenTL
			FROM tin, theloai, loaitin
			WHERE tin.idTL = theloai.idTL
			AND tin.idLT = loaitin.idLT 
			ORDER BY idTin DESC
			LIMIT 0,20 ";
	return mysqli_query($link,$qr);
}





function stripUnicode($str){
  if(!$str) return false;
   $unicode = array(
     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     'd'=>'đ',
     'D'=>'Đ',
	  'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
	  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
	  'i'=>'í|ì|ỉ|ĩ|ị',	  
	  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
	  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
	  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
     'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
   );
foreach($unicode as $khongdau=>$codau) {
	$arr=explode("|",$codau);
	$str = str_replace($arr,$khongdau,$str);
}
return $str;
}
function changeTitle($str){
	$str=trim($str);
	if ($str=="") return "";
	$str =str_replace('"','',$str);
	$str =str_replace("'",'',$str);
	$str = stripUnicode($str);
	$str = mb_convert_case($str,MB_CASE_TITLE,'utf-8');
	
	// MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER
	$str = str_replace(' ','-',$str);
	return $str;
}




function mail_utf8($to, $from_user, $from_email, $subject = '(No subject)', $message = '')
{
	$from_user = "=?UTF-8?B?".base64_encode($from_user)."?=";
	$subject = "=?UTF-8?B?".base64_encode($subject)."?=";
	$headers = "From: $from_user <$from_email>\r\n".
               "MIME-Version: 1.0" . "\r\n" .
               "Content-type: text/html; charset=UTF-8" . "\r\n";
	return mail($to, $subject, $message, $headers);
}

function PhatSinhRandomKey(){
	$s = "";
	
	$m = array(0,1,2,3,4,5,6,7,8,9,"a", "b", "c", "d", "e", "f", "g","h","i", "j");
	
	for($i=1; $i<=32; $i++){
		$r = rand(0, count($m)-1);
		$s = $s . $m[$r];
	}
	
	return $s;
}



?>