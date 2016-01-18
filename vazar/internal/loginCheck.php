<?php
	ob_start();//new
	if(isset($_POST['registrationSubmitButton'])){
		$username=mysql_real_escape_string($_POST['register_username']);
		$password=mysql_real_escape_string($_POST['register_password']);		
		$password=md5($password);
		$email=mysql_real_escape_string($_POST['register_email']);
		$email=md5($email);
		$contact=mysql_real_escape_string($_POST['register_mobile']);
		$address=mysql_real_escape_string($_POST['register_location']);
		$sql="INSERT INTO user_accounts (user_name,user_email,user_password,user_mobile,user_location,user_date_time) VALUES ('$username','$email','$password','$contact','$address',now())"; //1 for active user
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else{			
			echo "
				<script>
				alert('Registration Succesful. Please login to continue.');
				document.location.href='';
				</script>
				";
		}
	}else if(isset($_POST['updateSubmitButton'])){
		$user_id=$_SESSION['bns_id'];
		$username=mysql_real_escape_string($_POST['update_username']);
		$password=mysql_real_escape_string($_POST['update_password']);
		$email=mysql_real_escape_string($_POST['update_email']);
		$contact=mysql_real_escape_string($_POST['update_mobile']);
		$address=mysql_real_escape_string($_POST['update_location']);
		$sql="UPDATE user_accounts SET user_name='$username',user_email='$email',user_password='$password',user_mobile='$contact',user_location='$address' WHERE user_id='$user_id' ";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else{			
			echo "
				<script>
				alert('Account Information Succesfully Updated.');
				document.location.href='';
				</script>
				";
		}
	}else if(isset($_POST['loginSubmitButton'])){

		$un=mysql_real_escape_string($_POST['email']);
		$pw=mysql_real_escape_string($_POST['password']);
		$un=md5($un);
		$pw=md5($pw);
		
		$sql="SELECT user_id FROM `user_accounts` WHERE `user_email`='$un' AND `user_password`='$pw'";
		$result=mysql_query($sql);
		if (!$result) {
		   	die('Invalid query: ' . mysql_error());
		 	break;
		}
		if(mysql_num_rows($result)>0){
			$row=mysql_fetch_array($result);
			$_SESSION['bns_id']=$row['user_id'];
			$_SESSION['cart']=0;
			header('Location: index.php');
			exit();//new
		}else{
			echo "<script>alert('Authentication Error.');</script>";
		}
		
	}else if(isset($_POST['sellProductSubmitButton'])){


		$ext = findexts ($_FILES['product_link1']['name']) ;
		$newfilename =  random_string('10') .".".$ext;
		$location1="files/" . $newfilename;
		move_uploaded_file($_FILES["product_link1"]["tmp_name"],"files/" . $newfilename);
		
		$ext = findexts ($_FILES['product_link2']['name']) ;
		$newfilename =  random_string('10') .".".$ext;
		$location2="files/" . $newfilename;
		move_uploaded_file($_FILES["product_link2"]["tmp_name"],"files/" . $newfilename);

		$ext = findexts ($_FILES['product_link3']['name']) ;
		$newfilename =  random_string('10') .".".$ext;
		$location3="files/" . $newfilename;
		move_uploaded_file($_FILES["product_link3"]["tmp_name"],"files/" . $newfilename);										

		$user_id=mysql_real_escape_string($_SESSION['bns_id']);
		$productName=mysql_real_escape_string($_POST['product_name']);		
		$productQuantity=mysql_real_escape_string($_POST['product_quantity']);
		$productPrice=mysql_real_escape_string($_POST['product_price']);
		$productDescription=mysql_real_escape_string($_POST['product_description']);
		$productCategory=mysql_real_escape_string($_POST['categoryName']);
		$productSubCategory=mysql_real_escape_string($_POST['subCategoryName']);
		
		$i=0;
		$sql="SELECT * FROM fields WHERE sub_category_id='$productSubCategory'";
		$result=mysql_query($sql);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		}
		if(mysql_num_rows($result)){	

			while($row=mysql_fetch_array($result)){
				$id[$i]=$row['field_id'];
				$field[$i]=mysql_real_escape_string($_POST[$id[$i]]);
				//echo $field[$i];
				$i++;
			}
		}
		$j=$i;
