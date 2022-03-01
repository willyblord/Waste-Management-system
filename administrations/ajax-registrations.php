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
						$(".successMessage").html("You are successfully registered!").fadeIn(500).css('display','block');
						$(".errorMessage").css('display','none');
						setTimeout(function(){
						   window.location.href="usermanagement.php";
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