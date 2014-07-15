<html>
  <head>
  	<title>T9</title>
  	<style type="text/css">
  		body{font-family: Arial; width: 30%;}
  		#container{margin: 5%}
  	</style>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css" type="text/css">
  </head>
  <body>
  	<?php include_once("t9func.php"); ?>
    <div id="container">
    	<div class="input-group input-group-lg">
		  <span class="input-group-addon">Enter numbers only:</span>
		  <input type="text" class="form-control" placeholder="0 - 9" id="number-input" name="number-input" maxlength="10">
		</div>
		<div class="row-fliud">
			<ul class="list-group">
				<li class="list-group-item">Possible words here</li>
			</ul>
		</div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
        	$resultsArray = [];
        	function isInt(value) {
			   return !isNaN(value) && parseInt(Number(value)) == value;
			}
			$('#number-input').on("input", function() {
			    var numberInput = this.value;
			    if(numberInput == ""){
			    	$(".list-group-item" ).remove();
			    	$(".list-group").append('<li class="list-group-item">Possible words here</li>');
			    }else if(!isInt(numberInput)){
			    	$(".list-group-item" ).remove();
			    	$(".list-group").append('<li class="list-group-item">Your input must be a number</li>');
			    }else{
			    	$.ajax({
	                    type: "POST",
	                    url: "t9func.php",
	                    data: {input: numberInput},
	                    success: function (data) {
	                        if(data != null){
	                        	$( ".list-group-item" ).remove();
	                        	$resultsArray = data.split(",");
	                        	$.each( $resultsArray, function( key, value ) {
	                        		$(".list-group").append('<li class="list-group-item">'+value+'</li>');
								});
	                        }
	                    }
	                });
			    }
			});
        });
    </script>
  </body>
</html>