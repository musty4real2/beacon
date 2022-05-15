<?php
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
require_once "config.php";

$query  = "SELECT * FROM country";
$result = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Beacon Bank International </title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
 <link rel="stylesheet" href="css/intlTelInput.css">
  <link rel="stylesheet" href="css/demo.css">
    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <script language="javascript" type="text/javascript">

//fuction to return the xml http object
function getXMLHTTP() { 
    var xmlhttp = false;    
    try {
        xmlhttp = new XMLHttpRequest();
    } catch(e) {        
        try {           
            xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
        } catch(e) {
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e1) {
                xmlhttp = false;
            }
        }
    }
        
    return xmlhttp;
}
    
function getState(countryId) {      
    var strURL = "findState.php?country="+countryId;
    var req    = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {                        
                    document.getElementById('statediv').innerHTML=req.responseText;
                    document.getElementById('citydiv').innerHTML='<select name="city">'+
                    '<option>Select City</option>'+
                    '</select>';                        
                } else {
                    alert("Problem while using XMLHTTP:\n" + req.statusText);
                }
            }               
        }           
        req.open("GET", strURL, true);
        req.send(null);
    }       
}

</script>

<style type="text/css">
    
    .select-css {
    display: block;
    font-size: 16px;
    font-family: sans-serif;
    font-weight: 700;
    color: #444;
    line-height: 1.3;
    padding: .6em 1.4em .5em .8em;
    width: 100%;
    max-width: 100%;
    box-sizing: border-box;
    margin: 0;
    border: 1px solid #aaa;
    box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
    border-radius: .5em;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
    background-color: #fff;
    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
      linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
    background-repeat: no-repeat, repeat;
    background-position: right .7em top 50%, 0 0;
    background-size: .65em auto, 100%;
}
.select-css::-ms-expand {
    display: none;
}
.select-css:hover {
    border-color: #888;
}
.select-css:focus {
    border-color: #aaa;
    box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
    box-shadow: 0 0 0 3px -moz-mac-focusring;
    color: #222;
    outline: none;
}
.select-css option {
    font-weight:normal;
}

 .required:after {
    content:" *";
    color: red;
}


.has-error .help-block,
.has-error .control-label,
.has-error .radio,
.has-error .checkbox,
.has-error .radio-inline,
.has-error .checkbox-inline,
.has-error.radio label,
.has-error.checkbox label,
.has-error.radio-inline label,
.has-error.checkbox-inline label {
  color: #ac1818;
}
.has-error .form-row {
  border-color: #ac1818;
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}
.has-error .form-row:focus {
  border-color: #7f1212;
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #e54545;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #e54545;
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 6px #e54545;
}
.has-error .input-group-addon {
  color: #ac1818;
  border-color: #ac1818;
  background-color: #ffc9c9;
}
.has-error .form-row-feedback {
  color: #ac1818;
}
</style>
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Account Opening Form</h2>
                </div>
                <div class="card-body">

                   <?php
// Include config file

 
// Define variables and initialize with empty values
$firstname = $lastname=$gender=$marital=$dob=$email =$phone=$time =$address =$country =$state =$city =$postal=$fax=$identity =$idnumber =$idexpdate =$occupation =$companyname =$acctype =$curtype =$annualincome=$password=$cpassword =$middlename= "";


$firstname_err = $lastname_err=$gender_err=$marital_err=$dob_err=$email_err =$phone_err =$time_err =$address_err =$country_err =$state_err =$city_err =$postal_err=$fax_err=$identity_err =$idnumber_err =$idexpdate_err =$occupation_err =$companyname_err =$acctype_err =$curtype_err =$annualincome_err=$password_err=$cpassword_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

$mname=trim($_POST["mname"]);

if(empty(trim($_POST["annualincome"]))){
        $annualincome_err = "Please input a account type.";     
    }  else{
        $annualincome = trim($_POST["annualincome"]);
    }

if(empty(trim($_POST["curtype"]))){
        $curtype_err = "Please input account current type.";     
    }  else{
        $curtype = trim($_POST["curtype"]);
    }

if(empty(trim($_POST["acctype"]))){
        $acctype_err = "Please input a account type.";     
    }  else{
        $acctype = trim($_POST["acctype"]);
    }

