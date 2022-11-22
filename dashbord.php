<?php
$con=  mysqli_connect("us-mm-auto-dca-06-b.cleardb.net", "b7d462fec6fcb7",  "f24d7521",  "heroku_2fbaf1692e307d7");
mysqli_query($con,"SET CHARACTER SET 'utf8'");
session_start();


$session=session_id();
$time=time();
$count=mysqli_num_rows(mysqli_query( $con  , "select * from useronline where session='$session'"));
if($count==null)  mysqli_query( $con  , " INSERT INTO useronline(session, time)VALUES('$session', '$time') ");    else     mysqli_query( $con  , " UPDATE useronline SET time='$time' WHERE session = '$session' "); 
$count_user=mysqli_num_rows(mysqli_query( $con  ,"SELECT * FROM useronline"));
mysqli_query( $con  , "DELETE FROM useronline WHERE time<$time-600");
echo "online = $count_user";




?> <br/> <br/> les visitors <br/> <?php  

$result1  =  mysqli_query(      $con   ,    " select * from visitors   "    );
foreach($result1 as $row)	
{             
	$id= $row["id"];
	$datetime= $row["datetime"];	
	$ip= $row["ip"];
	?> <div>    <?php echo $id ?>    <?php echo $datetime ?>    <?php echo $ip ?>    </div>    <?php 
}



?> <br/> <br/> les clien <br/> <?php
$result2  =  mysqli_query(      $con   ,     " select * from orderclien"   );
foreach($result2 as $row)	
{               
	$id= $row["id"];	
	$datetime= $row["datetime"];
	$ip= $row["ip"];
	$product= $row["product"];
	$name= $row["name"];
	$num= $row["num"];
	$city= $row["city"];
	$size= $row["size"];
	$color= $row["color"];
	?> <div>      <?php echo $id ?>    <?php echo $datetime ?>    <?php echo $ip ?>     <?php echo $product ?>   <?php echo $name ?>   <?php echo $num ?>   <?php echo $city ?>   <?php echo $size ?>   <?php echo $color ?>       </div>    <?php 
} 

?>
