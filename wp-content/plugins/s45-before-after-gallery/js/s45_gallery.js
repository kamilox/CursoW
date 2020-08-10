jQuery(document).ready(function($) {

	var frame;
	  // ADD IMAGE LINK
	  $('#gmls_add_images').on( 'click', function( event ){
		event.preventDefault();
		// If the media frame already exists, reopen it.
		if ( frame ) {
		  frame.open();
		  return;
		}
		// Create a new media frame
		frame = wp.media({
		  title: 'Select or Upload Patient Images',
		  button: {
			text: 'Add Patient Images'
		  },
		  multiple: true  // Set to true to allow multiple files to be selected
		});
		// When an image is selected in the media frame...
		frame.on( 'select', function() {
			// Get media attachment details from the frame state
			var attachments = frame.state().get('selection').toJSON();
			$(attachments).each(function(key,attachment){
				jQuery('#sortable-image-attachments').append('<li id="'+attachment.id+'">'+
					'<input type="hidden" name="attach_images[]" value="'+attachment.id+'" />'+
					'<img src="'+attachment.url+'" /><br>'+
					'<a title="Remove Image" onclick="jQuery(this).parent().remove();">Remove Image</a>'+
					'</li>');
			});
			
			itemList = jQuery("#sortable-image-attachments").sortable();
			opts = {
                url: ajaxurl, // ajaxurl is defined by WordPress and points to /wp-admin/admin-ajax.php
                type: 'POST',
                async: true,
                cache: false,
                dataType: 'json',
                data:{
                    action: 'item_sort', // Tell WordPress how to handle this ajax request
                    order: itemList.sortable('toArray').toString() // Passes ID's of list items in  1,3,2 format
                },
                success: function(response) {
					$('#loading-animation').fadeIn(); // Hide the loading animation
					$('#loading-animation').fadeOut(3000);
					return;
                },
                error: function(xhr,textStatus,e) {  // This can be expanded to provide more information
                    //alert(order);
                    alert(e);
                    //alert(itemList.join('\n'));
                    // alert('There was an error saving the updates');
                    $('#loading-animation').hide(); // Hide the loading animation
                    return;
                }
            };
            $.ajax(opts);
			
			$('#TB_overlay').trigger('click');
		});

		// Finally, open the modal on click
		frame.open();
	  });
	  
	// Hack to fix procedure page header
	//$('h3').html('Add New Procedure').replaceWith('<h3>Add New Procedure or Procedure Group</h3>');
	
	// Re-order patient image gallery
	$('#reset-patient-order').click( function() {
		
		//id = $(this).attr('postid');

		//console.log(id);

		data = {
			action: 's45_reset_patient_order'
			//id: id
			//patient_description: patient_description
			//aad_nonce: aad_vars.aad_nonce
		};

		$.post(ajaxurl, data, function (response) {
			console.log(response);
			$('#response').html(response);
		});

		return false;

	});

	// Re-order patient image gallery
	$('#reorder-patient-gallery').click( function() {
		
		id = $(this).attr('postid');

		console.log(id);

		data = {
			action: 's45_reorder_patient_gallery',
			id: id
			//patient_description: patient_description
			//aad_nonce: aad_vars.aad_nonce
		};

		$.post(ajaxurl, data, function (response) {
			console.log(response);
			location.reload();
		});

		return false;

	});


	// Sortable patient listing on procedure page

	var itemList;
	
	if ( document.getElementById('sortable') !== null ) {
		itemList = $("#sortable").sortable({ items: 'tr' });
	
	} else {
	
		itemList = jQuery("#sortable-image-attachments").sortable();
	
	}
	
	var order = itemList.sortable('toArray').toString();

    itemList.sortable({
        update: function(event, ui) {
            //$('#loading-animation').show(); // Show the animate loading gif while waiting

            opts = {
                url: ajaxurl, // ajaxurl is defined by WordPress and points to /wp-admin/admin-ajax.php
                type: 'POST',
                async: true,
                cache: false,
                dataType: 'json',
                data:{
                    action: 'item_sort', // Tell WordPress how to handle this ajax request
                    order: itemList.sortable('toArray').toString() // Passes ID's of list items in  1,3,2 format
                },
                success: function(response) {
			$('#loading-animation').fadeIn(); // Hide the loading animation
			$('#loading-animation').fadeOut(3000);
			return;
                },
                error: function(xhr,textStatus,e) {  // This can be expanded to provide more information
                    //alert(order);
                    alert(e);
                    //alert(itemList.join('\n'));
                    // alert('There was an error saving the updates');
                    $('#loading-animation').hide(); // Hide the loading animation
                    return;
                }
            };
            $.ajax(opts);
        }
    });
    
    
	
	// AJAX Save Post Function
	$('.patient-description-submit').click(function() {
		id = $(this).attr('patientid');
		patient_description = $('#patient_description_'+id).val();
		//$('#aad_loading').show();
		//$('#patient-description-submit').attr('disabled', true);
		
	data = {
		action: 's45_save_patient',
		id: id,
		patient_description: patient_description
		//aad_nonce: aad_vars.aad_nonce
	};

	$.post(ajaxurl, data, function (response) {
			$('#results-'+id).html(response);
			$('#results-'+id).fadeIn(1500);
			$('#results-'+id).fadeOut(3000);
			$('#aad_loading').hide();
			//$('#patient-description-submit').attr('disabled', true);
		});
		
		return false;
	});
	
	// AJAX Delete Post Function
	$('.patient-delete-submit').click(function() {
		id = $(this).attr('patientid');
		
		if (confirm('Are you sure you want to delete patient '+id+'?')) {
		
		data = {
			action: 's45_delete_patient',
			id: id
		};

		$.post(ajaxurl, data, function (response) {
			//$('#results').html(response);
			$('td#patient-'+id).html("<span style='display:block;background:#a1fd89;padding:5px 10px'>Patient "+id+" deleted.  "+response+"</span>");
			$('td#patient-'+id).parents('.patientparent').fadeOut(3000);
			//$('#results').fadeIn(1500);
			//$('#aad_loading').hide();
			//$('#patient-description-submit').attr('disabled', true);
		});
		
		
		}
	return false;
	});
	
});