if(empty(trim($_POST["companyname"]))){
        $companyname_err = "Please input a companyname.";     
    }  else{
        $companyname = trim($_POST["companyname"]);
    }

if(empty(trim($_POST["occupation"]))){
        $occupation_err = "Please input an occupation.";     
    }  else{
        $occupation = trim($_POST["occupation"]);
    }

if(empty(trim($_POST["idexpdate"]))){
        $idexpdate_err = "Please input an identity expiration date.";     
    }  else{
        $idexpdate = trim($_POST["idexpdate"]);
    }

if(empty(trim($_POST["idnumber"]))){
        $idnumber_err = "Please input an identity number.";     
    }  else{
        $idnumber = trim($_POST["idnumber"]);
    }

if(empty(trim($_POST["identity"]))){
        $identity_err = "Please select an identity card type.";     
    }  else{
        $identity = trim($_POST["identity"]);
    }

if(empty(trim($_POST["fax"]))){
        $fax_err = "Please input a fax number.";     
    }  else{
        $fax = trim($_POST["fax"]);
    }

if(empty(trim($_POST["postalcode"]))){
        $postal_err = "Please input a postalcode.";     
    }  else{
        $postal = trim($_POST["postalcode"]);
    }
if(empty(trim($_POST["city"]))){
        $city_err = "Please input a city.";     
    }  else{
        $city = trim($_POST["country"]);
    }
if(empty(trim($_POST["state"]))){
        $state_err = "Please select a state.";     
    }  else{
        $state = trim($_POST["state"]);
    }

if(empty(trim($_POST["country"]))){
        $country_err = "Please select a country.";     
    }  else{
        $country = trim($_POST["country"]);
    }

if(empty(trim($_POST["address1"]))){
        $address_err = "Please input ab address.";     
    }  else{
        $address = trim($_POST["address1"]);
    }


if(empty(trim($_POST["calltime"]))){
        $time_err = "Please select call time.";     
    }  else{
        $time = trim($_POST["calltime"]);
    }

if(empty(trim($_POST["phone"]))){
        $phone_err = "Please input phone number.";     
    }  else{
        $phone = trim($_POST["phone"]);
    }


if(empty(trim($_POST["dob"]))){
        $dob_err = "Please pick date of birth.";     
    }  else{
        $dob = trim($_POST["dob"]);
    }


