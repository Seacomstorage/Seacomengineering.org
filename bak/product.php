<?php include('header.php');


$arr=explode("/product/",$_SERVER['REQUEST_URI']);

$seo=$arr[1];	


$det=mysqli_fetch_array(mysqli_query($connect,"select * from products where seo='".$seo."' "));
$prd=$det['id'];
?>

<h2 class="product-title"><?php echo $det['title'];?></h2>


<?php  include('footer.php'); ?>