<?php

	echo '<div class="system-status">';

		echo '<h3 class="main-title">'. esc_html__( 'WordPress Environment', 'amz-composer-plugins' ) .'</h3>';

		echo '<div class="content">';
			echo '<p class="title">'. esc_html__( 'Home URL:', 'amz-composer-plugins' ) .'</p>';
			echo '<p class="tooltip"><span class="tooltip-content">'. esc_html__( 'Theme Home Url', 'amz-composer-plugins' ) .'</span> <span class="tooltip-content">'. esc_html__( 'Theme Home Url', 'amz-composer-plugins' ) .'</span><img src="'. esc_url( AMAZEE_STATUS_URL. 'assets/img/info2.png' ) .'"></p>';
			echo '<p class="url-content"><span class="success"> '.  esc_url( home_url() ) .' </span></p>';
		echo '</div>';

		echo '<div class="content">';
			echo '<p class="title">'. esc_html__( 'Site URL:', 'amz-composer-plugins' ) .'</p>';
			echo '<p class="tooltip"><span class="tooltip-content">'. esc_html__( 'Theme Site Url', 'amz-composer-plugins' ) .'</span><img src="'. esc_url( AMAZEE_STATUS_URL. 'assets/img/info2.png' ) .'"></p>';
			echo '<p class="url-content">'. esc_url( site_url() ) .'</p>';
		echo '</div>';

		echo '<div class="content">';
			echo '<p class="title">'. esc_html__( 'WP Version:', 'amz-composer-plugins' ) .'</p>';
			echo '<p class="tooltip"><span class="tooltip-content">'. esc_html__( 'Install WordPress Version', 'amz-composer-plugins' ) .'</span><img src="'. esc_url( AMAZEE_STATUS_URL. 'assets/img/info2.png' ) .'"></p>';
			echo '<p class="url-content">'. esc_html( get_bloginfo( 'version' ) ) .'</p>';
		echo '</div>';

		echo '<div class="content">';
			echo '<p class="title">'. esc_html__( 'WP Multisite:', 'amz-composer-plugins' ) .'</p>';
			echo '<p class="tooltip"><span class="tooltip-content">'. esc_html__( 'Is this WordPress Multisite?', 'amz-composer-plugins' ) .'</span><img src="'. esc_url( AMAZEE_STATUS_URL. 'assets/img/info2.png' ) .'"></p>';
			if( is_multisite() ) {
				echo '<p class="url-content">' .esc_html__( 'Yes', 'amz-composer-plugins' ) .'</p>';
			}
			else {
				echo '<p class="url-content">' .esc_html__( 'No', 'amz-composer-plugins' ) .'</p>';
			}
		echo '</div>';

		echo '<div class="content">';
			echo '<p class="title">'. esc_html__( 'WP Memory Limit:', 'amz-composer-plugins' ) .'</p>';
			echo '<p class="tooltip"><span class="tooltip-content">'. esc_html__( 'Theme Memory Limit', 'amz-composer-plugins' ) .'</span><img src="'. esc_url( AMAZEE_STATUS_URL. 'assets/img/info2.png' ) .'"></p>';
			echo '<p class="url-content">' . let_to_num( WP_MEMORY_LIMIT )/( 1024 ) .'MB</p>';
		echo '</div>';

		echo '<div class="content">';
			echo '<p class="title">'. esc_html__( 'WP Memory Limit Status:', 'amz-composer-plugins' ) .'</p>';
			echo '<p class="tooltip"><span class="tooltip-content">'. esc_html__( 'Theme Memory Limit Status', 'amz-composer-plugins' ) .'</span><img src="'. esc_url( AMAZEE_STATUS_URL. 'assets/img/info2.png' ) .'"></p>';
			if( let_to_num( WP_MEMORY_LIMIT )/( 1024 ) >= 64 ) {
				echo '<p class="content success">' .esc_html__( 'OK', 'amz-composer-plugins' ) .'</p>';
			}
			else {
				echo '<p class="content error">' . esc_html__( 'Not OK - Recommended Memory Limit is 64MB', 'amz-composer-plugins' ) .'</p>';
			}
		echo '</div>';

		echo '<div class="content">';
			echo '<p class="title">'. esc_html__( 'WP DEBUG:', 'amz-composer-plugins' ) .'</p>';
			echo '<p class="tooltip"><span class="tooltip-content">'. esc_html__( 'Is the Debug is enabled?', 'amz-composer-plugins' ) .'</span><img src="'. esc_url( AMAZEE_STATUS_URL. 'assets/img/info2.png' ) .'"></p>';
			if( WP_DEBUG ) {
				echo '<p class="content">' .esc_html__( 'Yes', 'amz-composer-plugins' ) .'</p>';
			}
			else {
				echo '<p class="content">' .esc_html__( 'No', 'amz-composer-plugins' ) .'</p>';
			}
		echo '</div>';

		

		echo '<h3 class="main-title">'. esc_html__( 'PHP Configuration', 'amz-composer-plugins' ) .'</h3>';

		echo '<div class="content">';
			echo '<p class="title">'. esc_html__( 'PHP Version:', 'amz-composer-plugins' ) .'</p>';
			echo '<p class="tooltip"><span class="tooltip-content">'. esc_html__( 'Installed PHP Version', 'amz-composer-plugins' ) .'</span><img src="'. esc_url( AMAZEE_STATUS_URL. 'assets/img/info2.png' ) .'"></p>';
			echo '<p class="url-content">' . esc_html( PHP_VERSION ) .'</p>';
		echo '</div>';

		echo '<div class="content">';
			echo '<p class="title">'. esc_html__( 'PHP Post Max Size:', 'amz-composer-plugins' ) .'</p>';
			echo '<p class="tooltip" ><span class="tooltip-content">'. esc_html__( 'Assigned Post Maximum Size', 'amz-composer-plugins' ) .'</span><img src="'. esc_url( AMAZEE_STATUS_URL. 'assets/img/info2.png' ) .'"></p>';
			echo '<p class="url-content">' . esc_html( ini_get( 'post_max_size' ) ) .'</p>';
		echo '</div>';

		echo '<div class="content">';
			echo '<p class="title">'. esc_html__( 'PHP Time Limit:', 'amz-composer-plugins' ) .'</p>';
			echo '<p class="tooltip" ><span class="tooltip-content">'. esc_html__( 'Assigned Maximum Execution Time Limit', 'amz-composer-plugins' ) .'</span><img src="'. esc_url( AMAZEE_STATUS_URL. 'assets/img/info2.png' ) .'"></p>';
			echo '<p class="url-content">' . esc_html( ini_get( 'max_execution_time' ) ) .'</p>';
		echo '</div>';

		echo '<div class="content">';
			echo '<p class="title">'. esc_html__( 'PHP Max Input Vars:', 'amz-composer-plugins' ) .'</p>';
			echo '<p class="tooltip" ><span class="tooltip-content">'. esc_html__( 'Assigned Maximum Input Vars', 'amz-composer-plugins' ) .'</span><img src="'. esc_url( AMAZEE_STATUS_URL. 'assets/img/info2.png' ) .'"></p>';
			echo '<p class="url-content">' . esc_html( ini_get( 'max_input_vars' ) ) .'</p>';
		echo '</div>';

		echo '<div class="content">';
			echo '<p class="title">'. esc_html__( 'PHP Memory Limit:', 'amz-composer-plugins' ) .'</p>';
			echo '<p class="tooltip" ><span class="tooltip-content">'. esc_html__( 'Assigned Memory Limit', 'amz-composer-plugins' ) .'</span><img src="'. esc_url( AMAZEE_STATUS_URL. 'assets/img/info2.png' ) .'"></p>';
			echo '<p class="url-content">' . esc_html( ini_get( 'memory_limit' ) ) .'</p>';
		echo '</div>';

		echo '<div class="content">';
			echo '<p class="title">'. esc_html__( 'PHP Upload Max Size:', 'amz-composer-plugins' ) .'</p>';
			echo '<p class="tooltip" ><span class="tooltip-content">'. esc_html__( 'Assigned Maximum Filesize', 'amz-composer-plugins' ) .'</span><img src="'. esc_url( AMAZEE_STATUS_URL. 'assets/img/info2.png' ) .'"></p>';
			echo '<p class="url-content">' . esc_html( ini_get( 'upload_max_filesize' ) ) .'</p>';
		echo '</div>';

	echo '</div>'; // .system-status

	function let_to_num( $v ) {
		$l   = substr( $v, -1 );
		$ret = substr( $v, 0, -1 );

		switch ( strtoupper( $l ) ) {
			case 'P': // fall-through
			case 'T': // fall-through
			case 'G': // fall-through
			case 'M': // fall-through
			case 'K': // fall-through
				$ret *= 1024;
				break;
			default:
				break;
		}

		return $ret;
	}