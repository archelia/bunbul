<div class="form-container">
			<form action="register.php" name="addcustomer" id="addcustomer" method="POST">
				<ul>
					<li>
						<input type="text" name="customername" id="customername" class="required" maxlength="256" placeholder="Customer Name" value="">
						<label for="customername" class="error">This is a required field.</label>
					</li>
					<li>
						<input type="email" name="customeremail" id="customeremail" class="required" maxlength="256" placeholder="Customer Email Address" value="">
						<label for="customeremail" class="error"></label>
					</li>
					<li>
						<input type="text" name="phonenumber" id="phonenumber" class="required" maxlength="256" placeholder="Customer Phone Number" value="">
						<label for="phonenumber" class="error"></label>
					</li>
					<li>
						<input type="password" name="password" id="password" class="required" maxlength="" placeholder="Password" value="">
						<label for="password" class="error">This is a required field.</label>
					</li>
					<li>
						<input type="password" name="password1" id="password1" class="required" maxlength="" placeholder="Confirm Password" value="">
						<label for="password1" class="error">This is a required field.</label>
					</li>
					<li>
						<label for="">Gender<em>*</em></label>
						<select name="gender" id="gender">
							<option value="1">Male</option>
							<option value="2">Female</option>
						</select>
						<label for="" class="error"></label>
					</li>
					<li class="bdate">
						<label for="birthday">Birthday<em>*</em></label>
						<select name="year" id="year">
							<?php							
							 $starting_year  =date('Y', strtotime('-80 year'));
							 $ending_year = date('Y', strtotime('-10 year'));
							 for($ending_year; $ending_year >= $starting_year; $ending_year--) {
								 echo '<option value="'.$ending_year.'"';
								 echo ' >'.$ending_year.'</option>';
							 } 
							?>
						</select>								
						<select name="month" id="month">
							<?php
							for ($m=1; $m<=12; $m++) {
							 $current_month = date('n'); 	
							 $month = date('F', mktime(0,0,0,$m, 1, date('Y')));								
							 echo '<option value="'.$m.'"';
							 if(isset($action)){
								if($m==$months){echo " selected";}
							 }	
							 else{
								if($m==$current_month){echo " selected";}
							 }
							 echo '>'.$month.'</option>';
							}
							?>
						</select>
						<select name="day" id="day">
						<?php
							for ($d=1; $d<=31; $d++) {								
							 echo '<option value="'.$d.'"';
							 if(isset($action)){
									 if($d==$days){echo " selected";}
								 }	
							 echo '>'.$d.'</option>';
							 }
						?>
						</select>
						<label for="birthday" class="error">Required fields.</label>
					</li>
					<li>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="subscribe" id="subscribe" class="" maxlength="2" value="1" <?php if(isset($action)){ if($row['subscribe']==1)echo "checked";}; ?>>
								<span></span>
								Subscribe Newsletter
							</label>
						</div>	
					</li>
					<li>
						<p class="righted small"><em>*</em>Required fields.</p>					
					</li>
					<li class="centered">
						<input type="submit" name="submit" id="submit" value="REGISTER">
						<?php
						if(isset($action)){
							echo '<input type="hidden" name="id" id="id" value="'.$row['id_customer'].'">';
							echo '<input type="hidden" name="action" id="action" value="$action">';
						}
						?>
					</li>
				</ul>
			</form>
		</div>	