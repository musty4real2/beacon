 <div class="grid grid-cols-12 gap-6">
                    <!-- BEGIN: Profile Menu -->
                    <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
                        <div class="intro-y box mt-5">
                            <div class="relative flex items-center p-5">
                                <div class="w-12 h-12 image-fit">
                                    <img alt="partna" class="rounded-full" src="https://account.beaconbankinternational.com/uploads/<?php echo $object->getUserPhoto($_SESSION['id']) ?>">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium text-base"><?php echo $firstName.' '.$lastName; ?></div>
                                    <div class="text-gray-600"><?php echo $arow['email']; ?></div>
                                </div>
                                <div class="dropdown relative">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal w-5 h-5 text-gray-700"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg> </a>
                                  
                                </div>
                            </div>
                            <div class="p-5 border-t border-gray-200">
                                <a class="flex items-center text-theme-1 font-medium" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity w-4 h-4 mr-2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg> Personal Information </a>
                                <a class="flex items-center mt-5" href="bankaccount.php"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box w-4 h-4 mr-2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg> Bank Account </a>
                                <a class="flex items-center mt-5" href="changepassword.php"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock w-4 h-4 mr-2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> Change Password </a>
                              
                            </div>
                  
                           
                        </div>
                        
                    </div>
                    <!-- END: Profile Menu -->

                    <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
                        <!-- BEGIN: Daily Sales -->
                        <div class="intro-y box lg:mt-5">
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                
                                </h2>
                               
                               
                            </div>
                            

                