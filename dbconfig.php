<?php


	$db_host = "localhost";
	$db_name = "dbregistration";
	$db_user = "root";
	$db_pass = "";
	
	try{
		
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}

	function send_msg($no, $msg ){

		// africastalking msg code here; 

require_once('AfricasTalkingGateway.php');
// Specify your login credentials
$username   = "Masterabram";
$apikey     = "dff909448e42478d8b343b425cd81c408b160d4d94532e3750e294326dce9a33";
// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$recipients = $no;
// And of course we want our recipients to know what we really do
$message    = $msg;
// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);
// Any gateway error will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block
try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
            
  foreach($results as $result) {
    // status is either "Success" or "error message"
    // echo " Number: " .$result->number;
    // echo " Status: " .$result->status;
    // echo " MessageId: " .$result->messageId;
    // echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}


	}

?>