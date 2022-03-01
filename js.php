<script>
	$(document).ready(function(){
		$("#addUserForm").on('submit',(function(e) {
			e.preventDefault();
			$.ajax({
				url:"reg.php",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(data){
					if(data == 1){
						$(".successMessage").html("You are successfully registered! Please wait for the admin to validate your account.").fadeIn(500).css('display','block');
						$(".errorMessage").css('display','none');
						setTimeout(function(){
						   window.location.href="index.php";
						}, 5000);
					}
					else{
						$(".successMessage").css('display','none');
						$(".errorMessage").html(data).fadeIn(500).css('display','block');
					}
				},
				error:function(data){
					$(".errorMessage").html("An unkown error occurred. Contact the admin please.").fadeIn(200).css('display','block');
				}	        
			});
		}));


		$("#login_form").on('submit',(function(e) {
			e.preventDefault();
			$.ajax({
				url:"login-root.php",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success:function(data){
					if(data == 1){
						$(".successMessage").html("You are logged in successfully.").fadeIn(500).css('display','block');
						$(".errorMessage").css('display','none');
						setTimeout(function(){
						   window.location.href="administrations/index.php";
						}, 5000);
					}
					else{
						$(".successMessage").css('display','none');
						$(".errorMessage").html(data).fadeIn(500).css('display','block');
					}
				},
				error:function(data){
					$(".errorMessage").html("An unkown error occurred. Contact the admin please.").fadeIn(200).css('display','block');
				}	        
			});
		}));


	});

</script>