<?php  
mysql_pconnect("mysql.hostinger.co.uk","u890471436_cex","0fF@rs8o5")
or die("Can't connect to database server");

mysql_select_db("u890471436_cex")
or die("Can't connect to database");

if (isset($_GET['email']) && 
	isset($_GET['u']) && 
	(strcmp($_GET['u'],hash("md5",$_GET['email']."cexalertdotcomsecretkey")) == 0)) {

	if (isset($_GET['id'])) {
		$query = "UPDATE alerts SET `unsubscribe`='1' WHERE id= '".$_GET['id']."' and email = '".$_GET['email']."'";
		$result = mysql_query($query);
	} else {
		$query = "UPDATE alerts SET `unsubscribe`='1' WHERE email = '".$_GET['email']."'";
		$result = mysql_query($query);	
	}
	
	echo "<h1>Your alert has been removed.</h1>";
	
} else {
	echo "<h1>URL is not valid. Please access this page via the link provided in your email.</h1>";
}
?>
