<?php
use PHPMailer\PHPMailer\PHPMailer;
session_start();
include('connect.php');

    $amount = $_POST['amount'];
$balance = $_POST['balance'];
$curtype=$_POST['curtype'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$cid = $_POST['cid'];
$newbalance=$balance+$amount;


$date=getdate();
$month=$date['month'];
$year=$date['year'];
$date=strtoupper("$month-$year");

$getmy="SELECT * FROM `monthyear` WHERE `monthyear`='$date'";

$q09=mysqli_query($con,$getmy);

if(mysqli_num_rows($q09)>1){


}
if(mysqli_num_rows($q09)==1){


}
if(mysqli_num_rows($q09)==0){

    $peace=mysqli_query($con,"INSERT INTO `monthyear` (`monthyear`) VALUES ('$date')");
}

$update="UPDATE `accounts` SET `balance`='$newbalance' WHERE `id`='$cid'";
$query=mysqli_query($con,$update) or die("UPDATE ERROR:".mysqli_error($con));

        mysqli_query($con, "INSERT INTO `deposit` (`cust_id`, `amount_added`, `oldbalance`, `balance`, `staff_id`, `date`) 
VALUES ('$cid', '$amount', '$balance', '$newbalance', '{$_SESSION['id']}', NOW())") or die(mysqli_error($con));

require_once "../PHPMailer/PHPMailer.php";
	        require_once "../PHPMailer/Exception.php";

	        $mail = new PHPMailer();
	        $mail->addAddress($email);
	        $mail->setFrom("donotreply@beaconbankinternational.com", "Account Department");
	        $mail->Subject = "Beacon Bank International Deposit on $firstname Account";
	        $mail->isHTML(true);
	        $mail->Body = "
	            Hi, $firstname<br>
	            
	            We are happy to inform you that your account have just been credited with $curtype$amount, please click on the link below to learn more:<br>
	            <a href='beaconbankinternational.com'>https://beaconbankinternational.com</a><br><br>
	            Use your the account number and the password to perform other operations.<br/>
	            
	            Your Account Balance is: $curtype$newbalance<br/>
	           
	            
	           for more enquiry contact administrator<br/>
	            
	            Kind Regards,<br>
	            Beaconbankinternational.com
	        ";

	        if ($mail->send()){
        echo "<script type='text/javascript'>alert('Payment Successfully Added to the customer!');</script>";
        echo "<script>document.location='deposit.php?cid=$cid'</script>";
}else{
        echo "<script type='text/javascript'>alert('Payment Not Successfully Added to the customer!');</script>";
        echo "<script>document.location='deposit.php'</script>";
}

?>