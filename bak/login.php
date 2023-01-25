<?php include('header.php'); 

if($_SESSION['user_id']>0)
{
	echo '<script language="javascript">location.href="'.$menu_url.'"</script>'; 
}

if(isset($_POST['login']))
{
		$email=$_POST['email'];
		$password=$_POST['pass'];
		
		if(strstr($email,'@')) {
		$q="SELECT *,count(*) as cnt from users where email='".$email."' and password='".$password."' and user_level=0 and status=1";
		} else {
		$q="SELECT *,count(*) as cnt from users where phone='".$email."' and password='".$password."' and user_level=0 and status=1";			
		}
		
		$qr=mysqli_fetch_array(mysqli_query($connect,$q));
		$phone=$qr['phone'];

		if($qr['cnt']>0)
		{
			 	
			$_SESSION['user_id']=$qr['id'];
			$_SESSION['user_name']=$qr['fname'];
			$_SESSION['user_level']=$qr['user_level'];
			
			echo '<script language="javascript">location.href="'.$menu_url.'"</script>'; 
			
		}
		else
		{
			
			$_SESSION['error_msg']="Invalid Login";
		}
}


if(isset($_POST['send']))
{
		$email=$_POST['email'];
		
		$q="SELECT *,count(*) as cnt from users where email='".$email."' and user_level=0 ";
		$qr=mysqli_fetch_array(mysqli_query($connect,$q));

		if($qr['cnt']>0)
		{
			$subject = "Forgot Password";
			$name=$qr["fname"];
			$from=$siteDetails['email'];
			$password=$qr['password'];
						
			$to=$_POST['email'];
			$message = '
			<html>
			<head>
			<title>Forgot Password</title>
			</head>
			<body>
			<p>Hi! '.$name.', never share login details with other. <br><br> Your details: </p>
			<table>
			<tr>
			<td>Email:</td>
			<td>'.$to.'</td>
			</tr>
			<tr>
			<td>Password:</td>
			<td>'.$password.'</td>
			</tr>
			
			</table>
			</body>
			</html>
			';
			
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			$headers .= 'From: <'.$from.'>' . "\r\n";
			
			mail($to,$subject,$message,$headers);
			
			echo"<script>alert('Check your email.')</script>";
			
		}
		else
		{
			echo"<script>alert('This email is not registered.')</script>";
		}

}

?>


                                <h3 class="block-title"><span>Login</span></h3>
                                
                                
                                   <?php
									if(isset($_SESSION['error_msg']))
									{
									?>
										<div class="error_msg">
											<?php echo $_SESSION['error_msg']; ?>
										</div>                
									<?php
										unset($_SESSION['error_msg']);
									}
									?>
														
									
                                   <form method="post" class="form-login">
                                    <div class="row">
                                        <div class="col-md-12 hello-text-wrap">
                                            <span class="hello-text text-thin">Enter your login credentials below</span>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group"><input class="form-control" type="text" placeholder="User email/phone no" name="email" required></div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group"><input class="form-control" type="password" placeholder="Your password" name="pass" ></div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <a class="forgot-password" data-toggle="modal" data-target="#fp" style="cursor:pointer">forgot password?</a>
                                            
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="submit" value="Login" class="btn btn-theme btn-block btn-theme" name="login">
                                        </div>
                                    </div>
                                </form>
                                
                                 
                                
                                
                                
                            
                                                            <h4 class="modal-title" id="fpLabel">Resend Password</h4>
                                                       
                                                            <form method="post">
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="submit" name="send" class="btn btn-theme btn-block" value="Send">
                                                                </div>
                                                            </form>
                                                        
                               
                                   
                        
                        
                        
        
        
<?php include('footer.php');?>