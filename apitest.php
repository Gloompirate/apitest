<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>API Tester Alpha</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<style type="text/css">
		.btn-outline {
		    background-color: transparent;
		    color: inherit;
		    transition: all .5s;
		}
		.btn-outline-disabled {
			cursor: default;
		}
		.btn-outline.active {
			color: #fff !important;
		}
		.btn-primary.btn-outline {
		    color: #428bca;
		}
		.btn-success.btn-outline {
		    color: #5cb85c;
		}
		.btn-info.btn-outline {
		    color: #5bc0de;
		}
		.btn-warning.btn-outline {
		    color: #f0ad4e;
		}
		.btn-danger.btn-outline {
		    color: #d9534f;
		}
		.btn-primary.btn-outline:hover,
		.btn-success.btn-outline:hover,
		.btn-info.btn-outline:hover,
		.btn-warning.btn-outline:hover,
		.btn-danger.btn-outline:hover {
		    color: #fff;
		}
		.btn-info.btn-outline.btn-checkbox.focus {
			background-color: transparent;
		    color: #5bc0de;
		}
		.btn-info.btn-outline.btn-checkbox.active.focus {
			background-color: #5bc0de;
		    color: #fff;
		}
		.btn-info.btn-outline.btn-checkbox.focus:hover {
			color: #5bc0de;
		}
	</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-offset-2 col-sm-8">
					<form class="form-horizontal" id="apiform">
						<fieldset>
							<legend class="text-center">API Tester</legend>
							<div class="form-group">
								<label class="control-label" for="uri">API URI input</label>  
								<div class="">
									<input id="uri" name="uri" type="text" placeholder="URI" class="form-control input-md">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label" for="method">Method</label>
								<div class="btn-group col-md-offset-1 " data-toggle="buttons">
									<label class="btn btn-success btn-outline btn-method active" methodtype="GET" id="btn-get">
										<input type="radio" autocomplete="off" checked>GET
									</label>
									<label class="btn btn-info btn-outline btn-method" methodtype="POST">
										<input type="radio" autocomplete="off">POST
									</label>
									<label class="btn btn-warning btn-outline btn-method" methodtype="PUT">
										<input type="radio" autocomplete="off">PUT
									</label>
									<label class="btn btn-primary btn-outline btn-method" methodtype="PATCH">
										<input type="radio" autocomplete="off">PATCH
									</label>
									<label class="btn btn-danger btn-outline btn-method" methodtype="DELETE">
										<input type="radio" autocomplete="off">DELETE
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label" for="contenttype">ContentType</label>
								<div class="btn-group col-md-offset-1 " data-toggle="buttons">
									<label class="btn btn-info btn-outline btn-contenttype active" contenttype="application/x-www-form-urlencoded" id="btn-contenttype-default">
										<input type="radio" autocomplete="off">DEFAULT
									</label>
									<label class="btn btn-info btn-outline btn-contenttype" contenttype="application/json">
										<input type="radio" autocomplete="off">JSON
									</label>
									<label class="btn btn-info btn-outline btn-contenttype" contenttype="text/xml">
										<input type="radio" autocomplete="off">XML
									</label>
									<label class="btn btn-info btn-outline btn-contenttype" contenttype="text/plain">
										<input type="radio" autocomplete="off">TEXT
									</label>
									<label class="btn btn-info btn-outline btn-contenttype" contenttype="multipart/form-data">
										<input type="radio" autocomplete="off">FORM-DATA
									</label>
									<label class="btn btn-info btn-outline btn-contenttype" contenttype="application/octet-stream">
										<input type="radio" autocomplete="off">BINARY
									</label>
									<label class="btn btn-info btn-outline btn-contenttype" contenttype="">
										<input type="radio" autocomplete="off">NONE
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label" for="datatype">DataType</label>
								<div class="btn-group col-md-offset-1 " data-toggle="buttons">
									<label class="btn btn-info btn-checkbox btn-outline btn-datatype" datatype="json">
										<input type="checkbox" autocomplete="off">JSON
									</label>
									<label class="btn btn-info btn-checkbox btn-outline btn-datatype" datatype="html">
										<input type="checkbox" autocomplete="off">HTML
									</label>
									<label class="btn btn-info btn-checkbox btn-outline btn-datatype" datatype="script">
										<input type="checkbox" autocomplete="off">SCRIPT
									</label>
									<label class="btn btn-info btn-checkbox btn-outline btn-datatype" datatype="xml">
										<input type="checkbox" autocomplete="off">XML
									</label>
									<label class="btn btn-info btn-checkbox btn-outline btn-datatype" datatype="text">
										<input type="checkbox" autocomplete="off">TEXT
									</label>
									<label class="btn btn-info btn-checkbox btn-outline btn-datatype" datatype="jsonp">
										<input type="checkbox" autocomplete="off">JSONP
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label" for="auth">Authentication</label>
								<div class="input-group">
									<span class="input-group-addon">Username:</span>
									<input id="usernameinput" type="text" class="form-control">
									<span class="input-group-addon">Password:</span>
									<input id="passwordinput" type="password" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label" for="querydata">Query Data Input</label>
								<div class="">                     
									<textarea class="form-control" id="querydata" name="querydata" placeholder="Query Data"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="">
									<button id="btn-submit" name="btn-submit" class="btn btn-success">Submit</button>
									<button id="btn-reset" name="btn-reset" class="btn btn-danger" type="reset">Reset</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div> 
			<div class="col-sm-offset-2 col-sm-8">
				<label class="control-label" for="queryvisual">Query Visual</label> 
				<div class="well" id="queryvisual" style="white-space: pre-line;">
				Query Visual goes here
				</div>
				<label class="control-label" for="resultvisual">Result Visual</label> 
				<div class="well" id="resultvisual"></div>
			</div>

		</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
