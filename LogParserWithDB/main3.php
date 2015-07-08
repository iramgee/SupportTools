
<!--Tablesorter-->

  <script type="text/javascript" src="tablesorter/jquery.tablesorter.js"></script>
  <script type="text/javascript" src="tablesorter/addons/pager/jquery.tablesorter.pager.js"></script>


<?php 
	include 'config/config.php';

	include 'main2.php'; 
?>

<div id="accordion">
	<h3>Device Information</h3>
	<div>
		<ul>
	 		<li><strong>Device name:</strong> <?php echo $dname; ?> </li>
	 		<li><strong>Agent Version:</strong> <?php echo $agentVersion; ?> </li>
	 		<li><strong>OS:</strong> <?php echo $os; ?> </li>
	 		<li><strong>Device Fingerprint:</strong> <?php echo $fingerPrint ?> </li>
	 		<li> </li>
	 	</ul>
 	</div>
  <h3><span id="WarningNum"></span> Warnings</h3>
  	<div>
		<?php grabData('Warning','g:','warnings');?>
			<div id="pager" class="pager"></div>
		
  	</div>
  	<h3><span id="errorCount"></span> Errors</h3>
  	<div>
		<?php grabData('Error:','ror:','errors'); ?>
  	</div>
  	<h3><span id="statCount"></span> Rows of Stats</h3>
  	<div>
	   <?php getCpuStats(); ?>
		<table class="tablesorter" id="statsTable">
		<thead>
			<th>Time</th>
			<th>PrivateMemorySize</th>
			<th>CpuUser%</th>
			<th>Threads</th>
			<th>Handles</th>
			<th>WorkingSet</th>
			<th>PeakWorkingSet</th>
			<th>VirtualMemorySize</th>
			<th>PeakVirtualMemorySize</th>
			<th>PagedMemorySize</th>
			<th>PeakPagedMemorySize</th>
		</thead>
		<tbody>
			<?php showFirstPart('stats');?>
			</tbody>
		</table>
				<div id="pager" class="pager">
					<form>
						<img src="images/first.png" class="first"/>
						<img src="images/prev.png" class="prev"/>
						<input type="text" class="pagedisplay"/>
						<img src="images/next.png" class="next"/>
						<img src="images/last.png" class="last"/>
						<select class="pagesize">
							<option selected="selected"  value="10">10</option>
							<option value="20">20</option>
							<option value="30">30</option>
							<option  value="40">40</option>
						</select>
					</form>
				</div>
		<br/>
		<table class="tablesorter">
		<thead>
			<th>Time</th>
			<th>PagedSystemMemorySize</th>
			<th>NonpagedSystemMemorySize</th>
			<th>CpuPriv%</th>
			<th>CpuTotl%</th>
			<th>ElapsedTime</th>
			<th>WorkingSetPrivateMemory</th>
			<th>IoDataBytesPerSec</th>
			<th>PageFaultsPerSec</th>
			<th>BytesSent</th>
			<th>BytesReceived</th>
			<th>ConnectionsEstablished</th>
		</thead>
		<tbody>
			<?php showSecondPart();?>
		</tbody>
		</table>

 	</div>
  	<h3><span id="VRCount"></span> Venue Requests</h3>
  	<div>
		<?php grabDataOR('[Cylance.Host.CylanceVenue.VenueCommands.VenueCommandManager]','[Venue commands]','r]','s]','venreq'); ?>
	</div>
  	<h3><span id="VSCount"></span> Venue States</h3>
  	<div>
		<?php grabData('[VenueCommandManager]','[VenueCommandManager]','vstates'); ?>
  	</div>
  	<h3><span id="unsafeCount"></span> Unsafe files</h3>
  	<div>
		<?php grabData('\'Unsafe\'','g:','unsafeIn'); ?>
  	</div>
 	<h3><span id="abCount"></span> Abnormal files</h3>
	<div>
		<?php grabData('Abnormal','g:','abIn'); ?>
	</div>
	<h3><span id="QCount"></span> Quarantined files</h3>
	<div>
		<?php grabData('Quarantine file \'','n:','Qin'); ?>
	</div>
	<h3><span id="WCount"></span> Waived files</h3>
	<div>
		<?php grabData('Waived','g:','WIn'); ?>
	</div>
	<h3><span id="BlCount"></span> Blocked files</h3>
	<div>
		<?php grabData('BLOCKED','r:','BlIn'); ?>
	</div>
	<h3><span id="EACount"></span> Exploit Attempts</h3>
	<div>
		<?php grabData('MemDef.MemDef','ef]','EAIn'); ?>
	</div>
	<h3><span id="sentFilesCount"></span> Sent Upload files</h3>
	<div>
		<?php grabDataOROR('[Cylance.Host.Analyzer.FileUploader]', '[Cylance.Infinity.Api2.Client.InfinityUpload]','[Cylance.Infinity.Api2.Client.InfinityQuery]','d]','r]','y]','sentFiles'); ?>
	</div>
</div>

<script>
$(document).ready(function() { 
        $(".tablesorter").tablesorter({widthFixed: true, widgets: ['zebra']});


        function showHeadingCounts(input, span){
        	$("#"+span).text($("#"+input).val())
        }
        showHeadingCounts("warnings","WarningNum");
        showHeadingCounts("errors","errorCount");
        showHeadingCounts("venreq","VRCount");
        showHeadingCounts("vstates","VSCount");
        showHeadingCounts("unsafeIn","unsafeCount");
        showHeadingCounts("abIn","abCount");
        showHeadingCounts("Qin","QCount");
        showHeadingCounts("WIn","WCount");
        showHeadingCounts("stats","statCount");
        showHeadingCounts("sentFiles","sentFilesCount");
        showHeadingCounts("BlIn","BlCount");
        showHeadingCounts("EAIn","EACount");
    }); 
</script>

  <script>
  $(function() {
    $( "#accordion" ).accordion({
      collapsible: true,
      heightStyle: "content",
      active: false
    });
  });
  </script>
