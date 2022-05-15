<?php
ob_start();
session_start();
if(empty($_SESSION['id'])):
    header('Location:logout.php');
endif;
require('../include/config.php');
include('../include/class/adminclass.php');
$object=new adminPartna();

$pullprofile=mysqli_query($link,"SELECT * FROM `accounts` WHERE `id`={$_SESSION['id']}");
$arow=mysqli_fetch_array($pullprofile);


$first_part = basename($_SERVER['PHP_SELF'], ".php");
?>
<!DOCTYPE html>

<html lang="en">
  <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/fav.png" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="beacon bank international.">
        <meta name="keywords" content="beacon bank international, beacon,bank">
        <meta name="author" content="beacon bank international">
        <title>Beacon Bank International </title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist/css/app.css">

        <!-- END: CSS Assets-->
        
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="partna" class="w-6" style="width: 8.5rem" src="dist/images/logo.png">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <li>
                    <a href="https://beaconbankinternational.com/" class="menu" target="_blank">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Home</div>
                    </a>
                </li>
                <li>
                    <a href="index.php" class="menu">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Dashboard </div>
                    </a>
                </li>
                <li>
                    <a href="project.php" class="menu">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Withdrawals </div>
                    </a>
                </li>
                <li>
                    <a href="portfolio.php" class="menu">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Transfer</div>
                    </a>
                </li>
               
                <li>
                    <a href="profile.php" class="menu">
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Profile </div>
                    </a>
                </li>
               
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        
        <div class="flex">
           
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="partna" class="w-6" style="width: 8.5rem" src="dist/images/logo.png">
                    
                </a>
                <div class="side-nav__devider my-6"></div>
          
                <ul>
                    <li>
                        <a href="https://beaconbankinternational.com" class="side-menu" target='_blank'>
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Go to Main site</div>
                        </a>
                    </li>
                    <li>
                        <a href="index.php" class="side-menu <?php if ($first_part=="index") {echo "side-menu--active"; } else  { echo "";}?>">
                            <div class="side-menu__icon"> <i data-feather="bar-chart"></i> </div>
                            <div class="side-menu__title"> Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <a href="project.php" class="side-menu <?php if ($first_part=="project") {echo "side-menu--active"; } else  { echo "";}?>">
                            <div class="side-menu__icon"> <i data-feather="package"></i> </div>
                            <div class="side-menu__title"> Withdrawals</div>
                        </a>
                    </li>
                   
                    <li>
                        <a href="portfolio.php" class="side-menu <?php if ($first_part=="portfolio") {echo "side-menu--active"; } else  { echo "";}?>">
                            <div class="side-menu__icon"> <i data-feather="briefcase"></i> </div>
                            <div class="side-menu__title"> Transfers</div>
                        </a>
                    </li>
                 
                    <li>
                        <a href="profile.php" class="side-menu <?php if ($first_part=="profile") {echo "side-menu--active"; } else  { echo "";}?>">
                            <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                            <div class="side-menu__title">  Profile</div>
                        </a>
                    </li>
                   
                 <li id="google_translate_element">
                        
                    </li>
                  
                </ul> 
                
            </nav>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class=""><?php echo strtoupper($_SESSION['name']); ?></a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Dashboard</a> </div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
                   
                    <!-- END: Search -->
            
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8 relative">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="Beacon Bank International" src="https://account.beaconbankinternational.com/uploads/<?php echo $object->getUserPhoto($_SESSION['id']) ?>">
                        </div>
                        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                            <div class="dropdown-box__content box bg-theme-38 text-white">
                                <div class="p-4 border-b border-theme-40">
                                    <div class="font-medium">
                                        <?php
$name =$object->getUserName($_SESSION['id']);

list($firstName, $lastName) = explode(' ', $name);

echo ucfirst($firstName);

                                    ?>
                                        
                                    </div>
                                    <div class="text-xs text-theme-41">Beacon Account Holder</div>
                                </div>
                                <div class="p-2">
                                    <a href="profile.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                    <a href="bankaccount.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> See Account </a>
                                    <a href="changepassword.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                                    
                                </div>
                                <div class="p-2 border-t border-theme-40">
                                    <a href="logout.php" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
              <!-- ////////////here goes the content////////// -->