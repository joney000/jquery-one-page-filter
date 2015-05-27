<?PHP

include 'Coupons.php';
$couponManager = new Coupons(1,"flipcart",5,15);
//echo "here";
//$couponManager->ShowAllCoupons();
//$conn = $couponManager->getConnection();

$id1 = $_POST['id1'];
$temp = $id1;
$id2 = $_POST['id2'];
$id3 = $_POST['id3'];
echo $id3;
$add = '';
if($id1=='deal'){
    $add = "isDeal ='1'";
}else if($id1=='coupon'){
    $add = "isDeal ='0'";
}
$table = '';
//isApproved = 1;
$both = false;
if($id2!=''&& $id3!=''){
     //SELECT * FROM (coupon JOIN website ON coupon.WebsiteID=website.WebsiteID) JOIN couponcategories ON coupon.Category = couponcategories.CategoryID;
    //  $table = '(coupon JOIN website ON coupon.WebsiteID=website.WebsiteID) JOIN couponcategories ON coupon.Category = couponcategories.CategoryID';
      $conn = $couponManager->getConnection();
      $qry = "SELECT DISTINCT CategoryID FROM couponcategories where URLKeyword ='".$id3."'";    
       //SELECT CouponID,CouponCode,Description FROM (SELECT * FROM coupon JOIN couponcategoryinfo ON coupon.CouponID = couponcategoryinfo.CouponID where CategoryID='1' LIMIT 50) as t JOIN website ON t.WebsiteID=website.WebsiteID where WebsiteTitle='flipkart'LIMIT 50;
       echo $qry;
       echo '<br>';
       $run = mysqli_query($conn, $qry);
       if($run->num_rows<=0){
           echo "No Result Found :(" ;
           return ;
       }
       $row = $run->fetch_assoc();
       $catId = $row['CategoryID'];
       echo "cat id=".$catId;
       $both = true;
       $table = 'coupon as c JOIN couponcategoryinfo as ct ON c.CouponID = ct.CouponID JOIN website as w on w.WebsiteID=c.WebsiteID where ct.CategoryID="'.$catId.'"&& w.WebsiteTitle="'.$id2.'"&& c.isDeal ="1" && c.isApproved = "1" LIMIT 50'; 
        
      
}else{
    if($id2!=''){
        echo $id2;
     
       $table = 'coupon JOIN website ON coupon.WebsiteID=website.WebsiteID where WebsiteTitle="'.$id2.'"'; 
       
    }else if($id3!=''){
       // cetegory se fatch & based on that category id search in join (coupon & category);
      // $couponID =  
       $conn = $couponManager->getConnection();
       $qry = "SELECT DISTINCT CategoryID FROM couponcategories where URLKeyword ='".$id3."'";    
       
       echo $qry;
       echo '<br>';
       $run = mysqli_query($conn, $qry);
       if($run->num_rows<=0){
           echo "No Result Found :(" ;
           return ;
       }
       $row = $run->fetch_assoc();
       $catId = $row['CategoryID'];
       echo "cat id=".$catId;
       
       $table = 'coupon JOIN couponcategoryinfo ON coupon.CouponID = couponcategoryinfo.CouponID'.' where CategoryID="'.$catId.'"'; 
    }
}
if($table!='' && $add !=''&&!$both){
      $table  = $table.'&& '.$add.' && '."isApproved = '1' LIMIT 50";
}else if($table=='' && $add!=''&&!$both){
      $table = 'coupon where '.$add."&& isApproved = '1' LIMIT 50";
}
//SELECT * FROM coupon JOIN couponcategories ON coupon.Category = couponcategories.CategoryID LIMIT 50;
//SELECT * FROM coupon JOIN website ON coupon.WebsiteID=website.WebsiteID LIMIT 50;
echo "table=".$table;
if($table!=''){
        $conn = $couponManager->getConnection();
        echo "<table class='table'>";
	echo "<tr>";
	echo "<th class='active'>Coupon Id </th>";
	echo "<th class='active'>Coupon Code</th>";
	echo "<th class='active'>Description</th>";
	echo "</tr>";			
        $qry = "SELECT * FROM ".$table;
       echo "<br>final qry = ".$qry;
       	$run = mysqli_query($conn, $qry);
      //  $numRows = mysql_num_rows($run);
        
        echo '<h2>             '.$run->num_rows." Results Found   :)</h2>";
        if($run->num_rows<=0){
           echo "No Result Found :(" ;
           return ;
       }
       $cnt=0;
	while($row = $run->fetch_assoc())
	  {
              $cnt ++;
              echo "<tr>";	
              echo   "<td>" . $row['CouponID'] . "</td><td>" . $row['CouponCode'] . "</td><td> " . $row['Description'] . "</td><td>";
              echo "</tr>";
	  
	  }
            echo "</table>";

if($cnt==0)
{
	echo "<center><h2 class='content-title'>No Results Found :( </h2></center>";
}
}
if($temp=='')
{
        $couponManager->ShowAllCoupons();
        
}

?>
