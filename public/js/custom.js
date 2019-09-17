$(document).ready(function(){
	var count = 1;
	$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
	
	$('.ratings a').click(function(e){
		e.preventDefault();
		var r = $(this).data('id');
		//console.log(r);
		$.ajax({
			type:'get',
			url:'/feedback/public/rating?r='+r+'&count='+count,
			dataType:'JSON',
			success: function(data){
				$('#rating-data').append('<div class="me active">'+data.r+'</div>');
				$('#rating-data').append('<div class="you active">'+data.qus+'</div>');
				console.log($.isEmptyObject(JSON.parse(data.ans).length));
				console.log(typeof JSON.parse(data.ans));
				JSON.parse(data.ans).forEach(function(data){
					$('#answers').append('<a href="#" data-q="'+eval(data.question_id + 1)+'" data-id="'+data.question_id+'" data-value="'+data.answer+'">'+data.answer+'</a>');
				})
				$(".panel-body.chat-bg").animate({ scrollTop: $(document).height() }, "slow");
				$('.ratings').remove();
			},
			error: function(data){
				console.log('Error:', data);
			},

		});
	});

	$('#answers').on('click', 'a', function(e){
		e.preventDefault();
		var count = $(this).data('id');
		var q = $(this).data('q');
		var pans = $(this).data('value');
		//console.log(r);
		$.ajax({
			type:'get',
			url:'/feedback/public/rating?q='+q+'&count='+count+'&pans='+pans,
			dataType:'JSON',
			success: function(data){

				$('#rating-data').append('<div class="me active">'+data.r+'</div>');
				$('#rating-data').append('<div class="you active">'+data.qus+'</div>');
				console.log(JSON.parse(data.ans).length);
				console.log(typeof data.ans);
				$('#answers').empty();
				if(JSON.parse(data.ans).length != 0){
				JSON.parse(data.ans).forEach(function(data){
					$('#answers').append('<a href="#" data-q="'+eval(data.question_id + 1)+'" data-id="'+data.question_id+'" data-value="'+data.answer+'">'+data.answer+'</a>');
				})
			} else{
				$('#answers').append('<textarea class="form-control" id="message"></textarea><button data-id="'+data.qusid+'" type="submit" id="btn-submit" class="btn btn-submit">Submit Feedback</button>');
			}
			$(".panel-body.chat-bg").animate({ scrollTop: $(document).height() }, "slow");
			$('.ratings').remove();
			},
			error: function(data){
				console.log('Error:', data);
			},

		});
	});

		$('#answers').on('click', '#btn-submit', function(e){
		e.preventDefault();
		var cq = $(this).data('id');
		var q = eval(cq+1);
		var msg = $('#message').val();
		if (msg == "") {
			msg = "done";
		}
		//console.log(r);
		$.ajax({
			type:'get',
			url:'/feedback/public/rating?q='+q+'&msg='+msg+'&cq='+cq,
			dataType:'JSON',
			success: function(data){
				console.log(data);
				if (data.message) {
					$('#dynamic-data').html(data.message);
				}
				$('.you,.me').remove();
				$('#answers').remove();
			},
			error: function(data){
				console.log('Error:', data);
			},

		});
	});
});