<?php
	include_once 'dbMySql.php';
	$con = new DB_con();
	$res = $con->select(); 
?>
<html>
	<head>
		<title>Bootstrap Example</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="row" style="padding:40px;">
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
				<div class="panel panel-info" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
					<div class="panel-heading">
						<h2>
							Employee Information
							<div style="float:right;"><a href="javascript:void(0)" id="myBtn" title="Add Contact">
								<span class="glyphicon glyphicon-plus"></span>
								</a>
							</div>
						</h2>
						<div class="panel-ctrls" data-actions-container="" data-action-collapse="{&quot;target&quot;: &quot;.panel-body&quot;}"><span class="button-icon has-bg"><i class="ti ti-angle-down"></i></span></div>
					</div>
					<div class="panel-body no-padding" style="display: block;">
						<table class="table table-striped">
							<thead>
								<tr class="info">
									<th>No</th>
									<th>Year</th>
									<th>Employee Count</th>
									<th>Increase/Decrease</th>
								</tr>
							</thead>
							<tbody>
								<?php
								    $i = 1;
									while ($row = mysql_fetch_assoc($res)) { ?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $row['Year'] ; ?></td>
									<td><?php echo $row['EmployeeCount'] ; ?></td>
									<td><?php echo $row['Perecentage']; ?></td>
									
								</tr>
								<?php
									}
									?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-1">
			</div>
		</div>
		<!-- Add model start-->
		<!-- Add model end-->
		<!-- update model-->
		<div class="modal fade" id="add_model" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add</h4>
					</div>
					<div class="modal-body">
						<form role="form" action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="inputdefault">Year</label>
								<input class="form-control" id="inputdefault" type="text" name="Year">
							</div>
							<div class="form-group">
								<label for="inputdefault">Employee Count</label>
								<input class="form-control" id="inputdefault" type="text" name="empcount">
							</div>
							<div class="form-group">
								<input type="button" id="add" class="btn btn-primary btn-sm" name="add" value="Add">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function(){
			    $("#myBtn").click(function(){
			        $("#add_model").modal();
			    });
			    $("#add").click(function(){
			      var Year = $("input[name=Year]").val();
			      var empcount = $("input[name=empcount]").val();

			      if(Year == '')
			      {
			      	alert("Please Enter The Year");
			      	return false;
			      }
			      if(empcount == '')
			      {
			      	alert("please enter the employee count");
			      	return false;
			      }

			      var param={Year: Year, empcount: empcount};
			      $.ajax({
			          url:'ajax.php',
			          type:'POST',
			          data:param,
			          cache:false,
			          success:function(res)
			          {
			            alert(res);
			            $(".table").load(location.href + " .table");
			          }
			        });
			    });			    
			});
		</script>
	</body>
</html>