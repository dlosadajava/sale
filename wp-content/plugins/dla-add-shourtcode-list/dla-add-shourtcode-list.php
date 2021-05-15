<?php
/*
Plugin Name: dla-add-shourtcode-list
Plugin URI: https://agenziassicurativabonatesotto.it/
Description: create page: Purchase items and Display purchase history.
Version: 1.0
Author: Deniset Losada Alvarez
Author URI: https://agenziassicurativabonatesotto.it/
License: GPLv2
*/
add_action( 'init', 'dla_add_shourtcode_list' );
function dla_add_shourtcode_list(){
    $user_id = get_the_author_meta('ID');
    $current_user = get_userdata($user_id);


   
$post_id = -1;

// Set the Author, Slug, title and content of the new post
$author_id =get_current_user_id();;
$slug = 'history';
$title = 'Display purchase history';
$content ='[showitemsale]';
//History
$h= array(
    'comment_status'	=>	'closed',
    'ping_status'		=>	'closed',
    'post_author'		=>	$author_id,
    'post_name'		    =>	$slug,
    'post_title'		=>	$title,
    'post_content'      =>  $content,
    'post_status'		=>	'publish',
    'post_type'	        =>	'page'
);

//inventory [showitem]
$author_id =get_current_user_id();;
$slugI = 'inventory';
$titleI = 'Purchase items';
$contentI ='[showitem]';
$in= array(
    'comment_status'	=>	'closed',
    'ping_status'		=>	'closed',
    'post_author'		=>	$author_id,
    'post_name'		    =>	$slugI,
    'post_title'		=>	$titleI,
    'post_content'      =>  $contentI,
    'post_status'		=>	'publish',
    'post_type'	        =>	'page'
);
//$post_id = wp_insert_post($h);
//get_page_by_title('World Peace Now', OBJECT, 'page');
 if(!get_page_by_title($title, OBJECT, 'page')){
$post_idh = wp_insert_post($h);
}
if(!get_page_by_title($titleI, OBJECT, 'page')){
$post_idin = wp_insert_post($in);
}


//post_exists( $title )


//add_post_meta($id, '_email', $email);

   
   
}








?>
