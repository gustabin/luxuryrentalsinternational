<?php
	session_start();  
	error_reporting(0);
	$_SESSION['valor'] = 9; //Activa la opcion del menu actual
	
	// conector de BD 
	require_once('tools/mypathdb.php');  
	$_SESSION['pagina']='review';  
	//=======Redirigir al login  ===================
	if (($_SESSION['usuario']<=2) OR (empty($_SESSION['usuario']))) 
		{ 
		header("Location: login.php");
		}
	include "header.php";
	$villaId=$_GET["id"];
?>
<script language="JavaScript" type="text/JavaScript">	 
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formReview', function(event) {
		event.preventDefault()
		if ($('#formReview').valid()) {
			$.ajax({
				type: "POST",
				url: "commentProcesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 1000);
						window.location.href='login.php'; 
					}
					if (respuesta.error == 2) {
						$('#error2').show();
						setTimeout(function() {
						$('#error2').hide();
						}, 1000);
					}					
					if (respuesta.exito == 1) {
						document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';						
					}					
				}
			});
		}
	});	
</script> 
<!-- Bootstrap styles -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/comment.css">

<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1" id="logout">
        <div class="page-header" style="margin-top: 10px;">
            <h3 class="reviews">Customer Reviews</h3>            
        </div>
        <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comments</h4></a></li>
                <!--li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Add comment</h4></a></li>
                <li><a href="#account-settings" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Account settings</h4></a></li!-->
            </ul>            
            <div class="tab-content">
                <div class="tab-pane active" id="comments-logout">  
                    <ul class="media-list">  
                    <?php
                    $query = ("SELECT * FROM villareview ORDER BY reviewDate DESC");
					$resultado=mysql_query($query,$dbConn);
					while($data_his=mysql_fetch_array($resultado))
					{
					$villareviewid = $data_his['villareviewid'];
					$villaid = $data_his['villaid'];
					$origprifileimage =	 $data_his['origprifileimage'];
					
					if (!empty($origprifileimage)) {
						$origprifileimage = "http://www.luxuryrentalsinternational.com/go/img/review/" .$data_his['origprifileimage'];					
					}else {
						$origprifileimage = "http://www.luxuryrentalsinternational.com/go/img/review/generalavatar.jpg";
						}
						
					$name = utf8_encode($data_his['name']); 
					$reviewDate = $data_his['reviewDate'];
					$profileImage = $data_his['profileImage'];
					$rating = $data_his['rating'];
					$villaid = $data_his['villaid'];
					$review = utf8_encode($data_his['review']); 					
					$showHide = $data_his['showHide'];					
					
					
					// ============== Buscar en la tabla villa ================
					$queryDetail = ("SELECT * FROM villa WHERE VillaId='$villaid'");			
					$resultadoDetail=mysql_query($queryDetail,$dbConn);
					while($dataDetail=mysql_fetch_array($resultadoDetail))
										{
										$villaName = $dataDetail['Name'];							
										}		
					mysql_free_result($resultadoDetail); // Liberamos los registros							
					mysql_close(); //desconectar();
					// ============== FIN Buscar en la tabla villa ================
					//==============Pintar el contenido ===================================					
					?>     
                    
                    <form class="form-vertical" id="formReview">  
                    <input type="hidden" id="villareviewid" name="villareviewid" value="<?php echo $villareviewid ?>"> 
                    <input type="hidden" id="name" name="name" value="<?php echo $name ?>">
                    <input type="hidden" id="villaid" name="villaid" value="<?php echo $villaid ?>">
                    <input type="hidden" id="reviewDate" name="reviewDate" value="<?php echo $reviewDate ?>">
                    <input type="hidden" id="profileImage" name="profileImage" value="<?php echo $profileImage ?>"> 
                    <input type="hidden" id="review" name="review" value="<?php echo $review ?>"> 
                    <input type="hidden" id="rating" name="rating" value="<?php echo $rating ?>"> 
                        
                      <li class="media">
                        <a class="pull-left" href="#">
                          <img class="media-object img-circle" src="<?php echo $origprifileimage;?>" alt="profile">
                        </a>
                        
                        <div class="media-body">
                          <div class="well well-lg"> 
                              <ul class="media-date text-uppercase reviews list-inline">
                                <li class="dd"><?php echo $reviewDate;?></li>                                
                              </ul></br>
                              <h4 class="media-heading text-uppercase reviews"><?php echo $name;?> 
                              <div style="font-size:10px">in <?php echo $villaName;?>  </div>  </h4>
                              <p class="media-comment">
                                <?php echo $review;?>
                              </p>  
                              
                              <p class="media-comment">
                                <?php 
								if ($rating==0) {?>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
								<?php };?>
                               <?php 
								if ($rating==1) {?>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
								<?php };?>
                                <?php 
								if ($rating==2) {?>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
								<?php };?>    
                                <?php 
								if ($rating==3) {?>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
								<?php };?>              
                                <?php 
								if ($rating==4) {?>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
								<?php };?>           
                                <?php 
								if ($rating==5) {?>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
								<?php };?>
                              </p>  
                              <div align="right">                               
								  
                                  <?php if ($showHide == 1) {$showHide="checked"; } ?>
                                      <input name="showHide" type="checkbox" id="showHide" value="1" <?php echo $showHide ?>/>                                                                              
                                  Show <button class="btn btn-primary" type="submit" >Save</button>                              </div>                                                      
                          </div>              
                        </div>                        
                      </li> 
                          
                      </form> 
             <div class="modal" id="light" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#99CA3D; color:black;">	
                            <h4 class="modal-title" id="myModalLabel">
                                ¡Update Completed!
								</h4>
							</div>
							<div class="modal-body">
								You have successfully edit a review. <br>    
                        </div>
                        <div class="modal-footer">			
                                <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"> 
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                               Close
                            </button> 
                                </a>					
                        </div>
                    </div>						
                </div>					
             </div>
                      <?php } // fin del bucle de instrucciones
					mysql_free_result($dataDetail); // Liberamos los registros
					//==============Fin Pintar el contenido ===================================	
					?>   
                    </ul> 
                </div>
            </div>
        </div>
	</div>
  </div>

  <!--div class="page-header text-center">
    <h3 class="reviews"><span class="glyphicon glyphicon-magnet"></span> Uicomments by <a href="https://twitter.com/maridlcrmn">maridlcrmn</a></h3>
  </div!-->
  <!--div class="notes text-center"><small>Image credits: uifaces.com</small></div!-->
</div>