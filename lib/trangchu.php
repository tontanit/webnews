<?php
    
    function tinmoinhat_mottin(){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM tin
                ORDER BY idTin DESC
                LIMIT 0,1 ";
        return mysqli_query($link, $qr);
    }

    function tinmoinhat_bontin(){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM tin
                ORDER BY idTin DESC
                LIMIT 1,5 ";
        return mysqli_query($link, $qr);
    }

    function tinxemnhieunhat(){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM tin
                ORDER BY SoLanXem DESC
                LIMIT 0,6 ";
        return mysqli_query($link, $qr);
    }

    // Hàm tin theo Thể Loại - cot_phai.php
    function tinmoinhat_theotheloai_mottin($idLT){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM tin
                WHERE idLT = $idLT
                ORDER BY idTin DESC
                LIMIT 0,1 ";
        return mysqli_query($link, $qr);
    }

    function tinmoinhat_theotheloai_bontin($idLT){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM tin
                WHERE idLT = $idLT
                ORDER BY idTin DESC
                LIMIT 1,4 ";
        return mysqli_query($link, $qr);
    }

    function tenloaitin($idLT){
        require 'lib/dbcon.php';
        $qr = " SELECT Ten FROM loaitin
                WHERE idLT = $idLT
                 ";
        $loaitin = mysqli_query($link, $qr);
        $row = mysqli_fetch_array($loaitin);
        return $row['Ten'];
    }

    //Viết hàm quangcao_top_phai.php
    function quangcao($vitri){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM quangcao
                WHERE vitri = $vitri";
               
        return mysqli_query($link, $qr);
    }

    //Viết hàm thongtindoanhnghiep.php
    function thongtindoanhnghiep($vitri){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM quangcao
                WHERE vitri = $vitri";
               
        return mysqli_query($link, $qr);
    }

    //Viết hàm cho menu.php
    function danhsachtheloai(){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM theloai ";
        return mysqli_query($link, $qr);
    }

    function loaitin_theotheloai($idTL){
            require 'lib/dbcon.php';
            $qr = " SELECT * FROM loaitin
                    WHERE idTL = $idTL ";
            return mysqli_query($link, $qr);
        }

    // Viết hàm cho Bài 10
    // Sử dụng lại hàm trong bài menu.php
   
    // Viết hàm lấy tin theo Thể loại (chú ý: WHERE idTL = $idTL)
    function tin_theotheloai($idTL){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM tin
                WHERE idTL = $idTL
                ORDER BY idTin DESC
                LIMIT 0,1 ";
        return mysqli_query($link, $qr);
    }

    function tin_theotheloai_haitin($idTL){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM tin
                WHERE idTL = $idTL
                ORDER BY idTin DESC
                LIMIT 1,2 ";
        return mysqli_query($link, $qr);
    }

    //Viết hàm Bài 11
    function tin_theoloaitin($idLT){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM tin
                WHERE idLT = $idLT
                ORDER BY idTin DESC ";
                
        return mysqli_query($link, $qr);
    }

    //Viết hàm BreadCrum - Bài 12
    function breadcrum($idLT){
        require 'lib/dbcon.php';
        $qr = " SELECT TenTL, Ten
                FROM theloai, loaitin
                WHERE theloai.idTL = loaitin.idTL
                AND  idLT = $idLT 
        
        ";
        return mysqli_query($link, $qr);
    }

    //Viết hàm phân trang - Bài 13
    function tin_theoloaitin_phantrang($idLT,$from, $sotinmottrang){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM tin
                WHERE idLT = $idLT
                ORDER BY idTin DESC 
                LIMIT $from, $sotinmottrang";
                
        return mysqli_query($link, $qr);
    }

    //Viết hàm chi tiết tin - Bài 15
    //tin cùng loại đang xem
    function chitiettin($idTin){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM tin
                WHERE idTin = $idTin
                ";
                                
        return mysqli_query($link, $qr);
    }
    //Viết hàm tin cùng loại tin - Bài 15

    function tincungloai ($idTin, $idLT){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM tin
                WHERE idTin <> $idTin
                AND idLT = $idLT
                ORDER BY RAND()
                LIMIT 0,3
        
        ";
        return mysqli_query($link, $qr);
    }

    //Viết code đếm số lần xem tin - Bài 16
    function capnhatsolanxemtin($idTin){
        require 'lib/dbcon.php';
        $qr = " UPDATE tin
                SET SoLanXem = SoLanXem +1
                WHERE idTin = $idTin
        
        ";
        mysqli_query($link, $qr);
    }

    // Viết hàm tìm kiếm - Bài 16
    function timkiem($tukhoa){
        require 'lib/dbcon.php';
        $qr = " SELECT * FROM tin
                WHERE TieuDe REGEXP '$tukhoa'
                ORDER BY idTin DESC        
        ";
       return  mysqli_query($link, $qr);
    }




?>