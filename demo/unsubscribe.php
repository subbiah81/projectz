<?php  
mysql_pconnect("mysql.hostinger.co.uk","u890471436_cex","0fF@rs8o5")
	or die("Can't connect to database server");
	
mysql_select_db("u890471436_cex")
	or die("Can't connect to database");
	

if (isset($_GET['id'])) {
	

$query = "UPDATE alerts SET `unsubscribe`='1' WHERE id= '".$_GET['id']."' and email = '".$_GET['email']."'";

$result = mysql_query($query);
	
}

?>

    <h1>You are now unsubscribed</h1>
