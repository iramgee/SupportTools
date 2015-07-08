<?php 
$customerName = $_POST['customerName'];
$date = $_POST['date'];
$supportName = "Chris Nevarez";


$str = 'Hi '.$customerName.' Team,<br/><br/> 

We understand the POC has come to an end.  Thank you for your participation and feedback. <br/>  <br/>
We will be removing the <strong>'.$customerName.'</strong> organization from accessing PROTECT on <strong>'.$date.'</strong>.  As a result your logins will be disabled.  Any CylancePROTECT Agents you have installed will stop functioning, and complain they’re unable to register.<br/><br/>
 
It’s recommended you uninstall any remaining Agent(s): <br /><br/>
> msiexec /Lvx* c:\Temp\MsiUnInstall.log /x {2E64FC5C-9286-4A31-916B-0D8AE4B22954} /qn  UNINSTALLKEY=<MyUninstallKey><br/>
or if the .exe was used to install:<br/>
>  CylanceProtectSetup.exe /quiet UNINSTALLKEY=<MyUninstallKey> /uninstall<br/>
Where <MyUninstallKey> is the Uninstall Password specified in Settings > Application<br /> <br/>
If you run into any issues or concerns, please let us know. <br/><br/>
Thank you from the CylanceSUPPORT Team! <br/>
(866) 868-2079<br/>
'.$supportName;

echo "<strong>HTML coding:</strong><br /><hr />";
echo "<pre>";        
echo htmlentities($str, ENT_QUOTES);
echo "</pre>";

echo "<strong>Preview</strong><br/><hr/>";
echo $str;
?>