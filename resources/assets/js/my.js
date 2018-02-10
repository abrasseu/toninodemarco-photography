$(function() {

	// Photo preview
	function preview() {
		var imgUrl = $("#cover option:selected, #photo option:selected").data('link');
		$("#preview").html("<img class='img-thumbnail' src=" + imgUrl + " />");
	}

	$("#cover, #photo").change(function() {
		preview();
	});
	preview();
	// Select reset
	$("button:reset").click(function() {
		$(".btn-select").removeClass("active");
	});

});




/*
	// Active toggle
	$(".btn-select").change(function() {

	});
*/


/*
$(function(){

	// Events
	$('#addLink').click(function() {
		$('#myModal').modal();
	});

	// Forms
	$(document).on('submit', '#formRegister', function(e) {  
		e.preventDefault();

		$('input+small').text('');
		$('input').parent().removeClass('has-error');

		$.ajax({
			method: $(this).attr('method'),
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: "json"
		})
		.done(function(data) {
			$('.alert-success').removeClass('hidden');
			$('#myModal').modal('hide');
		})
		.fail(function(data) {
			$.each(data.responseJSON, function (key, value) {
				var input = '#formRegister input[name=' + key + ']';
				$(input + '+small').text(value);
				$(input).parent().addClass('has-error');
			});
		});
	});

});
*/

