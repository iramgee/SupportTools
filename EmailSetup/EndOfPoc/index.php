<?php include '../setup/header.php' ?>

<a href="../"><--Back</a><br/>

<label>Customer Company Name: </label><br/>
  <input type="text" id="customerName"/><br/>
<label>End Date:</label> <br/>
  <input type="text" id="datepicker"/><br/>

<button class="btn btn-primary" onclick="sendTheFile();">Submit</button><br/><br/>



</div>


<div id="result"></div>
<div id="byte_range"></div>
<div id="byte_content"></div>



<script type="text/javascript">
//Normal AJAX
function sendTheFile(){
  var customerName = $('#customerName').val();
  var date = $('#datepicker').val();
//Ajax requesst
   $.ajax({
        type: "POST",
        url: "result.php",
        data: {customerName : customerName,
               date : date}, 
        cache: false,

        success: function(data) {
           // data is ur summary
          $('#byte_content').html(data);
        }
    });
}

$(function() {
    $( "#datepicker" ).datepicker({
  dateFormat: "DD, mm/dd/yy"
});
  });

//End Normal AJAX
</script>
</body>
</html>