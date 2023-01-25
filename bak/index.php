<?php include('header.php'); ?>

              

                        <div class="main-slider">
                            <div class="owl-carousel main-slide" id="main-slider">
                              
                               
                                <?php
								while($banner_qry=mysqli_fetch_array($banner)) {
								?>
                                
                                <div class="item">
                                    <img class="slide-img" src="<?php echo $image_url.'banner/'.$banner_qry['img'];?>" alt="<?php echo $banner_qry['title'];?>"/>
                                    <div class="caption">
                                        <div class="container">
                                            <div class="div-table">
                                                <div class="div-cell">
                                                    <div class="caption-content">
                                                        <h2 class="caption-title"><?php echo $banner_qry['title'];?></h2>
                                                        <h3 class="caption-subtitle"><?php echo $banner_qry['subtitle'];?></h3>
                                                        <p class="caption-text">
                                                            <a class="btn btn-theme" href="<?php echo $banner_qry['link'];?>">Shop Now</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                
                                
                            </div>
                        </div>

                   

                

                <section class="page-section">
                    <div class="container">
                        <h2 class="section-title"><span>Featured Product</span></h2>
                        <div class="partners-carousel">
                            <div class="owl-carousel">
                            	<?php
								while($qry=mysqli_fetch_array($featured_product)) {
								?>
                                <div><a><img src="<?php echo $image_url.'product/'.$qry['img'];?>" alt="<?php echo $qry['title'];?>"/></a></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>


                

<?php include('footer.php'); ?>