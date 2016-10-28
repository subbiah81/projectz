<?php  
mysql_pconnect("mysql.hostinger.co.uk","u890471436_cex","0fF@rs8o5")
	or die("Can't connect to database server");
	
mysql_select_db("u890471436_cex")
	or die("Can't connect to database");
	

if (isset($_POST['operation'])) {
	
if ($_POST['from']) {
$from = $_POST['from'];
}
if ($_POST['to']) {
$to = $_POST['to'];
}
if ($_POST['rate']) {
$rate = $_POST['rate'];
}
if ($_POST['target']) {
$target = $_POST['target'];
}
if ($_POST['email']) {
$email = $_POST['email'];
}
if ($_POST['operation']) {
$operation = $_POST['operation'];
}
	
$query = "REPLACE INTO alerts SET `from`='".$from."', `to`='" . $to . "', `rate`='" . $rate . "', `target`='" . $target . "', `email`='" . $email . "', `operation`='" . $operation . "'";

$result = mysql_query($query);
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>CEX Website</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">

  function checkForm(form)
  {
	  
	  var div1 = document.getElementById('warningTargetDiv');
	  var div2 = document.getElementById('warningEmailDiv');
	  var div3 = document.getElementById('warningDiv');
	  var submitDiv = document.getElementById('submitDiv');

	div1.innerHTML = '';
	div2.innerHTML = '';
	div3.innerHTML = '';

var x = document.forms["myform"]["target"].value;
	
    if (x == null || x == "") {
		
	var div = document.getElementById('warningTargetDiv');

	div.innerHTML = 'Please enter a target value!';
	submitDiv.innerHTML = '<input type="submit" class="btn btn-info btn-lg" disabled  value="Submit">';

	 
      return false;
    }
	
	var y = document.forms["myform"]["email"].value;
    
		
		
 	
var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

if (y == '' || !re.test(y))
{
	var div = document.getElementById('warningEmailDiv');
    div.innerHTML = 'Please enter a valid email address';
	submitDiv.innerHTML = '<input type="submit" class="btn btn-info btn-lg" disabled  value="Submit">';
    return false;
}
      
	
	if(!myform.terms.checked) {
      
	  var div = document.getElementById('warningDiv');

div.innerHTML = 'Please indicate that you accept the Terms and Conditions';
submitDiv.innerHTML = '<input type="submit" class="btn btn-info btn-lg" disabled  value="Submit">';

	
      return false;
    }
	
	
	
	
    
	var r = document.forms["myform"]["rate"].value;	  
    var x = document.forms["myform"]["target"].value;
	var submitDiv = document.getElementById('submitDiv');
	
	
	
	if (x <= r) {
		
		submitDiv.innerHTML = '<input type="submit" class="btn btn-warning btn-lg" onclick="return confirm(\'The rate you entered is currently higher than the target rate. Do you wish to continue?\');" value="Submit"><input type="hidden" name="operation" value="BELOW">';

	} else {
		submitDiv.innerHTML = '<input type="submit" class="btn btn-info btn-lg"  value="Submit"><input type="hidden"" name="operation" value="ABOVE">';
		
		
		 
		
	
	
	
    }
    
  }
  
  function calculate(form) {
	  
	  var from = document.forms["myform"]["from"].value;
	  var to = document.forms["myform"]["to"].value;
	  
	  $.ajax({
                type:"POST",
                url:"calc.php",
                data: {
        'from': from,
        'to': to
    },
                success: function(data){
                    $('#calc-result').html(data);
                }                               
            }); 
	  
  }

</script>
</head>
<body onLoad="calculate();">
<nav class="navbar navbar-inverse">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myInverseNavbar2"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#">CEX LOGO</a> </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="myInverseNavbar2">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">FB</a></li>
        <li><a href="#">Google</a></li>
        <li><a href="#">Twitter</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<div class="container" >
  <div class="row" style="background-image:url(img/1920x500.gif)">
    <div class="col-lg-6 col-md-6 " style="padding-top: 20px !important; opacity:0.8">
      <div class="well">
        <h3 class="text-center">Setup Alert</h3>
        <form class="form-horizontal" name="myform" method="post">
          <div class="form-group">
            <label for="location1" class="control-label">Currency From</label>
            <select class="form-control" name="from" onchange="return calculate(this);" id="location1">
              
              <option>AED</option>
              <option>AFN</option>
              <option>ALL</option>
              <option>AMD</option>
              <option>ANG</option>
              <option>AOA</option>
              <option>ARS</option>
              <option>AUD</option>
              <option>AWG</option>
              <option>AZN</option>
              <option>BAM</option>
              <option>BBD</option>
              <option>BDT</option>
              <option>BGN</option>
              <option>BHD</option>
              <option>BIF</option>
              <option>BMD</option>
              <option>BND</option>
              <option>BOB</option>
              <option>BRL</option>
              <option>BSD</option>
              <option>BTN</option>
              <option>BWP</option>
              <option>BYR</option>
              <option>BZD</option>
              <option>CAD</option>
              <option>CDF</option>
              <option>CHF</option>
              <option>CLP</option>
              <option>CNY</option>
              <option>COP</option>
              <option>CRC</option>
              <option>CUC</option>
              <option>CUP</option>
              <option>CVE</option>
              <option>CZK</option>
              <option>DJF</option>
              <option>DKK</option>
              <option>DOP</option>
              <option>DZD</option>
              <option>EGP</option>
              <option>ERN</option>
              <option>ETB</option>
              <option>EUR</option>
              <option>FJD</option>
              <option>FKP</option>
              <option selected>GBP</option>
              <option>GEL</option>
              <option>GGP</option>
              <option>GHS</option>
              <option>GIP</option>
              <option>GMD</option>
              <option>GNF</option>
              <option>GTQ</option>
              <option>GYD</option>
              <option>HKD</option>
              <option>HNL</option>
              <option>HRK</option>
              <option>HTG</option>
              <option>HUF</option>
              <option>IDR</option>
              <option>ILS</option>
              <option>IMP</option>
              <option>INR</option>
              <option>IQD</option>
              <option>IRR</option>
              <option>ISK</option>
              <option>JEP</option>
              <option>JMD</option>
              <option>JOD</option>
              <option>JPY</option>
              <option>KES</option>
              <option>KGS</option>
              <option>KHR</option>
              <option>KMF</option>
              <option>KPW</option>
              <option>KRW</option>
              <option>KWD</option>
              <option>KYD</option>
              <option>KZT</option>
              <option>LAK</option>
              <option>LBP</option>
              <option>LKR</option>
              <option>LRD</option>
              <option>LSL</option>
              <option>LYD</option>
              <option>MAD</option>
              <option>MDL</option>
              <option>MGA</option>
              <option>MKD</option>
              <option>MMK</option>
              <option>MNT</option>
              <option>MOP</option>
              <option>MRO</option>
              <option>MUR</option>
              <option>MVR</option>
              <option>MWK</option>
              <option>MXN</option>
              <option>MYR</option>
              <option>MZN</option>
              <option>NAD</option>
              <option>NGN</option>
              <option>NIO</option>
              <option>NOK</option>
              <option>NPR</option>
              <option>NZD</option>
              <option>OMR</option>
              <option>PAB</option>
              <option>PEN</option>
              <option>PGK</option>
              <option>PHP</option>
              <option>PKR</option>
              <option>PLN</option>
              <option>PYG</option>
              <option>QAR</option>
              <option>RON</option>
              <option>RSD</option>
              <option>RUB</option>
              <option>RWF</option>
              <option>SAR</option>
              <option>SBD</option>
              <option>SCR</option>
              <option>SDG</option>
              <option>SEK</option>
              <option>SGD</option>
              <option>SHP</option>
              <option>SLL</option>
              <option>SOS</option>
              <option>SPL</option>
              <option>SRD</option>
              <option>STD</option>
              <option>SVC</option>
              <option>SYP</option>
              <option>SZL</option>
              <option>THB</option>
              <option>TJS</option>
              <option>TMT</option>
              <option>TND</option>
              <option>TOP</option>
              <option>TRY</option>
              <option>TTD</option>
              <option>TVD</option>
              <option>TWD</option>
              <option>TZS</option>
              <option>UAH</option>
              <option>UGX</option>
              <option>USD</option>
              <option>UYU</option>
              <option>UZS</option>
              <option>VEF</option>
              <option>VND</option>
              <option>VUV</option>
              <option>WST</option>
              <option>XAF</option>
              <option>XCD</option>
              <option>XDR</option>
              <option>XOF</option>
              <option>XPF</option>
              <option>YER</option>
              <option>ZAR</option>
              <option>ZMW</option>
              <option>ZWD</option>
            </select>
          </div>
          <div class="form-group"><strong>Currency To</strong>
            <select class="form-control" name="to" onchange="return calculate(this);" id="type1">
              
              <option>AED</option>
              <option>AFN</option>
              <option>ALL</option>
              <option>AMD</option>
              <option>ANG</option>
              <option>AOA</option>
              <option>ARS</option>
              <option>AUD</option>
              <option>AWG</option>
              <option>AZN</option>
              <option>BAM</option>
              <option>BBD</option>
              <option>BDT</option>
              <option>BGN</option>
              <option>BHD</option>
              <option>BIF</option>
              <option>BMD</option>
              <option>BND</option>
              <option>BOB</option>
              <option>BRL</option>
              <option>BSD</option>
              <option>BTN</option>
              <option>BWP</option>
              <option>BYR</option>
              <option>BZD</option>
              <option>CAD</option>
              <option>CDF</option>
              <option>CHF</option>
              <option>CLP</option>
              <option>CNY</option>
              <option>COP</option>
              <option>CRC</option>
              <option>CUC</option>
              <option>CUP</option>
              <option>CVE</option>
              <option>CZK</option>
              <option>DJF</option>
              <option>DKK</option>
              <option>DOP</option>
              <option>DZD</option>
              <option>EGP</option>
              <option>ERN</option>
              <option>ETB</option>
              <option>EUR</option>
              <option>FJD</option>
              <option>FKP</option>
              <option>GBP</option>
              <option>GEL</option>
              <option>GGP</option>
              <option>GHS</option>
              <option>GIP</option>
              <option>GMD</option>
              <option>GNF</option>
              <option>GTQ</option>
              <option>GYD</option>
              <option>HKD</option>
              <option>HNL</option>
              <option>HRK</option>
              <option>HTG</option>
              <option>HUF</option>
              <option>IDR</option>
              <option>ILS</option>
              <option>IMP</option>
              <option>INR</option>
              <option>IQD</option>
              <option>IRR</option>
              <option>ISK</option>
              <option>JEP</option>
              <option>JMD</option>
              <option>JOD</option>
              <option>JPY</option>
              <option>KES</option>
              <option>KGS</option>
              <option>KHR</option>
              <option>KMF</option>
              <option>KPW</option>
              <option>KRW</option>
              <option>KWD</option>
              <option>KYD</option>
              <option>KZT</option>
              <option>LAK</option>
              <option>LBP</option>
              <option>LKR</option>
              <option>LRD</option>
              <option>LSL</option>
              <option>LYD</option>
              <option>MAD</option>
              <option>MDL</option>
              <option>MGA</option>
              <option>MKD</option>
              <option>MMK</option>
              <option>MNT</option>
              <option>MOP</option>
              <option>MRO</option>
              <option>MUR</option>
              <option>MVR</option>
              <option>MWK</option>
              <option>MXN</option>
              <option>MYR</option>
              <option>MZN</option>
              <option>NAD</option>
              <option>NGN</option>
              <option>NIO</option>
              <option>NOK</option>
              <option>NPR</option>
              <option>NZD</option>
              <option>OMR</option>
              <option>PAB</option>
              <option>PEN</option>
              <option>PGK</option>
              <option>PHP</option>
              <option>PKR</option>
              <option>PLN</option>
              <option>PYG</option>
              <option>QAR</option>
              <option>RON</option>
              <option>RSD</option>
              <option>RUB</option>
              <option>RWF</option>
              <option>SAR</option>
              <option>SBD</option>
              <option>SCR</option>
              <option>SDG</option>
              <option>SEK</option>
              <option>SGD</option>
              <option>SHP</option>
              <option>SLL</option>
              <option>SOS</option>
              <option>SPL</option>
              <option>SRD</option>
              <option>STD</option>
              <option>SVC</option>
              <option>SYP</option>
              <option>SZL</option>
              <option>THB</option>
              <option>TJS</option>
              <option>TMT</option>
              <option>TND</option>
              <option>TOP</option>
              <option>TRY</option>
              <option>TTD</option>
              <option>TVD</option>
              <option>TWD</option>
              <option>TZS</option>
              <option>UAH</option>
              <option>UGX</option>
              <option selected>USD</option>
              <option>UYU</option>
              <option>UZS</option>
              <option>VEF</option>
              <option>VND</option>
              <option>VUV</option>
              <option>WST</option>
              <option>XAF</option>
              <option>XCD</option>
              <option>XDR</option>
              <option>XOF</option>
              <option>XPF</option>
              <option>YER</option>
              <option>ZAR</option>
              <option>ZMW</option>
              <option>ZWD</option>
            </select>
          </div>
          <div class="form-group" id="calc-result"></div>
          <div class="form-group">
            <label for="target" class="control-label">Target Rate</label>
            <div class="input-group">
              <div class="input-group-addon">$</div>
              <input name="target" type="number" class="form-control" id="target"  pattern="[0-9]+([\.|,][0-9]+)?" step=".01" onFocus="checkForm(this);" onBlur="checkForm(this);" onSelect="checkForm(this);">
            </div>
            <div class="alert-warning" id="warningTargetDiv"></div>
          </div>
          <div class="form-group">
            <label for="email" class="control-label">Email ID</label>
            <div class="input-group">
              <div class="input-group-addon">e</div>
              <input onBlur="checkForm(this);" onFocus="checkForm(this);" onSelect="checkForm(this);" onKeyPress="checkForm(this);" type="email" name="email" class="form-control" id="email">
            </div>
            <div class="alert-warning" id="warningEmailDiv"></div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <label>
                <input type="checkbox" onClick="checkForm(this);"   required name="terms" value="1">
                I agree with the <a data-toggle="modal" data-target="#termsModal">terms &amp; conditions.</a></label>
              <div class="alert-warning" id="warningDiv"></div>
            </div>
          </div>
          <p class="text-center"> 
            <div id="submitDiv"><input type="submit" class="btn btn-info btn-lg" disabled  value="Submit">
            </div>
          </p>
          
          
          
        </form>
        </div></div></div></div>
       
        <!-- Modal -->
        <div id="termsModal" class="modal fade" role="dialog">
          <div class="modal-dialog"> 
            
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Terms and Conditions</h4>
              </div>
              <div class="modal-body">
                <p>This is where the terms will go!</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
</div>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" align="center">
        <div class="media">
          <div class="media-middle"> <span class="glyphicon glyphicon-alert" style="font-size:3.0em;" aria-hidden="true"></span> </div>
          <div class="media-body">
            <h4 class="media-heading">Set up an alert for your target currency value</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" align="center">
        <div class="media">
          <div class="media-middle"> <span class="glyphicon glyphicon-inbox" style="font-size:3.0em;" aria-hidden="true"></span> </div>
          <div class="media-body">
            <h4 class="media-heading">Get an alert when exchange rate reaches your target value</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" align="center">
        <div class="media">
          <div class="media-middle"> <span class="glyphicon glyphicon-transfer" style="font-size:3.0em;" aria-hidden="true"></span> </div>
          <div class="media-body">
            <h4 class="media-heading">Transfer the money with your preferred currency supplier</h4>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<hr>
<div class="container">
  <div class="row"></div>
</div>
<section>
  <div class="container">
    <div class="row"></div>
  </div>
</section>
<div class="container ">
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-lg-6 col-md-6 well"> <span class="text-right"> </span>
      <h3>Blog Feed</h3>
      <hr>
      <div class="media">
        <div class="media-body">
          <h4 class="media-heading">Heading 1</h4>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, quod temporibus veniam deserunt deleniti accusamus voluptatibus at illo sunt quisquam. </div>
        <div class="media-right"> <a href="#"> <img class="media-object" src="img/75X.gif" alt="placeholder image"></a></div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-lg-6 col-md-6 well"> <span class="text-right"> </span>
      <h3>Ad Image</h3>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, consequatur neque exercitationem distinctio esse! Cupiditate doloribus a consequatur iusto illum eos facere vel iste iure maxime. Velit, rem, sunt obcaecati eveniet id nemo molestiae. In.</p>
    </div>
  </div>
</div>
<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © CEX. All rights reserved. <a data-toggle="modal" data-target="#privacyModal">Privacy Policy</a></p>
      </div>
    </div>
  </div>
</footer>
<!-- Modal -->
<div id="privacyModal" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Privacy Policy</h4>
      </div>
      <div class="modal-body">
        <p>This is where the privacy will go!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.2.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.min.js"></script>
</body>
</html>