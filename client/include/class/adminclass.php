<?php
class adminPartna{
public $table;
public $id;
public $date;
public $month;
public $year;
public $roomid;
public $personid;

/**************************************************************************************/
    public function __construct()
    {
        $this->connection = new mysqli("localhost", "root", "", "beacon");
        if (mysqli_connect_errno()) {
            trigger_error('Error connecting to host. ' . $this->connection->error, E_USER_ERROR);
        }
    }
	
	public function getStaffName($id){
		$this->id=$id;
		//$this->con=$con;
		$query=mysqli_query($this->connection,"SELECT `email` FROM `users` WHERE `id`='{$this->id}'");
		while($row=mysqli_fetch_array($query)){
			return $row['email'];
			}//while
		}
		
		
		public function getBalance($id){
	
		$this->id=$id;
		$count=mysqli_query($this->connection,"SELECT balance AS total_price FROM `accounts` WHERE `status`='1' AND `id`='{$this->id}'");
		$a=0;
while($row=mysqli_fetch_array($count)){ 
     
  return $row['total_price'];	
	}

}


		public function getOldBalance($id){
	
		$this->id=$id;
		$count=mysqli_query($this->connection,"SELECT oldbalance AS total_price FROM `deposit` WHERE `cust_id`='{$this->id}' ORDER BY `deposit_id` DESC LIMIT 1");
		$a=0;
while($row=mysqli_fetch_array($count)){ 
     
  return $row['total_price'];	
	}

}


public function getTotalDeposit($id){
	
		$this->id=$id;
		$count=mysqli_query($this->connection,"SELECT
       SUM(amount_added) AS total_price FROM `deposit` WHERE `cust_id`='{$this->id}'");
		$a=0;
while($row=mysqli_fetch_array($count)){ 
     
  return $row['total_price'];	
	}

}

public function getLastDeposit($id){
	
		$this->id=$id;
		$count=mysqli_query($this->connection,"SELECT `amount_added` AS total_price FROM `deposit` WHERE `cust_id`='{$this->id}' ORDER BY `deposit_id` DESC LIMIT 1");
		$a=0;
while($row=mysqli_fetch_array($count)){ 
     
  return $row['total_price'];	
	}

}




public function getTotalWithdrawal($id){
	
		$this->id=$id;
		$count=mysqli_query($this->connection,"SELECT
       SUM(amount_removed) AS total_price FROM `withdraw` WHERE `cust_id`='{$this->id}'");
		$a=0;
while($row=mysqli_fetch_array($count)){ 
     
  return $row['total_price'];	
	}

}

public function getLastwithdrawal($id){
	
		$this->id=$id;
		$count=mysqli_query($this->connection,"SELECT `amount_removed` AS total_price FROM `withdraw` WHERE `cust_id`='{$this->id}' ORDER BY `id` DESC LIMIT 1");
		$a=0;
while($row=mysqli_fetch_array($count)){ 
     
  return $row['total_price'];	
	}

}
		public function getUserName($id){
		$this->id=$id;
		//$this->con=$con;
		$query=mysqli_query($this->connection,"SELECT * FROM `accounts` WHERE `id`='{$this->id}'");
		while($row=mysqli_fetch_array($query)){
			return $row['first_name'].' '.$row['last_name'];
			}//while
		}
		
		
		
			public function getUserAccno($id){
		$this->id=$id;
		//$this->con=$con;
		$query=mysqli_query($this->connection,"SELECT * FROM `accounts` WHERE `id`='{$this->id}'");
		while($row=mysqli_fetch_array($query)){
			return $row['account_number'];
			}//while
		}
		
		
			public function getUserPhoto($id){
		$this->id=$id;
		//$this->con=$con;
		$query=mysqli_query($this->connection,"SELECT * FROM `accounts` WHERE `id`='{$this->id}'");
		while($row=mysqli_fetch_array($query)){
			return $row['photo'];
			}//while
		}
		
	








		
		
		}//end of adminPartna

?>