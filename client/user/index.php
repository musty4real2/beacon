
     <?php include('header.php'); 
 $remarks = "you visited the statistics area";//audit log message

    mysqli_query($link, "INSERT INTO history_log(user_id,action,date) VALUES('{$_SESSION['id']}','$remarks',NOW())") or die(mysqli_error($link));
     ?>
  <!-- BEGIN: General Report -->
  <div class="col-span-12 mt-8">
    <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            Summary
        </h2>
        <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i> 
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="Current Account Balance">
                                <?php echo $arow['cur_type'].number_format($object->getOldBalance($_SESSION['id'],2)); ?> </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6"><?php echo $arow['cur_type'].number_format($object->getBalance($_SESSION['id']),2); ?></div>
                    <div class="text-base text-gray-600 mt-1">My Account Balance</div>



                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="credit-card" class="report-box__icon text-theme-11"></i> 
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer" title="Total Deposits So Far"> <?php echo $arow['cur_type'].number_format($object->getLastDeposit($_SESSION['id'])); ?><i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6"><?php echo $arow['cur_type'].number_format($object->getTotalDeposit($_SESSION['id']),2); ?></div>
                    <div class="text-base text-gray-600 mt-1">My Total Deposits</div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="monitor" class="report-box__icon text-theme-12"></i> 
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title=""> <?php echo $arow['cur_type'].number_format($object->getTotalWithdrawal($_SESSION['id'])); ?> <i data-feather="chevron-down" class="w-4 h-4"></i> </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6"><?php echo $arow['cur_type'].number_format($object->getTotalWithdrawal($_SESSION['id']),2);

                     ?></div>
                    <div class="text-base text-gray-600 mt-1">My Total Withdrawals </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
            <div class="report-box zoom-in">
                <div class="box p-5">
                    <div class="flex">
                        <i data-feather="user" class="report-box__icon text-theme-9"></i> 
                        <div class="ml-auto">
                            <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title=""> <?php echo $arow['cur_type'].number_format(50,2); ?> <i data-feather="chevron-down" class="w-4 h-4"></i> </div>
                        </div>
                    </div>
                    <div class="text-3xl font-bold leading-8 mt-6"><?php echo $arow['cur_type'].number_format($arow['minimum'],2); ?></div>
                    <div class="text-base text-gray-600 mt-1">Active Tansfer Limit </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Deposits
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            
            
            
        </div>
    </div>
<div class="intro-y flex flex-col sm:flex-row items-center mt-4">
        <!-- BEGIN: Projects Layout -->
   <?php include('projectlist.php'); ?>

                   
                   
               
        <!-- END: Blog Layout -->
      </div>
    
<!-- END: General Report -->
<div class="col-span-12 xxl:col-span-3 xxl:border-l border-theme-5 -mb-10 pb-10">
    
</div>
            </div>
           <?php include('footer.php'); ?>