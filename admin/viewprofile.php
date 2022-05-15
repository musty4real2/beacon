<?php
ob_start();
session_start();
if(empty($_SESSION['id'])):
    header('Location:index.php');
endif;
if(empty($_SESSION['dept'])):
    header('Location:index.php');
endif;
include('connect.php');
include('class.php');
$object=new hms();
date_default_timezone_set("Africa/Lagos");
$date = date("Y-m-d");
?>
<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Beacon Bank International</title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="assets/vendor/select2/select2.css" />
    <link rel="stylesheet" href="assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="assets/vendor/modernizr/modernizr.js"></script>

</head>
<body>
<section class="body">

    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="#" class="logo">

                <b><h4><strong> <?php echo strtoupper('beacon bank international'); ?></strong></h4></b>
            </a>


            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <!-- start: search & user box -->
        <div class="header-right">

            <form action="#" class="search nav-form">
                <div class="input-group input-search">

                    <span class="input-group-btn">

							</span>
                </div>
            </form>

            <span class="separator"></span>



            <span class="separator"></span>

            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="assets/images/!logged-user.jpg" alt="" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                    </figure>
                    <div class="profile-info">
                        <span class="name"><?php echo strtoupper($object->getStaffName($_SESSION['id'],$con)); ?></span>
                        <span class="role"><?php echo $_SESSION['dept']; ?></span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled">
                        <li class="divider"></li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">

            <div class="sidebar-header">
                <div class="sidebar-title">
                    Navigation
                </div>
                <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <div class="nano">
                <div class="nano-content">
                    <?php
                    include ('aside.php');

                    ?>

                </div>

            </div>

        </aside>
        <!-- end: sidebar -->

        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Dashboard</h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="dashboard.php">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span>Dashboard</span></li>

                    </ol>

                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>

            <!-- start: page -->
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">

                    </div>
                </header>
                <!-- Modal Form -->

<?php
if(isset($_GET['userid'])){

    $userid=$_GET['userid'];
}

