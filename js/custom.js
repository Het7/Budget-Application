$(document).ready(function() {
	$('.chat_icon').click(function() {
		$('.chat_box').toggleClass('active');
	});

	$('.my-conv-form-wrapper').convform({selectInputStyle: 'disable'})
});


		$(document).ready(function(){
				$("#send-btn").on("click", function(){
						$value = $("#data").val();
						$msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
						$(".cb-form").append($msg);
						$("#data").val('');

						// start ajax code
						$.ajax({
								url: 'message.php',
								type: 'POST',
								data: 'text='+$value,
								success: function(result){
										$replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
										$(".cb-form").append($replay);
										// when chat goes down the scroll bar automatically comes to the bottom
								            $(".cb-form").scrollTop($(".cb-form")[0].scrollHeight);
								}
						});
				});
		});
