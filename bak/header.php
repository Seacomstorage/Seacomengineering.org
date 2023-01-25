<?php 
include('config.php'); 

if(strstr($_SERVER['REQUEST_URI'],"/page/")) {
	$metaarr=explode("/page/",$_SERVER['REQUEST_URI']);
	$metaseo=str_replace('/','',$metaarr[1]);
	$metadet=mysqli_fetch_array(mysqli_query($connect,"select * from cms where seo='".$metaseo."' "));
	$metakey=$metadet['metakey'];
	$metadesc=$metadet['metatag'];
} elseif(strstr($_SERVER['REQUEST_URI'],"/product/")) {
	$metaarr=explode("/product/",$_SERVER['REQUEST_URI']);
	$metaseo=str_replace('/','',$metaarr[1]);
	$metadet=mysqli_fetch_array(mysqli_query($connect,"select * from products where seo='".$metaseo."' "));
	$metakey=$metadet['metakey'];
	$metadesc=$metadet['metatag'];
} 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $siteDetails['title'];?></title>
        
  		<?php if($metakey!='') { ?><meta name="keywords" content="<?php echo $metakey;?>"><?php } if($metadesc!='') { ?>
 		<meta name="description" content="<?php echo $metadesc;?>"><?php } ?>
  
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo $menu_url;?>assets/ico/favicon.ico">

       
        <link href="<?php echo $menu_url;?>assets/css/theme.css" rel="stylesheet">
       
    </head>
    <body>

       

                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?php echo $menu_url;?>"><img src="<?php echo $image_url.'logo/'.$siteDetails['logo'];?>" alt="<?php echo $siteDetails['title'];?>"/></a>
                        </div>
                       
                                <?php if($_SESSION['user_id']>0) { ?>
                                <a href="<?php echo $menu_url;?>logout" class="btn btn-theme hidden-xs hidden-sm br-10"><i class="fa fa-sign-in mr-5"></i> Logout</a>
                               <?php } else { ?>
                                 <a href="<?php echo $menu_url;?>login" class="btn btn-theme hidden-xs hidden-sm br-10"><i class="fa fa-sign-in mr-5"></i> Signin</a>
                                 <?php } ?>
                                 
                                 
  <!------------Main Menu-------------> 
  <ul>
  <?php 
	while($main_menu_list=mysqli_fetch_array($main_menu)) {
		if(strstr($main_menu_list['title'],'cms_')) {
			$rr=explode('_',$main_menu_list['title']);
			$cms=mysqli_fetch_array(mysqli_query($connect,"select * from cms where id='".$rr[1]."' "));
			$title=$cms['title'];
			$menu_link=$menu_url.'page/'.$cms['seo'];
		} else {
			$title=$main_menu_list['title'];
			$menu_link=$menu_url.strtolower(str_replace(' ','-',$title));
		}
	?>
	<li>
		<a href="<?php echo $menu_link;?>"><?php echo $title;?> </a>
		
		<!-----SUB CHILD------>
        <?php 
			if($main_menu_list['sub']==1) {
				
				if($main_menu_list['title']=='Product') { 
					$tn='products';
				} else {
					$tn=strtolower(str_replace(' ','',$main_menu_list['title']));
				}
					
				$aa=mysqli_query($connect,"select * from $tn where status=1 order by id desc");
				while($bb=mysqli_fetch_array($aa)) { 
		?>
                    <a href="<?php echo $menu_url.$tn.$bb['seo'];?>"><?php echo $bb['title'];?> </a>
        <?php
				} 
			
			
			
			} if($main_menu_list['sub']==2) {   
			     
				 if($main_menu_list['title']=='Product') { 
					$tn='category';
				} else {
					$tn=strtolower(str_replace(' ','',$main_menu_list['title'])).'category';
				}
				
				
				$aa=mysqli_query($connect,"select * from $tn ");
				while($bb=mysqli_fetch_array($aa)) { 
		?>
                    <a href="<?php echo $menu_url.$tn.$bb['seo'];?>"><?php echo $bb['title'];?> </a>
        <?php
				} 

        
         } 
		
		?>
		
		
		
		
	</li>
		
	<?php } ?>            
    </ul>            
               
                        