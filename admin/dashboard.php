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

    <title>Dashboard Beaconbankinternational</title>
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
<div id="google_translate_element"></div>
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
                        <li><span>Submitted Account Opening Forms/Persons</span></li>
                        
                    </ol>

                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>

            <!-- start: page -->
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">

                    </div>

                    <h2 class="panel-title">List Of Individuals That Applied For Account Opening &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<?php echo $object->countCust($con); ?>)</h2> <br/>

                 
                </header>
                <!-- Modal Form -->

                    

                <div class="panel-body">
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Acc No.</th>
                            <th>Phone No.</th>
                            <th>Email Address</th>
                       
                      
                            <th>Balance</th>
                            <th>Action</th>
                            <th>Profile </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $t=1;
                        $query=mysqli_query($con,"select * from accounts order by id ASC")
                        or die(mysqli_error($con));
                        while($row=mysqli_fetch_array($query)){

                        ?>
                        <tr class="gradeX">
                            <td><?php echo $t++; ?></td>
                            <td class="center"><a class="text" href="viewprofile.php?userid=<?php echo $row['id']; ?>"><?php echo strtoupper($row['first_name'].' '.$row['middle_name'].' '.$row['last_name']); ?></a></td>
                            <td class="center"><?php echo $row['account_number']; ?></td>
                            <td class="center"><?php echo $row['phone']; ?></td>
                            <td class="center"><?php echo $row['email']; ?></td>
                           

                    
                            <td class="center"><?php echo $object->getCurrency($row['id'],$con).$row['balance']; ?></td>  
                            
                        <td class="center"> <a href="#modalForm1<?php echo $row['id'];?>"
                                   class="modal-with-form btn btn-danger btn-sm">
                                    status change
                                </a></td>
                                                        <td class="center">
                                                        <a href="#modalForm<?php echo $row['id'];?>"
                                   class="modal-with-form btn btn-info btn-sm">
                                   summary Profile
                                </a><br/>
                               
                                                        </td>
                            <td class="center"><a class="btn btn-warning btn-sm" href="history.php?history=<?php echo $row['id']; ?>">View Statement</a></td>
                        </tr>
                        
                         <div id="modalForm<?php echo $row['id'];?>" class="modal-block modal-block-primary mfp-hide">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Beacon Bank International</h2>
                        </header>
                        <div class="panel-body">
                            <h5><?php echo strtoupper($row['first_name'].' '.$row['middle_name'].' '.$row['last_name']); ?>'S Profile</h5>
  <form class="form-horizontal mb-lg" enctype="multipart/form-data" method="post">
                                <div class="form-group mt-lg">
                                    <label class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                       <?php echo strtoupper($row['first_name'].' '.$row['middle_name'].' '.$row['last_name']); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone Number</label>
                                    <div class="col-sm-9">
                                       <?php echo $row['phone']; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-9">
                                        <?php echo $row['address']; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                      <?php echo $row['email']; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Account No.</label>
                                    <div class="col-sm-9">
                                      <?php echo $row['account_number']; ?>
                                    </div>
                                </div>
                               
                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Account Type</label>
                                    <div class="col-sm-9">
                                      <?php echo $row['acc_type']; ?>
                                    </div>
                                </div>
                                
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                  
                                    <button class="btn btn-default modal-dismiss">Cancel</button>
                                </form>
                                </div>
                            </div>
                        </footer>
                    </section>
                </div>
                
                
                
                 <div id="modalForm1<?php echo $row['id'];?>" class="modal-block modal-block-primary mfp-hide">
                            <section class="panel">
                                <header class="panel-heading">
                                    <h2 class="panel-title">Change Account Status Of  <?php echo strtoupper($row['first_name'].' '.$row['middle_name'].' '.$row['last_name']); ?></h2>
                                </header>
                                <div class="panel-body">
                                    <h5>Current Status</h5>
                                    <form action="status_update.php" class="form-horizontal mb-lg" enctype="multipart/form-data" method="post">
                                        <div class="form-group mt-lg">
                                            <label class="col-sm-3 control-label">Status</label>
                                            <div class="col-sm-9">
                                                <input type="hidden" name="cid" value="<?php echo $row['id']; ?>" require/>
                                                <input type='hidden' name='firstname' value='<?php echo $row['first_name']; ?>'/>
                                                <input type='hidden' name='email' value='<?php echo $row['email']; ?>'/>
                                        
                                                <select name="stat" class="form-control"/>
                                    
                                                <option value='1'>Allow to login / Activate</option>
                                                <option value='2'>Put Account Under Review</option>
                                                <option value='3'>Suspend</option>
                                                </select>
                                            </div>
                                        </div>

                                </div>
                                <footer class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary">Change Status</button>
                                            <button class="btn btn-default modal-dismiss">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </footer>
                            </section>
                        </div>
                       

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
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
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