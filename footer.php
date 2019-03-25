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
	</script>
</body>
</html>
