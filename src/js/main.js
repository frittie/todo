$(document).ready(function(){

	$('.add-new-task').submit(function(){
		add_task();	
		return false; // Ensure that the form doesn't submit twice	
	});

	$('.add').on('click', function() {
		add_task();
		return false; // Ensure that the form doesn't submit twice
	});

	check_task();
	hover_task();
	delete_task();
	style_list();

});

function add_task() {
    var new_task = $('.add-new-task input[name=new-task]').val();

    if(new_task != ''){ //If the input field 'new_task' is not empty
   		$.post('add-task.php', { task: new_task }, function( data ) { //A post with the data from the input field is sent to the 'add-task'-file

	        $('.add-new-task input[name=new-task]').val(''); //Get value from input field

	        $('.list').html(''); //Empty the list 

    		$(data).appendTo('.list'); //Fill it with all tha data from 'add-task'-file

    		delete_task(); 

    		check_task();

    		style_list();

	        $('.list li').last().hide().fadeIn( 'slow');
        });
    }
}

function check_task() {
	$('.fa-circle-thin').on('click',function(){
		var current_element = $(this);
    	var id = $(this).attr('id');

		$.post('check-task.php', { task_id: id }, function() { //A post is sent to the 'check-task'-file to see if the task is checked or not
			current_element.parent().addClass('checked-1').removeClass('checked-0');
			current_element.parent().find('.fa-circle-thin').addClass('fa-check-circle').removeClass('fa-circle-thin');
			current_element.parent().appendTo(".list-checked");
			current_element.parent().fadeIn("slow");
			hover_task();
			style_list();
		});
	});
}

function hover_task() {
	$('.list-checked li').mouseover( function() {
		console.log('hej');
		$(this).find('.fa-check-circle').css('display','none');
		$(this).find('.fa-times-circle').css('display','inline-block');
	});

	$('.list-checked li').mouseleave( function() {
		$(this).find('.fa-check-circle').css('display','inline-block');
		$(this).find('.fa-times-circle').css('display','none');
	});
}

function delete_task() {
    $('.fa-times-circle').on('click',function(){
    	var current_element = $(this);
    	var id = $(this).attr('id');

   		$.post('delete-task.php', { task_id: id }, function() { //A post is sent tp the 'delete-task'-file 
    		current_element.parent().fadeOut("fast", function() { 
    			$(this).remove(); 
    			style_list();	
    		});
     	});
    });
}

function style_list() {
	if ($('.list-checked li').length == 0) {
		$('.list li:last-of-type').css({'border-bottom-left-radius': '10px', 'border-bottom-right-radius': '10px'});
	}
}