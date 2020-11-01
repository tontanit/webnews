<?php
    $theloai = danhsachtheloai();
    while ($row = mysqli_fetch_array($theloai)){
        $idTL = $row['idTL'];
?>
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="#"><?php echo $row['TenTL'] ?></a>
        </div>
        <div class="child-cat">
        <?php
            $loaitin_theotheloai = loaitin_theotheloai($idTL);
            while ($row = mysqli_fetch_array($loaitin_theotheloai)){
        ?>
        	<a href="index.php?p=tintrongloai&idLT=<?php echo $row['idLT'] ?>"><?php echo $row['Ten'] ?></a>
        
        <?php
            }
        ?>
        </div>
        <div class="clear"></div>
        <div class="cat-content">
       
        	<div class="col1">
            	<div class="news">
                <?php
                $tin_theoloaitin = tin_theotheloai($idTL);
                $row = mysqli_fetch_array($tin_theoloaitin);
                ?>
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin'] ?>"><?php echo $row['TieuDe'] ?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row['TomTat'] ?></div>
                    <div class="clear"></div>
 
				</div>
            </div>
       
            <div class="col2">
            <?php 
                $tin_theloai = tin_theotheloai_haitin($idTL);
                while ($row = mysqli_fetch_array($tin_theloai)){
            ?>
            
               <p class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin'] ?>"><?php echo $row['TieuDe'] ?></a></p> 
            <?php
                }
            ?>
            </div>    
        </div>
    </div>
</div>
<div class="clear"></div>
<?php
    }
?>