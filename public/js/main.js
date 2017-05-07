$(document).ready(function() {
	var token = $('#token').val();
	$(".fancyb").fancybox();
	$(".fancya").fancybox({
		type: "ajax"
	});

	$.get('/admin/fields', function(data){
	    $(".typeahead").typeahead({ source:data });
	},'json');

	$('#flash-overlay-modal').modal();
	$('div.alert').not('.alert-important').delay(5000).fadeOut(350);

	$( ".ckfile" ).click(function() {
		var id = $(this).attr('id');
		openKCFinder(id);
		function openKCFinder(field) {
		    window.KCFinder = {
		        callBack: function(url) {
		            $( "#"+id ).val(url);
		            window.KCFinder = null;
		        }
		    };
		    window.open('/editor/kcfinder/browse.php?type=files&dir=files/public', 'kcfinder_textbox',
		        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
		        'resizable=1, scrollbars=0, width=800, height=600'
		    );
		}
	});
	// tags input
	$(".tagsinput").tagsinput();
});