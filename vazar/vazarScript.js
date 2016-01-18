function logOutButtonPressed(){
	bootbox.confirm("Are you sure you want to log out of your account?", function(result) {
		if(result){
			document.location.href="internal/destorySession.php";
		}
	});
}

function loginButtonPressed(){
	if($("#username").val()==="" || $("#password").val()===""){
	    bootbox.alert("Fields cannot be empty.", function() {		
		});
	}else{
		$("#loginSubmitButton").trigger('click');
	}

}

function registrationButtonPressed(){
	if($("#register_username").val()==="" || $("#register_password").val()==="" || $("#re_password").val()==="" || $("#register_email").val()===""){
	    bootbox.alert("Fields cannot be empty.", function() {		
		});
	}else if($("#register_password").val()!==$("#re_password").val()){
		bootbox.alert("Passwords do not match.", function() {
			document.getElementById('register_password').value="";
			document.getElementById('re_password').value="";
		});
	}else if(!validateEmail($("#register_email").val())){
		bootbox.alert("Please enter a valid email address.", function() {
			document.getElementById('register_email').value="";
		});
	}else{
		$("#registrationSubmitButton").trigger('click');
	}
}

function updateButtonPressed(){
	if($("#update_username").val()==="" || $("#update_password").val()==="" || $("#update_re_password").val()==="" || $("#update_email").val()===""){
	    bootbox.alert("Fields cannot be empty.", function() {		
		});
	}else if($("#update_password").val()!==$("#update_re_password").val()){
		bootbox.alert("Passwords do not match.", function() {
			document.getElementById('update_password').value="";
			document.getElementById('update_re_password').value="";
		});
	}else if(!validateEmail($("#update_email").val())){
		bootbox.alert("Please enter a valid email address.", function() {
			document.getElementById('update_email').value="";
		});
	}else{
		$("#updateSubmitButton").trigger('click');
	}
}

function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if( !emailReg.test( $email ) ) {
    return false;
  } else {
    return true;
  }
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip('Hello')
})


function sellProductSubmitButtonPressed(){	
	if($("#product_name").val()==="" || $("#product_price").val()==="" || $("#product_quantity").val()==="" || $("#product_description").val()==="" || $("#product_link1").val()==="" || $("#product_link2").val()==="" || $("#product_link3").val()===""){
	    bootbox.alert("Fields cannot be empty.", function() {		
		});
	}else if(isNaN($("#product_price").val())){
		bootbox.alert("Product Price must be valid number.", function() {
			document.getElementById('product_price').value="";
		});
	}else if(isNaN($("#product_quantity").val())){
		bootbox.alert("Product Quantity must be valid number.", function() {
			document.getElementById('product_quantity').value="";
		});
	}else{
		$("#sellProductSubmitButton").trigger('click');
	}
}

function goToByScroll(id){
      // Remove "link" from the ID
    id = id.replace("link", "");
      // Scroll
    $('html,body').animate({
        scrollTop: $("#"+id).offset().top},
        'slow');
}


function productClicked(id){
	//alert(id);
	document.getElementById("productFormDiv").style.display = "block";	
	goToByScroll('productFormDiv'); 	
	showProductDetails(id);
}

function returnButtonPressed(){
	document.getElementById("productFormDiv").style.display = "none";	
	goToByScroll('categoryDiv'); 
}

function addToWishlistButtonPressed(id){
	addToWishList(id);
	bootbox.alert("Product added to wishlist.", function() {		
		});

}

function addToCartButtonPressed(id){
	bootbox.prompt("Enter product quantity ", function(result) {
		if(result){
			addToCart(id,result);
		}
	}); 
}

function myCartButtonCLicked(){
	document.getElementById("myCart").style.display = "block";	
	goToByScroll('myCart');
	showCart();
}

function cartReturnButtonPressed(){
	document.getElementById("myCart").style.display = "none";	
	goToByScroll('categoryDiv'); 	
}

function searchButtonClicked(str){
	document.getElementById("searchPanel").style.display = "block";	
	goToByScroll('searchPanel'); 
	searchProduct(str);
}

function runScript(e) {
    if (e.keyCode == 13) {
        searchButtonClicked($('#searchField').val());
    }
}

function customSearch(str){
	document.getElementById("searchPanel").style.display = "block";	
	goToByScroll('searchPanel'); 
	searchProduct(str);
}

function deleteCartClicked(){
	document.getElementById("myCart").style.display = "none";	
	goToByScroll('categoryDiv'); 	
	deleteCart();
}

function deleteFromCartClicked(id){
	goToByScroll('categoryDiv');
	deleteFromCart(id);
}

function wishlistButtonCLicked(){
	document.getElementById("wishlist").style.display = "block";	
	goToByScroll('wishlist'); 	
	showWishlist();
}

function deleteFromWishlistClicked(id){
	document.getElementById("wishlist").style.display = "none";	
	goToByScroll('categoryDiv'); 	
	deleteFromWishlist(id);
	alert("Product Succesfully Deleted From Wishlist.");
}