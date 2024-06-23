<?php
include_once 'config/Database.php';
include_once 'class/User.php';
include_once 'class/Books.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if(!$user->loggedIn()) {
	header("Location: index.php");
}
$book = new Books($db);
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

<script src="js/issue_books.js"></script>
</head>
<body>
<?php
	include('left_menus.php');
	include('top_menus.php'); ?>
	<div class="container-fluid">

			<div class="row row-offcanvas row-offcanvas-left">
			<div class="col-md-9 col-lg-10 main"> 
			<u><h2 style="margin-top:90px; color:#0a2558;">Manage Assessment</h2> </u>
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-10">
						<h3 class="panel-title"></h3>
					</div>
					<div class="col-md-2" align="right">
						<button type="button" id="issueBook" class="btn btn-info" title="issue book"><span class="glyphicon glyphicon-plus">Add Assessment</span></button>
					</div>
				</div>
			</div>
			<table id="issuedBookListing" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Id</th>				
						<th>Business Name</th>
						<th>License No.</th>
						<th>Processed By</th>	
						<th>Date Assessed</th>	
						<th>Payment Amount</th>	
						<th>Sum Of Assessments</th>											
						<th>Status</th>													
						<th></th>
						<th></th>					
					</tr>
				</thead>
			</table>				
			</div>
		</div>		
		<div id="issuedBookModal" class="modal fade">
			<div class="modal-dialog">
				<form method="post" id="issuedBookForm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"></button>
							<h4 class="modal-ttle"><i class="fa fa-plus"></i> Edit Assessment</h4>
						</div>
						<div class="modal-body">								
							<div class="form-group">							
								<label for="rack" class="control-label">Business Name</label>
								<select name="book" id="book" class="form-control">
									<option value="">Select</option>
									<?php 
									$bookResult = $book->getBookList();
									while ($book = $bookResult->fetch_assoc()) { 					
									?>
									<option value="<?php echo $book['bookid']; ?>"><?php echo $book['name']; ?></option>			
									<?php } ?>									
								</select>
							</div>	
							
							<div class="form-group">							
								<label for="rack" class="control-label">Processed By</label>
								<select name="users" id="users" class="form-control">
									<option value="">Select</option>
									<?php 
									$usersResult = $user->getUsersList();
									while ($user = $usersResult->fetch_assoc()) { 	
									?>
									<option value="<?php echo $user['id']; ?>"><?php echo ucfirst($user['first_name'])." ".ucfirst($user['last_name']); ?></option>			
									<?php } ?>									
								</select>
							</div>	
							
							
							<div class="form-group">							
								<label for="expected date" class="control-label">Payment Amount</label>
								<input type="number" step="1" name="expected_return_date" id="expected_return_date" autocomplete="off" class="form-control"/>								
							</div>
							
							
							<div class="form-group">							
								<label for="expected date" class="control-label">Sum Of Assessments</label>
								<input type="number" step="1" name="return_date" id="return_date" autocomplete="off" class="form-control"/>								
							</div>
							
							
							<div class="form-group">
								<label for="status" class="control-label">Status</label>			
								<select class="form-control" id="status" name="status"/>
									<option value="">Select</option>							
									<option value="Assessed">Assessed</option>
									<option value="Not Assessed">Not Assessed</option>
								</select>							
							</div>				
							
											
						</div>
						<div class="modal-footer">
							<input type="hidden" name="issuebookid" id="issuebookid" />					
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

