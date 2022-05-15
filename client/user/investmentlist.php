<div class="intro-y datatable-wrapper box p-5 mt-5">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">


                    <table class="table table-report table-report--bordered display datatable w-full dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width:auto;">
                        <thead>
                            <tr role="row"><th class="border-b-2 whitespace-no-wrap sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 144px;" aria-sort="ascending" aria-label="PRODUCT NAME: activate to sort column descending">Amount Removed</th>
                            <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 112px;" aria-label="IMAGES: activate to sort column ascending">Old Balance</th><th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 124px;" aria-label="REMAINING STOCK: activate to sort column ascending">New Balance</th>
                            <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 120px;" aria-label="STATUS: activate to sort column ascending">Withrawal Date</th>
                            <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 120px;" aria-label="STATUS: activate to sort column ascending">Withrawal Time</th>
                            
                            <th class="border-b-2 text-center whitespace-no-wrap sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 120px;" aria-label="STATUS: activate to sort column descending">Withrawal Narration</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 

                            $userid=$_SESSION['id'];
$getinvestment=mysqli_query($link,"SELECT * FROM `withdraw` WHERE `cust_id`='$userid' ORDER BY `id` DESC");
while($investmentrow=mysqli_fetch_array($getinvestment)){
                            ?>
                        <tr role="row" class="odd">
                                <td class="border-b sorting_1" tabindex="0">
                                  
                                        <?php
                                        echo $investmentrow['amount_removed'];

                                        ?>

                                     
                                </td>
                                <td class="text-center border-b">
                               
                                          
   <?php echo $investmentrow['oldbalance']; ?>
                                                
                                      
                                    
                                </td>
                                <td class="text-center border-b"><?php echo $investmentrow['balance']; ?></td>
                                <td class="w-40 border-b">
                                    

                                      <?php echo $investmentrow['date']; ?>

</a>
                                    
                                </td>
                                
                                <td class="w-40 border-b">
                                    

                                      <?php echo $investmentrow['time']; ?>

</a>
                                </td>
                                
                                <td class="w-40 border-b">
                                  

                                      <?php echo $investmentrow['narration']; ?>

</a>
                                </td>
                     
                            </tr>

                         <?php } ?>
                        </tbody>
                    </table>

                </div>