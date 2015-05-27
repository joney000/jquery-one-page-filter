<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css.css">
<link rel="stylesheet" type="text/css" href="style.css">
  <title>CouponDunia Search Agent</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <link rel="css/bootstrap.min.css">
  <script type="text/javascript">
$('document').ready(function(){
var temp1='';var temp2='';var temp3='';
$.post('fetch.php',{id1:temp1,id2:temp2,id3:temp3},function(data){
$('#display').html(data);
});
});
$('document').ready(function(){
$('#find').click(function(){
var temp1=$('#form').find('input[name="search1"]').val();
var temp2=$('#form').find('input[name="search2"]').val();
var temp3=$('#form').find('input[name="search3"]').val();

$.post('fetch.php',{id1:temp1,id2:temp2,id3:temp3},function(data){
$('#display').html(data);
});
});
});

</script>
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
</style>
</head> 
<body>
  <div class="tab-pane" >
        <div class="container">
           <div class="content-container clearfix">
               <div class="col-md-12">
			    <br>	   
                   <center><h2 class="content-title">CouponDunia Search Agent</h2></center>
			    <br>
			</div>	
			</div>
            </hr>
            	<div id='form'>			   
                   
                    <label>Filter By Coupon Type :</label> <input type="search" placeholder="Search Through Coupon Type : coupon or deal" class="form-control mail-search" name="search1"  />
		
                    <br>
               	    <label>Filter By Stores :</label> <input type="search" placeholder="Filter Through Stores like flipkart , amazon etc" class="form-control mail-search" name="search2"  />
                    <br>
                        <label>Filter By Categories :</label> <input type="search" placeholder="Filter Through Categories eg Fashion ,Travel etc" class="form-control mail-search" name="search3"  />
                    <br>
                  
                                <center>
				   <button type="button" id="find" class="btn btn-primary">Search</button>
				   </center>
				  </div>
				   <br>
				   <br>
                   <div id="display">	  
                   </div>
		</div>
    </div>

</body>
</html>

