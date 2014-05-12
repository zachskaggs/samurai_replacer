<?php
add_action( 'admin_menu', 'samurai_replacer_admin_actions');

function samurai_replacer_admin_actions() {
	add_options_page( 'Samurai Replacer' , 'Lanuage Filter' , 'manage_options' , 'samurai_options' , 'samurai_options_page' );
}?>

<?php // display the admin options page
function samurai_options_page() {
?>
<div class ='wrap'>
<h2> Samurai Replacer User Settings </h2>
<br>
Options related to the Samurai Replacer Plugin
<form action='options.php' method='post'>
<?php settings_fields('samurai_options'); ?>
<?php do_settings_sections('samurai_replacer'); ?>
<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
</form></div>

<?php
}?>
 
<?php // add the admin settings and such

add_action('admin_init', 'samurai_replacer_admin_init');

function samurai_replacer_admin_init(){
register_setting( 'samurai_options', 'samurai_options');//, 'plugin_options_validate' );
add_settings_section('samurai_replacer_main', 'Main Settings', 'samurai_section_text', 'samurai_replacer');
add_settings_field('samurai_banned_string', 'Banned Words', 'samurai_banned_array', 'samurai_replacer', 'samurai_replacer_main');
}?>

<?php 
function samurai_section_text() {
echo '<p>Please input the words you would like banned in the boxes below as comma separated values (NO spaces).</p>';
} ?>

<?php function samurai_banned_array() {
$options = get_option('samurai_options');
echo '<input id="samurai_banned_string" name="samurai_options" size="40" type="text" value=' . $options . '>';
} ?>

<?php /*/ validate our options
function plugin_options_validate($input) {
$newinput['text_string'] = trim($input['text_string']);
if(!preg_match('/^[a-z0-9]{32}$/i', $newinput['text_string'])) {
$newinput['text_string'] = '';
}
return $newinput;
}
/*/
?>
