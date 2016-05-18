<div class="form-container">
	<form action="login.php" name="login" id="login" method="POST">
	<ul>
		<li>
			<input type="email" name="email" id="email" class="required" maxlength="50" placeholder="Your Email Address" placeholder="email">
			<label for="email" class="error"></label>
		</li>
		<li>
			<input type="password" name="password" id="password" class="required" placeholder="Password">
			<label for="password" class="error"></label>
		</li>
		<li class="info">
			<p class="righted small"><em>*</em>Required field.</p>					
		</li>
		<li>
			<p class="lefted small not-member">Not a member? <a href="register.php">Register here</a>.</p>
			<p class="righted small"><a href="forgotpassword.php">Forgot Password</a></p>				
		</li>
		<li class="centered">
			<input type="submit" name="submit" id="submit" value="LOGIN">
		</li>
	</ul>
	</form>
</div>