<?php include('header.php'); ?>
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Profile Layout
                    </h2>
                </div>
                
                          <?php include('center.php'); ?>
                            <div class="p-5">

                                <h2 class="font-medium text-base mr-auto">
                                    Account Details
                                </h2>
                                    <form class="validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                            <div>
                                                
                                                <div class="mt-3">
                                                 <label class="flex flex-col sm:flex-row"> Account Currency Type  </label> <input type="text" name="accname" class="input w-full border mt-2" placeholder="John Legend" minlength="2" Disabled value="<?php echo $arow['cur_type']; ?>">
                                            </div>
                                                <div class="mt-3">
                                                 <label class="flex flex-col sm:flex-row"> Account Type  </label> <input type="text" name="accname" class="input w-full border mt-2" placeholder="John Legend" minlength="2" Disabled value="<?php echo strtoupper($arow['acc_type']); ?>">
                                            </div>
                                            <div class="mt-3"> 
                                                <label class="flex flex-col sm:flex-row"> Account Number <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"><?php echo $accnumber_err; ?></span> </label> <input type="text" name="accnumber" class="input w-full border mt-2" placeholder="ten digit number" disabled value="<?php echo $arow['account_number']; ?>"> </div>
                                            <div class="mt-3">
                                                    <label class="flex flex-col sm:flex-row"> Transfer Limit / Minimum <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"><?php echo $bank_err; ?></span> </label> <input type="text" name="bank" class="input w-full border mt-2" placeholder="Access Bank" disabled value="<?php echo $arow['minimum']; ?>"> 
                                                </div>
                                               
                                        </form>
                           
                            </div>
                        </div>
                        <!-- END: Daily Sales -->
                     
                    </div>
                </div>
            </div>
            
            <!-- END: Content -->
        <?php include('footer.php'); ?>