<?php include('header.php'); 
$arr=explode("/page/",$_SERVER['REQUEST_URI']);
$seo=str_replace('/','',$arr[1]);
$det=mysqli_fetch_array(mysqli_query($connect,"select * from cms where seo='".$seo."' "));
?>

             
                            <?php echo $det['title'];?>
                            
                            <?php if($det['img']!='') { ?>
                                <div class="left-col"><img src="<?php echo $image_url.'cms/'.$det['img'];?>"></div>
                                <div class="right-col"><?php echo $det['body'];?></div>
                            <?php } else { ?>
                            <div class="full-width"><?php echo $det['body'];?></div>
                            <?php } ?>
						    

                       <?php if($seo=='about') { ?>
                            //FETCH CONTENT OF MISSION,VISION ETC
                        <?php } ?>

<?php include('footer.php'); ?>