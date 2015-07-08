<?php include '../setup/header.php' ?>
<style>
#conRe, #agentRe { display: none;}
</style>

<a href="../"><--Back</a><br/>

<label>Affecting What?</label>
  <label><input type="checkbox" id="agent"/> Agents</label> <label> <input type="checkbox" id="console"/> Console</label><br />

  <div id="agentRe">
  <label>Agent When: </label><br/>
    <br/>
    <input type="text" id="agentVersion"  placeholder="version" /> <strong>Agent</strong> update is being delayed until <input type="text" id="awhen" class="datepicker"/>, <input type="text" id="agReURL" size="100" placeholder="to address..." /><br/>
  </div>
  <div id="ConRe">
    <label>Console When: </label><br/>
      <strong>Console</strong> update is being delayed until <input type="text" id="cwhen" class="datepicker"/>, <input type="text" id="conReURL" size="100" placeholder="to address..." /><br/><br/>
  </div>

<button class="btn btn-primary" onclick="sendTheFile();">Submit</button><br/><br/>



</div>
<div id="loading" style="display:none;">Loading...<img src="images/loading-cmd.gif"></div>

<div id="result"></div>
<div id="byte_range"></div>
<div id="byte_content"></div>



<script type="text/javascript">
//Normal AJAX
function sendTheFile(){
  var awhen = $('#awhen').val();
  var cwhen = $('#cwhen').val();
  var agReURL = $('#agReURL').val();
  var conReURL = $('#conReURL').val();
  var agentVersion = $('#agentVersion').val();
  var agent = "no";
  var Cconsole = "no";
    if ($('#agent').is(':checked')){
      agent = "yes";
      console.log("Agent = " +agent);
      console.log("Console = "+Cconsole);
    }
  
    if ($('#console').is(':checked')){
      Cconsole = "yes";
      console.log("Agent = " +agent);
      console.log("Console = "+Cconsole);
    }   
//Ajax requesst
   $.ajax({
        type: "POST",
        url: "result.php",
        data: {awhen : awhen,
               cwhen : cwhen,
               agReURL : agReURL,
               conReURL : conReURL,
               agent : agent,
               Cconsole : Cconsole,
               agentVersion : agentVersion}, 
        cache: false,

        success: function(data) {
           // data is ur summary
          $('#byte_content').html(data);
        }
    });
}

$(function() {
    $( ".datepicker" ).datepicker({
  dateFormat: "DD MM dd, "
});
  });

$("#console").click(function(){
  $('#ConRe').toggle();
});

$("#agent").click(function(){
  $('#agentRe').toggle();
});

//End Normal AJAX
</script>
</body>
</html>