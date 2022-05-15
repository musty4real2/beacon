<?php include('header.php'); 


$remarks = "you visited the user profile area";//audit log message

    mysqli_query($link, "INSERT INTO history_log(user_id,action,date) VALUES('{$_SESSION['id']}','$remarks',NOW())") or die(mysqli_error($link));
?>
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Profile Layout
                    </h2>
                </div>
               <?php
               include('center.php');
?>
<div class="p-5">

                                    <form class="validate-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                            <div> <label class="flex flex-col sm:flex-row"> Firstname  </label> 
                                                <input type="text" name="name" class="input w-full border mt-2" value="<?php echo $firstName ?>" minlength="2" disabled> </div>

                                                  <div> <label class="flex flex-col sm:flex-row"> Lastname  </label> 
                                                <input type="text" name="name" class="input w-full border mt-2" value="<?php echo $lastName ?>" minlength="2" disabled> </div>

                                            <div class="mt-3"> <label class="flex flex-col sm:flex-row"> Email 
                                             </label> 
                                             <input type="email" name="email" class="input w-full border mt-2" value="<?php echo $arow['email']; ?>" disabled> </div>
                                            <div class="mt-3"> <label class="flex flex-col sm:flex-row"> Date Of Birth <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> 
                                                <input type="date" name="dob" class="input w-full border mt-2"  minlength="8" value='<?php echo strtoupper($arow['dob']); ?>' disabled> 
                                            </div>
                                               <div class="mt-3"> <label class="flex flex-col sm:flex-row"> Gender <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"><?php echo $dob_err; ?></span> </label> 
                                                <input type="text" name="dob" class="input w-full border mt-2"  minlength="8" value='<?php echo strtoupper($arow['gender']); ?>' disabled> 
                                            </div><br/>
                                            <div class="mt-3"> <label class="flex flex-col sm:flex-row"> Phone Number<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span></span> </label> <input type="text" name="phone" class="input w-full border mt-2" placeholder="080000000000000" value="<?php echo strtoupper($arow['phone']); ?>" disabled> </div>

                                             <div class="mt-3"> <label class="flex flex-col sm:flex-row"> Postal Code<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> <input type="text" name="postal" class="input w-full border mt-2" placeholder="civil eng" value="<?php echo $arow['postal_code'];; ?>" disabled> </div>

                                              <div class="mt-3"> <label class="flex flex-col sm:flex-row"> Occupation<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> <input type="text" name="occupation" class="input w-full border mt-2" placeholder="" value="<?php echo strtoupper($arow['occupation']); ?>" disabled> </div>

                                            <div class="mt-3"> <label class="flex flex-col sm:flex-row"> Address <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> <textarea class="input w-full border mt-2" name="address" placeholder="Type your address" minlength="10" disabled><?php echo strtoupper($arow['address']); ?></textarea> </div>
 <div class="mt-3"> <label class="flex flex-col sm:flex-row"> Country<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> <input type="text" name="country" class="input w-full border mt-2" placeholder="" value="<?php echo strtoupper($arow['country']);
 ?>" disabled> </div>
  <div class="mt-3"> <label class="flex flex-col sm:flex-row"> State<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"><?php echo $country_err; ?></span> </label> <input type="text" name="country" class="input w-full border mt-2" placeholder="" value="<?php echo strtoupper($arow['state']);
 ?>" disabled> </div>

  <div class="mt-3"> <label class="flex flex-col sm:flex-row"> City<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> <input type="text" name="city" class="input w-full border mt-2" placeholder="" value="<?php echo strtoupper($arow['city']); ?>" disabled> </div>



 <div class="mt-3"> <label class="flex flex-col sm:flex-row"> Fax<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> <input type="text" name="country" class="input w-full border mt-2" placeholder="" value="<?php echo $arow['fax'];
 ?>" disabled> </div>
 
 
 
  <div class="mt-3"> <label class="flex flex-col sm:flex-row"> ID type<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> <input type="text" name="country" class="input w-full border mt-2" placeholder="" value="<?php echo strtoupper($arow['id_type']);
 ?>" disabled> </div>
 
  <div class="mt-3"> <label class="flex flex-col sm:flex-row"> ID Number<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> <input type="text" name="country" class="input w-full border mt-2" placeholder="" value="<?php echo $arow['id_number'];
 ?>" disabled> </div>
 
 <div class="mt-3"> <label class="flex flex-col sm:flex-row"> ID type<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> <input type="text" name="country" class="input w-full border mt-2" placeholder="" value="<?php echo $arow['id_expdate'];
 ?>" disabled> </div>
 
 
  <div class="mt-3"> <label class="flex flex-col sm:flex-row"> Company <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> <input type="text" name="kinfirstname" class="input w-full border mt-2" placeholder="Doe" disabled value="<?php echo strtoupper($arow['company_name']); ?>"> </div>

   <div class="mt-3"> <label class="flex flex-col sm:flex-row"> Annual Income<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> <input type="text" name="relationship" value="<?php echo strtoupper($arow['annual_income']); ?>" class="input w-full border mt-2" placeholder="Father" disabled> </div>

    <div class="mt-3"> <label class="flex flex-col sm:flex-row">Minimun / Limit<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> <input type="text" name="kinphone" value="<?php echo $arow['minimum']; ?>" class="input w-full border mt-2" placeholder="080000000000000" disabled> </div>
    
    
        <div class="mt-3"> <label class="flex flex-col sm:flex-row">Currency Type<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600"></span> </label> <input type="text" name="kinphone" value="<?php echo $arow['cur_type']; ?>" class="input w-full border mt-2" placeholder="080000000000000" disabled> </div>

                         </form>

        
                            </div>
                        </div>
                        <!-- END: Daily Sales -->
                     
                    </div>
                </div>
            </div>
            
         <?php include('footer.php'); ?>