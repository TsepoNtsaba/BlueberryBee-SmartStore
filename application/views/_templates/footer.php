
	<div class="container">
		<hr>
		<div class="row centered">
			<div class="col-lg-6 col-lg-offset-3">
				<form class="form-inline" role="form">
				  <div class="form-group">
				    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email address">
				  </div>
				  <button type="submit" class="btn btn-warning btn-lg">Invite Me!</button>
				</form>					
			</div>
			<div class="col-lg-3"></div>
		</div><!-- /row -->
		<hr>
		<p class="centered">Developed by Marabele Enterprise (Pty) Ltd</p>
		<!-- echo out the content of the SESSION via KINT, a Composer-loaded much better version of var_dump -->
		<!-- KINT can be used with the simple function d() -->
		<?php d($_SESSION); ?>
		<?php //var_dump($_SESSION); ?>	
	</div><!-- /container -->    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap/bootstrap.min.js"></script>    
</body>
</html>
