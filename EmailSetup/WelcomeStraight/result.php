<?php 
$customerName = $_POST['customerName'];
$numberOFYears = $_POST['years'];
$endpoints = $_POST['endpoints'];
$atamSelect = $_POST['atam'];
$contactEmail = $_POST['contactEmail'];
$supportName = "Chris Nevarez";

$atam = " and Support";
if ($atamSelect == "yes"){
	$atam = ", Support and Alert Management";
}

$str = 'Hi <strong>'.$customerName.'</strong>,<br /><br />

We want to thank you for choosing <strong>CylancePROTECT</strong> as your next generation endpoint protection. We are here to make sure you stay happy and satisfied with your decision.<br /><br />

Your annual <strong>CylancePROTECT</strong> subscription entitles you to <strong>'.$numberOFYears.'</strong> Year(s) Product upgrades'.$atam.' on <strong>'.$endpoints.'</strong> endpoints. You can access your PROTECT console with your company email addresses here:<br/> 
<a href="https://my.cylance.com">https://my.cylance.com</a><br/><br/>

You will be receiving two emails shortly:<br/>
1. One from Box: noreply@box.com titled “<strong>Cylance Support has added you to a collaborated folder on box…</strong>”. This location will have all your weekly Alert Management Reports. Please be sure to setup 2-factor authentication for your box account as an added security precaution.<br/>
2. One from no-reply@cylance.com  titled “<strong>Your administrator invited you to join CylancePROTECT</strong>” – this is to setup your PROTECT Account.  So you can access your PROTECT Console at:<br/>
<a href="https://my.cylance.com">https://my.cylance.com</a><br/> <br/>
From there you can get the agent installers (from <strong>Settings > Application</strong>.  Click the “<strong>Install</strong>” button to download the .exe installer, or get the OS Specific .msi(s)).<br/>
You can also add new Users or Administrators by going to <strong>Settings > User Management > Add Users.</strong><br/><br/>
<font color="red"><strong>Note:</strong></font>  The link in the setup PROTECT email will expire after 4 hours. Let me know if you need me to resend it.<br/>
I’m also attaching the CylancePROTECT Admin guide to help get you started.<br/><br/>

The <strong>Support Site</strong> is located at:<br/>
<a href="https://support.cylance.com">https://support.cylance.com</a>
from there you can view our <strong>Knowledge Base</strong>, and submit <strong>support tickets</strong> if needed.<br/>
To setup a Support password follow this link:  <a href="https://cylance.zendesk.com/auth/v2/login/password_reset?brand_id=2398416&return_to=https%3A%2F%2Fsupport.cylance.com%2Fhc%2Fen-us">https://cylance.zendesk.com/auth/v2/login/password_reset?brand_id=2398416&return_to=https%3A%2F%2Fsupport.cylance.com%2Fhc%2Fen-us</a><br/><br/>
<font color="red"><strong>Note:</strong></font> We’ve already set you up in the Support Portal using this email address:  <strong>'.$contactEmail.'</strong>  - You just need to set a password.<br/><br />

I currently have you setup as the Primary Administrator.  Which means any Alert Management (Verified Threat) Emails will come to you.  If you’d like to designate another contact, or a Distribution List for which to send these notifications, please reply back or call me with that information.<br />
<br/>
If you run into questions/concerns don’t panic.  We’re here for you:<br/>
Call <strong>(866) 868-2079</strong>, email <a href="mailto:support@cylance.com">support@cylance.com</a> or go to <a href="https://support.cylance.com">https://support.cylance.com </a> to view the <strong>Knowledge Base, Frequently Asked Questions or Submit a Support Ticket</strong>.<br/><br/>

We understand your business is always changing and growing, and we are happy to help you achieve your goals. <br/><br/> 

Again, thank you for choosing Cylance.<br/>';

echo "<strong>HTML coding:</strong><br /><hr />";
echo "<pre>";        
echo htmlentities($str, ENT_QUOTES);
echo "</pre>";

echo "<strong>Preview</strong><br/><hr/>";
echo $str;
?>