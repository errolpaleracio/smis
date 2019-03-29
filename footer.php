<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
      <div class="modal-body">
		<form id="loginForm" class="form-horizontal">
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Username</label>
		    <div class="col-sm-10">
		      <input type="text" name="username" class="form-control" placeholder="Username" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" name="password" class="form-control" placeholder="Password" required>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-primary">Login</button>
		    </div>
		  </div>
		</form>        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="changeUsernameModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Username</h4>
      </div>
      <div class="modal-body">
		<form id="changeUsernameForm" class="form-horizontal">
		  <div class="form-group">
		    <label class="col-sm-4 control-label">Old Username</label>
		    <div class="col-sm-8">
		      <input type="text" name="old_username" class="form-control" placeholder="Old Username" required>
		    </div>
		  </div>
		  
		   <div class="form-group">
		    <label class="col-sm-4 control-label">New Username</label>
		    <div class="col-sm-8">
		      <input type="text" name="new_password" class="form-control" placeholder="New Username" required>
		    </div>
		  </div>
		  
		  <div class="form-group">
		    <div class="col-sm-offset-4 col-sm-10">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		  </div>
		</form>        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">
		<form id="changePasswordForm" class="form-horizontal">
		  <div class="form-group">
		    <label class="col-sm-4 control-label">Old Password</label>
		    <div class="col-sm-8">
		      <input type="password" name="old_password" class="form-control" placeholder="Old Password" required>
		    </div>
		  </div>
		  
		   <div class="form-group">
		    <label class="col-sm-4 control-label">New Password</label>
		    <div class="col-sm-8">
		      <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
		    </div>
		  </div>
		  
		   <div class="form-group">
		    <label class="col-sm-4 control-label">Repeat New Password</label>
		    <div class="col-sm-8">
		      <input type="password" name="confirm_password" class="form-control" placeholder="Repeat New Password" required>
		    </div>
		   </div>
		  
		  <div class="form-group">
		    <div class="col-sm-offset-4 col-sm-10">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		  </div>
		</form>        
      </div>
    </div>
  </div>
</div>
	
	<script>
		$('#loginForm').submit(function(e){
			e.preventDefault();
			$.post('login.php', $(this).serialize(), function(data, textStatus, xhr) {
				console.log(xhr.responseText);
				if(xhr.responseText == 1)
					window.location.href='index.php';
				else{
					alert('Invalid username or password.')

				}
			});
		});

		$('#loginModal').on('hidden.bs.modal', function(e){
			$(this).find('input').val('');
		});
		$('#RegisterForm').submit(function(e){
			var password = $(this).find('input[name="password"]').val();
			var conf_password = $(this).find('input[name="conf_password"]').val();
			if(password != conf_password){
				alert('Password does not match!');
				e.preventDefault();
			}
		});
		
		
		$('#changeUsernameForm').submit(function(e){
			e.preventDefault();
			$.post('', $(this).serialize(), function(data, textStatus, xhr) {
				console.log(xhr.responseText);
				if(xhr.responseText == 1)
					window.location.href='index.php';
				else{
					alert('Invalid username or password.')

				}
			});
		});
		
		$('#changePasswordForm').submit(function(e){
			e.preventDefault();
			var old_password = $(this).find('input[name="old_password"]').val();
			var new_password = $(this).find('input[name="new_password"]').val();
			var confirm_password = $(this).find('input[name="confirm_password"]').val();
			
			if(confirm_password == new_password){
				$.getJSON('get_session_data.php', function(data){
					console.log(old_password + " " + new_password + " " + data.password);
					if(old_password == data.password){
						$.post('change-password.php', {"password": new_password, "user_account_id": data.user_account_id}, function(data, textStatus, xhr) {
							if(xhr.responseText == 1)
								alert("Password Successfully Changed");
								$(this).find('input[name="old_password"]').val('');
								$(this).find('input[name="new_password"]').val('');
								$(this).find('input[name="confirm_password"]').val('');
						
						});
					}else{
						alert('Incorrect Password!');
					}
					
				});
			}else{
				alert('New password and Confirm password must match');
			}
		});
	</script>
</body>
</html>