<script>
	/* Remove this as it will be better to build the query from the params once that is sorted
	$(function() {
		updateTheQuery();
	});*/
	var uri = '/';
	var querydata = '';
	var method = "GET";
	var contenttype = "application/x-www-form-urlencoded";
	var datatype = [];
	$("#apiform").on('keyup', '#uri', function() {
		uri = $("#uri").val();
	});
	$("#apiform").on('keyup', '#querydata', function() {
		querydata = $("#querydata").val();
	});
	$(".btn-method").on('click', function(e) {
		method = $(this).attr("methodtype");
	});
	$(".btn-datatype").on('click', function(e) {
		var index = datatype.indexOf($(this).attr("datatype"));
		if(index === -1) {
			datatype.push($(this).attr("datatype"));
		} else {
			datatype.splice(index, 1);
		}
	});
	$(".btn-contenttype").on('click', function(e) {
		contenttype = $(this).attr("contenttype");
	});
	$("#apiform").on('submit', function(e) {
		e.preventDefault();
		clearResults();
		testIt();
	});
	$('#apiform').on('reset', function(e) {
		//need to add something to reset the checkboxes
		$("#btn-get").click();
		$('#btn-contenttype-default').click();
		uri = '/';
		querydata = '';
		clearResults();
	});

	function clearResults() {
		$(".resultBlock").remove();
		$("#resultvisual").css("background-color","");
	}

	function testIt() {
		var params = {
		    type: method,
		    url: uri,
		    data: querydata,
		    contentType: contenttype,
		    success: function(results, textStatus, jqXHR){
		    	$("#resultvisual").append('<span class="resultBlock">Success! HTTP Code: ' + jqXHR.status + ' : ' + '</span>');
		    	$("#resultvisual").css("background-color","lightgreen");
		    },
		    error: function(jqXHR, textStatus, errorThrown){
		    	$("#resultvisual").append('<class="resultBlock">Error! HTTP Code: ' + jqXHR.status + ' : ' + '</span>');
		    	$("#resultvisual").css("background-color","pink");
		    	var errorBlock = '<details class="resultBlock"><summary>Error Thrown:</summary>' + errorThrown + '</details>';
		    	$("#resultvisual").append(errorBlock);
		    },
		    complete: function(jqXHR, textStatus) {
		    	var responseTextBlock = '<details class="resultBlock"><summary>Response Text:</summary>' + jqXHR.responseText + '</details>';
		    	var responseHeaderBlock = '<details class="resultBlock"><summary>Response Headers:</summary>' + jqXHR.getAllResponseHeaders() + '</details>';
		    	$("#resultvisual").append(responseTextBlock + responseHeaderBlock);
		    }
		};
		if ($('#usernameinput').val() != "") {
			params.headers = {
				"Authorization": "Basic " + btoa($('#usernameinput').val() + ":" + $('#passwordinput').val())
			};
		}
		if (datatype != "") {
			params.dataType = datatype.join(" ");
		}
		console.log(params);
		$.ajax(params);
	}
</script>
