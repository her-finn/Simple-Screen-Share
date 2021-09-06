
function checkStreamId(){
    id = $("#digit-1").val() + $("#digit-2").val() + $("#digit-3").val() + $("#digit-4").val() + $("#digit-5").val() + $("#digit-6").val();
    if(id.length == 6){
        $.ajax({
            method: "get",
            url: baseUrl + "/stream/" + id + "/data"
        }).done(function(data){
            if(data.error){
                $(".digit-group").trigger("reset");
                $(".digit-group input").effect("shake");
                $("#digit-1").focus();
                $("#errorOut").html(data.description);
            }else{
                location.href = baseUrl + "/stream/" + id;
            }
        });
    }
}
$('.digit-group').find('input').each(function() {
	$(this).attr('maxlength', 1);
	$(this).on('keyup', function(e) {
		var parent = $($(this).parent());
		
		if(e.keyCode === 8 || e.keyCode === 37) {
			var prev = parent.find('input#' + $(this).data('previous'));
			
			if(prev.length) {
				$(prev).select();
			}
		} else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
			var next = parent.find('input#' + $(this).data('next'));
			
			if(next.length) {
				$(next).select();
			}
		}
	});
});