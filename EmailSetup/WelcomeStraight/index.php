<?php include '../setup/header.php' ?>
<a href="../"><--Back</a><br/>

<label>Contact Name: </label><br/>
  <input type="text" id="customerName"/><br/>
<label>Contact Email: </label><br/>
  <input type="text" id="contactEmail"/><br/>
<label>Years:</label> <br/>
  <input type="number" id="years"/><br/>
<label>Endpoints:</label><br/> 
  <input type="number" id="endpoints"/><br/>
<label>Alert management?</label>
  <input type="checkbox" id="atam"/> Yes<br />
<button class="btn btn-primary" onclick="sendTheFile();">Submit</button><br/><br/>



</div>
<div id="loading" style="display:none;">Loading...<img src="images/loading-cmd.gif"></div>

<div id="result"></div>
<div id="byte_range"></div>
<div id="byte_content"></div>



<script type="text/javascript">

function sendTheFile(){
  var customerName = $('#customerName').val();
  var contactEmail = $('#contactEmail').val();
  var years = $('#years').val();
  var endpoints = $('#endpoints').val();
  var atam = "no";
    if ($('#atam').is(':checked')){
      atam = "yes";
    }
//Ajax requesst
   $.ajax({
        type: "POST",
        url: "result.php",
        data: {customerName : customerName,
               years : years,
               atam : atam,
               endpoints : endpoints,
               contactEmail : contactEmail}, 
        cache: false,

        success: function(data) {
           // data is ur summary
          $('#byte_content').html(data);
        }
    });
}

//End AJAX
</script>
</body>
</html>