<?php include('header.php'); 

$remarks = "you visited the all withdrawal lists area";//audit log message

    mysqli_query($link, "INSERT INTO history_log(user_id,action,date) VALUES('{$_SESSION['user']}','$remarks',NOW())") or die(mysqli_error($link));
?>
            <!-- BEGIN: Content -->
 
              <!-- ////////////here goes the content////////// -->
  <!-- BEGIN: General Report -->
  
<!-- END: General Report -->
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            List Of All Withdrawals
        </h2>
      </div>
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
       <?php include('investmentlist.php'); ?>
    </div>
            </div>
            <?php include('footer.php'); ?>