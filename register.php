<?php
	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once('E:\Learning\PHP Login Udemy\inc\config.php');

	Page::ForcedDash();
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Register</title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="robots" content="follow">
	</head>
	<body>
		<div class="uk-section uk-container">
			<div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid="">

				<form class="uk-form-stacked js-register">
					<h2>Register</h2>
					<div class="uk-margin">
				        <label class="uk-form-lable" for="form-stacked-text">First Name</label>
				        <div class="uk-form-controls">
				        	<input class="uk-input"	type="text" name="" id="fname" autocomplete="given-name" required="required" placeholder="Your First Name"  autofocus="on"/>
				        </div>
				    </div>
				    <div class="uk-margin">
				        <label class="uk-form-lable" for="form-stacked-text">Last Name</label>
				        <div class="uk-form-controls">
				        	<input class="uk-input"	type="text" name="" id="lname" autocomplete="family-name" required="required" placeholder="Your Last Name" />
				        </div>
				    </div>
				    <div class="uk-margin">
				        <label class="uk-form-lable" for="form-s-s">County</label>
				        <div class="uk-form-controls">
				        	<span></span>
			        		<select id="form-s-s" style="width:370px;" autocomplete="address-level1" required="required">
					            <option value="1">Alba</option>
					            <option value="2">Arad</option>
					            <option value="3">Arges</option>
					            <option value="4">Bacau</option>
					            <option value="5">Bihor</option>
					            <option value="6">Bistrita-Nasaud</option>
					            <option value="7">Botosani</option>
					            <option value="8">Brasov</option>
					            <option value="9">Braila</option>
					            <option value="10">Bucuresti</option>
					            <option value="11">Buzau</option><option value="12">Caras-Severin</option><option value="13">Calarasi</option><option value="14">Cluj</option><option value="15">Constanta</option><option value="16">Covasna</option><option value="17">Dambovita</option><option value="18">Dolj</option><option value="19">Galati</option><option value="20">Giurgiu</option>
						    	<option value="21">Gorj</option><option value="22">Harghita</option><option value="23">Hunedoare</option><option value="24">Ialomita</option><option value="25">Iasi</option><option value="26">Ilfov</option><option value="27">Maramures</option><option value="28">Mehedinti</option><option value="29">Mures</option><option value="30">Neamt</option>
						    	<option value="31">Olt</option><option value="32">Prahova</option><option value="33">Satu Mare</option><option value="34">Salaj</option><option value="35">Sibiu</option><option value="36">Suceava</option><option value="37">Teleorman</option><option value="38">Timis</option><option value="39">Tulcea</option><option value="40">Vaslui</option>
						    	<option value="41">Valcea</option><option value="42">Vrancea</option>
		       				 </select>
						</div>
				    </div>
				    <div class="uk-margin">
				        <label class="uk-form-lable" for="form-stacked-text">Address from ID Card</label>
				        <div class="uk-form-controls">
				        	<input class="uk-input"	type="text" name="" id="addr" autocomplete="address-line1" required="required" placeholder="Your Address" />
				        </div>
				    </div>
				    <div class="uk-margin">
				        <label class="uk-form-lable" for="form-stacked-text">CNP</label>
				        <div class="uk-form-controls">
				        	<input class="uk-input"	type="text" name="" id="cnp" required="required" placeholder="Your CNP" />
				        </div>
				    </div>
				    <div class="uk-margin">
				        <label class="uk-form-lable" for="form-stacked-text">ID Series and Number</label>
				        <div class="uk-form-controls">
				        	<input class="uk-input"	type="text" name="" id="sn" autocomplete='series-number' required="required" placeholder="Your ID Series and Number" />
				        </div>
				    </div>
					<div class="uk-margin">
				        <label class="uk-form-lable" for="form-stacked-text">Email</label>
				        <div class="uk-form-controls">
				        	<input class="uk-input" type="email" name="" id="email" autocomplete="email" required="required" placeholder="email@email.com"/>
				        </div>
				    </div>

				    <div class="uk-margin">
				        <label class="uk-form-lable" for="form-stacked-text">Password</label>
				        <div class="uk-form-controls">
				        	<input class="uk-input"	type="password" name="" id="pass" autocomplete="current-password" required="required" placeholder="Your Password" />
				        </div>
				    </div>

				    <div class="uk-margin uk-alert uk-alert-danger js-error" style="display: none;"></div>

			        <div class="uk-margin">
			        	<button class="uk-button uk-button-default DB" type="submit">Register</button>
			        </div>
				</form>
			</div>
		</div>
		<?php require_once('E:\Learning\PHP Login Udemy\inc\footer.php'); ?>
	</body>
</html>