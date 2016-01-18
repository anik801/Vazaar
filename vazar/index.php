<?php
	ob_start();//new
	session_start();
	include 'internal/myConnection.php';
	//include 'internal/loginCheck.php';
?>

<!DOCTYPE html>

<html>

<head>
	<title>Vazar --- The Best Online Buy n' Sell Place</title>	
	<!-- API header files -->
	<script src="apiFiles/jquery-1.10.2.min.js"></script>
	<script src="apiFiles/bootstrap.js"></script>
	<link href="apiFiles/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="apiFiles/bootstrap-theme.css">
	<script type="text/javascript" src="apiFiles/bootbox.js"></script>
 	<script type="text/javascript" src="apiFiles/sorttable.js"></script>
	<script src="apiFiles/bootstrap-tooltip.js"></script>
	<script type="text/javascript" src="apiFiles/nhpup_1.1.js"></script>

	<!-- Personal header files -->
	<script src="vazarScript.js"></script>
	<link href="vazarStyle.css" rel="stylesheet">


	<!--AJAX Scripts-->
	<script type="text/javascript">
	  //AJAX function to dynamically display types based on categories.
	  	function showType(str) {
		  if (str=="") {
		    document.getElementById("txtHint").innerHTML="";
		    return;
		  } 
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("typeDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","getSubCategories.php?q="+str,true);
		  xmlhttp.send();
		}

		//AJAX function to dynamically display types based on categories.
	  	function showFields(str) {
		  if (str=="") {
		    document.getElementById("txtHint").innerHTML="";
		    return;
		  } 
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("fieldDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","getFields.php?q="+str,true);
		  xmlhttp.send();
		}

		//AJAX function to dynamically display types based on categories.
	  	function showProductDetails(str) {
		  if (str=="") {
		    document.getElementById("txtHint").innerHTML="";
		    return;
		  } 
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("productDetailsBody").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","showProductDetails.php?q="+str,true);
		  xmlhttp.send();
		}

		//AJAX function to dynamically display types based on categories.
	  	function addToWishList(str) {
		  if (str=="") {
		    document.getElementById("txtHint").innerHTML="";
		    return;
		  } 
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("tempDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","addToWishList.php?q="+str,true);
		  xmlhttp.send();
		}

		//AJAX function to dynamically display types based on categories.
	  	function addToCart(str,quantity) {
		  if (str=="") {
		    document.getElementById("txtHint").innerHTML="";
		    return;
		  } 
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("tempDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","addToCart.php?q="+str+"&x="+quantity,true);
		  xmlhttp.send();
		}

		//AJAX function to dynamically display types based on categories.
	  	function showCart(str) {
		  if (str=="") {
		    document.getElementById("tempDiv").innerHTML="";
		    return;
		  } 
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("myCartDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","showCart.php?q="+1,true);
		  xmlhttp.send();
		}

		//AJAX function to dynamically display types based on categories.
	  	function searchProduct(str) {
		  if (str=="") {
		    document.getElementById("tempDiv").innerHTML="";
		    return;
		  } 
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("searchDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","search.php?q="+str,true);
		  xmlhttp.send();
		}

		//AJAX function to dynamically display types based on categories.
	  	function deleteCart(str) {
		  if (str=="") {
		    document.getElementById("tempDiv").innerHTML="";
		    return;
		  } 
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("myCartDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","deleteCart.php?q="+1,true);
		  xmlhttp.send();
		}

		function deleteFromCart(str) {
		  if (str=="") {
		    document.getElementById("tempDiv").innerHTML="";
		    return;
		  } 
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("myCartDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","deleteFromCart.php?q="+1,true);
		  xmlhttp.send();
		}

		function checkOut(str) {
		  if (str=="") {
		    document.getElementById("tempDiv").innerHTML="";
		    return;
		  } 
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("myCartDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","checkOut.php?q="+1,true);
		  xmlhttp.send();
		}

		//AJAX function to dynamically display types based on categories.
	  	function showWishlist(str) {	  		
		  if (str=="") {
		    document.getElementById("tempDiv").innerHTML="";
		    return;
		  } 
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("wishlistDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","showWishlist.php?q="+1,true);
		  xmlhttp.send();
		}

		function deleteFromWishlist(str) {
		  if (str=="") {
		    document.getElementById("tempDiv").innerHTML="";
		    return;
		  } 
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		      document.getElementById("wishlistDiv").innerHTML=xmlhttp.responseText;
		    }
		  }
		  xmlhttp.open("GET","deleteFromWishlist.php?q="+str,true);
		  xmlhttp.send();
		}

	  </script>
