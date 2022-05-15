<?php
use PHPMailer\PHPMailer\PHPMailer;
session_start();
include('connect.php');

    $stat = $_POST['stat'];
$cid = $_POST['cid'];
$firstname=$_POST['firstname'];
$email=$_POST['email'];


$update="UPDATE `accounts` SET `status`='$stat' WHERE `id`='$cid'";
$query=mysqli_query($con,$update) or die("UPDATE ERROR:".mysqli_error($con));
if($query){
  
              require_once "../PHPMailer/PHPMailer.php";
	        require_once "../PHPMailer/Exception.php";

	        $mail = new PHPMailer();
	        $mail->addAddress($email);
	        $mail->setFrom("donotreply@beaconbankinternational.com", "Account Department");
	        $mail->Subject = "Beacon Bank International Welcomes $firstname";
	        $mail->isHTML(true);
	        $mail->Body = "
	            Hi, $firstname<br>
	            
	            We are happy to inform you that your account have been approved, please click on the link below to learn more:<br>
	            <a href='beaconbankinternational.com'>https://beaconbankinternational.com</a><br><br>
	            Use your the account number previously sent to you as username and the password you entered during account opening as password:<br/>
	           
	            
	           for more enquiry contact administrator<br/>
	            
	            Kind Regards,<br>
	            Beaconbankinternational.com
	        ";

	        if ($mail->send()){
    	         echo "<script type='text/javascript'>alert('Status Successfully Update!');</script>";
        echo "<script>document.location='dashboard.php'</script>";
	        }
       
}else{
    
         echo "<script type='text/javascript'>alert('Status not Successfully Update!');</script>";
        echo "<script>document.location='dashboard.php'</script>";
    
}
?>