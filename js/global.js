/*! Copyright 2014 | GPL v.2 | Bob Wadholm, rwadholm@indiana.edu
http://www.bob.wadholm.com/licenses.shtml */
$(function(){
	var site = $('body').attr('id');
	$.getJSON('/json/'+ site +'.json',function(data){
		var currentPage = '#front',
		results = {'q1':false,'q2':false,'q3':false,'q4':false,'q5':false,'q6':false,'q7':false,'q8':false,'q9':false};
		
		$('body').on('click','#front a.button',function(e){
			e.preventDefault();
			$(this).parent().toggle();
			$('#startOver').fadeIn();
			$('header a').fadeIn();
			$('#Q1').fadeIn();
		});
		
		$('body').on('click','#startOver a, header a', function(e){
			e.preventDefault();
			results = {'q1':false,'q2':false,'q3':false,'q4':false,'q5':false,'q6':false,'q7':false,'q8':false,'q9':false};
			$('#front').fadeIn();
			$('#questions div').hide();
			$('#startOver').hide();
			$('#results').hide();
			$('header a').hide();
		});	
		
		$('body').on('click','#questions a', function(e){
			e.preventDefault();
			thisQ = $(this).attr('id');
			correct = $(this).attr('class');
			link = $(this).attr('href');
			
			if(correct === 'correct'){
				results[thisQ] = true;
			}
			
			if(link === '#results'){
				var i = 0;
				for (var prop in results) {
					$('.'+ prop).removeClass('qfalse qtrue').addClass('q'+ results[prop]);
					if(results[prop]){
						i++;
					}
				}
				
				console.log(results);
				
				$('.bad').removeClass('bad');
				
				i = (9 - i);
				if(i>=5){
					exp = data.explanation[2] + data.explanation[3];
					$('#explanation').addClass('bad');
				} else if (i>=3){
					exp = data.explanation[1];
				} else {
					exp = data.explanation[0];
				}
				$('#explanation').html('<strong>'+ i +' Incorrect:</strong> '+ exp);
				$(this).parent().parent().toggle();
				$(link).fadeIn(function(){
					if(!$('#moreInfo').is(':visible')) {
						$('aside').hide();	
					}
					if(!$('#moreInfo').is(':visible') && !$('aside').is(':visible')) {
						$('aside').show();	
					}
				});
			} else {
				$(this).parent().parent().toggle();
				$(link).fadeIn();
			}
		});
		
		$('body').on('click','#moreInfo', function(){
			$('aside').fadeToggle(100);	
		});
		
		$('body').on('click','#create', function(e){
			e.preventDefault();
			$.post( "create.php", $("form").serialize(), function(data){
				$('#createMessage').remove();
				$('#front p').prepend('<span id="createMessage">'+ data +'</span>');	
			});
		});
	});
});