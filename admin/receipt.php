<?php

ob_start();
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("connect.php");
include("class.php");
$object=new hms();
   $query=mysqli_query($con,"select * from registration natural join deposit where id='{$_GET['cid']}' order by id desc LIMIT 0,1")or die(mysqli_error($con));
      
        $row=mysqli_fetch_array($query);

        $id=$row['id'];
        $name=$row['name'];
        $phone=$row['phone'];
        $address=$row['address'];
        $oldbal=$row['oldbalance'];
        $newbalance=$row['balance'];
		$amount_added=$row['amount_added'];
    	$date=$row['date'];
        $user_id=$row['staff_id'];
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sales Reciept</title>
<style>
#card{
	background-color:#FFF;
		background-repeat:no-repeat;
		
	
}
		
		#card h2{
			margin:0;
			color:#000;
			}


</style>
</head>

<body>           
       <div id="card">
<table border="1" width="265">
<tr>
  <td width="48%">      
  <table height="125"  cellpadding="1" style="font-size:16px; font-size-adjust:!important; font-style:oblique; word-spacing:3px; font-weight:bolder; font-family:'Courier New', Courier, monospace;">
    <tr>
      <td width="266" height="119" bgcolor="#FFF"><b><h4 style="color:#000;">
                  <center> <a href="dashboard.php">
                <img src="logo.jpg" alt="NA BAKORI GLOBAL SERVICES" height="99"/>
                  </a></center>
              </h4></b></td></tr>
</table>
       
     
				<table border="0" cellpadding="0" cellspacing="0" style="font-size:16px; font-size-adjust:!important; font-style:oblique; font-family:'Courier New', Courier, monospace; word-spacing:3px;  font-weight:bolder;" />
                <tr><td colspan="2">
                <b style="font-size:16px; font-family:'Courier New', Courier, monospace;"><center>
                  <p>Address: Opposite Access Bank, Obasanjo Shoppping Complex Chanchaga Minna Niger State.</p>
                </center></b>
               </td></tr>
               <tr>
<td colspan="2"> <center><b><h4>DEPOSIT RECEIPT</h4></b></center></td></tr>

  <tr><td colspan="2">
       Name: <?php echo $name; ?>
               </td> </tr>
               <tr><td colspan="2">Phone: <?php echo $phone; ?></td></tr>
              

    
    <tr><td  colspan="2">
            <b style=" font-family:'Courier New', Courier, monospace;">Deposit Date:
                <?php echo $date; ?> </b>
        </td></tr>
               <tr>
         <td  colspan="2"><b style=" font-family:'Courier New', Courier, monospace;">Amount Deposited:<?php echo strtoupper('N'.$amount_added); ?></h2></b></td>
        </tr> 
                  <tr>
         <td colspan="2"><b style=" font-family:'Courier New', Courier, monospace;">Old Balance:<?php echo strtoupper('N'.$oldbal); ?></b></td>
        </tr> 
          <tr>
         <td colspan="2"><b style=" font-family:'Courier New', Courier, monospace;">New Balance:<?php echo strtoupper('N'.$newbalance); ?></b></td>
        </tr> 
        <tr><td colspan="2"><b style=" font-family:'Courier New', Courier, monospace;">Issued By:</b>&nbsp;<b><?php echo $object->getStaffName($user_id,$con); ?></b></td>
        </tr>
        <tr>
        <td colspan="6">
          <p style="font-size:12px;  font-weight:bolder;"><b><CENTER><h4
                      ><?php echo strtoupper("Visit Us For MORE Details"); ?> </h4></CENTER></b></p>
</p></td>
        </tr>   
        <tr><td colspan="6"><center>
          <p style="font-size:12px;  font-weight:bolder;"><b><h3><?php echo strtoupper("THANK YOU FOR YOUR PATRONAGE!!!"); ?></h3></b></p></center></td>  </tr>
           <tr><td colspan="6">&nbsp;</td></tr>
            <tr><td colspan="6">&nbsp;</td></tr>
           </table>


</body>
</html>
<?php
		
ob_flush();

?>