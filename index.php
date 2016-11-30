<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<title></title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<link rel="stylesheet" href="style/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tweets...</div>
					<div class="panel-body">
						<div class="row">
							<div id="map-canvas" style="height:50em">
								
							</div>
						</div>
						<div id="searchPanel" class="row">
							<div class="col-lg-6">
								<div class="input-group">
									<span class="input-group-addon">
										Search City
									</span>
									<input type="text" class="form-control" id="search-city" name="search-city" aria-label="...">
									</div><!-- /input-group -->
									</div><!-- /.col-lg-6 -->
									<div class="col-lg-6">
										<button type="button" id="search" class="btn btn-default" > Search </button>
							</div><!-- /.col-lg-6 -->
							</div><!-- /.row -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCr0Vh6Xfc51rTS-V3DlUt6E45FsEAiEtI&libraries=places" async defer></script>
	<script src="js/app.js" ></script>
</html>