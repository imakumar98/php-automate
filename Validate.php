<?php

	
	class Validate{


		//FUNCTIONS TO IMPLEMENT

		//1. Validate email(Done)
		//2. Validate 10 digit mobile number
		//3. Validate for only alphabets
		//4. Validate for only numbers
		//5. Validate length of string
		//6. Validate password


		//Function to validate email
		public static function isEmail($email){
			if(!empty(trim($email))){
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				  return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	}



	$isEmail = Validate::isEmail('aksingh9903@gmail.com');

	echo $isEmail;






?>