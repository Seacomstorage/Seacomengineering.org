<?php include('header.php'); 

/*error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

set_include_path("." . PATH_SEPARATOR . ($UserDir = dirname($_SERVER['DOCUMENT_ROOT'])) . "/pear/php" . PATH_SEPARATOR . get_include_path());
require_once "Mail.php";

$host = "ssl://imap.dreamhost.com";
$username = "youremail@example.com";
$password = "your email password";
$port = "465";
$to = "address_form_will_send_TO@example.com";
$email_from = "youremail@example.com";
$email_subject = "Subject Line Here: " ;
$email_body = "whatever you like" ;
$email_address = "reply-to@example.com";

$headers = array ('From' => $email_from, 'To' => $to, 'Subject' => $email_subject, 'Reply-To' => $email_address);
$smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password));
$mail = $smtp->send($to, $headers, $email_body);


if (PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
} else {
echo("<p>Message successfully sent!</p>");
}*/
    
    
if(isset($_POST['submit']))
{
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
		$subject=$_POST['subject'];
		$message=$_POST['message'];
		
			$q="Insert into contact SET name='".$name."', subject='".$subject."', email='".$email."', message='".$message."', phone='".$phone."', enq_date='".date('d-m-Y')."' ";
			mysqli_query($connect,$q);
			
			$subject = "Contact Us";
						
			$to=$siteDetails['email'];
			$message = '
			<html>
			<head>
			<title>Contact Us</title>
			</head>
			<body>
			<p>Hi! Admin, a user is trying to contact you. <br><br> User details: </p>
			<table>
			<tr>
			<td>Name:</td>
			<td>'.$name.'</td>
			</tr>
			<tr>
			<td>Phone:</td>
			<td>'.$phone.'</td>
			</tr>
			<tr>
			<td>Email:</td>
			<td>'.$email.'</td>
			</tr>
			<tr>
			<td>Subject:</td>
			<td>'.$subject.'</td>
			</tr>
			<tr>
			<td>Message:</td>
			<td>'.$message.'</td>
			</tr>
			
			</table>
			</body>
			</html>
			';
			
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			$headers .= 'From: <'.$email.'>' . "\r\n";
			
			mail($to,$subject,$message,$headers);
			
			
			 
			$_SESSION['success_msg']="Thank You.";
			

}
?>



                                                <strong>Address:</strong><br>
                                                <?php echo $siteDetails['address'];?>
                                           
                                                <strong>Telephone:</strong><br>
                                                <?php echo $siteDetails['phone'];?>
                                            
                                                
                                                <strong>Email:</strong><br>
                                                <?php echo $siteDetails['email'];?>
                                            

                           
                                
                                
                                
                        
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
                           
                                <div class="col-md-12">
                                    <div class="address-fname">
                                        <input class="form-control" type="text" name="name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="address-email">
                                        <input class="form-control" type="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="address-web">
                                        <input class="form-control" type="text" name="phone" placeholder="Contact Number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="address-subject">
                                        <input class="form-control" type="text" name="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="address-textarea">
                                        <textarea name="message" class="form-control" placeholder="Write your message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <p class="form-message"></p>
                            <div class="footer-content mail-content clearfix">
                                <div class="send-email float-md-left">
                                    <input value="Submit" class="form-button form-button-submit btn btn-theme btn-theme-dark" type="submit" name="submit">
                                </div>
                            </div>
                        </form>
                        
                        
                           
                        <div class="google-map">
                            <iframe src="https://maps.google.com/maps?q=<?php echo $siteDetails['address'];?>&amp;output=embed" width="100%" height="390"></iframe>
                        </div>



<?php include('footer.php');?>