<?php
/**
 * Mage SMS - SMS notification & SMS marketing
 *
 */
class Sslwireless_Isms_Model_Observer
{
    public function SendSMS($observer)
    {
        //$customer = $observer->getEvent()-getCustomer();
		 $customer = $observer->getEvent()->getCustomer();
        $msisdn= $customer->getTelephone(); 
        // START At this point you can send this number to your SMS API
			
		//$msisdn2='01717676441';		
		$sms ='Congrats! You have successfully Register. Thank You.';		
		$user ="Test"; 
		$pass = "test"; 
		$sid = "TEST"; 	
		$url="http://oursmsurl.com/server.php";
		$unique_id_1=uniqid();
		$unique_id_2=uniqid();
		
		$param="user=$user&pass=$pass&sid=$sid&";	
		$sms="sms[0][0]=$msisdn&sms[0][1]=".urlencode($sms)."&sms[0][2]=".$unique_id_1."&sms[1][0]=$msisdn2&sms[1][1]=".urlencode($sms)."&sms[1][2]=".$unique_id_2."";
		
		$data=$param.$sms.$sid;
		$crl = curl_init();
		curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2);
		curl_setopt($crl,CURLOPT_URL,$url); 
		curl_setopt($crl,CURLOPT_HEADER,0);
		curl_setopt($crl,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($crl,CURLOPT_POST,1);
		curl_setopt($crl,CURLOPT_POSTFIELDS,$data); 
		$response = curl_exec($crl);
		curl_close($crl);
		//echo $response;
		
		//End Sent notification 
		
		//End At this point you can send this number to your SMS API...
		
		
    }
}