if(empty(trim($_POST["maritalstatus"]))){
        $marital_err = "Please select marital status.";     
    }  else{
        $marital = trim($_POST["maritalstatus"]);
    }


 if(empty(trim($_POST["sex"]))){
        $gender_err = "Please select gender.";     
    }  else{
        $gender = trim($_POST["sex"]);
    }




 if(empty(trim($_POST["lname"]))){
        $lastname_err = "Please input last name.";     
    }  else{
        $lastname = trim($_POST["lname"]);
    }


  if(empty(trim($_POST["fname"]))){
        $firstname_err = "Please input first name.";     
    }  else{
        $firstname = trim($_POST["fname"]);
    }


    // Validate username
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email address.";
    } else{
        // Prepare a select statement
        $sql = "SELECT email FROM accounts WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email address have already been used.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                //echo "";
                echo "<script type='text/javascript'>alert('Oops! Something went wrong. Please try again later. !!!');</script>";
                echo "<script>window.location='index.php'</script>"; 
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_err = "Password must have atleast 8 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["cpassword"]))){
        $ccpassword_err = "Please confirm password.";     
    } else{
        $cpassword = trim($_POST["cpassword"]);
        if(empty($password_err) && ($password != $cpassword)){
            $cpassword_err = "Password did not match.";
        }
    }
   
    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($gender_err) && empty($marital_err) && empty($dob_err) && empty($email_err) && empty($phone_err) && empty($time_err) && empty($address_err) && empty($country_err) && empty($state_err) && empty($city_err) && empty($postal_err) && empty($fax_err) && empty($identitiy_err) && empty($idnumber_err) && empty($idexpdate_err) && empty($occupation_err) && empty($companyname_err) && empty($acctype_err) && empty($curtype_err) && empty($annualincome_err) && empty($password_err) && empty($cpassword_err)  ){
        $valid=1;
   $path = $_FILES['photo']['name'];
    $path_tmp = $_FILES['photo']['tmp_name'];

    if($path == '') {
        $valid = 0;
        echo "<script type='text/javascript'>alert('You must have to select a picture of you !!!');</script>";
    } else {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_namephoto = basename( $path, '.' . $ext );
        if(  $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif') {
            $valid = 0;
            $error_message .= 'Only these files are allowed: jpg<br>';
            echo "<script type='text/javascript'>alert('Only these files are allowed:jpg,png,jpeg');</script>";
        }

         if($valid == 1) {
                $ai_id=date('Ydmhis');
//$final_name = 'audio-'.$ai_id.'.'.$ext;
$final_name=$path;
$minimum=0;
$status=0;
          move_uploaded_file( $path_tmp, 'uploads/'.$final_name);

          $rand4 = rand(0000, 9999);

$accno = $rand4.time();


$check = mysqli_query($link,"SELECT * FROM accounts WHERE account_number='$accno'");

if (mysqli_num_rows($check)==0) {
    
    $param_password = password_hash($password, PASSWORD_DEFAULT);
        // Prepare an insert statement
$sql = "INSERT INTO accounts (`first_name`, `middle_name`, `last_name`, `gender`, `marital_status`, `dob`, `email`, `phone`, `time_to_call`, `address`, `country`, `state`, `city`, `postal_code`, `fax`, `id_type`, `id_number`, `id_expdate`, `occupation`, `company_name`, `acc_type`, `cur_type`, `annual_income`, `secret`, `photo`, `account_number`, `minimum`, `status`,`balance`,`entry_date`) VALUES ('$firstname', '$mname', '$lastname','$gender','$marital','$dob','$email','$phone','$time','$address','$country','$state','$city','$postal','$fax','$identity','$idnumber','$idexpdate','$occupation','$companyname','$acctype','$curtype','$annualincome','$param_password','$final_name','$accno','0','0','',NOW())";


        //$sql = "INSERT INTO users (username, password,role) VALUES (?, ?,?)";


         
        if($stmt = mysqli_query($link, $sql)){
      
            if($stmt){
              
              require_once "PHPMailer/PHPMailer.php";
	        require_once "PHPMailer/Exception.php";

	        $mail = new PHPMailer();
	        $mail->addAddress($email);
	        $mail->setFrom("donotreply@beaconbankinternational.com", "Account Department");
	        $mail->Subject = "Beacon Bank International Welcomes $firstname";
	        $mail->isHTML(true);
	        $mail->Body = "
	            Hi, $firstname<br>
	            
	            We are happy about your onbounding to one of the world most efficient yet amazing bank online, please click on the link below to learn more:<br>
	            <a href='beaconbankinternational.com'>https://beaconbankinternational.com</a><br><br>
	            Your Number/ Username is: $accno<br/>
	            Account Access Status:Pending/ Not Allowed to login<br/>
	            
	            an official mail would be sent to you when your account is fully
	            ready<br/>
	            
	            Kind Regards,<br>
	            Beaconbankinternational.com
	        ";

	        if ($mail->send()){
    	            echo "<script type='text/javascript'>alert('You application form have been Successfully submitted You would be contacted via email for further instructions!!!');</script>";
    echo "<script>window.location='index.php'</script>";
    
    	    }
           
            } else{
              //  echo "";

                echo "<script type='text/javascript'>alert('Something went wrong. Please try again later. !!!');</script>";
    echo "<script>window.location='index.php'</script>";
            }
        }
         
    }
    
    // Close connection
    mysqli_close($link);
}
}
}
}
?>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="POST" enctype="multipart/form-data" name="form1">
                        <div class="form-row <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                            <div class="name required">First name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="fname" value="<?php echo $firstname; ?>" required>
                                <span class="help-block"><?php echo $firstname_err; ?></span>
                            </div>
                        </div>
                          <div class="form-row">
                            <div class="name">Middle name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" value="<?php echo $middlename; ?>" name="mname">
                            </div>
                        </div>
                          <div class="form-row <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Last name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="lname" value="<?php echo $lastname; ?>" required>
                                    <span class="help-block"><?php echo $lastname_err; ?></span>
                            </div>
                        </div>

                          <div class="form-row <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Gender / Sex</div>
                            <div class="value">
                                <select class="select-css" name='sex' required>
                                    <option value='<?php echo $gender; ?>'>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                             <span class="help-block"><?php echo $gender_err; ?></span>
                            
                            </div>
                        </div>

                        <div class="form-row <?php echo (!empty($marital_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Marital Status</div>
                            <div class="value">
                                <select class="select-css" name='maritalstatus' required>
                                    <option value='<?php echo $marital; ?>'>Select Marital Status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                             <span class="help-block"><?php echo $marital_err; ?></span>
                            </div>
                        </div>

                        <div class="form-row <?php echo (!empty($dob_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Date of Birth</div>
                            <div class="value">
                            <input type="date" name="dob" required>
                             <span class="help-block"><?php echo $dob_err; ?></span>

                            </div>
                        </div>
                        <div class="form-row <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Email address</div>
                            <div class="value">
                                <div class="input-group">
             <input class="input--style-6" type="email" name="email" placeholder="abc123@email.com" required>
                                    <span class="help-block"><?php echo $email_err; ?></span>
                                </div>
                            </div>
                        </div>


   <div class="form-row <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Phone Number</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" id="phone" name="phone" type="tel" required>
                                     <span class="help-block"><?php echo $phone_err; ?></span>
                                </div>
                            </div>
                        </div>

   <div class="form-row <?php echo (!empty($time_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Preferred time to call</div>
                            <div class="value">
                                <select class="select-css" name='calltime' required>
                                    <option value='<?php echo $time; ?>'>Select Time</option>
                                    <option value="12:00am-03:00am">12:00am-03:00am</option>
                                    <option value="03:00am-06:00am">03:00am-06:00am</option>
                                    <option value="06:00am-09:00am">06:00am-09:00am</option>
                                    <option value="09:00am-12:00pm">09:00am-12:00pm</option>
                                    <option value="12:00pm-03:00pm">12:00pm-03:00pm</option>
                                     <option value="03:00pm-06:00pm">03:00pm-06:00pm</option>
                                     <option value="03:00pm-06:00pm">06:00pm-09:00pm</option>
                                     <option value="09:00pm-12:00am">09:00pm-12:00am</option>
                                </select>
                              <span class="help-block"><?php echo $time_err; ?></span>
                            </div>
                        </div>

                        <div class="form-row <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Address 1</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="address1" placeholder="Address Line 1" required></textarea>
                                    <span class="help-block"><?php echo $address_err; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row <?php echo (!empty($country_err)) ? 'has-error' : ''; ?>">

