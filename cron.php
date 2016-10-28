<?php

mysql_pconnect("mysql.hostinger.co.uk","u890471436_cex","0fF@rs8o5")
or die("Can't connect to database server");

mysql_select_db("u890471436_cex")
or die("Can't connect to database");

$query = mysql_query("SELECT * FROM alerts WHERE complete='0' AND unsubscribe='0'");

while($row=mysql_fetch_array($query)) {
	
	$url = 'http://finance.yahoo.com/d/quotes.csv?f=l1d1t1&s='.$row['from'].$row['to'].'=X';
	$handle = fopen($url, 'r');
	
	if ($handle) {
		$result = fgetcsv($handle);
		fclose($handle);
	}
	
	$ratenow = $result[0];
	$roundedrate = round($ratenow,2);
	
	$timenow = date(DATE_RFC850);
	
	echo "1 " . $row['from'] . " = " . $ratenow  . " " . $row['to'] . ".  Target Rate was ".$row['target']." (USER: " .$row['email'].")"; //this can be hidden once site is live
	
	$domain = "http://cexalert.com"; //your domain goes here
	$id = $row['id'];
	$subject = "Currency Exchange Alert - 1 " .$row['from']. " = " .$roundedrate. " " .$row['to'];
	$message = file_get_contents("mail/alertemail_template.html");
	$message = str_replace("[base]",$row['from'],$message);
	$message = str_replace("[value]",$roundedrate,$message);
	$message = str_replace("[target]",$row['to'],$message);
	$message = str_replace("[time]",$timenow,$message);
	//$message = str_replace("[alertid]",$row['id'],$message);
	$message = str_replace("[emailid]",$row['email'],$message);
	$message = str_replace("[uniqueid]",hash("md5",$row['email']."cexalertdotcomsecretkey"),$message);


	//$message = "THIS IS WHERE YOU PUT YOUR MESSAGE TO THE CUSTOMER. <a href='".$domain."/unsubscribe.php?id=".$row['id']."&amp;email=".$row['email']."'>If you would like to unsubscribe please click here.</a>";
	$headers = 'From: noreply@cexalert.com' . "\r\n" .
	'Reply-To: noreply@cexalert.com' . "\r\n" .
	"MIME-Version: 1.0" . "\r\n" . 
	"Content-type: text/html; charset=UTF-8" . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

	switch ($row['operation']) {
	case "BELOW":
		if ($row['target'] > $ratenow){
			
			
			mail($row['email'], $subject, $message, $headers);
			
			$query_complete = mysql_query("UPDATE alerts SET complete='1',alerted_tmstmp=now() WHERE id = '$id'");
			
		}
		break;
	case "ABOVE":
		if ($row['target'] < $ratenow){
			
			
			
			mail($row['email'], $subject, $message, $headers);
			
			$query_complete = mysql_query("UPDATE alerts SET complete='1',alerted_tmstmp=now() WHERE id = '$id'");
			
			
			
		}
		break;

	} 

	echo "<BR>"; //this can be hidden once site is live

}
?>