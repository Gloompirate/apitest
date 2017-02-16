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
	</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<form class="form-horizontal" id="apiform">
						<fieldset>
							<legend class="text-center">API Tester</legend>
							<div class="form-group">
								<label class="col-md-4 control-label" for="uri">API URI input</label>  
								<div class="col-md-4">
									<input id="uri" name="uri" type="text" placeholder="URI" class="form-control input-md">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="radios">Method</label>
								<div class="btn-group col-md-offset-1 col-md-4" data-toggle="buttons">
									<label class="btn btn-success btn-outline btn-method active" methodtype="GET" id="btn-get">
										<input type="radio" autocomplete="off" checked>GET
									</label>
									<label class="btn btn-info btn-outline btn-method" methodtype="POST">
										<input type="radio" autocomplete="off">POST
									</label>
									<label class="btn btn-warning btn-outline btn-method" methodtype="PUT">
										<input type="radio" autocomplete="off">PUT
									</label>
									<label class="btn btn-danger btn-outline btn-method" methodtype="DELETE">
										<input type="radio" autocomplete="off">DELETE
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="datatype">DataType</label>
								<div class="btn-group col-md-offset-1 col-md-4" data-toggle="buttons">
									<label class="btn btn-primary btn-outline btn-datatype" datatype="json">
										<input type="checkbox" autocomplete="off">JSON
									</label>
									<label class="btn btn-primary btn-outline btn-datatype" datatype="html">
										<input type="checkbox" autocomplete="off">HTML
									</label>
									<label class="btn btn-primary btn-outline btn-datatype" datatype="script">
										<input type="checkbox" autocomplete="off">SCRIPT
									</label>
									<label class="btn btn-primary btn-outline btn-datatype" datatype="xml">
										<input type="checkbox" autocomplete="off">XML
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="querydata">Query Data Input</label>
								<div class="col-md-4">                     
									<textarea class="form-control" id="querydata" name="querydata" placeholder="Query Data"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-offset-5 col-md-4">
									<button id="btn-submit" name="btn-submit" class="btn btn-success">Submit</button>
									<button id="btn-reset" name="btn-reset" class="btn btn-danger" type="reset">Reset</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div> 
			<div class="col-md-offset-2 col-md-8">
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
	$("#apiform").on('keyup', '#uri', function() {
		uri = $("#uri").val();
	});
	$("#apiform").on('keyup', '#querydata', function() {
		querydata = $("#querydata").val();
	});
	$(".btn-method").on('click', function(e) {
		method = $(this).attr("methodtype");
	});
	$("#apiform").on('submit', function(e) {
		e.preventDefault();
		clearResults();
		testIt();
	});
	$('#apiform').on('reset', function(e) {
		$("#btn-get").click();
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
		    contentType: "application/json; charset=utf-8",
		    success: function(results, textStatus, jqXHR){
		    	$("#resultvisual").css("background-color","lightgreen");
		    	var resultBlock = '<details class="resultBlock"><summary>Returned Data:</summary>' + results + '</details>';
		    	$("#resultvisual").append(resultBlock);
		    },
		    error: function(jqXHR, textStatus, errorThrown){
		    	$("#resultvisual").css("background-color","pink");
		    	var errorBlock = '<details class="resultBlock"><summary>Error Thrown:</summary>' + errorThrown + '</details>';
		    	$("#resultvisual").append(errorBlock);
		    },
		    complete: function(jqXHR, textStatus) {
		    	var ajaxBlock = '<details class="resultBlock"><summary>AJAX Query Result:</summary>' + textStatus + '</details>';
		    	var statusBlock = '<details class="resultBlock"><summary>HTTP Status Code:</summary>' + jqXHR.status + '</details>';
		    	var responseTextBlock = '<details class="resultBlock"><summary>Response Text:</summary>' + jqXHR.responseText + '</details>';
		    	var responseHeaderBlock = '<details class="resultBlock"><summary>Response Headers:</summary>' + jqXHR.getAllResponseHeaders() + '</details>';
		    	$("#resultvisual").append(statusBlock + responseTextBlock + responseHeaderBlock);
		    	$("#resultvisual").prepend(ajaxBlock); 
		    }
		};
		$.ajax(params);
	}
</script>
