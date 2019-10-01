<?php

	
	class Validate{


		//FUNCTIONS TO IMPLEMENT

		//1. Validate email
		//2. Validate 10 digit mobile number
		//3. Validate for only alphabets
		//4. Validate for only numbers
		//5. Validate length of string
		//6. Validate password


		public static isEmail($email){
			if(!empty(trim($email))){

			}else{
				return false;
			}
		}
	}



	$isEmail = Validate::isEmail($email);

	echo $isEmail;






?>