<?php include('header.php'); 

if(strstr($_SERVER['REQUEST_URI'],'/blog-list/')) {
	$arr=explode('/blog-list/',$_SERVER['REQUEST_URI']);
	if($arr['1']!='') {
		$c=mysqli_fetch_array(mysqli_query($connect,"select * from blogcategory where seo='".$arr['1']."' "));
		$cat=$c['id'];
		$var = 'and category="'.$cat.'" ';
	}
	
}

$aa=mysqli_query($connect,"select * from blog where status=1 $var");
?>


                    <h5>Blog Category: <?php if($c['title']=='') { echo 'All Blogs'; } else { echo $c['title']; } ?></h5>
                    
          
          
          	<?php while($bb=mysqli_fetch_array($aa)) { 
				$cc=mysqli_fetch_array(mysqli_query($connect,"select * from blogcategory where id='".$bb['category']."' "));
			?>
            <div class="col-12 col-md-6">
              <div class="post-block post-classic">
                <div class="post-img"><img src="<?php echo $image_url.'blog/'.$bb['img'];?>" alt="<?php echo $bb['title'];?>"></div>
                <div class="post-detail"><a class="post-title regular" href="<?php echo $menu_url.'blog/'.$bb['seo'];?>"><?php echo $bb['title'];?></a>
                  <div class="post-credit">
                    <div class="author"><h5 class="author-name"><?php echo $cc['title'];?></h5>
                    </div>
                    <h5 class="upload-day"><?php echo $bb['dt'];?></h5>
                  </div>
                  <p class="post-describe"><?php echo $bb['short_desc'];?> </p>
                </div>
              </div>
            </div>
            <?php } ?>
            
<?php include('footer.php'); ?>