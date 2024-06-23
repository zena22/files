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
<title>Dashboard</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="css/styles.css" />
<link rel="stylesheet" href="css/dashboard.css" />
</head>
<body>
  
  <?php include('left_menus.php'); 
  include('top_menus.php');
  ?>	
       
    <div class="home-content">
    <center><h2 style="margin-top:10px"></h2></center>

        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">

              <div class="box-topic"><strong>Number Of Businesses</strong></div>
              <h1 class="bx bx-up-arrow-alt"><a href="business.php"><?php echo $book->getTotalBooks(); ?></a></h1>

              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
              </div>
            </div>
            <i class="bx bx-cart-alt cart"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic"><strong>Registered Business License</strong></div>
              <h1 class="bx bx-up-arrow-alt"><a href="business.php"><?php echo ($book->getTotalBooks() - $book->getTotalIssuedBooks()); ?></a></h1>

              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
              </div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic"><strong>Unprocessed License</strong></div>
              <h1 class="bx bx-up-arrow-alt"><a href="business.php"><?php echo $book->getTotalReturnedBooks(); ?></a></h1>

              <div class="indicator">
                <i class="bx bx-up-arrow-alt"></i>
              </div>
            </div>
            <i class="bx bx-cart cart three"></i>
          </div>
          <div class="box">
            <div class="right-side">
              <div class="box-topic"><strong>Issue Assessment</strong></div>
              <h1 class="bx bx-up-arrow-alt"><a href="assessment.php"><?php echo $book->getTotalIssuedBooks(); ?></a></h1>
              <div class="indicator">
                <i class="bx bx-down-arrow-alt down"></i>
              </div>
            </div>
            <i class="bx bxs-cart-download cart four"></i>
          </div>
        </div>
  </body>
  
</html>