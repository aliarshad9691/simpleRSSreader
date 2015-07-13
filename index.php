<!DOCTYPE html>
<html lang="en">
	<head>


		<title>RSS_Reader</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="vendor/twitter/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
		<script type="text/javascript" src="vendor/components/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="vendor/twitter/bootstrap/dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="vendor/components/angular.js/angular.min.js"></script>
		<script type="text/javascript" src="js/xml2json.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
	</head>

	<body ng-app="rssReader">
		<div class="container-fluid">
  			<div class="row">
  				<div class="col-sm-12">
  					<h2>RSS Reader <small>(A simple RSS reader)</small></h2>
  					<hr />
  				</div>
  			</div>
			<div class="row">
  				<div class="col-sm-12">
					<nav class="navbar navbar-inverse">
					  <div class="container-fluid">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <a class="navbar-brand" href="#">RSS</a>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav">
					        <li class="active"><a href="#">Link</a></li>
					        <li><a href="#">Link</a></li>
					        
					      </ul>
					      
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>
  				</div>
  			</div>

  			<div class="row">
  				<div class="col-sm-2" ng-controller="rsslinks">
  					<div class="well">
  						<div ng-repeat="link in links"><a href="#">{{link.name}}</a></div>
  						
  					</div>
  				</div>
  				<div class="col-sm-10" ng-controller="rssfeed">
  					<div >
  						<div ng-repeat="item in feedData" class="well" ng-class="{'unread' : !item.read}">
  							
  							<h4><a ng-href="{{item.link}}" target="_blank">{{item.title.toString()}}</a><button class="btn btn-success pull-right btn-read" ng-click="item.read=true">Mark Read</button></h4>
  							<p ng-bind-html="item.description.toString() | to_trusted"></p>
	  						
  						</div>
  					</div>
  				</div>
  			</div>

		</div>
	</body>
</html>