<?php include('header.php'); ?>
                <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                    List of All Transfer Made 
                    </h2>
                    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                       
                         <div class="mt-3">
                       
                       
                    </div> 
                  
                        
                        <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview"  class="button text-white bg-theme-1 shadow-md mr-2" style='background-color:green;'>Same Bank Transfer</a>
                        <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview2"  class="button text-white bg-theme-1 shadow-md mr-2" style='background-color:red;'>Other Bank Transfer</a>
                        
                    </div>
                    
                    
    </div>
                
                
                <!-- BEGIN: Datatable -->
         <div class="intro-y datatable-wrapper box p-5 mt-5">
             
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">


                    <table class="table table-report table-report--bordered display datatable w-full dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 816px;">
                        <thead>
                            <tr role="row"><th class="border-b-2 whitespace-no-wrap sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 144px;" aria-sort="ascending" aria-label="PRODUCT NAME: activate to sort column descending">Account Name</th><th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 112px;" aria-label="IMAGES: activate to sort column ascending">Account Number</th><th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 124px;" aria-label="REMAINING STOCK: activate to sort column ascending">Transfer Amount </th>
                            
                            <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 120px;" aria-label="STATUS: activate to sort column ascending">STATUS</th>
                            
                            <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 120px;" aria-label="STATUS: activate to sort column ascending">Bank Name</th>
                            
                            <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 116px;" aria-label="ACTIONS: activate to sort column ascending">Sort code/ ABA code</th></tr>
                        </thead>
                        <tbody>
                            
                            <?php 
$remarks = "you visited the Portfolio area";//audit log message

    mysqli_query($link, "INSERT INTO history_log(user_id,action,date) VALUES('{$_SESSION['id']}','$remarks',NOW())") or die(mysqli_error($link));



                            $userid=$_SESSION['id'];
$getinvestment=mysqli_query($link,"SELECT * FROM `otherbank` WHERE `user_id`='$userid' ORDER BY `entry_date` desc");
while($investmentrow=mysqli_fetch_array($getinvestment)){
                            ?>
                        <tr role="row" class="odd">
                                <td class="border-b sorting_1" tabindex="0">
                                    <div class="font-medium whitespace-no-wrap">
                                        <?php
                                        echo $investmentrow['account_name'];

                                        ?>

                                     </div>
                            
                                </td>
                                <td class="text-center border-b">
                                    <div class="flex sm:pl-8">
                                           <?php
                                        echo $investmentrow['account_number'];

                                        ?>
                                      
                                    </div>
                                </td>
                                <td class="text-center border-b"><?php
                                        echo $investmentrow['transfer_amount'];

                                        ?></td>
                                <td class="w-40 border-b">
                                    <div class="flex items-center sm:justify-center text-theme-9"> 

                                      <?php
                                        echo $investmentrow['status'];

                                        ?>
</a>
                                    </div>
                                </td>
                                <td class="border-b w-5">
                                    <div class="flex sm:justify-center items-center">
                                      <?php
                                        echo $investmentrow['bankname'];

                                        ?>
                                      
                                    </div>
                                </td>
                                  <td class="border-b w-5">
                                    <div class="flex sm:justify-center items-center">
                                      <?php
                                        echo $investmentrow['sortcode'];

                                        ?>
                                      
                                    </div>
                                </td>
                            </tr>




      
    </div>
            </div>

                         <?php } ?>
                        </tbody>
                    </table>

                </div>
                <!-- END: Datatable -->
            </div>
            
            <div class="modal" id="header-footer-modal-preview">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto"> Same Bank Transfer <?php echo strtoupper($object->getUsername($_SESSION['id'])); ?></h2>
       <form action="processinterbank.php" class="form-horizontal mb-lg" enctype="multipart/form-data" method="POST">
               </div>

       
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            <div class="col-span-12 sm:col-span-12">
 
                <label>Beacon Account Number For Reciever</label>
                
                <input type="hidden" name="user" class="input w-full border mt-2 flex-1" value="<?php echo $_SESSION['id']; ?>">

                <input type="text" name="accno" class="input w-full border mt-2 flex-1" placeholder="20000000XXXXXXXX" required> 
                
            </div>
       
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200">
           
            <button type="reset" class="button w-20 border text-gray-700 mr-1">Cancel</button>
            <input type="submit" name="submit1" class="button w-20 bg-theme-1 text-white" value="NEXT">
        </div>
    </div>
    </form>
</div> 
      
    </div>
            </div>
            
             <div class="modal" id="header-footer-modal-preview2">
    <div class="modal__content">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto"><?php echo strtoupper($object->getUsername($_SESSION['id'])); ?> Other Bank Transfer </h2>
       <form action="processotherbank.php" class="form-horizontal mb-lg" enctype="multipart/form-data" method="POST">
               </div>

       
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
            <div class="col-span-12 sm:col-span-12">
  <label> Account Name at Reciever Bank</label>
  <input type="hidden" name='username' value='<?php echo $object->getUserAccno($_SESSION['id']); ?>' />
                <input type="text" name="accname" class="input w-full border mt-2 flex-1" placeholder="e.g jetx" required> 
                <label>Account Number of Reciever</label>
                
                <input type="text" name="accno" class="input w-full border mt-2 flex-1" placeholder="20000000XXXXXXXX" required> 
                 <label>Bank Name</label>
                <input type="text" name="bankname" class="input w-full border mt-2 flex-1" placeholder="" required> 
                
                 <label>Sort Code /ABA Number</label>
                <input type="text" name="sortcode" class="input w-full border mt-2 flex-1" placeholder="" required> 
                
                 <label>Transfer Amount</label>
                <input type="text" name="amount" class="input w-full border mt-2 flex-1" placeholder="100" required> 
                
                
                  <label>Password</label>
                <input type="password" name="password" class="input w-full border mt-2 flex-1" required> 
            </div>
       
        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200">
           
            <button type="reset" class="button w-20 border text-gray-700 mr-1">Cancel</button>
            <input type="submit" name="submit1" class="button w-20 bg-theme-1 text-white" value="Commit">
        </div>
    </div>
    </form>
</div> 
      
    </div>
            </div>
             
            <?php include('footer.php'); ?>