<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">

    <title>Carousel bootstrap 3 with 2.3.2 style and swipe compatibility - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    .carousel-control {
    position: absolute;
    top: 40%;
    left: 15px;
    width: 40px;
    height: 40px;
    margin-top: -20px;
    font-size: 60px;
    font-weight: 100;
    line-height: 30px;
    color: #ffffff;
    text-align: center;
    background: #222222;
    border: 3px solid #ffffff;
    -webkit-border-radius: 23px;
    -moz-border-radius: 23px;
    border-radius: 23px;
    opacity: 0.5;
    filter: alpha(opacity=50);
}
.carousel-control.right {
    right: 15px;
    left: auto;
}
.carousel-caption {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 15px;
    background: #333333;
    background: rgba(0, 0, 0, 0.75);
}
.carousel-caption p {
    margin-bottom: 0;
}

@media screen and (max-width: 700px){
     .carousel-caption p {
        font-size: 13px;
    }
    .carousel-caption {
    background: rgba(0, 0, 0, 0.55);
    }
    .carousel-control {
        top: 20%;
    }
}
    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'http://bootsnipp.com');
        });
    </script>
</head>
<body>
	<div class="container">
	<div class="row">
		<div id="myCarousel" class="carousel slide" style="max-width: 900px; margin: 0px auto;">
            <ol class="carousel-indicators hidden-xs hidden-sm" style="padding-bottom: 42px;">
                <li data-target="#carcousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carcousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carcousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="active item" align="center"><a href="#"><img src="http://lorempixel.com/1920/1080/city/" class="img-rounded" alt="PS3 reparatie Haarlem"></a>
                    <div class="carousel-caption">
                        <h3>Cupcake ipsum dolor sit amet</h3>
                        <p>Powder chocolate carrot cake. Applicake tart icing chupa chups marshmallow apple pie candy canes gingerbread croissant.</p>
                    </div>
                </div>
                <div class="item" align="center"><a href="#"><img src="http://lorempixel.com/1920/1080/nature/" class="img-rounded" alt="Blu-ray Lens reparatie"></a>
                    <div class="carousel-caption">
                        <h3>Cupcake ipsum dolor sit amet</h3>
                        <p>Pudding fruitcake chocolate pastry caramels dessert powder cupcake. Marzipan sweet roll jelly macaroon brownie.</p>
                    </div>
                </div>
                <div class="item" align="center"><a href="#"><img src="http://lorempixel.com/1920/1080/food/" class="img-rounded" alt="Yellow Light of Death"></a>
                    <div class="carousel-caption">
                        <h3>Cupcake ipsum dolor sit amet</h3>
                        <p>Ice cream pie marzipan cookie macaroon dragée cookie. Caramels tootsie roll danish chocolate cake pastry icing.</p>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
        </div>
	</div>
</div>

<script src="//code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>

<script>
    // Add this to let the carousel start automatic
    $('.carousel').carousel();
</script>
	<script type="text/javascript">
	$(document).ready(function() {
   $(".carousel-inner").swiperight(function() {
       $(this).parent().carousel('prev');
   });
   $(".carousel-inner").swipeleft(function() {
       $(this).parent().carousel('next');
   });
});
	</script>
</body>
</html>