</head>


<body id="top">
	<!--Nav Bar/Header Bar -->
	<div class="row">
		<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" id="pointers" onclick="goToByScroll('top');">Vazar.com</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		      	<li><a id="pointers" onclick="goToByScroll('categoryDiv2');">Categories</a></li>
		        <li><a id="pointers" onclick="goToByScroll('categoryDiv');">Products</a></li>		        
		       	<!-- <li><a id="pointers" onclick="myCartButtonCLicked()">My Cart</a></li> -->
		      </ul>
	      		
	      		<div class="navbar-form navbar-left" role="search">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search Here" id="searchField" name="searchField" onkeypress="return runScript(event)">
			        </div>
			        <input type="button" class="btn btn-default" value="Search" onclick="searchButtonClicked($('#searchField').val());">
		        </div>
		      

		      <ul class="nav navbar-nav navbar-right">
		       	<?php include 'internal/loginCheck.php'; ?>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</div>

	<br></br>
	<!--Tabs-->
	<div id="imageDiv">
		<img src="images/image1.jpg" class="stretch"/>
	</div>
	<!-- Category Panel -->
	<div id="categoryDiv2">
		<div id="categoryTitleDiv"><br>Categories<br></div>	<!--Product Categories John-->
		<div id="childCategories" class="container">
			<?php include 'showCategories.php'; ?>
		</div>
	</div>
	<!-- Featured Products Panel -->
	<div id="categoryDiv">
		<div id="categoryTitleDiv"><br>Featured Products<br></div>	<!--Product Categories John-->
		<div id="childCategories" >
			<?php include 'showFeaturedProducts.php'; ?>		  		
		</div>
	</div>

	<!-- Searched Product Panel -->
	<div id="searchPanel">
		<div align="center">
			<div id="categoryTitleDiv"><br>Searched Products<br></div>	<!--Product Categories John-->
			<div id="searchDiv" ></div>
		</div>
	</div>

	<!-- Product Panel -->
  	<div id="productFormDiv">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	  	<div>	
	        <div id="categoryTitleDiv"><br>Product Details<br></div>	
			<div id="productDetailsBody"></div>
	        	     
	    </div>
	  </form> 
	</div>

	<!-- Wishlist Panel -->
  	<div id="wishlist">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	  	<div align="center">	
	  		<div id="categoryTitleDiv"><br>My Wishlist<br></div>			
	  		<div id="wishlistDiv" class="container"></div>        
	        	     
	    </div>
	  </form> 
	</div>


	<!-- Cart Panel -->
  	<div id="myCart">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	  	<div align="center">	
	  		<div id="categoryTitleDiv"><br>My Cart<br></div>			
	  		<div id="myCartDiv" class="container"></div>        
	        	     
	    </div>
	  </form> 
	</div>


	<div id="tempDiv">	
		<!--<img src="images/image2.jpg" class="stretch"/>-->
	</div>
	<?php 
		//include 'scroll.html';
	?>

  	<!-- Modal divs -->
  	<!-- Login Modal -->
  	<div class="modal fade" id="loginForm">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	  <div class="modal-dialog" id="signinDialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
	          <h4 class="modal-title">LOGIN</h4>
	        </div>

	        <div class="modal-body">
	          <input class="form-control" required id="email" name="email" placeholder="Enter your email here."  type="text" value="">
	          <input class="form-control" required id="password" name="password" placeholder="Enter your password here."  type="password" value="">
	        </div>

	        <div class="modal-footer">
	          <a href="#" data-dismiss="modal" class="btn btn-default">Close</a>  
	          <input type="button" class="btn btn-primary" value="Log In" onclick="loginButtonPressed();">
	          <input type="submit" id="loginSubmitButton" name ="loginSubmitButton" style="display:none">     
	        </div>
	      </div>
	    </div>
	  </form> 
	</div>
	<!-- Registration Modal -->
	<div class="modal fade" id="registraionForm">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	  <div class="modal-dialog" id="signinDialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
	          <h4 class="modal-title">Registration</h4>
	        </div>

	        <div class="modal-body">
	          <input class="form-control" required id="register_username" name="register_username" placeholder="*Enter your desired username."  type="text">
	          
	          <input class="form-control" required id="register_email" name="register_email" placeholder="*Enter your email address."  type="text">
	          
	          <input class="form-control" required id="register_password" name="register_password" placeholder="*Enter your password here."  type="password">

	          <input class="form-control" required id="re_password" name="re_password" placeholder="*Enter your password again."  type="password">
	          
	          <input class="form-control" required id="register_mobile" name="register_mobile" placeholder="*Enter your contact number."  type="text">
	          
	          <input class="form-control" id="register_location" name="register_location" placeholder="Enter your address."  type="text">
	          <span id="mandatoryField">*Mandatory Field.</span>
	        </div>

	        <div class="modal-footer">
	          <a href="#" data-dismiss="modal" class="btn btn-default">Close</a>  
	          <input type="button" class="btn btn-primary" value="Create Account" onclick="registrationButtonPressed();">
	          <input type="submit" id="registrationSubmitButton" name ="registrationSubmitButton" style="display:none">     	          
	        </div>
	      </div>
	    </div>
	  </form> 
	</div>


	<!-- Update Info Modal -->
	<div class="modal fade" id="updateInfo">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	  <div class="modal-dialog" id="signinDialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
	          <h4 class="modal-title">User Information</h4>
	        </div>

	        <div class="modal-body">
	          <input class="form-control" required id="update_username" name="update_username" placeholder="*Enter your desired username."  type="text"  value="<?php echo htmlentities($update_user_name); ?>" >
	          
	          <input class="form-control" required id="update_email" name="update_email" placeholder="*Enter your email address."  type="text" value="<?php echo htmlentities($update_user_email); ?>" >
	          
	          <input class="form-control" required id="update_password" name="update_password" placeholder="*Enter your password here."  type="password" >

	          <input class="form-control" required id="update_re_password" name="update_re_password" placeholder="*Enter your password again."  type="password">
	          
	          <input class="form-control" required id="update_mobile" name="update_mobile" placeholder="*Enter your contact number."  type="text"  value="<?php echo htmlentities($update_user_mobile); ?>" >
	          
	          <input class="form-control"  id="update_location" name="update_location" placeholder="Enter your address."  type="text"  value="<?php echo htmlentities($update_user_location); ?>" >
	          <span id="mandatoryField">*Mandatory Field.</span>
	        </div>

	        <div class="modal-footer">

	          <a href="#" data-dismiss="modal" class="btn btn-default">Close</a>  
	          <input type="button" class="btn btn-primary" value="Update" onclick="updateButtonPressed();">
	          <input type="submit" id="updateSubmitButton" name ="updateSubmitButton" style="display:none">     
	        </div>
	      </div>
	    </div>
	  </form> 
	</div>

	<!-- Sell Product Modal -->
	<div class="modal fade" id="sellProduct">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="post" >
	  <div class="modal-dialog" id="signinDialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
	          <h4 class="modal-title">User Information</h4>
	        </div>

	        <div class="modal-body">
	          <input class="form-control" required id="product_name" name="product_name" placeholder="*Enter product name."  type="text">
	          <input class="form-control" required id="product_price" name="product_price" placeholder="*Enter product price."  type="text">
	          <input class="form-control" required id="product_quantity" name="product_quantity" placeholder="*Enter product quantity."  type="text">
	          <input class="form-control" required id="product_description" name="product_description" placeholder="*Enter product description."  type="text">
	          <input class="form-control" required id="product_link1" name="product_link1" type="file">
	          <input class="form-control" required id="product_link2" name="product_link2" type="file">
	          <input class="form-control" required id="product_link3" name="product_link3" type="file">
	          	<?php
	          		$sql="SELECT category_id,category_name FROM categories";
	          		$result=mysql_query($sql);
					if (!$result) {
					    die('Invalid query: ' . mysql_error());	
					}
					echo "<select name='categoryName' class='form-control' onchange='showType(this.value)'>";
					echo "<option value='0'>N/A</option>";
					while($row=mysql_fetch_array($result)){
						$name=$row['category_name'];
						$id=$row['category_id'];
						echo "<option value='$id'>$name</option>";
					}
					echo "</select>";
	          	?>
	    	  <div id="typeDiv">
	    	  </div>
	    	  <div id="fieldDiv">
	    	  </div>
	          
	          <span id="mandatoryField">*Mandatory Field.</span>
	        </div>

	        <div class="modal-footer">

	          <a href="#" data-dismiss="modal" class="btn btn-default">Close</a>  
	          <input type="button" class="btn btn-primary" value="Post" onclick="sellProductSubmitButtonPressed();">
	          <input type="submit" id="sellProductSubmitButton" name ="sellProductSubmitButton" style="display:none">     
	        </div>
	      </div>
	    </div>
	  </form> 
	</div>
	

</body>


</html>