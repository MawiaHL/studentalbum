/*
	Student Album main JS file
	Written by hand by: Mawia HL
 */
$(document).ready(function () {
    	$("#submitData").click(function (event) {
        event.preventDefault();
        var form = $('#addStudent')[0];
        var data = new FormData(form);
        $("#submitData").prop("disabled", true);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "students/add",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 6000,
            success: function (data) {
            	$('#addStudent').trigger("reset");                
                $("#submitData").prop("disabled", false);
                setTimeout( function(){
                	$("#exampleModal").modal('hide')
                }, 300 );
                $("#result").html(data);
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
		            $(this).hide();
		        });
		        $("#results").empty();
		        $("#results").loaddata();
            },
            error: function (e) {
                $("#result").html(e.responseText);
                $("#submitData").prop("disabled", false);                               
            }
        });

    });

});
(function($){	
	$.fn.loaddata = function(options) {
		var settings = $.extend({ 
			loading_gif_url	: "../img/spinner.gif",
			end_record_text	: '',
			data_url 		: 'students/loadMore',
			start_page 		: 1
		}, options);		
		var el = this;	
		loading  = false; 
		end_record = false;
		contents(el, settings);		
		$(window).scroll(function() { //detact scroll
			if($(window).scrollTop() + $(window).height() >= $(document).height()){
				contents(el, settings);
			}
		});		
	}; 
	function contents(el, settings){
		var load_img = $('<img/>').attr('src',settings.loading_gif_url).addClass('text-center');
		var record_end_txt = $('<div/>').text(settings.end_record_text).addClass('end-record-info');
		if(loading == false && end_record == false){
			loading = true;
			el.append(load_img);
			$.post( settings.data_url, {'page': settings.start_page}, function(data){
				if(data.trim().length == 0){
					el.append(record_end_txt); 
					load_img.remove();
					end_record = true;
					return;
				}
				loading = false;
				load_img.remove(); 
				el.append(data);
				settings.start_page++;
			})
		}
	}
})(jQuery);
$("#results").loaddata();
$( document ).ready(function() {
	$('.bd-example-modal-xl').on('show.bs.modal', function (event) {
	    var button = $(event.relatedTarget);
	    var url = button.data('remote'); 
	    var modal = $(this);
	    $.ajax({
	        url: url,
	        type: 'GET',
	        cache: false,
	        dataType:'Json',
	        }).done(function(result){
	           modal.find('.modal-title').text(result.name);
	           modal.find('.modal-body ul li.sex>span').html(result.sex);
	           modal.find('.modal-body ul li.dob>span').html(result.dob);
	           modal.find('.modal-body ul li.email>span').html(result.email);
	     });  
	});
});

function deleteStudent(id){
	var x = confirm('Are you sure you want to delete');
	if(x){
		$.ajax({
		     url: 'students/'+id+'/delete',
		     type: 'POST',
		     cache: false,
		     dataType:'Json',
		     success: function(response){
		       if(response.id == 1){
		       		$("#result").html(response.text);
		       		$("#results").empty();
		       		$("#results").loaddata();
		      	} else {
			 		alert('Invalid ID.');
		      }
		    }
		   });
	} else {
		return false;
	}	
}


//# sourceMappingURL=main.js.map

//# sourceMappingURL=main.js.map

//# sourceMappingURL=main.js.map

//# sourceMappingURL=main.js.map

//# sourceMappingURL=main.js.map
