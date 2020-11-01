<?php
if (isset($_GET['idLT'])){
    $idLT = $_GET['idLT'];
    settype ($idLT, "int");
} 

?>

<?php
    $bc = breadcrum($idLT);
    $row_bc = mysqli_fetch_array($bc);
?>
<div>
Trang chủ >> <?php echo $row_bc['TenTL'] ?> >>  <?php echo $row_bc['Ten'] ?>
</div>

<!-- Viết code phân trang -->
<?php
    if(isset($_GET['trang'])){
        $trang = $_GET['trang'];
        settype ($trang, 'int');

    } else $trang = 1;
    

        $sotinmottrang = 4;
        $from = ($trang - 1)* $sotinmottrang;
?>


<?php
    $tin_theoloaitin = tin_theoloaitin_phantrang($idLT,$from, $sotinmottrang);
    while ($row = mysqli_fetch_array($tin_theoloaitin)){
?>
<div class="box-cat">
	<div class="cat1">
    	
        <div class="clear"></div>
        <div class="cat-content">
        	<div class="col0 col1">
            	<div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin'] ?>"><?php echo $row['TieuDe'] ?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row['TomTat'] ?></div>
                    <div class="clear"></div>
                   
				</div>
            </div>
            
        </div>
    </div>
</div>

<div class="clear"></div>

<!-- box cat-->
<?php
    }
?>

<hr>

<?php
    $t = tin_theoloaitin($idLT);
    $tongsotin = mysqli_num_rows($t);
    $tongsotrang = ceil($tongsotin / $sotinmottrang);

    for($i = 1; $i <= $tongsotrang; $i++){
 
?>
<a <?php if ($trang == $i) echo "style = 'background-color: red'"; ?> href="index.php?p=tintrongloai&idLT=<?php echo $idLT ?>&trang=<?php echo $i ?>"><?php echo $i; ?></a>

<?php
    }
?>