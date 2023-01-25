<?php include('header.php'); 

if($_SESSION['user_id']>0)
{
	echo '<script language="javascript">location.href="'.$menu_url.'"</script>'; 
}

if(isset($_POST['reg']))
{ 

		if($_POST['pass1']!=$_POST['pass2'])
		{
			$_SESSION['error_msg']="Password & confirm password are not match.";
		}
		else
		{ 
			$fname=$_POST['fname'];
			$phone=$_POST['phone'];
			$email=$_POST['email'];
			$password=$_POST['pass1'];

			$q="SELECT count(*) as cnt from users where email='".$email."'";
			$qr=mysqli_fetch_array(mysqli_query($connect,$q));

			$qq="SELECT count(*) as cnt from users where phone='".$phone."'";
			$qrr=mysqli_fetch_array(mysqli_query($connect,$qq));
	
			if($qrr['cnt']>0)
			{
				$_SESSION['error_msg']="This phone no is already registered.";
			}
			elseif($qr['cnt']>0)
			{
				$_SESSION['error_msg']="This email id is already registered.";
			}
			else
			{
				$otp=rand(1000,9999);
				 $r="Insert into users SET fname='".$fname."', email='".$email."', phone='".$phone."', password='".$password."', dt='".date('d-m-Y')."',otp='".$otp."' "; 
				 
				if(mysqli_query($connect,$r))
				{
					
					/*$msg='Dear '.$fname.', Your OTP number is '.$otp.'. Request you to keep your OTP confidentially. Regards, ANUBHAB CREATIONS';

					 $msgtxt=urldecode($msg);
					
					 $abc='http://alerts.preconetindia.com/api/v4/?api_key=A89954adb2ec61818b58d9727ffcb9f2e&method=sms&message='.$msgtxt.'&to='.$phone.'&sender=ANUVAB';
					
					 $string = file_get_contents($abc);  */

					
					$_SESSION['success_msg']="Check your mobile to get OTP-".$phone;
					
					unset($_POST);
							
					
				}
				else
				{
					$_SESSION['error_msg']="Error occured. Try Later.";
				}
	
				
			}
		}
}



if(isset($_POST['otp_verification']))
{

			$user_ph=$_POST['user_ph'];
			$otp=$_POST['otp'];

			$qr=mysqli_fetch_array(mysqli_query($connect,"SELECT * from users where phone='".$user_ph."'"));
			$fname=$qr['fname'];
			$pass=$qr['password'];
			$email=$qr['email'];

			if($qr['otp']!=$otp)
			{
				$_SESSION['success_msg']="Invalid OTP-".$user_ph;
			}
			else
			{
				$r="update users SET status=1,otp_verify=1 where phone='".$user_ph."' ";
				 
				if(mysqli_query($connect,$r))
				{
							
							
					$frm=$siteDetails['email'];
				
					$message = '
					<html>
					<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<title>Create Account</title>
					</head>
					<body>
					<p>Hi! '.$fname.', never share login details with other.  <br><br> Your details: </p>
					<table>
					<tr>
					<td>Email:</td>
					<td>'.$email.'</td>
					</tr>
					<tr>
					<td>Password:</td>
					<td>'.$pass.'</td>
					</tr>
					</table>
					</body>
					</html>
					';
					
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					
					$headers .= 'From: <'.$frm.'>' . "\r\n";
					
					mail($email,$subject,$message,$headers);
							
					unset($_POST);
					
					echo"<script>alert('Registration successfull.')</script>";
						
							
			
			
			
			
				}
				else
				{
					$_SESSION['success_msg']="Error occured. Try Later.-".$user_ph;
				}
	
				
			}

}
?>


                            

                                
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
									
                                    
                                    <?php
									if(isset($_SESSION['success_msg']))
									{
										$arr=explode("-",$_SESSION['success_msg'],2);
									?>
										<div class="success_msg">
											<?php echo $arr[0]; ?>
										</div>  
                                        <style type="text/css">
										.reg_div{
											display:none;
										}
										</style>
                                       <h3>Submit OTP</h3>  
                                         <form method="post" class="sn-form sn-form-boxed"> 
                                         <input type="hidden" name="user_ph" value="<?php echo $arr[1]; ?>"  /> 
                                         
                                         <div class="sn-form-inner">
                                            <div class="single-input">
                                                <label for="form-name">OTP</label>
                                                <input type="text" name="otp" required>
                                            </div>
                                     		
                                            <div class="single-input">
                                                    <input type="submit" name="otp_verification" class="btn btn-theme width-auto btn-lgin" value="Send">
                                                </div>
                                                
                                            </div>
                                
                                        </form>
                                             
									<?php
										unset($_SESSION['success_msg']);
									}
									?>
                                    
                                    
                                    	
                                
                                <form method="post"  class="sn-form sn-form-boxed reg_div">
                                <h3>Create an account</h3>
                                <div class="sn-form-inner">
                                    <div class="single-input">
                                        <label for="form-name">Name</label>
                                        <input type="text" name="fname" required>
                                    </div>
                                    
                                    <div class="form-row full-width">
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <label for="form-password">Email Address *</label>
                                                <input type="email" name="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <label for="form-password2">Phone No *</label>
                                                <input type="text" name="phone" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row full-width">
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <label for="form-password">Password *</label>
                                                <input type="password" required name="pass1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-input">
                                                <label for="form-password2">Confirm Password *</label>
                                                <input type="password" required name="pass2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-input">
                                        <input type="submit" name="reg" class="btn btn-theme width-auto btn-lgin" value="Register">
                                        <div class="checkbox-input">
                                            <input type="checkbox" required>
                                            <label for="form-agreement">By clicking you are agreeing to our <a href="<?php echo $menu_url;?>page/terms" target="_blank">terms and conditions</a></label>
                                        </div>
                                    </div>
                                    <div class="single-input text-center">
                                        <a href="<?php echo $menu_url;?>login">Already have an account? Login here</a>
                                    </div>
                                </div>
                            </form>
                                    
                              

<?php include('footer.php');?>