<div class="name  required">Country</div>
                            <div class="value">
                                <select class="select-css" name='country' onChange="getState(this.value)" required>
                                   <option value='<?php echo $country; ?>'>Select Country</option>
                     <?php while ($row=mysqli_fetch_array($result)) { ?>
                     <option value=<?php echo $row['id']?>><?php echo $row['country']?></option>
                     <?php } ?>
                                  
                                </select>
                             <span class="help-block"><?php echo $country_err; ?></span>
                            </div>
                        </div>
<div class="form-row <?php echo (!empty($state_err)) ? 'has-error' : ''; ?>">

                        <div class="name  required">State</div>
                            <div class="value" id="statediv">
                                <select class="select-css" name='state' required>
                      <option>Select State</option>
                    </select>
                                
                             <span class="help-block"><?php echo $state_err; ?></span>
                            </div>
                        </div>
<div class="form-row <?php echo (!empty($city_err)) ? 'has-error' : ''; ?>">
<div class="name  required">City</div>
                            <div class="value">
                               <div class="input-group">
                                    <input class="input--style-6" id="phone" name="city" type="text" required>
                                     <span class="help-block"><?php echo $city_err; ?></span>
                                </div>
                             
                            </div>
                        </div>

                         <div class="form-row <?php echo (!empty($postal_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Postal Code</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="postalcode" placeholder="Postal /Zip Code" required>
                                    <span class="help-block"><?php echo $postal_err; ?></span>
                                </div>
                            </div>
                        </div>


                         <div class="form-row <?php echo (!empty($fax_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Fax</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="fax" placeholder="Fax Number" required>
                                     <span class="help-block"><?php echo $fax_err; ?></span>
                                </div>
                            </div>
                        </div>
