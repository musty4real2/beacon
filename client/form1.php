<?php
include('connect.php');
session_start();

 date_default_timezone_set('Africa/Lagos');

    $date = date("Y-m-d H:i:s");
 if ( !isset($_POST['username'], $_POST['pwd']) ) {
	// Could not get the data that should have been sent.
	     echo "<script type='text/javascript'>alert('Please fill both the username and password fields!');
	  document.location='index.php'</script>";
}
if(isset($_POST['m'])) {


    $user = $_POST['username'];
    $pass = $_POST['pwd'];


    $uname = mysqli_real_escape_string($con, $user);
    $pword = mysqli_real_escape_string($con, $pass);
//start


if ($stmt = $con->prepare('SELECT id,secret,first_name,middle_name,last_name,status FROM accounts WHERE account_number = ? ')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"

	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();


	if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password,$firstname,$middlename,$lastname,$status);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['pwd'], $password)) {
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['id'] = $id;
	   $name =$firstname.' '.$middlename.' '.$lastname;
	   $_SESSION['name']=$firstname.' '.$middlename.' '.$lastname;
	     $_SESSION['dept'] = 'Account Holder';
	     
	     
	 if($status=='1'){    

?>
 <script type='text/javascript'>alert('Welcome! <?php echo $name; ?>');
	  document.location='user/index.php'</script>

	
<?php
}elseif($status=='2'){
    ?>
     <script type='text/javascript'>alert('Sorry Your Acccount Has been put under review please contact admin ');
	  document.location='index.php'</script>
    <?php
}
elseif($status=='3'){
    ?>
     <script type='text/javascript'>alert('Sorry Your Acccount Has been suspended please contact admin ');
	  document.location='index.php'</script>
<?php }
} else {
		

		echo "<script type='text/javascript'>alert('Incorrect password!');
	  document.location='index.php'</script>";
	}
} else {
	
		echo "<script type='text/javascript'>alert('Incorrect username!');
	  document.location='index.php'</script>";
}


	$stmt->close();
}

ob_flush();

}

?>