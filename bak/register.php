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
				 $r="Insert into users SET fname='".$fname."', email='".$email."', phone='".$phone."', password='".$password."', dt='".date('d-m-Y')."',status=1 ";
				 
				if(mysqli_query($connect,$r))
				{
					
					$frm=$siteDetails['email'];
				
				    //SMS
					$msg='Hi! '.$fname.', never share login details with others. Your Username:'.$email.', Password: '.$password.'. Regards, Preconet Technologies';
					$msgtxt=urldecode($msg);
					$sms_key=$siteDetails['sms_key'];	
					$sms_sender=$siteDetails['sms_sender'];
					
					$abcd='http://alerts.preconetindia.com/api/v4/?api_key='.$sms_key.'&method=sms&message='.$msgtxt.'&to='.$phone.'&sender='.$sms_key;
					
					$string = file_get_contents($abcd); 
									
					//EMAIL				
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
					<td>'.$password.'</td>
					</tr>
					</table>
					</body>
					</html>
					';
					
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					
					$headers .= 'From: <'.$frm.'>' . "\r\n";
					
					mail($email,$subject,$message,$headers);
							
					$_SESSION['success_msg']="Thank you.";
					unset($_POST);
				}
				else
				{
					$_SESSION['error_msg']="Error occured. Try Later.";
				}
	
				
			}
		}
}


?>


 <section class="page-section color">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <h3 class="block-title"><span>Create an account</span></h3>
                                
                                

                                
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
									?>
                                    	<div class="success_msg">
											<?php echo $_SESSION['success_msg']; ?>
										</div>
                                    <?php
										unset($_SESSION['success_msg']);
									}
									?>
                                    					
									<form method="post" class="form-login">
                                    <div class="row">
                                        <div class="col-md-12 hello-text-wrap">
                                            <span class="hello-text text-thin">Create your account and enjoy shopping at Shop</span>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group"><input class="form-control" name="fname" required type="text" placeholder="Name"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><input class="form-control" type="email" placeholder="Your Email Address" name="email"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><input class="form-control" type="text" placeholder="Your Phone Number" name="phone" required></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><input class="form-control" type="password" required placeholder="Create password" name="pass1"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><input class="form-control" type="password" required placeholder="Confirm password" name="pass2"></div>
                                        </div>
                                        <div class="col-md-12 col-lg-12 text-center">
                                            <div class="checkbox">
                                                <label><input type="checkbox" required> By clicking you are agreeing to <a href="<?php echo $menu_url;?>page/terms" target="_blank">our terms and conditions</a></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-md-offset-3">
                                            <input type="submit" value="Create Account" class="btn btn-theme btn-block btn-theme" name="reg">
                                        </div>
                                    </div>
                                </form>
                                
                                
                                    
                                
                               
                               
                               </div>
                        </div>
                    </div>
                </section>

<?php include('footer.php');?>