<?php 
$customerName = $_POST['customerName'];
$numberOFYears = $_POST['years'];
$endpoints = $_POST['endpoints'];
$atamSelect = $_POST['atam'];
$supportName = "Chris Nevarez";

$atam = " and Support";
if ($atamSelect == "yes"){
	$atam = ", Support and Alert Management";
}

$str = 'Hi '.$customerName.',<br /><br/>
We want to thank you for choosing <strong>CylancePROTECT</strong> as your next generation endpoint protection.  We are here to make sure you stay happy and satisfied with your decision.<br /><br />
Your annual <strong>CylancePROTECT</strong> subscription entitles you to <strong>'.$numberOFYears.'</strong> year(s) of free Upgrades'.$atam.' on <strong>'.$endpoints.'</strong> endpoints.<br/><br/>
Your existing POC environment has been converted into a Production account, and you can access the PROTECT console as usual with your company email addresses here:<br/>
<a href="https://my.cylance.com">https://my.cylance.com</a> <br /><br/>
If you run into questions/concerns don’t panic.  We’re here for you.<br/>
Call <strong>(866) 868-2079</strong>, email <a href="mailto:ticket@cylance.com">ticket@cylance.com</a> or go to <a href="https://support.cylance.com">https://support.cylance.com</a> to view the <strong>Knowledge Base, Frequently Asked Questions</strong> or Submit a <strong>Support Ticket</strong>.<br/> <br/>
We understand your business is always changing and growing, and we are happy to help you achieve your goals. <br/> <br />
Again, thank you for choosing Cylance.<br /><br />
Sincerely,<br />
'.$supportName

;

echo "<strong>HTML coding:</strong><br /><hr />";
echo "<pre>";        
echo htmlentities($str, ENT_QUOTES);
echo "</pre>";

echo "<strong>Preview</strong><br/><hr/>";
echo $str;
?>