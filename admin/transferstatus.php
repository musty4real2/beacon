<?php
use PHPMailer\PHPMailer\PHPMailer;
session_start();
include('connect.php');

    $id = $_POST['id'];
$status = $_POST['status'];
$firstname=$_POST['firstname'];
$email=$_POST['email'];
$msg=$_POST['msg'];


$update="UPDATE `otherbank` SET `status`='$status' WHERE `id`='$id'";
$query=mysqli_query($con,$update) or die("UPDATE ERROR:".mysqli_error($con));
if($query){
  
              require_once "../PHPMailer/PHPMailer.php";
	        require_once "../PHPMailer/Exception.php";

	        $mail = new PHPMailer();
	        $mail->addAddress($email);
	        $mail->setFrom("donotreply@beaconbankinternational.com", "Other Bank Operation Unit");
	        $mail->Subject = "Beacon Bank International Notification";
	        $mail->isHTML(true);
	        $mail->Body = "
	            Hi, $firstname<br>
	            
	            Your fund transfer process is successfully completed, please note that it takes a minimum of three (3) working days for transferred fund to reflect in the destination bank account. However if there is any further delay, please do not hesitate to contact our account department by sending an email to accountservices@beaconbankinternational.com 
	            <br/>
	          
	            Kind Regards,<br>
	            Beaconbankinternational.com
	        ";

	        if ($mail->send()){
    	         echo "<script type='text/javascript'>alert('Status Successfully Update!');</script>";
        echo "<script>document.location='see_transfer.php'</script>";
	        }
       
}else{
    
         echo "<script type='text/javascript'>alert('Status not Successfully Update!');</script>";
        echo "<script>document.location='dashboard.php'</script>";
    
}
?>