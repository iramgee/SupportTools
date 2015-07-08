<?php 


 $awhen = $_POST['awhen'];
 $cwhen = $_POST['cwhen'];
  $agent = $_POST['agent'];
  $Cconsole = $_POST['Cconsole'];
  $agentLink = $_POST['agReURL'];
  $consoleLink = $_POST['conReURL'];
  $duration = "";

$affects = "";
$affectsLinks = "";
$affectTime = "";

if ($agent == "yes" && $Cconsole == "yes"){
	$duration = '<span size="2" face="Tahoma,sans-serif">Updates will be applied to all Cylance
          <span style="color: #00a94f;">
            <strong>
              <em>PROTECT</em>
            </strong>
          </span>Agents according to the Agent Update settings. No downtime is anticipated with the Console Update.';
	$affects = " <strong>Agent</strong> and 
        <strong>Console</strong>";
    $affectsLinks = ' <div>
      <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
        <span size="2" face="Calibri,sans-serif">
          <span size="2" face="Tahoma,sans-serif">
            <br />
            <strong>
            <span size="3">Cylance</span>
            <span style="color: #00a94f;">
              <strong>
                <em>
                  <span size="3">PROTECT</span>
                </em>
              </strong>
            </span> Agent Release Notes:</strong>
          </span>
        </span>
      </span>
    </div>
    <div>
      <div>
        <div>
          <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
          <a href="'.$agentLink.'">'.$agentLink.'</a>
          <br /></span>
        </div>
      </div>
      <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
        <span size="2" face="Calibri,sans-serif">
          <span size="2" face="Tahoma,sans-serif">
            <strong>
            <span size="3">
            <br />Cylance</span>
            <span style="color: #00a94f;">
              <strong>
                <em>
                  <span size="3">PROTECT</span>
                </em>
              </strong>
            </span> Console Release Notes:</strong>
          </span>
        </span>
      </span>
    </div>
    <div>
      <div>
        <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
        <a href="'.$consoleLink.'">'.$consoleLink.'</a>
        <br /></span>
      </div>'; 

      $affectTime = '<strong>
              <strong>
                <span size="3" face="Tahoma">Agent-</span>
              </strong>
            </strong>
            <span size="2" face="Tahoma,sans-serif">
              <span size="3">'.$awhen.' after 5:00PM Pacific Time.</span>
            </span>
            
            <br /><strong>Console-</strong> '.$cwhen.'</span>
            <span size="2" face="Tahoma,sans-serif"> 2015 at 9:00 PM Pacific Time.
            <br />';   
}
else if($agent == "yes" && $Cconsole == "no"){
	$duration = '<span size="2" face="Tahoma,sans-serif">Updates will be applied to all Cylance
          <span style="color: #00a94f;">
            <strong>
              <em>PROTECT</em>
            </strong>
          </span>Agents according to the Agent Update settings.';
	$affects = "  <strong>Agents</strong>";
	$affectsLinks = '<div>
      <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
        <span size="2" face="Calibri,sans-serif">
          <span size="2" face="Tahoma,sans-serif">
            <br />
            <strong>
            <span size="3">Cylance</span>
            <span style="color: #00a94f;">
              <strong>
                <em>
                  <span size="3">PROTECT</span>
                </em>
              </strong>
            </span> Agent Release Notes:</strong>
          </span>
        </span>
      </span>
    </div>
    <div>
      <div>
        <div>
          <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
          <a href="'.$agentLink.'">'.$agentLink.'</a>
          <br /></span>
        </div>
      </div>';
      $affectTime = '<strong>
              <strong>
                <span size="3" face="Tahoma">Agent-</span>
              </strong>
            </strong>
            <span size="2" face="Tahoma,sans-serif">
              <span size="3">'.$awhen.' after 5:00PM Pacific Time.</span>
            </span>
            
            <br />';
}
else{ 
	$duration = "No downtime is anticipated with the Console Update.";
	$affects = " <strong>Console</strong>";
	$affectsLinks = '<div> 
      <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
        <span size="2" face="Calibri,sans-serif">
          <span size="2" face="Tahoma,sans-serif">
            <strong>
            <span size="3">
            <br />Cylance</span>
            <span style="color: #00a94f;">
              <strong>
                <em>
                  <span size="3">PROTECT</span>
                </em>
              </strong>
            </span> Console Release Notes:</strong>
          </span>
        </span>
      </span>
    </div>
    <div>
      <div>
        <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
        <a href="'.$consoleLink.'">'.$consoleLink.'</a>
        <br /></span>
      </div>';
      $affectTime = '<strong>Console-</strong> '.$cwhen.'</span>
            <span size="2" face="Tahoma,sans-serif"> 2015 at 9:00 PM Pacific Time.
            <br />';	}

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
        <span size="2" face="Calibri,sans-serif">
          <span size="2" face="Tahoma,sans-serif">
            <strong>What:</strong>
          </span>
        </span>
        <span size="2" face="Calibri,sans-serif">
        <span size="2" face="Tahoma,sans-serif">Cylance will be releasing updates to the 
        <span size="2" face="Tahoma,sans-serif">
          <span size="3">Cylance</span>
          <span style="color: #00a94f;">
            <strong>
              <em>
                <span size="3">PROTECT</span>
              </em>
            </strong>
          </span>
        </span></span> 
        <span size="2" face="Tahoma,sans-serif">
       '.$affects.'</span>
        <span size="2" face="Tahoma,sans-serif">.</span></span>
      </span>
    </div>
    <div>
      <span style="font-size: 16px;">
        <span style="font-family: tahoma,arial,helvetica,sans-serif;" size="2" face="Calibri,sans-serif">
          <span size="2" face="Calibri,sans-serif">
            <span size="2" face="Tahoma,sans-serif">
              <br />
            </span>
            <span size="2" face="Tahoma,sans-serif">
              <strong>When:</strong>
            </span>
          </span>
        </span>
      </span>
    </div>
    <div>
      <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
        <span size="2" face="Calibri,sans-serif">
          <span size="2" face="Calibri,sans-serif">
            <span size="2" face="Tahoma,sans-serif">
            '.$affectTime.'
            <span size="2" face="Tahoma,sans-serif">
              <span size="3">
                <br />
              </span>
            </span></span>
          </span>
        </span>
        <span size="2" face="Calibri,sans-serif">
          <span size="2" face="Tahoma,sans-serif">
            <strong>Affects:</strong>
          </span>
          <span size="2" face="Tahoma,sans-serif">Cylance
          <span style="color: #00a94f;">
            <strong>
              <em>PROTECT</em>
            </strong>
          </span> '.$affects.'.</span>
        </span>
      </span>
    </div>
    <div>
      <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;" size="2" face="Calibri,sans-serif">
        <span size="2" face="Tahoma,sans-serif"></span>
      </span>
    </div>
    <div>
      <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
        <span size="2" face="Calibri,sans-serif">
          <span size="2" face="Tahoma,sans-serif">
            <strong>Duration:</strong>
          </span>
        </span>
        <span size="2" face="Calibri,sans-serif">
           '.$duration.'</span>
        </span>
      </span>
    </div>
   '.$affectsLinks.'
      <div>
        <p>
          <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
            <span size="2" face="Calibri,sans-serif">
              <span size="2" face="Tahoma,sans-serif">
                <span size="2" face="Calibri,sans-serif">
                  <span size="2" face="Tahoma,sans-serif">
                    <strong>To Disable Auto Update:
                    <br /></strong>
                  </span>
                </span>
              </span>
            </span>
            <span size="2" face="Calibri,sans-serif">
              <span size="2" face="Tahoma,sans-serif">
                <span size="2" face="Calibri,sans-serif">
                  <span size="2" face="Tahoma,sans-serif">
                    <a href="https://support.cylance.com/hc/en-us/articles/203775693-Disabling-Auto-Update-on-the-Agents">https://support.cylance.com/hc/en-us/articles/203775693-Disabling-Auto-Update-on-the-Agents</a>
                  </span>
                </span>
              </span>
            </span>
            <span size="2" face="Calibri,sans-serif">
              <span size="2" face="Tahoma,sans-serif">
                <span size="2" face="Calibri,sans-serif">
                  <span size="2" face="Tahoma,sans-serif">
                    <span style="color: #333333;">
                      <span style="color: #333333;">
                        <br />
                        <br />
                      </span>
                    </span>
                  </span>
                </span>
              </span>
            </span>
            <span size="2" face="Calibri,sans-serif">
              <span size="2" face="Tahoma,sans-serif">
                <strong>Where to go for more information:
                <br /></strong>
              </span>
            </span>
            <span size="2" face="Calibri,sans-serif">
              <span size="2" face="Tahoma,sans-serif">Go to</span>
              <span style="color: #1f28d9;">
                <span style="color: #1f28d9;" size="2" face="Tahoma,sans-serif" color="windowtext">
                <span style="color: #333333;">
                  <a href="https://support.cylance.com/" target="_blank">
                    https://support.cylance.com
                  </a>
                </span></span>
              </span>
              <span size="2" face="Tahoma,sans-serif">to see real time status messages, post any questions to the Community, or
              open a support ticket.</span>
            </span>
          </span>
        </p>
      </div>
    </div>
    <div>
      <span style="font-family: tahoma,arial,helvetica,sans-serif; font-size: 16px;">
        <span size="2" face="Calibri,sans-serif">
          <span size="2" face="Tahoma,sans-serif">If you have any questions or run into any problems please submit a support ticket
          at</span>
          <span style="color: #333333;" size="2" face="Tahoma,sans-serif" color="windowtext">
          <a href="https://support.cylance.com/hc/en-us/requests/new" target="_blank">
            <a href="https://support.cylance.com/hc/en-us/requests/new">https://support.cylance.com/hc/en-us/requests/new</a>
          </a></span>
          <span size="2" face="Tahoma,sans-serif">or call (866) 868-2079.</span>
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