<div class="intro-y datatable-wrapper box p-5 mt-5">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">


                    <table class="table table-report table-report--bordered display datatable w-full dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width:auto;">
                        <thead>
                            <tr role="row"><th class="border-b-2 whitespace-no-wrap sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 144px;" aria-sort="ascending" aria-label="PRODUCT NAME: activate to sort column descending">Amount Deposited</th><th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 112px;" aria-label="IMAGES: activate to sort column ascending">Old Balance</th><th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 124px;" aria-label="REMAINING STOCK: activate to sort column ascending">New Balance</th><th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 120px;" aria-label="STATUS: activate to sort column ascending">Deposit Date</th></tr>
                        </thead>
                        <tbody>
                            
                            <?php 

                            $userid=$_SESSION['id'];
$getinvestment=mysqli_query($link,"SELECT * FROM `deposit` WHERE `cust_id`='$userid' ORDER BY `date` desc");
while($investmentrow=mysqli_fetch_array($getinvestment)){
                            ?>
                        <tr role="row" class="odd">
                                <td class="border-b sorting_1" tabindex="0">
                                    <div class="font-medium whitespace-no-wrap">
                                        <?php
                                        echo $investmentrow['amount_added'];

                                        ?>

                                     </div>
                                    <div class="text-gray-600 text-xs whitespace-no-wrap">Beacon Bank International</div>
                                </td>
                                <td class="text-center border-b">
                               
                                          
   <?php echo $investmentrow['oldbalance']; ?>
                                                
                                      
                                    
                                </td>
                                <td class="text-center border-b"><?php echo $investmentrow['balance']; ?></td>
                                <td class="w-40 border-b">
                                    <div class="flex items-center sm:justify-center text-theme-9"> 

                                      <?php echo $investmentrow['date']; ?>

</a>
                                    </div>
                                </td>
                        
                            </tr>

                         <?php } ?>
                        </tbody>
                    </table>

                </div>