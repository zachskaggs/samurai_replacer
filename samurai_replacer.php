<?php
/*/
Plugin Name: Samurai Replacer
Plugin URI: home.leaguespeak.info/wordpress
Description: Replaces select offending words
Version: 102
Author: Zach Skaggs
Author URI: home.leaguespeak.info/wordpress
/*/

// Define Constants
//define('SAMURAI_REPLACER_DIR', WP_PLUGIN_DIR.'/samurai_replacer/');
//define('SAMURAI_REPLACER_DIR', WP_PLUGIN_URL.'/samurai_replacer/');

// Include Menu Page
include 'samurai_options.php';

function basic_cuss_replace ( $cuss ) {
	/*/ 
	This section defines the arrays to be replaced.  
	Currently, I have not written the function to 'strtolower()' each value in the array, 
	so the upper and lower case arrays are maintained separately
	/*/
	//$banned_from_form = $_REQUEST['forbidden[]']

	$user_banned = get_option('samurai_options');

	$user_banned_array = explode(',', $user_banned);	

	$banned_words_uppercase = array_map( 'ucfirst' , $user_banned_array );

  $banned_words_lowercase = array_map( 'strtolower' , $user_banned_array );

	$banned_words = array_merge( $banned_words_uppercase, $banned_words_lowercase );

	$cuss = str_replace( $banned_words , 'kittens' , $cuss );

	return $cuss;
}

add_filter( 'comment_text' , 'basic_cuss_replace' );

?>

