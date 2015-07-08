<?php 


 $awhen = $_POST['awhen'];
 $cwhen = $_POST['cwhen'];
  $agent = $_POST['agent'];
  $Cconsole = $_POST['Cconsole'];
  $agentLink = $_POST['agReURL'];
  $consoleLink = $_POST['conReURL'];
  $agentWhy = "";
  $version = $_POST['agentVersion'];


$affects = "";
$affectsLinks = "";
$affectTime = "";

//affects both
if ($agent == "yes" && $Cconsole == "yes"){
	$agentWhy = '<strong>'.$version.'</strong> 
          <span face="Tahoma,sans-serif" size="2">
          <strong>Agent</strong> update is being delayed until 
          <strong>'.$awhen.'</strong> '.$agentLink;
	$affects = " <strong>Agent</strong> and <strong>Console</strong>";   
}
//Affects only the agent
else if($agent == "yes" && $Cconsole == "no"){
	 $agentWhy = '<strong>'.$version.'</strong> 
          <span face="Tahoma,sans-serif" size="2">
          <strong>Agent</strong> update is being delayed until 
          <strong>'.$awhen.'</strong> '.$agentLink;
	$affects = "  <strong>Agents</strong>";
}
//Affects only the console
else{ 
	$duration = "No downtime is anticipated with the Console Update.";
	$affects = " <strong>Console</strong>";
	$affectsLinks = '<a href="'.$consoleLink.'">'.$consoleLink.'</a>';
      $affectTime = '<strong>Console-</strong> '.$cwhen.'</span>';	}

$str = '
    <h2>
      <span style="font-family: tahoma, arial, helvetica, sans-serif;">Cylance
      <em>
        <strong>
          <span style="color: #00a94f;">PROTECT</span>
        </strong>
      </em> Update Notification</span>
    </h2>
    <div>
      <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
      <span face="Calibri,sans-serif" size="2">
        <span face="Tahoma,sans-serif" size="2">
        <strong>What: </strong>The</span>
      </span> 
      <span face="Calibri,sans-serif" size="2">
        <span face="Tahoma,sans-serif" size="2">
        <span face="Tahoma,sans-serif" size="2">
          <span size="3">Cylance</span>
          <span style="color: #00a94f;">
            <strong>
              <em>
                <span size="3">PROTECT</span>
              </em>
            </strong>
          </span>
        </span></span>
        <span face="Tahoma,sans-serif" size="2">
        '.$affects.' update is delayed.</span>
      </span></span>
    </div>
    <div>
    <span style="font-size: 16px;">
      <span style="font-family: tahoma,arial,helvetica,sans-serif;" face="Calibri,sans-serif" size="2">
        <span face="Calibri,sans-serif" size="2">
          <span face="Tahoma,sans-serif" size="2">
            <br />
          </span>
          <span face="Tahoma,sans-serif" size="2">
            <strong>Why:</strong>
          </span>
        </span>
      </span>
    </span> 
    <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
      <span face="Calibri,sans-serif" size="2">
        <span face="Calibri,sans-serif" size="2">
          <span face="Tahoma,sans-serif" size="2">The 
          <span style="font-family: Tahoma;" face="Tahoma">
          <span face="Tahoma,sans-serif" size="2">
            <span size="3">Cylance</span>
            <span style="color: #00a94f;">
              <strong>
                <em>
                  <span size="3">
                    <span style="color: #00a94f;" color="#00A94F">PROTECT</span>
                  </span>
                </em>
              </strong>
            </span>
          </span>
          '.$agentWhy.'
          
          <br /></span></span>
          <span face="Tahoma,sans-serif" size="2">
            <span size="3">
              <br />
            </span>
          </span></span>
        </span>
      </span>
      <span face="Calibri,sans-serif" size="2">
        <span face="Tahoma,sans-serif" size="2">
          <strong>Affects:</strong>
        </span>
        <span face="Tahoma,sans-serif" size="2">Cylance
        <span style="color: #00a94f;">
          <strong>
            <em>PROTECT</em>
          </strong>
        </span> '.$affects.'.</span>
      </span>
    </span></div>
    <div>
      <div>
        <p><br/>
          <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
            <span face="Calibri,sans-serif" size="2">
              <span face="Tahoma,sans-serif" size="2">
                <strong>Where to go for more information:
                <br /></strong>
              </span>
            </span>
            <span face="Calibri,sans-serif" size="2">
              <span face="Tahoma,sans-serif" size="2">Go to</span>
              <span style="color: #1f28d9;">
                <span style="color: #1f28d9;" face="Tahoma,sans-serif" size="2" color="windowtext">
                <span style="color: #333333;">
                  <a href="https://support.cylance.com/" target="_blank">
                    <span style="color: #333333;">https://support.cylance.com</span>
                  </a>
                </span></span>
              </span>
              <span face="Tahoma,sans-serif" size="2">to see real time status messages, post any questions to the Community, or
              open a support ticket.</span>
            </span>
          </span>
        </p>
      </div>
    </div>
    <div>
      <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
        <span face="Calibri,sans-serif" size="2">
          <span face="Tahoma,sans-serif" size="2">If you have any questions or run into any problems please submit a support ticket
          at</span>
          <span style="color: #333333;" face="Tahoma,sans-serif" size="2" color="windowtext">
          <a href="https://support.cylance.com/hc/en-us/requests/new" target="_blank">
            <span style="color: #333333;">https://support.cylance.com/hc/en-us/requests/new</span>
          </a></span>
          <span face="Tahoma,sans-serif" size="2">or call (866) 868-2079.</span>
        </span>
      </span>
    </div>
';

echo "<strong>HTML coding (coding has been minified for HubSpot) :</strong><br /><hr />";
//echo "<pre>";        
echo htmlentities($str, ENT_QUOTES);
//echo "</pre>";

echo "<br /><strong>Preview</strong><br/><hr/>";
echo $str;
?>