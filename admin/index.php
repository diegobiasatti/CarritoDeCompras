<?php 
include_once('../controller/upload.php');
include_once('session.php')	;
?>

<!DOCTYPE html>
<html style=" min-height: 100%;
  position: relative;"lang="es">

<?php 
include_once('head.php');
$_sess = false;
?>
<style>
.body{
	margin: 0;
  margin-bottom: 40px;
}
	.footer {
 
 position:fixed;
   left:0px;
   bottom:0px;
   height:40px;
   width:100%;
  
}
</style>
<body ng-app="appDatos"  ng-cloak ng-init="a=<?=$toast?>">
	<toaster-container    toaster-options="{'time-out': 5000}"></toaster-container>
        <div>
            <div ng-controller="toast" >
              
            </div>
        </div>
	<!-- top-header <-->
		
	</-->
	<div class="header-most-top" ng-controller="productosCtrl"  style="height: 20px;">
		<a href="logout.php"><p ng-show="estado_logout" ng-click="logout()"style="text-align: right; height: 30px;"><span style="margin-left: 15px;" class="fa fa-sign-out" aria-hidden="true"></span> SALIR</p></a>
		
	</div>

	<!-- //top-header -->
	<!-- header-bot-->
	
	<!-- shop locator (popup) -->
	
	<!-- navigation -->
	
	<!-- //navigation -->


	<!-- top Products -->
	<!--div class="ads-grid"-->
	<div class="body">
		
		<div class="container" ng-controller="productosCtrl">
			 <!--ng-view>

            </ng-view-->
            <div ng-if="estado_login ">
            	<?php include_once('login.php'); ?>
            </div>
			
			<div ng-if="estado_add">
            	<?php include_once('add.php'); ?>
            </div>

			<div ng-if="estado_update">
            	<?php include_once('update.php'); ?>
            </div>
						

			
		</div>
		<!-- //product right -->
	</div>
	
	
	<div class="copy-right footer" style="">
		<div class="container">
			<p>© 2020 Realizado por B al Cubo
			</p>
		</div>
	</div>
	
<script src="../js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="../js/jquery.magnific-popup.js"></script>
	
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	<script src="../js/minicart.js"></script>
	
	<!-- //cart-js -->

	<!-- price range (top products) -->
	<script src="../js/jquery-ui.js"></script>
	
	<!-- //price range (top products) -->

	<!-- flexisel (for special offers) -->
	
	
	<!-- smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="../js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

<script>
		$(document).ready(function(){
			//$('alta_prod').attr('disabled',false);
			
    $("alta_prod").click(function(){
       document.getElementById("alta_prod").disabled = true;
    });
});
	</script>
</body>

</html>