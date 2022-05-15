<?php
use PHPMailer\PHPMailer\PHPMailer;
session_start();
include('connect.php');
$reason=$_POST['reason'];
    $amount = $_POST['amount'];
$balance = $_POST['balance'];
$cid = $_POST['cid'];
$curtype=$_POST['curtype'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$newbalance=$balance-$amount;


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

        mysqli_query($con, "INSERT INTO `withdraw` (`cust_id` ,`amount_removed` ,`date`,`time`,`narration`,`staff_id`, `balance`, `oldbalance`)
VALUES ('$cid', '$amount', NOW(),NOW(),'$reason','{$_SESSION['id']}','$newbalance','$balance')") or die(mysqli_error($con));
$musa=mysqli_insert_id($con);

require_once "../PHPMailer/PHPMailer.php";
	        require_once "../PHPMailer/Exception.php";

	        $mail = new PHPMailer();
	        $mail->addAddress($email);
	        $mail->setFrom("donotreply@beaconbankinternational.com", "Account Department");
	        $mail->Subject = "Beacon Bank International Debit on $firstname Account";
	        $mail->isHTML(true);
	        $mail->Body = "
	            Hi, $firstname<br>
	            
	            We are happy to inform you that your account have just been debited with $curtype$amount, with narration ($reason) please click on the link below to learn more:<br>
	            <a href='beaconbankinternational.com'>https://beaconbankinternational.com</a><br><br>
	            Use your the account number and the password to perform other operations.<br/>
	            
	            Your Account Balance is: $curtype$newbalance<br/>
	           
	            
	           for more enquiry contact administrator<br/>
	            
	            Kind Regards,<br>
	            Beaconbankinternational.com
	        ";

	        if ($mail->send()){
        echo "<script type='text/javascript'>alert('withdrawal Successfully Made!');</script>";
        echo "<script>document.location='withdraw.php'</script>";
}else{
        echo "<script type='text/javascript'>alert('Withdrawal is not Successfully Made From Account Selected!');</script>";
        echo "<script>document.location='withdraw.php'</script>";
}
?>