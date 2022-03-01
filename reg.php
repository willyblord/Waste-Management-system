<?php
	include("../connection_e_wasteManagement.php");
	// Check if all data are entered in form.
	if(isset($_POST['name']) and isset($_POST['lname']) and isset($_POST['email']) and isset($_POST['username']) and isset($_POST['password_1']) and isset($_POST['password_2'])){
		
		// Check if email exists
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
			$selectEmail = $db->prepare("SELECT email FROM users WHERE email = '".$_POST['email']."'");
			$selectEmail->execute();
			if($emailFound = $selectEmail->fetch()){
				die("The email already exists.");
			}
			else{

				// Check if username exists
				$selectUsername = $db->prepare("SELECT username FROM users WHERE username = '".$_POST['username']."'");
				$selectUsername->execute();
				if($usernameFound = $selectUsername->fetch()){
					die("This username is already taken.");
				}
				else{

					// Check password match
					if($_POST['password_1'] != $_POST['password_2']){
						die("The passwords don't match. Try again please.");
					}
					else{

						// Check terms and conditions
						if(isset($_POST['checkTermsAndConditions'])){
							$termsAndConditions = 1;
						}
						else{
							$termsAndConditions = 0;
						}
						if($termsAndConditions == 1){
							$na = "NA";

							// Hash password
							$salt1 = "!!!6544653_$$=-=-!";
							$salt2 = "ADFNJVD ++sdf/*-&";
							$password = $salt1 . $_POST['password_1'] . $salt2;
							$passwordHash = password_hash($password, PASSWORD_DEFAULT);

							// Insert user
							$insertUser = $db->prepare("
								INSERT INTO users (
									first_name, 
									last_name, 
									role, 
									email, 
									username, 
									password, 
									address, 
									phone, 
									status, 
									terms_and_conditions
								) 
								VALUES(
									'".$_POST['name']."', 
									'".$_POST['lname']."', 
									'user',
									'".$_POST['email']."', 
									'".$_POST['username']."',  
									'".$passwordHash."', 
									'".$na."', 
									'".$na."',
									'Pending', 
									'".$termsAndConditions."'
								) 
							");
							$inserUserSuccess = $insertUser->execute();
							if($inserUserSuccess){
								die("1");
							}
							else{
								die("An unknown error occurred. Contact the system admin please.");
							}
						}
						else{
							die("Please accept terms and conditions in order to sign up.");
						}
					}
				}
			}
		}
		else{
			die("Your email is invalid. Try another one please.");
		}
	}
	else{
		die("fill all the form fields please.");
	}
?>