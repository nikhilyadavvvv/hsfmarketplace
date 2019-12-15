<script>
	function get_notifications(){
		$.ajax({
			url: "model/get_notifications.php",
			type: "post",
			success: function (response) {
				console.log(response);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	}
</script>