<?php

class Composer_Like_Me{

	public function __construct(){
		add_action('wp_enqueue_scripts', array($this, 'like_me_scripts'));
		add_action("wp_ajax_pix_like_me", array($this,"count_like"));
		add_action("wp_ajax_nopriv_pix_like_me", array($this,"count_like"));
	}

	//enqueue all required scripts
	public function like_me_scripts(){
		wp_enqueue_script( 'like-me-scripts', COMPOSER_EXTRAS_URI .'/composer-like-me/js/like-me.js', array( 'jquery' ), '2.0', true);
		wp_localize_script( 'like-me-scripts', 'pixLike',
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'liked' => esc_html__('You already liked this!', 'composer')
			)
		);
	}

	public function count_like(){

		$post_id = isset($_POST['postid']) ? $_POST['postid'] : NULL;

		//If postid empty or null
		if($post_id == NULL) die();

		$count = $this->get_likes($post_id);
		$this->update_likes($post_id, $count);

		echo ++$count;

		die();
	}

	//Get Like Value
	public function get_likes($post_id){
		return get_post_meta( $post_id, '_pix_like_me', true );
	}

	//Update Like Value
	public function update_likes($post_id, $count){

		if( isset($_COOKIE['pix_like_me_'. $post_id]) ) return;

		if($count == ''){
			$count = 0;
		}
		$count++;
		update_post_meta($post_id, '_pix_like_me', $count);
		setcookie('pix_like_me_'. $post_id, $post_id, time()+3600*24*30, '/');
	}
}

// instantiate class
$GLOBALS['pix_like_me'] = new Composer_Like_Me();