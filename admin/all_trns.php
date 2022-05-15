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

                <b><h4><strong>Beacon Bank International</strong></h4></b>
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
                        <img src="assets/images/!logged-user.jpg" alt="Beacon Bank International" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                    </figure>
                    <div class="profile-info">
                        <span class="name"><?php echo strtoupper($object->getStaffName($_SESSION['id'],$con)); ?></span>
                        <span class="role">administrator</span>
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
                <h2>Admin Dashboard</h2>

                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="dashboard.php">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span>Dashboard</span></li>
                        <li><span>All Deposits</span></li>
                  </ol>

                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>

            <!-- start: page -->
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">

                    </div>

                    <h2 class="panel-title">List of All Treated Transfer(s)  &nbsp;</h2> <br/>
                </header>
                <!-- Modal Form -->

                <div class="panel-body">
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Sender Name</th>
                            <th>Account Name</th>
                            <th>Account Number</th>
                            <th>Transfer Amount</th>
                            <th>Bank Name</th>
                            <th>Sort Code</th>
                  
                            <th>Status</th>
                    

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $t=1;
                        $query=mysqli_query($con,"select * from otherbank WHERE status='pending' order by id DESC")
                        or die(mysqli_error($con));
                        while($row=mysqli_fetch_array($query)){
                            $ccur=$object->getCurrency($row['user_id'],$con);
$msg="Reciever Account Name {$row['account_name']}, Account Number {$row['account_number']}, Transfer Amount $ccur{$row['transfer_amount']}, Transfer Bank {$row['bankname']}, Sortcode / ABA code {$row['sortcode']}";
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $t++; ?></td>
                            <td><a class="text" href="viewprofile.php?userid=<?php echo $row['user_id']; ?>"><?php echo ucfirst($object->getCustName($row['user_id'],$con)); ?></a></td>
                            <td><?php echo $row['account_name']; ?></td>
                            <td><?php echo $row['account_number']; ?></td>
                            <td><?php echo $object->getCurrency($row['user_id'],$con); ?><?php echo $row['transfer_amount']; ?></td>
                            <td><?php echo $row['bankname']; ?></td>
                            <td class="center"><?php echo $row['sortcode']; ?></td>
                         
                            <td class="center">
                                
                            <form action='transferstatus1.php' method='post'>
        
        <input type='hidden' name='firstname' value='<?php echo ucfirst($object->getCustName($row['user_id'],$con)); ?>'/> 
        <input type='hidden' name='email' value='<?php echo ucfirst($object->getCustemail($row['user_id'],$con)); ?>'/> 
                <input type="hidden" name='id' value='<?php echo $row['id']; ?>'/>
    
                           <b class="btn btn-success">Successully Treated</b>
                          
                            </td>
                        
</tr>
<?php } ?>
                                                </tbody>
                    </table>
                </div>
            </section>
            <!-- end: page -->

        </section>
    </div>

    <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="mobile-close visible-xs">
                    Collapse <i class="fa fa-chevron-right"></i>
                </a>

                <div class="sidebar-right-wrapper">

                    <div class="sidebar-widget widget-calendar">
                        <h6>Calenda</h6>
                        <div data-plugin-datepicker data-plugin-skin="dark" ></div>

                    </div>

                    <div class="sidebar-widget widget-friends">
                        <h6></h6>

                    </div>

                </div>
            </div>
        </div>
    </aside>
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