<nav id="menu" class="nav-main" role="navigation">
    <ul class="nav nav-main">
        <li>
            <a href="dashboard.php" class="nav-active">
                <span class="pull-right label label-primary"><?php echo $object->countCust($con); ?></span>
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="deposit.php">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>Deposit</span>
            </a>
        </li>

        <li>
            <a href="withdraw.php">

                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>Withdraw</span>
            </a>
        </li>
        <li>
            <a href="todaydeposit.php">
                <span class="pull-right label label-primary"><?php echo $object->getDepCount($con,$date); ?></span>

                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>Todays Deposit</span>
            </a>
        </li>
        <li>
            <a href="todaywithdrawals.php">
                <span class="pull-right label label-primary"><?php echo $object->getWithCount($con,$date); ?></span>
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>Todays Withdrawals</span>
            </a>
        </li>

        <li>
            <a href="alldeposit.php">

                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>All Deposit</span>
            </a>
        </li>
        <li>
            <a href="allwithdrawals.php">

                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>All Withdrawals</span>
            </a>
        </li>
        
           <li>
            <a href="see_transfer.php">

                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>Todays Transfers</span>
            </a>
        </li>
         <li>
            <a href="pending_trns.php">

                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>All Pending Transfers</span>
            </a>
        </li>
           <li>
            <a href="all_trns.php">

                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>All Treated Transfers</span>
            </a>
        </li>
        



</nav>