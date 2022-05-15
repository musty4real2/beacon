<?php
session_start();
include('connect.php');

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $query2 = mysqli_query($con, "select * from registration where phone='$phone'") or die(mysqli_error($con));
    $count = mysqli_num_rows($query2);

    if ($count > 0) {
        echo "<script type='text/javascript'>alert('Customer already exist!');</script>";
        echo "<script>document.location='dashboard.php'</script>";
    } else {

        $pic = $_FILES["image"]["name"];
        if ($pic == "") {
            $pic = "default.gif";
        } else {
            $pic = $_FILES["image"]["name"];
            $type = $_FILES["image"]["type"];
            $size = $_FILES["image"]["size"];
            $temp = $_FILES["image"]["tmp_name"];
            $error = $_FILES["image"]["error"];

            if ($error > 0) {
                die("Error uploading file! Code $error.");
            } else {
                if ($size > 100000000000) //conditions for the file
                {
                    die("Format is not allowed or file size is too big!");
                } else {
                    move_uploaded_file($temp, "uploads/" . $pic);
                }
            }
        }

        mysqli_query($con, "INSERT INTO `registration` (`name`, `phone`, `address`, `signature`, `staff_id`, `balance`,`entry_date`)
 VALUES ('$name', '$phone', '$address', '$pic', '{$_SESSION['id']}', '',NOW())") or die(mysqli_error($con));

        echo "<script type='text/javascript'>alert('Successfully Added New Customer!');</script>";
        echo "<script>document.location='dashboard.php'</script>";
    }
?>