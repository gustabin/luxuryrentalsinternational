<?php 
session_start(); 
error_reporting(0);
include "header.php"; 
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<!--script src="js3/jquery.ui.datepicker.js"></script!-->
<script src="jquery.ui.datepicker-es.js"></script>

<script language="JavaScript" type="text/JavaScript">
    //Metodo para cargar el formulario 
    $("body").on('submit', '#formContacto', function(event) {
	event.preventDefault()
	if ($('#formContacto').valid()) {
	    $.ajax({
		type: "POST",
		url: "emailContacto.php",
		dataType: "json",
		data: $(this).serialize(),
		success: function(respuesta) {
		    if (respuesta.error == 1) {
			  $('#error').show();
			setTimeout(function() {
			  $('#error1').hide();
			}, 3000);
		    }
			 
			if (respuesta.exito == 1) {
			  $('#mensaje').show();
			  setTimeout(function() {
			  $('#mensaje').hide();
			}, 3000);
			  window.location.href='emailContacto_Procesado.php';
		    }			    
		}
	    });
	}
	});		
</script>
<script>

					$(document).ready(function() {			
				
				
				var today = new Date();
				var diadelasemana= today.getDay();
				
					$("#desde").datepicker({
						//changeYear: true,
						minDate: new Date(new Date().getTime() + (2 * 24 * 3600 * 1000)),
						//maxDate: 60,
						dateFormat: 'yy-mm-dd',
						//maxDate: 90,
						//changeMonth: true,
						onClose: function(selectedDate) {
							var maxDate = new Date(new Date(selectedDate).getTime() + (60 * 24 * 3600 * 1000));
							$("#hasta").datepicker("option", "minDate", selectedDate);
							$("#hasta").datepicker("option", "maxDate", maxDate);						
						}
					});
					
					$("#hasta").datepicker({
					//changeYear: true,
					minDate: new Date(new Date().getTime() + (1 * 24 * 3600 * 1000)),
					dateFormat: 'yy-mm-dd',	
					maxDate: 90,
					//changeMonth: true,
					onClose: function(selectedDate) {
						$("#desde").datepicker("option", "maxDate", selectedDate);
					}
					});	
				
				 
	
				
	
				function numeroDeDias() {
					var start = $("#avisoCrear input[name='desde']").datepicker('getDate');
					var end = $("#avisoCrear input[name='hasta']").datepicker('getDate');
					
					if(!start || !end)
					return;					
				}
				});


</script>
<?php include "menuSite.php" ?>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
	<!-- Start Body -->
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="Bootstrap Thumbnail First" src="http://lorempixel.com/output/people-q-c-600-200-1.jpg" />
						<div class="caption">
							<h3>
								Thumbnail label
							</h3>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
							
							<p>
								<a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="Bootstrap Thumbnail Second" src="http://lorempixel.com/output/city-q-c-600-200-1.jpg" />
						<div class="caption">
							<h3>
								Thumbnail label
							</h3>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
							<p>
								<a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="Bootstrap Thumbnail Third" src="http://lorempixel.com/output/sports-q-c-600-200-1.jpg" />
						<div class="caption">
							<h3>
								Thumbnail label
							</h3>
							<p>
								Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
							</p>
							<p>
								<a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<br><br>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Let US do it for you! </h3>
			 			</div>
			 			<div class="panel-body">
			    		 <form data-toggle="validator" class="form-horizontal" role="form" id="formContacto">
			    			<div class="row">
                            <label class="col-sm-12 control-label" for="textinput" style="text-align:left">Who are you?</label> 
			    				<div class="col-xs-6 col-sm-6 col-md-6">                                
			    					<div class="form-group">                                                                         
			                <input type="text" class="form-control" id="fullName" placeholder="Full Name" required>
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">			    						
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" data-error="That email address is invalid" required>
			    					</div>
			    				</div> 	    				
			    			</div>
                           
                            <div class="row">      
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                			<input type="text" class="col-sm-12 form-control input-sm" id="phone" placeholder="Phone No." required> 
			    					</div>
			    				</div>			    				
			    			</div>
                            
                            
                            <div class="row">
                            <label class="col-sm-12 control-label" for="textinput" style="text-align:left">When are you traveling?</label> 
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">										
			    						<input type="text" name="desde" id="desde" class="input-xlarge" placeholder="Arriving" readonly="readonly" />
			    					</div>
			    				</div>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="text" name="hasta" id="hasta" class="input-xlarge" placeholder="Departing" readonly="readonly" />
			    					</div>
			    				</div>
			    			</div>
                            
                            <div class="row">
                            <label class="col-sm-12 control-label" for="textinput" style="text-align:left">Where do you want to go?</label>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                			<input type="text" class="form-control" id="villaName" placeholder="">
			    					</div>
			    				</div>			    				
			    			</div>
                             
                            <div class="row">
                            <label class="col-sm-6 control-label" for="textinput">Anything else?</label>
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">			                			
                                        <textarea class="form-control" name="anythingelse" cols="30" rows="2" placeholder=""></textarea>
			    					</div>
			    				</div>			    				
			    			</div>
			    			
			    			<button type="submit" class="btn btn-default">Submit</button>
                			<button type="reset" class="btn btn-primary">Reset</button>
			    		
			    		</form>
			    	</div>
	    		</div>
    		</div>
    	</div>
    </div>
    
<!-- End Body -->
<?php include "footer.php"; ?>