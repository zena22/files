<?php
include_once 'config/Database.php';
include_once 'class/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if(!$user->loggedIn()) {
	header("Location: index.php");
}
include('inc/header4.php');
?>
<title>Business License Registration Management System</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="css/dashboard.css" />
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
<link rel="stylesheet" href="css/styles.css" />

<script src="js/category.js"></script>
</head>
<body>
<?php include('left_menus.php');
	include('top_menus.php'); ?>
	<div class="container-fluid">
	
			<div class="row row-offcanvas row-offcanvas-left">
			<div class="col-md-9 col-lg-10 main"> 
			<u><h2 style="margin-top:90px; color:#0a2558;">License</h2> </u>
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-10">
						<h3 class="panel-title"></h3>
					</div>
					<div class="col-md-2" align="right">
						<button type="button" id="addCategory" class="btn btn-info" title="Add user"><span class="glyphicon glyphicon-plus">Add</span></button>
					</div>
				</div>
			</div>
			<table id="categoryListing" class="table table-striped table-bordered">
				<thead>
					<tr>						
						<th>Sn.</th>					
						<th>License Type</th>					
						<th>Status</th>											
						<th></th>
						<th></th>					
					</tr>
				</thead>
			</table>				
			</div>
		</div>		
		<div id="categoryModal" class="modal fade">
			<div class="modal-dialog">
				<form method="post" id="categoryForm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"></button>
							<h4 class="modal-ttle"><i class="fa fa-plus"></i> Edit License</h4>
						</div>
						<div class="modal-body">						
							
							<div class="form-group">							
								<label for="Income" class="control-label">License Type</label>							
								<input type="text" name="name" id="name" autocomplete="off" class="form-control" placeholder="category name"/>
												
							</div>
							
							<div class="form-group">
								<label for="country" class="control-label">Status</label>							
								<select class="form-control" id="status" name="status"/>
									<option value="">Select</option>							
									<option value="Available">Available</option>
									<option value="Not Available">Not Available</option>								
								</select>							
							</div>				
							
											
						</div>
						<div class="modal-footer">
							<input type="hidden" name="categoryid" id="categoryid" />					
							<input type="hidden" name="action" id="action" value="" />
							<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</form>
			</div>
		</div>	
	</div>

</body>
</html>

