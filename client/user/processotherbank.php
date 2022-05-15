<?php
ob_start();
include('../connect.php');
use PHPMailer\PHPMailer\PHPMailer;

session_start();
$id=$_SESSION['id'];
if ( !isset($_POST['accname'], $_POST['password'], $_POST['accno'], $_POST['sortcode'], $_POST['amount']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill all fields the account name, account number, sortcode, transfer amount and password fields must be filled!');
}
if ($stmt = $con->prepare('SELECT id, account_number,secret,balance,email,first_name,cur_type,minimum FROM accounts WHERE id = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"

	$stmt->bind_param('s', $id);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();


	if ($stmt->num_rows > 0) {
	$stmt->bind_result($id,$account_number,$password,$balance,$remail,$rfirst,$rcur_type,$limit);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['password'], $password)) {
	    
	    if($_POST['amount']<$limt){
	        
	        echo " <script type='text/javascript'>alert('Transfer Amount is Below Your Set minimum Please Contact Administrator for advice');
	  document.location='portfolio.php'</script>";
	    }else{
	    
	    if($_POST['amount']>$balance){
	         echo " <script type='text/javascript'>alert('You do not have sufficeint balance');
	  document.location='index.php'</script>";
	    }else{
$owner=mysqli_query($con,"SELECT * FROM `accounts` WHERE `id`='{$_SESSION['id']}' Limit 1");
$ownerrow=mysqli_fetch_array($owner);

$accname=$_POST['accname'];
$accno=$_POST['accno'];
$sortcode=$_POST['sortcode'];
$bankname=$_POST['bankname'];
$amount=$_POST['amount'];
$obal=$ownerrow['balance'];
$ownerbalance=$ownerrow['balance']-$amount;
$oname=$ownerrow['first_name'];
$oemail=$ownerrow['email'];
$cur_type=$ownerrow['cur_type'];
$msg="other bank transfer of $cur_type$amount to $accname with account number $accno in $bankname with sortcode $sortcode";
 mysqli_query($con, "INSERT INTO `otherbank` (`account_name`, `account_number`, `bankname`, `sortcode`, `entry_date`, `user_id`, `status`, `transfer_amount`) VALUES ('$accname', '$accno', '$bankname', '$sortcode', NOW(), '{$_SESSION['id']}', 'pending', '$amount')") or die(mysqli_error($con));
 
 mysqli_query($con,"UPDATE `accounts` SET `balance` = '$ownerbalance' WHERE `id` ='{$_SESSION['id']}' LIMIT 1");
 
 
  mysqli_query($con, "INSERT INTO `withdraw` (`cust_id` ,`amount_removed` ,`date`,`time`,`narration`,`staff_id`, `balance`, `oldbalance`)
VALUES ('{$_SESSION['id']}', '$amount', NOW(),NOW(),'$msg','{$_SESSION['id']}','$ownerbalance','$obal')") or die(mysqli_error($con));
 
 require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/Exception.php";
$mail1 = new PHPMailer();
	        $mail1->addAddress($oemail);
	        $mail1->setFrom("donotreply@beaconbankinternational.com", "Other Bank Operations Unit");
	        $mail1->Subject = "Beacon Bank International Other Bank Transfer";
	        $mail1->isHTML(true);
	        $mail1->Body = "
	            Hi, $oname<br>
	            
	             We are happy to inform you that your request to tranfer $cur_type$amount to $accname with account number $accno in $bankname with sort code or Aba number $sortcode is pending approval once approved a notification would be sent accross.
	             please click on the link below to learn more:<br>
	            <a href='beaconbankinternational.com'>https://beaconbankinternational.com</a><br><br>
	            Use your the account number and the password to perform other operations.<br/>
	            
	            Your Account Balance is: $cur_type$ownerbalance<br/>
	           
	            
	           for more enquiry contact administrator<br/>
	            
	            Kind Regards,<br>
	            Beaconbankinternational.com
	        ";

if ($mail1->send()){
?>
 <script type='text/javascript'>alert('Transfer Successfully Compeleted but its pending you would recieve a mail as soon as the transaction hits reciever account');
	  document.location='index.php'</script>

	
<?php
	}
 }
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