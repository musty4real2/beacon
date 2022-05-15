<?php
include('connect.php');
session_start();
/**
 * Created by PhpStorm.
 * Date: 03/03/2019
 * Time: 23:45
 */
if(isset($_POST['m'])) {


    $user = $_POST['username'];
    $pass = $_POST['pwd'];


    $uname = mysqli_real_escape_string($con, $user);
    $pword = mysqli_real_escape_string($con, $pass);

    $passw = md5($pword);
    $salt = "a1Bz20ydqelm8m1wql";
    $passw = $salt . $passw;


    date_default_timezone_set('Africa/Lagos');

    $date = date("Y-m-d H:i:s");

    $query = mysqli_query($con, "select * from user where username='$uname' and password='$passw' and status='1'")
    or die(mysqli_error($con));
    $row = mysqli_fetch_array($query);
    $id = $row['id'];
    $name = $row['name'];
    $dept = $row['dept'];

    $counter = mysqli_num_rows($query);

    $id = $row['id'];
    $_SESSION['dept'] = $row['dept'];

    if ($counter == 0) {
        echo "<script type='text/javascript'>alert('Invalid Username or Password!');
	  document.location='index.php'</script>";
    } elseif ($counter > 0) {
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $name;
        $_SESSION['dept'] = $row['dept'];

        $remarks = "has logged in the system at ";
        mysqli_query($con, "INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')") or
        die(mysqli_error($con));

    }
    if ($_SESSION['dept']='admin') {
        echo "<script type='text/javascript'>document.location='dashboard.php'</script>";
    }
}

?>