?>
                <div class="panel-body">
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <tbody>
                        <?php
                        $t=1;
                        $query=mysqli_query($con,"SELECT * FROM `accounts` WHERE id='$userid' order by entry_date DESC")
                        or die(mysqli_error($con));
                        while($row=mysqli_fetch_array($query)){
                            ?>
                            <center><h2>CLIENT PROFILE/ BIO-DATA</h2></center>
                           
                            <tr class="gradeX">
                                <td> <?php echo "<img src=../uploads/".$row['photo']." height='100' width='100'/>"; ?> </td>
                                <td colspan="2">Client Name:</td><td class="center"><?php echo strtoupper($row['first_name'].' '.$row['middle_name'].' '.$row['last_name']); ?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td> <td colspan="2">Gender:</td><td class="center"><?php echo strtoupper($row['gender']); ?></td></tr>
                           <tr>
                                <td>&nbsp;</td> <td colspan="2">Date Of Birth:</td>
                               <td class="center"><?php echo strtoupper($row['dob']); ?></td></tr>
                            <tr>
                            <tr>
                                <td>&nbsp;</td> <td colspan="2">Email Address:</td>
                                <td class="center"><?php echo $row['email']; ?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td> <td colspan="2">Phone Number:</td>
                                <td class="center"><?php echo $row['phone']; ?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td> <td colspan="2">Country:</td>
                                <td class="center"><?php echo $row['country']; ?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td> <td colspan="2">State:</td>
                                <td class="center"><?php echo $row['state']; ?></td>
                            </tr>
                               <tr>
                                <td>&nbsp;</td> <td colspan="2">City:</td>
                                <td class="center"><?php echo $row['city']; ?></td>
                            </tr>
                               <tr>
                                <td>&nbsp;</td> <td colspan="2">Marital Status:</td>
                                <td class="center"><?php echo $row['marital_status']; ?></td>
                            </tr>
                           
                            <tr>
                                <td>&nbsp;</td> <td colspan="2">Date of Birth:</td>
                                <td class="center"><?php echo $row['dob']; ?></td>
                            </tr>
                            
                               <tr>
                                <td>&nbsp;</td> <td colspan="2">Preferred time to call:</td>
                                <td class="center"><?php echo $row['time_to_call']; ?></td>
                            </tr>
                            
                            
                                  <tr>
                                <td>&nbsp;</td> <td colspan="2">Address:</td>
                                <td class="center"><?php echo $row['address']; ?></td>
                            </tr>
                            
                                 <tr>
                                <td>&nbsp;</td> <td colspan="2">Postal Code:</td>
                      <td class="center"><?php echo $row['postal_code']; ?></td>
                            </tr>
                            
                                   <tr>
                                <td>&nbsp;</td> <td colspan="2">Fax:</td>
                                <td class="center"><?php echo $row['fax']; ?></td>
                            </tr>
                            
                                <tr>
                                <td>&nbsp;</td> <td colspan="2">Means of Identification:</td>
                                <td class="center"><?php echo $row['id_type']; ?></td>
                            </tr>
                               
                            <tr>
                                <td>&nbsp;</td> <td colspan="2">ID Number:</td>
                                <td class="center"><?php echo $row['id_number']; ?></td>
                            </tr>
                              <tr>
                                <td>&nbsp;</td> <td colspan="2">ID Expiration Date:</td>
                                <td class="center"><?php echo $row['id_expdate']; ?></td>
                            </tr>
                            
                               <tr>
                                <td>&nbsp;</td> <td colspan="2">Occupation:</td>
                                <td class="center"><?php echo $row['occupation']; ?></td>
                            </tr>
                            
                               <tr>
                                <td>&nbsp;</td> <td colspan="2">Company Name</td>
                                <td class="center"><?php echo $row['company_name']; ?></td>
                            </tr>
                            
                              <tr>
                                <td>&nbsp;</td> <td colspan="2">Account Type:</td>
                                <td class="center"><?php echo $row['acc_type']; ?></td>
                            </tr>
                            
                            
                            <tr>
                                <td>&nbsp;</td> <td colspan="2">Currency typee:</td>
                                <td class="center"><?php echo $row['cur_type']; ?></td>
                            </tr>
                            
                            
                            <tr>
                                <td>&nbsp;</td> <td colspan="2">Annual Income:</td>
                                <td class="center"><?php echo $row['annual_income']; ?></td>
                            </tr>
                            
                              
                            <tr>
                                <td>&nbsp;</td> <td colspan="2">Account Number:</td>
                                <td class="center"><?php echo $row['account_number']; ?></td>
                            </tr>
                             <tr>
                                <td>&nbsp;</td> <td colspan="2">Minimun:</td>
                                <td class="center"><?php echo $row['minimum']; ?></td>
                            </tr>
                            
                             <tr>
                                <td>&nbsp;</td> <td colspan="2">Current Balance:</td>
                                <td class="center"><?php echo $row['balance']; ?></td>
                            </tr>
                            
                             <tr>
                                <td>&nbsp;</td> <td colspan="2">Account Status:</td>
                                <td class="center"><?php if($row['status']=='0'){echo "<b style='color:red'>Pending Activation</b>";
                                }elseif($row['status']=='1'){echo "<b style='color:green'>Activiated / Allowed Access</b>";
                                }elseif($row['status']=='2'){echo "<b style='color:orange'>Account Under Review</b>";
                                }elseif($row['status']=='3'){echo "<b style='color:gold'>Account Has Been Suspended</b>";
                                }?></td>
                            </tr>
                            
                             <tr>
                                <td>&nbsp;</td> <td colspan="2">Account Opening Date:</td>
                                <td class="center"><?php echo $row['entry_date']; ?></td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                    
                </div>
            </section>
            <!-- end: page -->
        </section>
    </div>


</section>

<!-- Vendor -->
<script src="assets/vendor/jquery/jquery.js"></script>
<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="assets/vendor/select2/select2.js"></script>
<script src="assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="assets/javascripts/theme.js"></script>

<!-- Theme Custom -->
<script src="assets/javascripts/theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="assets/javascripts/theme.init.js"></script>

<script src="assets/vendor/pnotify/pnotify.custom.js"></script>

<script src="assets/javascripts/ui-elements/examples.modals.js"></script>
<!-- Examples -->
<script src="assets/javascripts/tables/examples.datatables.default.js"></script>
<script src="assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
<script src="assets/javascripts/tables/examples.datatables.tabletools.js"></script>
</body>
</html>