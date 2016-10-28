<?php  

// Check for empty fields
if(empty($_POST['currencyFrom'])  		||
		empty($_POST['currencyTo']) 		||
		empty($_POST['currentValue']) 		||
		empty($_POST['targetValue'])	||
		empty($_POST['alertEmail']))
{
	echo "No arguments Provided!";
	return false;
}

$currencyFrom = $_POST['currencyFrom'];
$currencyTo = $_POST['currencyTo'];
$currentValue = $_POST['currentValue'];
$targetValue = $_POST['targetValue'];
$alertEmail = $_POST['alertEmail'];

if ($targetValue <= $currentValue) {
	$operation = 'BELOW';
} else {
	$operation = 'ABOVE';
}

$ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

mysql_pconnect("mysql.hostinger.co.uk","u890471436_cex","0fF@rs8o5")
or die("Can't connect to database server");

mysql_select_db("u890471436_cex")
or die("Can't connect to database");

$query = "INSERT INTO alerts SET `from`='".$currencyFrom."', `to`='" . $currencyTo . "', `rate`='" . $currentValue . "', `target`='" . $targetValue . "', `email`='" . $alertEmail . "', `operation`='" . $operation . "', `ipaddress`='".$ipaddress."'";
$result = mysql_query($query);

if ($result) {

	$domain = "http://cexalert.com"; //your domain goes here
	$subject = "Cex Alert Confirmation";
	$message = file_get_contents("confirmationemail_template.html");
	$message = str_replace("[base]",$currencyFrom,$message);
	$message = str_replace("[value]",$targetValue,$message);
	$message = str_replace("[target]",$currencyTo,$message);
	$message = str_replace("[operation]",$operation,$message);
	$message = str_replace("[emailid]",$alertEmail,$message);
	$message = str_replace("[uniqueid]",hash("md5",$alertEmail."cexalertdotcomsecretkey"),$message);
	$message = str_replace("[alertid]",mysql_insert_id(),$message);


	//$message = "THIS IS WHERE YOU PUT YOUR MESSAGE TO THE CUSTOMER. <a href='".$domain."/unsubscribe.php?id=".$row['id']."&amp;email=".$row['email']."'>If you would like to unsubscribe please click here.</a>";
	$headers = 'From: noreply@cexalert.com' . "\r\n" .
	'Reply-To: noreply@cexalert.com' . "\r\n" .
	"MIME-Version: 1.0" . "\r\n" . 
	"Content-type: text/html; charset=UTF-8" . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	mail($alertEmail, $subject, $message, $headers);

} else {
	error_log("Failed to setup alert for $alertEmail");
}

return true;
?>