<!-- box cat -->
<?php
  $idLT = 5;
?>
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="#"><?php echo tenloaitin($idLT) ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
          <?php
            $tin_theotheloai = tinmoinhat_theotheloai_mottin($idLT);
            $row = mysqli_fetch_array($tin_theotheloai);
          ?>
        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin'] ?>"> <?php echo $row['TieuDe'] ?> </a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row['TomTat'] ?> </div>
                  
                  
                    <div class="clear"></div>
                   
				</div>
            </div>
            
            <div class="col2">
            <?php
              $bontin = tinmoinhat_theotheloai_bontin($idLT);
              while ($row_bontin = mysqli_fetch_array($bontin)){

            ?>
           <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_bontin['idTin'] ?>"><?php echo $row_bontin['TieuDe'] ?></a></h3>
           <?php
              }
           ?>
            </div> 
           
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->


<!-- box cat -->
<?php
  $idLT = 7;
?>
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="#"><?php echo tenloaitin($idLT) ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
          <?php
            $tin_theotheloai = tinmoinhat_theotheloai_mottin($idLT);
            $row = mysqli_fetch_array($tin_theotheloai);
          ?>
        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin'] ?>"> <?php echo $row['TieuDe'] ?> </a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row['TomTat'] ?> </div>
                  
                  
                    <div class="clear"></div>
                   
				</div>
            </div>
            
            <div class="col2">
            <?php
              $bontin = tinmoinhat_theotheloai_bontin($idLT);
              while ($row_bontin = mysqli_fetch_array($bontin)){

            ?>
           <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_bontin['idTin'] ?>"><?php echo $row_bontin['TieuDe'] ?></a></h3>
           <?php
              }
           ?>
            </div> 
           
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->


<!-- box cat -->
<?php
  $idLT = 10;
?>
<div class="box-cat">
	<div class="cat">
    	<div class="main-cat">
        	<a href="#"><?php echo tenloaitin($idLT) ?></a>
        </div>
       
        <div class="clear"></div>
        <div class="cat-content">
          <?php
            $tin_theotheloai = tinmoinhat_theotheloai_mottin($idLT);
            $row = mysqli_fetch_array($tin_theotheloai);
          ?>
        	<div class="col1">
            	<div class="news">
                <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row['idTin'] ?>"> <?php echo $row['TieuDe'] ?> </a></h3>
                  <img class="images_news" src="upload/tintuc/<?php echo $row['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row['TomTat'] ?> </div>
                  
                  
                    <div class="clear"></div>
                   
				</div>
            </div>
            
            <div class="col2">
            <?php
              $bontin = tinmoinhat_theotheloai_bontin($idLT);
              while ($row_bontin = mysqli_fetch_array($bontin)){

            ?>
           <h3 class="tlq"><a href="index.php?p=chitiettin&idTin=<?php echo $row_bontin['idTin'] ?>"><?php echo $row_bontin['TieuDe'] ?></a></h3>
           <?php
              }
           ?>
            </div> 
           
        </div>
    
    </div>

</div>
<div class="clear"></div>
<!-- //box cat -->