<?php
include('header.php');
if(isset($_POST['submit1'])){

 $user = mysqli_real_escape_string($link,$_POST['user']);
    $accno = mysqli_real_escape_string($link,$_POST['accno']);
?>
<div class="intro-y datatable-wrapper box p-5 mt-5">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">

                    </div>

                    <h2 class="panel-title">Details of the Internal Account You Want To Credit</h2> <br/>

                 
                </header>
                <!-- Modal Form -->

                    

                <div class="panel-body">
                    
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
    <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            <form method='post' action='maketransfer.php'>
                        <?php
                        $t=1;
                        $query=mysqli_query($link,"SELECT * FROM `accounts` WHERE `account_number` LIKE '$accno' order by id ASC")
                        or die(mysqli_error($link));
                        while($row=mysqli_fetch_array($query)){

                        ?>
                        <tr class="gradeX">
                            <th>Name</th>
                                
                            <td class="center"><a class="text" href="viewprofile.php?userid=<?php echo $row['id']; ?>"><?php echo strtoupper($row['first_name'].' '.$row['middle_name'].' '.$row['last_name']); ?></a></td>
                            </tr>
                             <tr class="gradeX">
                            <th>Account Number</th>
                            <td class="center"><?php echo $row['account_number']; ?></td>
                            </tr>
                             <tr class="gradeX">
                            <th>Amount To be Transfered</th>
                            <td class="center">
                                
                                <input type='hidden' name='account_number' value='<?php echo $row['account_number']; ?>' required/>
                                
                                <input type='number' name='amount' placeholder='enter amount' required/>
                                </td>
                                </tr>
                                 <tr class="gradeX">
                            <th>Account Password / Authourization</th>
                                 <td class="center">
                            
                                <input type='password' name='password' placeholder='enter your password' required/>
                                </td>
                                </tr>
                                 <tr class="gradeX">
                                <td colspan='2'>
                        <center><input type='submit' name='transfer' class="button text-white bg-theme-1 shadow-md mr-2" value='Credit / Transfer'></center>
                       
                        </td>
                           
                                
                        </tr>
                         </form>
                    
<?php }
}
include('footer.php'); ?>