<script>
	window.setInterval(function(){
		get_notifications();
	}, 6000);

	function get_notifications(){
		$.ajax({
			url: "model/get_notifications.php",
			type: "post",
			success: function (response) {
				console.log(response);

				if (response) {
					var results = JSON.parse(response);
					results.forEach((n)=>
					{
						$.Toast(n.message, {'width': 300});
						update_notification(n.notification_id)
					});
				}

			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	}

	function update_notification(id){
		$.ajax({
			url: "model/update_notifications.php",
			type: "post",
			data: {'id': id},
			success: function (response) {
				console.log(response);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	}	
</script>