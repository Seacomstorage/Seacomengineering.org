<?php include('header.php'); 

$arr=explode('/blog/',$_SERVER['REQUEST_URI']);

$det=mysqli_fetch_array(mysqli_query($connect,"select * from blog where seo='".$arr['1']."' ")); 
$c=mysqli_fetch_array(mysqli_query($connect,"select * from blogcategory where id='".$det['category']."' ")); 

$prev=mysqli_fetch_array(mysqli_query($connect,"select * from blog where id<'".$det['id']."'  order by id desc limit 0,1 ")); 
$next=mysqli_fetch_array(mysqli_query($connect,"select * from blog where id>'".$det['id']."'  order by id asc limit 0,1 ")); 

if(isset($_POST['submit']))
{
		$user=$_POST['user'];
		$email=$_POST['email'];
		$msg=$_POST['msg'];
		
			$r="Insert into blogcomment SET user='".$user."', comment='".$msg."', email='".$email."',dt='".date('d-m-Y')."',blog='".$det['id']."' ";
			if(mysqli_query($connect,$r)) {
				
				echo"<script>alert('Submitted successfully')</script>";
			
			} else {

				echo"<script>alert('Error occurred')</script>";
				
			}
			

}

?>

      <section class="blog-detail">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
              <div class="post-block">
                <h1 class="blog-detail-title"><?php echo $det['title'];?></h1>
                <div class="blog-credit">
                  <div class="blog-credit_wrapper">
                    <h5><?php echo $c['title'];?></h5>
                    <p><?php echo $det['dt'];?></p>
                  </div>
                </div><img class="blog-cover img-fluid" src="<?php echo $image_url.'blog/'.$det['img'];?>" alt="blog image">
                <p class="blog-pragraph"> <?php echo $det['descc'];?></p>
                
              </div>
              <div class="post-footer">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="post-tags">
                    <?php
                    $tags = explode(',', $det['tagss']);

					foreach($tags as $key) {
					
					echo '<a>'.$key.'</a>';
					
					}
					?>
                    </div>
                  </div>
                  <div class="col-sm-6 text-sm-right">
                    <div class="post-share">
                      <p>Share: </p>
                      <div class="socials">
                      <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5db949d5afdadd00130e86d8&product=inline-share-buttons" async="async"></script>
<div class="sharethis-inline-share-buttons"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="another-posts">
                  <?php if($prev['id']>0) { ?>
                  <a class="arrow-control arrow-prev" href="<?php echo $menu_url.'blog/'.$prev['seo'];?>"><i class="arrow_left"></i></a>
                   <?php } if($next['id']>0) { ?>
              <a class="arrow-control arrow-next" href="<?php echo $menu_url.'blog/'.$next['seo'];?>"><i class="arrow_right"></i></a>
               <?php } ?>
               
                <div class="row no-gutters">
                  <div class="col-12 col-md-6">
                    <div class="another-post_block prev-post">
                      <?php if($prev['id']>0) { ?>
                      <div class="post-title">
                        <p>Previous post</p><a href="<?php echo $menu_url.'blog/'.$prev['seo'];?>"><?php echo $prev['title'];?></a>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="another-post_block text-right next-post">
                    <?php if($next['id']>0) { ?>
                      <div class="post-title">
                        <p>Next post</p><a href="<?php echo $menu_url.'blog/'.$next['seo'];?>"><?php echo $next['title'];?></a>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              
              
              
                <!----Comment------------>
                
                <?php
                $ff=mysqli_query($connect,"select * from blogcomment where blog='".$det['id']."' and status=1 order by id desc"); 
                while($gg=mysqli_fetch_array($ff)) {
                ?>
                 <div class="row no-gutters align-items-center" style="margin:5px 0;">   
                 <div class="col-sm-5 col-md-3">
                    <div class="author-avatar"><b><?php echo $gg['user'];?> (<?php echo $gg['dt'];?>)</b></div>
                  </div>
                  <div class="col-sm-7 col-md-9" style="padding-left:10px">
                    <?php echo $gg['comment'];?>
                  </div>
                  </div>
                 <?php } ?> 
                  
              </div>
            <div class="post-comment">
                <h2>Leave a comment</h2>
                <form method="post">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <input class="input-form trans-bg" name="user" type="text" placeholder="Name" required>
                    </div>
                    <div class="form-group col-md-6">
                      <input class="input-form trans-bg" name="email" type="email" placeholder="Email" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea class="textarea-form trans-bg" name="msg" cols="30" rows="6" placeholder="Message"></textarea>
                  </div>
                  <button class="normal-btn" type="submit" name="submit">Send message</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

<?php include('footer.php'); ?>