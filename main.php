<?php
session_start();
include 'configure.php';
include 'db.php';
//echo '<PRE>', var_dump($_SESSION), '</pre>';
  if (isset($_SESSION['name'])) {
    header('location: dashboard.php');
  }
?>
<!DOCTYPE html>
<html>

<head>
  <title><?php echo $title ?></title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" type="text/css" href="css/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/datatables.min.js"></script>
  <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="js/datatables.bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.md5.js"></script>

  <script type="text/javascript" src="js/datatables/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="js/datatables/buttons.flash.min.js"></script>
  <script type="text/javascript" src="js/datatables/jszip.min.js"></script>
  <script type="text/javascript" src="js/datatables/pdfmake.min.js"></script>
  <script type="text/javascript" src="js/datatables/vfs_fonts.js"></script>
  <script type="text/javascript" src="js/datatables/buttons.html5.min.js"></script>
  <script type="text/javascript" src="js/datatables/buttons.print.min.js"></script>
</head>

<body>
  <div class="container">
    <div class="main">
    <div class="item">
      <div class="content">
        <form action="login.php" class="form-horizontal" method="POST" id="loginForm1">
          <div class="logo"><img src="./img/user1.png"></div>
          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" name="username" class="form-control" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required>
          </div>

          <div class="input-group lg">
            <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required>
          </div>

          <div class="form-group in">
            <input type="submit" name="submit" class="btn btn-info btn-block" value="LOGIN"><br>
            <button type="button" data-toggle="modal" data-target="#forgotPasswordModal"name="signup" class="btn btn-success btn-block" id="back"><a href="#">Forget Password</a></button>
          </div>
        </form>
      </div>
    </div>

  </div><!-- container -->

  <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Username</h4>
      </div>
      <div class="modal-body">
		<form id="getPasswordHintForm" class="form-horizontal">
			  <div class="form-group">
				<label class="col-sm-2 control-label">Username</label>
				<div class="col-sm-10">
				  <input type="text" name="check_username" id="checkUsername" class="form-control" placeholder="Username" required>
				  <span id="error_check_username" class="text-primary pull-left" style="font-size: 1.3em"></span>
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-primary pull-left">Get Password hint</button>
				</div>
			  </div>
		    </form>       
      </div>
    </div>
  </div>
</div>
<script>
$('#getPasswordHintForm').on('submit', function(e){
			var username = $('#checkUsername').val();
			e.preventDefault();
			
			
			$.ajax({
				url: 'get-password-hint.php',
				//dataType: 'json',
				async: false,
				data: {"username": username},
				success: function(data) {
					if(data !== '')
						$('#error_check_username').text('Password hint: ' +  data);
					else
						$('#error_check_username').text('User does not exists');
				}
			});
			
		});
</script>
</body>
</html>
