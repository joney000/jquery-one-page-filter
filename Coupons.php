<?php

/**
 *  Description of coupons :
 * 
 *  The Class Handle Search,Filter,Show All Available Coupons
 *
 *  @author Shinchan/joney_000/Let_Me_Start :D :D [jaswant singh]
 */
class Coupons {
   /*
    *  These are default values used For Parameter 
    *  for General Manipulation
    **/
   private $coupon_id;  
   private $company_name;
   private $disscount;
   private $validity;
   
   function __construct($coupon_id, $company_name, $disscount, $validity) {
      
       $this->coupon_id = $coupon_id;
       $this->company_name = $company_name;
       $this->disscount = $disscount;
       $this->validity = $validity;
   }
   function __destruct() {
       
   }
   //Gettter Started 
   public function getCoupon_id() {
       return $this->coupon_id;
   }

   public function getCompany_name() {
       return $this->company_name;
   }

   public function getDisscount() {
       return $this->disscount;
   }

   public function getValidity() {
       return $this->validity;
   }
   //Setter started
   public function setCoupon_id($coupon_id) {
       if($coupon_id < 0){
           return;
       }
       $this->coupon_id = $coupon_id;
   }

   public function setCompany_name($company_name) {
       if(strlen($company_name)<=0){
           //invalid condition
           return;//not settting anything
       }
       
       $this->company_name = $company_name;
   }

   public function setDisscount($disscount) {
       if($disscount<0){
           //invalid condition
           //Negative Disscount
           return;//not settting anything
       }
       
       $this->disscount = $disscount;
   }

   public function setValidity($validity) {
       $this->validity = $validity;
   }
   
   //******** Gernal Utility Functions ************//

   public function getConnection(){
       try{
			$host = 'localhost';
			$uname = 'root';
			$pass = 'root';
			$dbname = 'myproject';
			$db = new mysqli($host,$uname,$pass,$dbname); // created a new object
                        // mysqli class
			if ($db->connect_error) {
                            echo "<br\>error in the connection<br\>";
                            die("Connection failed: ".$db->connect_error);
                        
                        }else{
                            //echo "connected<br\>";
                            return $db; 
                        } 

           }catch(Exception $ex){
			echo "excception occur :::".$ex;
           }
   }
   
   public function serchCoupon($key){
       
      /*
       $conn = $this->getConnection();
       $qry = "SELECT * FROM coupons WHERE company_name LIKE '".$key."'";
       $res = mysqli_query($conn, $qry);
       //$res->num_rows;
       if(mysql_num_rows($res)<=0){
           echo "No Result Found" ;
           return ;
       }
       echo "<br>We Found Interesting Results To you</br>";
       
       while($row = $res->fetch_assoc()){
            echo "CouponId=".$row['coupon_id']." company=".$row['company_name']." Discount=".$res['discount']." validity=".$res['validity']."(days from now) <br/>";
       }
       
       $conn->close($conn);
       */
   }
   
   public function ShowAllCoupons(){
       
        $conn = $this->getConnection();
        echo "<table class='table'>";
	echo "<tr>";
	echo "<th class='active'>Coupon Id </th>";
	echo "<th class='active'>Coupon Code</th>";
	echo "<th class='active'>Description</th>";
	echo "</tr>";			
        $qry = "SELECT * FROM coupon where isApproved = '1' LIMIT 50";
       	$run = mysqli_query($conn, $qry);
      //  $numRows = mysql_num_rows($run);
        
        echo '<h2>             '.$run->num_rows." Results Found   :)</h2>";
        if($run->num_rows<=0){
           echo "No Result Found :(" ;
           return ;
       }
       
	while($row = $run->fetch_assoc())
	  {
              echo "<tr>";	
              echo   "<td>" . $row['CouponID'] . "</td><td>" . $row['CouponCode'] . "</td><td> " . $row['Description'] . "</td><td>";
              echo "</tr>";
	  
	  }
            echo "</table>";
   }
   public function insertCoupon($coupon_id,$company_name,$discount,$validity){
     /*  $conn = $this->getConnection();
       $qry = 'INSERT INTO coupons VALUES ("'.$coupon_id.'","'.$company_name.'","'.$discount.'","'.$validity.'")';
       echo $qry;
       $res = mysqli_query($conn, $qry);
       if(!$res){
           echo "<br\>Sorry Cann't Insert the Coupons<br\>";
           return ;
       }
       echo "<br><h3>Updated the Coupon</h3></br>";

       mysql_close($conn);
     */
   }
   
}
