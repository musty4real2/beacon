<?php
ob_start();
include('../connect.php');
use PHPMailer\PHPMailer\PHPMailer;

session_start();
if ( !isset($_POST['amount'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the tranfer and password fields!');
}

if ($stmt = $con->prepare('SELECT id, account_number,secret,balance,email,first_name,cur_type FROM accounts WHERE account_number = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"

	$stmt->bind_param('s', $_POST['account_number']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();


	if ($stmt->num_rows > 0) {
	$stmt->bind_result($id,$account_number,$password,$balance,$remail,$rfirst,$rcur_type);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['password'], $password)) {


$owner=mysqli_query($con,"SELECT * FROM `accounts` WHERE `id`='{$_SESSION['id']}' Limit 1");
$ownerrow=mysqli_fetch_array($owner);
$amount=$_POST['amount'];
$obal=$ownerrow['balance'];
$ownerbalance=$ownerrow['balance']-$amount;
$oname=$ownerrow['first_name'];
$oemail=$ownerrow['email'];
$cur_type=$ownerrow['cur_type'];
mysqli_query($con,"UPDATE `accounts` SET `balance` = '$ownerbalance' WHERE `id` ='{$_SESSION['id']}' LIMIT 1");

 mysqli_query($con, "INSERT INTO `withdraw` (`cust_id` ,`amount_removed` ,`date`,`time`,`narration`,`staff_id`, `balance`, `oldbalance`)
VALUES ('{$_SESSION['id']}', '$amount', NOW(),NOW(),'inter bank transfer','{$_SESSION['id']}','$ownerbalance','$obal')") or die(mysqli_error($con));
 require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/Exception.php";
$mail1 = new PHPMailer();
	        $mail1->addAddress($oemail);
	        $mail1->setFrom("donotreply@beaconbankinternational.com", "Account Debit");
	        $mail1->Subject = "Beacon Bank International Debit's $oname";
	        $mail1->isHTML(true);
	        $mail1->Body = "
	            Hi, $oname<br>
	            
	             We are happy to inform you that your account have just been debited with $cur_type$amount, with narration (inter bank transfer) please click on the link below to learn more:<br>
	            <a href='beaconbankinternational.com'>https://beaconbankinternational.com</a><br><br>
	            Use your the account number and the password to perform other operations.<br/>
	            
	            Your Account Balance is: $cur_type$ownerbalance<br/>
	           
	            
	           for more enquiry contact administrator<br/>
	            
	            Kind Regards,<br>
	            Beaconbankinternational.com
	        ";
$mail1->send();

$rbalance=$balance+$amount;

mysqli_query($con,"UPDATE `accounts` SET `balance` = '$rbalance' WHERE `id` ='$id' LIMIT 1");
 mysqli_query($con, "INSERT INTO `deposit` (`cust_id`, `amount_added`, `oldbalance`, `balance`, `staff_id`, `date`) 
VALUES ('$id', '$amount', '$balance', '$rbalance', '$id', NOW())") or die(mysqli_error($con));
 require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/Exception.php";
$mail = new PHPMailer();
	        $mail->addAddress($remail);
	        $mail->setFrom("donotreply@beaconbankinternational.com", "Account Debit");
	        $mail->Subject = "Beacon Bank International Credit's $rfirst";
	        $mail->isHTML(true);
	        $mail->Body = "
	            Hi, $rfirst<br>
	            
	           We are happy to inform you that your account have just been credit with $rcur_type$amount, please click on the link below to learn more:<br>
	            <a href='beaconbankinternational.com'>https://beaconbankinternational.com</a><br><br>
	            Use your the account number and the password to perform other operations.<br/>
	            
	            Your Account Balance is: $rcur_type$rbalance<br/>
	           
	            
	           for more enquiry contact administrator<br/>
	            
	            Kind Regards,<br>
	            Beaconbankinternational.com
	        ";
if ($mail->send()){
?>
 <script type='text/javascript'>alert('Transfer Successfully Compeleted');
	  document.location='index.php'</script>

	
<?php
	}
	    
	} else {
		

		echo "<script type='text/javascript'>alert('Incorrect password!');
	  document.location='portfolio.php'</script>";
	}
} else {
	
		echo "<script type='text/javascript'>alert('Incorrect account number!');
	  document.location='portfolio.php'</script>";
}


	$stmt->close();
}

ob_flush();
?>