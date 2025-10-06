<?php
  require_once 'includes/init.inc.php';
	
  $mySQL      = new DB;
  $CampoAtivo = '';

  require_once 'includes/assets/_inc_header.php';
?>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
	  <div class="carousel-inner">
		<div class="item active">
		  <img src="Slides?id_msg=1" style="width: 100%; height: 100%;">
		  <!--<img src="http://<?php //echo($_SERVER["HTTP_HOST"]); ?>/images/slides/slide-1.jpg" alt="">-->
		</div>
		<div class="item">
		  <!--<img src="http://<?php //echo($_SERVER["HTTP_HOST"]); ?>/images/slides/slide-2.jpg" alt="">-->
		  <img src='Slides?id_msg=2' width="100%" height="100%">
		</div>
		<div class="item">
		  <!--<img src="http://<?php //echo($_SERVER["HTTP_HOST"]); ?>/images/slides/slide-3.jpg" alt="">-->
		  <img src='Slides?id_msg=3' width="100%" height="100%">
		</div>
		<div class="item">
          <!--<img src="http://<?php //echo($_SERVER["HTTP_HOST"]); ?>/images/slides/slide-4.jpg" alt="">-->
		  <img src='Slides?id_msg=4' width="100%" height="100%">
		</div>
		<div class="item">
          <!--<img src="http://<?php //echo($_SERVER["HTTP_HOST"]); ?>/images/slides/slide-5.jpg" alt="">-->
		  <img src='Slides?id_msg=5' width="100%" height="100%">
		</div>
		<div class="item">
          <!--<img src="http://<?php //echo($_SERVER["HTTP_HOST"]); ?>/images/slides/slide-6.jpg" alt="">-->
		  <img src='Slides?id_msg=6' width="100%" height="100%">
		</div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div><!-- /.carousel -->
      
      <!-- Corpo central
      ================================================== -->
      <div class="row-fluid">
        <div class="span12">
	  <div class="well" style="overflow: hidden;">
	    <div style="display: inline-block; width: 56px; height: 56px; float: right; padding: 2px;">
		  <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/facebook.png" style="width: 100%; height: 100%;">
		</div>
		<div style="display: inline-block; width: 50px; height: 50px; float: right; padding: 2px;">
		  <img src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/images/twitter.png" style="width: 100%; height: 100%;">
		</div>
		<div style="display: inline-block; float: right; padding-right: 5px;">
		  <h4 style="font-family: serif; color: #2F4F4F;">siga-nos</h4>
		</div>
	  </div>
        </div>
      </div>
      
      <!-- Rodapé
      ================================================== -->
      <div class="row-fluid">
        <div class="span12">
	  <div class="well">
	    <!-- FOOTER -->
	    <footer>
	      <p class="pull-right"><a href="#">Voltar ao in&iacute;cio da p&aacute;gina</a></p>
	      <p>(37) 3214-5719 &middot; <a href="mailto:comercial@shineraymotos.com">comercial@shineraymotos.com</a></p>
            </footer>
	  </div>
        </div>
      </div>
    </div><!-- /.container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/jquery-2.1.1.js"></script>
    <script src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/bootstrap-transition.js"></script>
    <script src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/bootstrap-alert.js"></script>
    <script src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/bootstrap-modal.js"></script>
    <script src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/bootstrap-dropdown.js"></script>
    <script src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/bootstrap-scrollspy.js"></script>
    <script src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/bootstrap-tab.js"></script>
    <script src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/bootstrap-tooltip.js"></script>
    <script src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/bootstrap-popover.js"></script>
    <script src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/bootstrap-button.js"></script>
    <script src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/bootstrap-collapse.js"></script>
    <script src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/bootstrap-carousel.js"></script>
    <script src="http://<?php echo($_SERVER["HTTP_HOST"]); ?>/includes/js/bootstrap-typeahead.js"></script>
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
  </body>
</html>