<div class="form-row <?php echo (!empty($identity_err)) ? 'has-error' : ''; ?>">

                        <div class="name  required">Means of Identification</div>
                            <div class="value">
                                <select class="select-css" name='identity' required>
                                    <option value="none">Choose One</option>
                                    <option value="international passport">International Passport</option>
                                  
                                    <option value="drivers license">Drivers License</option>
                                     <option value="national ID card">National ID Card</option>
                                     
                                      <option value="Others">Others</option>
                                  
                                </select>
                             <span class="help-block"><?php echo $identity_err; ?></span>
                            </div>
                        </div>
                        
                        
                            <div class="form-row <?php echo (!empty($idnumber_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">ID Number</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="idnumber" placeholder="ID Number" required>
                                    <span class="help-block"><?php echo $idnumber_err; ?></span>
                                </div>
                            </div>
                        </div>
                        
                              <div class="form-row <?php echo (!empty($idexpdate_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">ID Expiration Date</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="idexpdate" placeholder="ID Expiration Date" required>
                                    <span class="help-block"><?php echo $idexpdate_err; ?></span>
                                </div>
                            </div>
                        </div>
                        
                        
                             <div class="form-row <?php echo (!empty($occupation_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Occupation</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="occupation" placeholder="Input Occupation" required>
                                    <span class="help-block"><?php echo $occupation_err; ?></span>
                                </div>
                            </div>
                        </div>
                        
                        
                             <div class="form-row <?php echo (!empty($companyname_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Company Name </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="companyname" placeholder="Input Company Name" required>
                                     <span class="help-block"><?php echo $companyname_err; ?></span>
                                </div>
                            </div>
                        </div>
                        
<div class="form-row <?php echo (!empty($acctype_err)) ? 'has-error' : ''; ?>">

                        <div class="name  required">Account Type</div>
                            <div class="value">
                                <select class="select-css" name='acctype' required>
                                    <option value="none">Choose One</option>
                                    <option value="Personal Savings">Personal Savings</option>
                                  
                                    <option value="Personal Current">Personal Current</option>
                                     <option value="Personal Preminum Savings">Personal Preminum Savings</option>
                                     
                                      <option value="Personal Domiciliary">Personal Domiciliary</option>
                                      
                                          
                                      <option value="Cooperate Current">Cooperate Current</option>
                                          
                                      <option value="Mpower Business">Mpower Business</option>
                                      
                                          
                                      <option value="Cooperate Domiciliary">Cooperate Domiciliary</option>
                                  
                                </select>
                              <span class="help-block"><?php echo $acctype_err; ?></span>
                            </div>
                        </div>
                        
                        <div class="form-row <?php echo (!empty($curtype_err)) ? 'has-error' : ''; ?>">

                        <div class="name  required">Currency type </div>
                            <div class="value">
                                <select class="select-css" name='curtype' required>
                                    <option value="none">Choose One</option>
                                    <option value="$">$</option>
                                  
                                    <option value="£">£</option>
                                     
                                
                                </select>
                             <span class="help-block"><?php echo $curtype_err; ?></span>
                            </div>
                        </div>
                           <div class="form-row <?php echo (!empty($annualincome_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Annual Income</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="annualincome" placeholder="Do not Enter currency (eg: 100,000.00) A/C Currency will be used"></textarea>
                                    <span class="help-block"><?php echo $annualincome_err; ?></span>
                                </div>
                            </div>
                        </div>
                        
                        
                                 <div class="form-row <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Password </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="password" name="password" placeholder="Input Password" required>
                                    <span class="help-block"><?php echo $password_err; ?></span>
                                </div>
                            </div>
                        </div>
                        
                        
                                 <div class="form-row <?php echo (!empty($cpassword_err)) ? 'has-error' : ''; ?>">
                            <div class="name  required">Confirm Password </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="password" name="cpassword" placeholder="Confirm Password" required>
                                    <span class="help-block"><?php echo $cpassword_err; ?></span>
                                </div>
                            </div>
                        </div>
                        
                        
                             
                                 <div class="form-row">
                            <div class="name  required">Photo </div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="file" name="photo" required>
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit"> Apply For Account Opening</button>

                        </div>
                    </form>
                </div>

                <div class="card-footer">
                   
                </div>
            </div>
        </div>
    </div>

   
 <script src="js/intlTelInput.js"></script>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "js/utils.js",
    });
  </script>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<?php
ob_flush();
?><!-- end document-->