//		echo $j;

		
	
		$sql="INSERT INTO products (product_name,product_quantity,product_price,product_description,product_link1,product_link2,product_link3,product_date_time,user_id,category_id,sub_category_id) VALUES ('$productName','$productQuantity','$productPrice','$productDescription','$location1','$location2','$location3',now(),'$user_id','$productCategory','$productSubCategory')";		
		$result=mysql_query($sql);
		if (!$result) {
		   	die('Invalid query: ' . mysql_error());
		 	break;
		}

		$sql="SELECT product_id FROM products ORDER BY product_date_time DESC LIMIT 1";		
		$result=mysql_query($sql);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		}
		if(mysql_num_rows($result)){	
			$row=mysql_fetch_array($result);
			$productId=$row['product_id'];
		}

		for($i=0; $i<$j; $i++){
			$x=$id[$i];
			$y=$field[$i];
			$sql="INSERT INTO product_fields (product_id,field_id,field_value) VALUES ('$productId','$x','$y')";
			$result=mysql_query($sql);
			if (!$result) {
			   	die('Invalid query: ' . mysql_error());
			 	break;
			}
		}
		echo "
			<script>
			alert('Your product has been successfully uploaded to be sold.');
			//document.location.href='';
			</script>
			";

		
	
	}

	if(isset($_SESSION['bns_id'])){
		//Logged in, create log out button.
		$user_id=$_SESSION['bns_id'];
		$sql="SELECT * FROM user_accounts WHERE user_id='$user_id'";
		$result=mysql_query($sql);
		if (!$result) {
		    die('Invalid query: ' . mysql_error());
		}else{
			$row=mysql_fetch_array($result);
			$user_name=$row['user_name'];
			echo "				
				<div id='headerDiv'>
					<div id='headerText'>Logged in as <span id='userNameTitle'>$user_name</span>.</div><br>
					<a class='btn btn-sm btn-primary' href='#sellProduct' role='button' data-toggle='modal'>Sell Product</a>				
					<a class='btn btn-sm btn-warning' href='#updateInfo' role='button' data-toggle='modal'>Update Info</a>
					<a class='btn btn-sm btn-default' id='pointers' onclick='myCartButtonCLicked()' >My Cart</a>
					<a class='btn btn-sm btn-success' id='pointers' onclick='wishlistButtonCLicked()' >My Wishlist</a>
					<input class='btn btn-sm btn-danger' type='button' value='Log Out' id='logOutButton' name='logOutButton' onclick='logOutButtonPressed();'>
				</div>	
				";
		$update_user_name=$user_name;
		$update_user_email=$row['user_email'];
		$update_user_mobile=$row['user_mobile'];
		$update_user_location=$row['user_location'];

		}
	}else {
		//Not logged in, creat sign in and registration button.
		echo"
			<div id='headerDiv'>
				<br>
				<a class='btn btn-sm btn-primary' href='#loginForm' role='button' data-toggle='modal'>Log In</a>
				<a class='btn btn-sm btn-warning' href='#registraionForm' role='button' data-toggle='modal'>Register</a>			
			</div>
		";

	}

	function findexts ($filename) 
	{ 
		 $filename = strtolower($filename) ; 
		 $exts = split("[/\\.]", $filename) ; 
		 $n = count($exts)-1; 
		 $exts = $exts[$n]; 
		 return $exts; 
 	} 	 

 	function random_string($length) {
	    $key = '';
	    $keys = array_merge(range(0, 9), range('a', 'z'));

	    for ($i = 0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }

	    return $key;
	}


?>