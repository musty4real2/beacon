<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if(empty($_SESSION['branch'])):
header('Location:../index.php');
endif;
?>


                  <!-- Date range -->
                  <form method="post" action="">
<?php
include('../dist/includes/dbcon.php');
$id=$_SESSION['id'];
$cid=$_GET['cid'];
$branch=$_SESSION['branch'];
    $queryb=mysqli_query($con,"select * from branch where branch_id='$branch'")or die(mysqli_error());
  
        $rowb=mysqli_fetch_array($queryb);
        
?>			
                 
<?php

    $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select * from sales natural join customer where branch_id='$branch' order by sales_id desc LIMIT 0,1")or die(mysqli_error($con));
      
        $row=mysqli_fetch_array($query);
       
        $sales_id=$row['sales_id'];
        $last=$row['cust_last'];
        $first=$row['cust_first'];
        $address=$row['cust_address'];
        $contact=$row['cust_contact'];
        $sid=$row['sales_id'];
        $due=$row['amount_due'];
        $discount=$row['discount'];
        $grandtotal=$due-$discount;
        $tendered=$row['cash_tendered'];
        $change=$row['cash_change'];

        $query1=mysqli_query($con,"select * from payment where sales_id='$sales_id'")or die(mysqli_error($con));
      
        $row1=mysqli_fetch_array($query1);

?>    
         <table border="1" width="400">
<tr>
  <td width="48%">      
  <table height="125"  cellpadding="1" style="font-size:16px; font-size-adjust:!important; font-style:oblique; word-spacing:3px; font-weight:bolder; font-family:'Courier New', Courier, monospace;">
    <tr>
      <td width="266" height="119" bgcolor="#FFF"><b><h4 style="color:#000;">
                  <center> <a href="dashboard.php">
                <img src="Asset 1@4x.png" alt="<?php echo $rowb['branch_name'];?>" height="99"/>
                  </a></center>
              </h4></b></td></tr>
              <tr><td><b><center><?php echo $rowb['branch_name'];?></center></b></td></tr>
</table>
       
     
				<table border="0" cellpadding="0" cellspacing="0" style="font-size:16px; font-size-adjust:!important; font-style:oblique; font-family:'Courier New', Courier, monospace; word-spacing:3px;  font-weight:bolder;" />
                <tr><td colspan="2">
                <b style="font-size:16px; font-family:'Courier New', Courier, monospace;"><center>
                  <p>Address: <?php echo $rowb['branch_address'];?></p>
                </center></b>
               </td></tr>
               <tr>
<td colspan="2"> <center><b><h4>SALES INVOICE</h4></b></center></td></tr>
<tr><td colspan="2">
       Invoice No.: <span style="font-size: 16px;color: red"><?php echo $row1['or_no'];?></span></td> </tr>
               <tr><td colspan="2">Branch Contact: <?php echo $rowb['branch_contact'];?></td></tr>
              

    
    <tr>
  <tr><td colspan="2">
       Customer Name: <?php echo $last.", ".$first;?>
               </td> </tr>
               <tr><td colspan="2">Customer Add: <?php echo $address;?></td></tr>
              

    
    <tr><td  colspan="2">
            <b style=" font-family:'Courier New', Courier, monospace;">Sales Date:
                <?php echo date("M d, Y");?> Time <?php echo date("h:i A");?> </b>
        </td></tr>
                  <table width="400">
                    <thead>
                        
                      <tr style="border: solid 1px #000">
                          <td>&nbsp;</td>
                        <td>QTY</td>
                        <td>UNIT</td>
                        <td>DESC</td>
            						<td>Unit Price</th>
            						<td class="text-right">AMOUNT</th>
            						<td>&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		$query=mysqli_query($con,"select * from sales_details natural join product where sales_id='$sid'")or die(mysqli_error($con));
			$grand=0;
		while($row=mysqli_fetch_array($query)){
				//$id=$row['temp_trans_id'];
				$total= $row['qty']*$row['price'];
				$grand=$grand+$total;
        
?>
                      <tr>
                          <th>&nbsp;</th>
            						<td><?php echo $row['qty'];?></td>
                        <td>pc/s</td>
                        <td class="record"><?php echo $row['prod_name'];?></td>
            						<td><?php echo number_format($row['price'],2);?></td>
            						<td style="text-align:right"><?php echo number_format($total,2);?></td>
                                    <th>&nbsp;</th>
                      </tr>
					  

<?php }?>					
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">Subtotal</td>
                        <td style="text-align:right"><?php echo number_format($grand,2);?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">Discount</td>
                        <td style="text-align:right"><?php echo number_format($discount,2);?></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b>TOTAL AMOUNT DUE</b></td>
                        <td style="text-align:right"><b><?php echo number_format($grand-$discount,2);?></b></td>
                      </tr>
                      <tr>
                          <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">Cash Tendered</td>
                        <td style="text-align:right"><?php echo number_format($tendered,2);?></td>
                      </tr>
                      
                      
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
				</div>  
				</form>	
                </div><!-- /.box-body -->
                <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
                <a class = "btn btn-primary btn-print" href = "home.php"><i class ="glyphicon glyphicon-arrow-left"></i> Back to Homepage</a>
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
           
          </div><!-- /.row -->
	  
             
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
     
    </div><!-- ./wrapper -->
	
	
	<script type="text/javascript" src="autosum.js"></script>
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../dist/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
   
  </body>
</html>
