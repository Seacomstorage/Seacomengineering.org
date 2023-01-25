<?php include 'header.php';
$cms1=mysqli_fetch_array(mysqli_query($connect,"select * from cms where id=14"));

?>
  

        

  <!-- Start main-content -->
  <div class="main-content">
      
    <!-- 
  <div class="modal" id="onload-popup" tabindex="-1" role="dialog" aria-labelledby="onload-popupLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background:transparent; box-shadow: none; border: 0;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 1; filter: invert(1);"><span aria-hidden="true">&times;</span></button>
                </div>
                <img src="images/popupbanner.jpg" alt="popup" class="img-responsive">
            </div>
        </div>
  </div>     -->
             
             
    <!-- Section: home -->
    <section id="home" class="classic-slider">
      <div class="container-fluid p-0">
        <div class="owl-carousel-1col" data-nav="true">
          <?php
				while($banner_qry=mysqli_fetch_array($banner)) {
				?>
		  <div class="item">
            <img src="<?php echo $image_url.'banner/'.$banner_qry['img'];?>" alt="banner">
          </div>
				<?php } ?>
          <!--<div class="item">
            <img src="images/slider1.jpg" alt="">
          </div>-->
          <!-- <div class="item">
            <img src="images/slider3.jpg" alt="">
          </div> -->
        </div>
      </div>
    </section>

    <section class="about-home">
       <div class="container">
           <div class="float-left">
            <div class="box-hover-effect about-video">
              <div class="effect-wrapper">
                <div class="thumb">
                  <img class="img-responsive img-fullwidth" src="<?php echo $menu_url ;?>images/photos/1.jpg" alt="imgs">
                </div>
                <div class="video-button"></div>
                <a class="hover-link" data-lightbox-gallery="youtube-video" href="<?php echo $menu_url ;?>images/VID-20200909-WA0011.mp4" title="Youtube Video">Youtube Video</a>
              </div>
            </div>
           </div>
              <div class="section-title">
                <div class="row">
                  <div class="col-md-6">
                    <h5 class="sub-title left-side-line"><?php echo $cms1['title'] ;?></h5>
                    <h2 class="title"><?php echo $cms1['subtitle'] ;?></h2>
                  </div>
                </div>
              </div>
              <p><?php echo $cms1['body'] ;?></p>
       </div>
    </section>



             
             
             
    <!-- Section: Courses -->
    <section id="courses" class="bg-silver-light">
      <div class="container">
        <div class="section-title mb-40">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-uppercase mb-5">Current <span class="text-theme-colored2">Offers</span></h2>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <div class="owl-carousel-3col owl-nav-top" data-nav="tru">
                  
                  
             
             
                <?php $ac=mysqli_query($connect,"select * from courses where status=1") ;
				while($aca=mysqli_fetch_array($ac)) {
				?>
				<div class="item">
                  <div class="course-single-item bg-white border-1px clearfix">
                    <div class="course-thumb">
                      <a href="<?php echo $menu_url; ?>course-details.php?c=<?php echo $aca['seo'] ;?>"><img class="img-fullwidth" alt="Course" src="<?php echo $image_url ;?>courses/<?php echo $aca['img'] ;?>"></a>
                    </div>
                    <div class="course-details clearfix p-20 pt-15">
                      <div class="course-top-part">
                        <a href="<?php echo $menu_url; ?>course-details.php?c=<?php echo $aca['seo'] ;?>"><h4 class="mt-5 mb-5"><?php echo $aca['title'] ;?></h4></a>
                      </div>
                      <p class="course-description mt-15 mb-0"><?php echo $aca['sdesc'] ;?> </p>
                    </div>
                    <div class="course-meta text-center">
                       <a href="<?php echo $menu_url; ?>course-details.php?c=<?php echo $aca['seo'] ;?>" class="btn btn-info">Enroll Now</a>
                    </div>
                  </div>
                </div>
				<?php } ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section About -->
   <section class="explore-section pt-30 pb-30">
                <div class="container p-20">
                    <div class="section-title">
                        <div class="row">
                            <div class="col-lg-6">
                            <h3 class="font-28 mt-0">Announcements</h3>
                            
                            
             
             
             
                            <div class="line-bottom-theme-colored2"></div>
                            <?php $an=mysqli_query($connect,"select * from announcements where status=1 order by id desc limit 3") ;
						while($ann=mysqli_fetch_array($an)) {
						?>
							<article>
                              <div class="event-small media sm-maxwidth400 bg-silver-light border-1px mt-0 mb-20 p-15">
                                <div class="event-date text-center">
                                  <ul>
                                    <li class="font-18 font-weight-700"><?php echo $ann['dt'] ;?></li>
                                    <li class="font-14 text-center text-uppercase"></li>
                                  </ul>
                                </div>
                                <div class="event-content pt-5">
                                  <h5 class="media-heading font-16 mb-5"><a class="font-weight-600" href="<?php echo $mage_url ;?>announcements/<?php echo $ann['img'] ;?>"><?php echo $ann['title'] ;?>
                                    <span><img src="<?php echo $menu_url ;?>images/sm-pdf-icon.png"></span>
                                  </a></h5>
                                </div>
                              </div>
                            </article>
                            <?php } ?>
                            
                            </div>
                          <div class="col-lg-6">
                            <h3 class="font-28 mt-md-30 mt-0">News &amp; Events </h3>
                            <div class="line-bottom-theme-colored2"></div>
                            <!--<img src="images/POSTER-ECE.jpg" alt="" class="img-fluid img-responsive">-->
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="6"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="7"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="8"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="9"></li>
                              </ol>
                              <div class="carousel-inner" role="listbox">
                                  <div class="item active">
                              <img src="images/hackathon seacom.jpg" alt="slider">
                              <!--<div class="carousel-caption">Seacom Engineering</div>-->
                            </div>
                                <div class="item">
                                  <img src="images/POSTER-ECE.jpg" alt="slider">
                                  <!--<div class="carousel-caption">Seacom Engineering</div>-->
                                </div>
                                <div class="item">
                                  <img src="images/event1.jpg" alt="slider">
                                  <!--<div class="carousel-caption">Seacom Engineering</div>-->
                                </div>
                                <div class="item">
                                  <img src="images/event2.jpg" alt="slider">
                                  <!--<div class="carousel-caption">Seacom Engineering</div>-->
                                </div>
                                <div class="item">
                                  <img src="images/event3.jpg" alt="slider">
                                  <!--<div class="carousel-caption">Seacom Engineering</div>-->
                                </div>
                                
                                <div class="item">
                                  <img src="images/event5.jpg" alt="slider">
                                  <!--<div class="carousel-caption">Seacom Engineering</div>-->
                                </div>
                                <div class="item">
                                  <img src="images/75-id1.jpeg" alt="slider">
                                </div>
                                <div class="item">
                                  <img src="images/75-id2.jpeg" alt="slider">
                                </div>
                                <div class="item">
                                  <img src="images/75-id3.jpeg" alt="slider">
                                </div>
                                <div class="item">
                                  <img src="images/75-id4.jpeg" alt="slider">
                                </div>
                                
                              </div>
                              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                            <?php 
							$new=mysqli_query($connect,"select * from news where status=1 order by id desc limit 3");
							while($ne=mysqli_fetch_array($new)) {?>
							<article>
                              <div class="event-small media sm-maxwidth400 bg-silver-light border-1px mt-0 mb-20 p-15">
                                <div class="event-date text-center">
                                  <ul>
                                    <li class="font-18 font-weight-700"><?php echo $ne['dt'] ;?></li>
                                    <li class="font-14 text-center text-uppercase"></li>
                                  </ul>
                                </div>
                                <div class="event-content pt-5">
                                  <h5 class="media-heading font-16 mb-5"><a class="font-weight-600" href="<?php echo $image_url ;?>news/<?php echo $ne['img'] ;?>"><?php echo $ne['title'] ;?>
                                    <span><img src="images/sm-pdf-icon.png"></span>
                                  </a></h5>
                                </div>
                              </div>
                            </article>
							<?php } ?>
                           
                            
                          </div>
                        </div>
                      </div>
                </div>
            </section>

    <!-- Divider: Funfact -->
    <section class="talk-sec parallax" data-bg-img="images/bg/bg1.jpg" style="background-image: url('images/bg1.jpg'); background-position: 50% 23px;">
                <div class="container pt-80 pb-90 pt-md-70 pb-md-50 pb-sm-50">
                  <div class="row mt-30">
                      <div class="col-md-6">
                         <div class="light-white-bg">
                          <div class="section-title">
                            <div class="row">
                              <div class="col-md-12">
                                <h5 class="sub-title left-side-line"><?php echo $siteDetails['title'] ;?>  </h5>
                                <h2 class="title">Talk to our expert</h2>
                              </div>
                            </div>
                          </div>
                          <form class="reservation-form mt-20" method="post" action="<?php echo $menu_url;?>contact">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group mb-20">
                                  <input placeholder="Full Name" required="" name="name" class="form-control" aria-required="true" type="text">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group mb-20">
                                  <input placeholder="Email Id" class="form-control" name="email" required="" aria-required="true" type="text">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group mb-20">
                                  <input placeholder="Mobile No." class="form-control" name="phone" required="" aria-required="true" type="text">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group mb-20">
                                  <div class="styled-select">
                                    <select class="form-control" name="subject" required="">
                                      <option value="">Interested for</option>
                                      <?php $co=mysqli_query($connect,"select * from courses where status=1");
									while($cou=mysqli_fetch_array($co))
									{
									  ?>
									  <option value="<?php echo $cou['title'] ;?>"><?php echo $cou['title'] ;?></option>
									<?php } ?>
                                    </select>
                                    <i class="fa fa-caret-down"></i>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group mb-20">
                                  <div class="styled-select">
                                    <select class="form-control" name="message" required="">
                                      <option value="">Session</option>
                                      <option value="2020-2021">2020-2021</option>
                                      <option value="2021-2022">2021-2022</option>
                                      
                                    </select>
                                    <i class="fa fa-caret-down"></i>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-6 col-md-offset-3">
                                <div class="form-group mb-0 mt-10">
                                  <button type="submit" name="contact_submit" class="btn btn-colored btn-theme-colored2 text-white btn-lg btn-block">Request a Callback</button>
                                </div>
                              </div>
                            </div>
                          </form>
                         </div>
                      </div>
                      <div class="col-md-6">
                        <div class="section-title">
                          <div class="row">
                            <div class="col-md-12">
                              <h5 class="sub-title left-side-line"><?php echo $siteDetails['title'] ;?> </h5>
                              <h2 class="title">Our Services</h2>
                            </div>
                          </div>
                        </div>
                        <div class="panel-group accordion-stylished-left-border accordion-icon-filled accordion-no-border accordion-icon-left accordion-icon-filled-theme-colored2 custom-style" id="accordion6" role="tablist" aria-multiselectable="true">
                          <?php 
						  $i=0;
						  $f=mysqli_query($connect,"select * from faq where status=1");
						  while($faq=mysqli_fetch_array($f))
						  {
							  $i++;
						  ?>
						  <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headin<?php echo $i; ?>">
                              <h6 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion6" href="#collaps<?php echo $i; ?>" aria-expanded="true" aria-controls="collaps1">
                                    <?php echo $faq['title'] ;?>
                                </a>
                              </h6>
                            </div>
                            <div id="collaps<?php echo $i; ?>" class="panel-collapse collapse <?php if($i==1) { ?> in <?php } ?>" role="tabpanel" aria-labelledby="headin<?php echo $i; ?>">
                              <div class="panel-body">
                                <?php echo $faq['body'] ;?>
                              </div>
                            </div>
                          </div>
						  <?php } ?>

                        </div>
                      </div>
                  </div>
                </div>
              </section>

    <!-- Divider: Testimonials -->
    <section class="bg-lightest">
                <div class="container pt-70 pb-30">
                  <div class="section-title">
                    <div class="row">
                      <div class="col-md-6 col-md-offset-3">
                        <div class="text-center">
                          <h1 class="sub-title" style="font-size: 14px;">Seacom Engineering college </h1>
                          <h2 class="title">Testimonials</h2>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-30">
                      <div class="owl-carousel-2col boxed" data-dots="true">
                        <?php while($test=mysqli_fetch_array($testimonial)) { ?>
						<div class="item">
                          <div class="testimonial pt-10">
                            <div class="testimonial-content">
                              <div class="profile-pic"style="text-align:center">
                                  <img src="<?php echo $image_url ;?>testimonial/<?php echo $test['img']; ?>" style="height:200px" alt="tstmnl">
                              </div>
                              <p class="mt-0"><?php echo $test['body']; ?></p>
                            </div>
                            <div class="testimonial-details mb-0 mr-0">
                                <img alt="Testimonial" src="<?php echo $image_url ;?>testimonial/<?php echo $test['banner']; ?>" class="img-thumbnail img-circle pull-left mr-15 mt-15" style="width:42px">
                              <div class="author-info pt-15">
                                  <h5 class="mt-10 font-16 mb-0"><?php echo $test['title']; ?></h5>
                                  <h6 class="mt-5"><?php echo $test['designation']; ?></h6>
                              </div>
                            </div>
                          </div>
                        </div>
						<?php } ?>
                        
                        
                      </div> 
                    </div>
                  </div>
                </div>
              </section> 

    <section class="clients bg-deep" style="background: url(images/industry-bg.jpg);">
      <div class="container pt-40 pb-40">
        <div class="section-title">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="text-center">
                <h5 class="sub-title">Seacom Engineering College</h5>
                <h2 class="title">INDUSTRY COLLABORATIONS</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- Section: Clients -->
            <div class="owl-carousel-5col clients-logo transparent text-center">
             <?php $re=mysqli_query($connect,"select * from recruiter where status=1") ;
						while($rec=mysqli_fetch_array($re)) {
						?>
			 <div class="item"> <a href="#"><img src="<?php echo $image_url ;?>/recruiter/<?php echo $rec['img'] ;?>" alt="Recruitr"></a></div>
						<?php } ?>
              
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  <!-- end main-content -->
  <!-- Footer -->
  <?php include 'footer.php' ;?>