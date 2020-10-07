<?php
		global $wpdb;   
        $table = 'patients_settings';

		$logo_url = sanitize_text_field($_POST['logo_url']);
		$procedure_title_color = sanitize_text_field($_POST['procedure_title_color']);
		$display_case_number = sanitize_text_field($_POST['display_case_number']);
		$display_excerpt_in_gallery = sanitize_text_field($_POST['display_excerpt_in_gallery']);
		$primary_button_background_color = sanitize_text_field($_POST['primary_button_background_color']);
		$primary_button_border_color = sanitize_text_field($_POST['primary_button_border_color']);
		$primary_button_font_color = sanitize_text_field($_POST['primary_button_font_color']);
		$secondary_button_background_color = sanitize_text_field($_POST['secondary_button_background_color']);
		$secondary_button_border_color = sanitize_text_field($_POST['secondary_button_border_color']);
		$secondary_button_font_color = sanitize_text_field($_POST['secondary_button_font_color']);

		$data = array(
			'logo_url' => $logo_url,
			'procedure_title_color' => $procedure_title_color,
			'display_case_number' => $display_case_number,
			'display_excerpt_in_gallery' => $display_excerpt_in_gallery,
			'primary_button_background_color' => $primary_button_background_color,
			'primary_button_border_color' => $primary_button_border_color,
			'primary_button_font_color' => $primary_button_font_color,
			'secondary_button_background_color' => $secondary_button_background_color,
			'secondary_button_border_color' => $secondary_button_border_color,
			'secondary_button_font_color' => $secondary_button_font_color
		);

		$format = array(
			'%s',//logo_url,
			'%s',//procedure_title_color,
			'%s',//display_case_number,
			'%s',//display_excerpt_in_gallery,
			'%s',//primary_button_background_color,
			'%s',//primary_button_border_color,
			'%s',//primary_button_font_color,
			'%s',//secondary_button_background_color,
			'%s',//secondary_button_border_color,
			'%s'//secondary_button_font_color,
		);
		$wpdb->insert($table, $data, $format);
?>