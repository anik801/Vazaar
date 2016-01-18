<?php
	ob_start();//new
	if(isset($_SESSION['bns_id'])){		
		echo '
			<input type="button" class="btn btn-default" value="Return" onclick="returnButtonPressed();">
			<input type="button" class="btn btn-warning" value="Add to Wishlist" onclick="addToWishlistButtonPressed();">
		    <input type="button" class="btn btn-primary" value="Add to Cart" onclick="addToCartButtonPressed();">
		    <input type="submit" id="addToCartButton" name ="addToCartButton" style="display:none"> 
	    ';
	}else{
		echo"
			<div id=''>
				<input type='button' class='btn btn-default' value='Return' onclick='returnButtonPressed();'>
				<a class='btn btn-sm btn-primary' href='#loginForm' role='button' data-toggle='modal'>Log In</a>			
				<a class='btn btn-sm btn-warning' href='#registraionForm' role='button' data-toggle='modal'>Register</a>			
			</div>
		";
	}	
?>