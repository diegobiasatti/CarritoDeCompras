<style>
	.titulo {
    
    text-align: center;
}

</style>
<div   > 
	<div  class="agileinfo-ads-display col-md-4 col-sm-4 col-lg-4" >
		<div class="wrapper">
			<div class="container">
				<div class="row">
					<div ng-show="mensaje">
						<div data-alert class="alert-box alert round">{{mensaje}}</div>
					</div>
					<alert ng-repeat="alert in alerts" type="{{alert.type}}" close="closeAlert($index)">{{alert.msg}}</alert>
					<div class="spinner center" ng-show="loading"><img src="images/ico_preload.gif"></div> 
					<div class="col-sm-6 col-md-5 col-md-offset-3">
						<div class="box">
							<br/>
							<div class="account-wall">
								<form class="form-signin" ng-submit="login()">
									<div class="form-group has-feedback">
										<input ng-model="usuario.user" class="form-control" type="text" name="user" placeholder="Usuario" required autofocus user/>
										<i class="glyphicon glyphicon-user form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<input ng-model="usuario.password" class="form-control" type="password" name="pass" placeholder="Contraseña" required />
										<i class="glyphicon glyphicon-asterisk form-control-feedback"></i>
									</div>
									<button class="btn btn-lg btn-info btn-block" type="submit">ACCEDER</button>
								</form>
							</div>			
						</div>				    
					</div>
				</div>	
			</div>

<div class="clearfix"></div>
		</div>
	</div>



</div>