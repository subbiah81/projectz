<?php

if ($_POST['from']) {
$from = $_POST['from'];
} else {
$from = 'GBP';	
}

if ($_POST['to']) {
$to = $_POST['to'];
} else {
$to = 'USD';
}

$url = 'http://finance.yahoo.com/d/quotes.csv?f=l1d1t1&s='.$from.$to.'=X';
$handle = fopen($url, 'r');
 
if ($handle) {
    $result = fgetcsv($handle);
    fclose($handle);
}
 
$rate = $result[0];

echo "1 " . $from . " = " . $rate . " " . $to . "<input type='hidden' name='rate' value=".$rate.">";

?>