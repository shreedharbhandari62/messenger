$(document).ready(function(){
	$(".remove").click(function(){
		$(".flash").hide();
	})

	setTimeout(function(){
		$(".flash").fadeOut("slow");
	}, 5000)

	$(document).on("change",".change-img", function(){
		var image_name = $(".change-img").val();
		// below will split the image name path on \\ and convert it to array 
		// and pop will get the last array which is the image name
		var file = image_name.split("\\").pop();

		$("#change-image-label").html(file);

	})
})