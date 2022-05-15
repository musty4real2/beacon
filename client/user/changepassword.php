<?php include('header.php'); ?>
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Profile Layout
                    </h2>
                </div>
                <?php include('center.php'); ?>
                            <div class="p-5">
<?php
$new_password=$old_password = $confirm_password = "";
$new_password_err = $confirm_password_err =  $old_password_err ="";



                                if(isset($_POST['save']) && $_SERVER["REQUEST_METHOD"] == "POST"){
    
 if(empty(trim($_POST["old_password"]))){
        $old_password_err = "Please enter the old password.";     
    }
    elseif(strlen(trim($_POST["old_password"])) < 8){
        $old_password_err = "Old Password must have atleast 8 characters.";
    } else{
        $old_password = trim($_POST["old_password"]);
    }
 
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)  && empty($old_password_err)){




$getuser = $link->prepare("SELECT * FROM `accounts` WHERE `id` = ?");
$getuser->bind_param('s', $_SESSION['user']);
$getuser->execute();
$userdata = $getuser->get_result();
$row = $userdata->fetch_array(MYSQLI_ASSOC);

if (password_verify($old_password, $row['secret'])) {
    // $password being $_POST['password-sign-in']
    // $row['password'] being the hashed password saved in the database

//successfully verified
        // Prepare an update statement
        $sql = "UPDATE accounts SET secret = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
 // Password updated successfully. Destroy the session, and redirect to login page
               // session_destroy();
                $remarks = "you changed your user password";//audit log message

    mysqli_query($link, "INSERT INTO history_log(user_id,action,date) VALUES('{$_SESSION['user']}','$remarks',NOW())") or die(mysqli_error($link));
 echo "<script type='text/javascript'>alert('Password Changed Successfully !!!');</script>";
echo "<script>window.location='logout.php'</script>";
               
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}

if (!password_verify($old_password, $row['password'])) {
 echo "<script type='text/javascript'>alert('Old password does not match !!!');</script>";
 
 echo "<script>window.location='changepassword.php'</script>";
    exit();
}
}
?>
                                    <form class="validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                        
                                            <div> <label class="flex flex-col sm:flex-row"> Old Password 
                                                <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"><?php echo $old_password_err; ?></span> 
                                            </label> 
       <input type="password" name="old_password" class="input w-full border mt-2" placeholder="********" minlength="8" required value="<?php echo $old_password; ?>"> 
                                            </div>
                                            <div class="mt-3"> <label class="flex flex-col sm:flex-row"> New Password <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"><?php echo $new_password_err; ?></span> </label> <input type="password" name="new_password" class="input w-full border mt-2" placeholder="secret" minlength="8" required value="<?php echo $new_password; ?>"> </div>
                                            <div class="mt-3"> <label class="flex flex-col sm:flex-row"> Confirm Password <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"><?php echo $confirm_password_err; ?></span> </label> <input type="password" name="confirm_password" class="input w-full border mt-2" placeholder="secret" minlength="8" required> </div>
                                        
                                            
                                           <button type="submit" name="save" class="button bg-theme-1 text-white mt-5">Save / Change</button>
                                        </form>
                            </div>
                        </div>
                        <!-- END: Daily Sales -->
                     
                    </div>
                </div>
            </div>
            
            <!-- END: Content -->
        <?php include('footer.php'); ?>