<?php
/*
Plugin Name: dla-sale-item
Plugin URI: https://agenziassicurativabonatesotto.it/
Description: Sale item (add the purchased items object to the user profile)
Version: 1.0
Author: Deniset Losada Alvarez
Author URI: https://agenziassicurativabonatesotto.it/
License: GPLv2
*/

//agregando css no funciona

//add_action( 'admin_enqueue_scripts', 'cambiar_estilo' );
//print(get_template_directory_uri());
wp_enqueue_style( 'dla-id-button-css', get_template_directory_uri().'/mycss/dlascss.css',array(),'1.0.1' );







////


add_action( 'init', 'dlaShortcodesaleitem' );


function dlaShortcodesaleitem(){
    add_shortcode( 'saleitem', 'dla_sale_item');
}
function dla_sale_item(){
    $user_id = get_the_author_meta('ID');
    $current_user = get_userdata($user_id);


    
 //este boton se muestra en el body   
 print '<form method="post" id="dla_form_buy"><div id="dla_div_boton">
<input type="submit" name="dla_test" id="dla_div_boton" value="BUY" /></div><br/></form>';
     if(array_key_exists('dla_test',$_POST)){
    salvar_compra();
    //ejecutar javascript externo
    wp_enqueue_script('dla-miscript');
    
    
    //ejecutar javascript interno
    /* print '<script language="JavaScript">';
print 'alert("Purchase made correctly");';
print '</script>';    */
 } 

    //clase del div del titulo entry-header-inner
}

//declarar javascript externo en el tema activado
add_action("wp_enqueue_scripts", "dla_insertar_js");
function dla_insertar_js(){
    
    wp_register_script('dla-miscript', get_stylesheet_directory_uri(). '/myjs/dlajs.js', array('jquery'), '1', true );
    //wp_enqueue_script('dla-miscript');
   
    
}


//este boton se muestra en el head pero en todas laspainas
///agregar codigo al header
/* add_action('wp_head', 'your_function_name');
function your_function_name(){
print '<form method="post" id="dla_form_buy"><div id="dla_div_boton">
<input type="submit" name="dla_test" id="dla_test" value="BUY" /></div><br/></form>';
 
};*/


////






//crea un post de categoria sale 
function salvar_compra(){
    
//agregar post 
$post_id = -1;

// Set the Author, Slug, title and content of the new post
$author_id =get_current_user_id();;
$slug = $author_id.'-'.current_time( 'timestamp' );//texto formado por la fecha
$title = $author_id.'-'.current_time( 'timestamp' );
$content =$author_id.'-'.current_time( 'timestamp' );

$post_id = wp_insert_post(
    array(
        'comment_status'	=>	'closed',
        'ping_status'		=>	'closed',
        'post_author'		=>	$author_id,
        'post_name'		    =>	$slug,
        'post_title'		=>	$title,
        'post_content'      =>  $content,
        'post_status'		=>	'publish',
        'post_type'	        =>	'post'
    )
    
);  
//add_post_meta($id, '_email', $email);
$terms=2;
$append=false;  //Se true, i tag verranno aggiunti al post. Se false, i tag rimpiazzeranno quelli esistenti. 
//print($post_id);
$idterm = get_term_by('name', 'Sale', 'category');
wp_set_post_categories( $post_id, $idterm->term_id  ); // Set $cat_id as the only category

update_field( 'item_sale', get_the_ID(), $post_id );
//obtener valor campo unit_price del post actual
$currently_post = get_fields();// fields currently post
//print_r($currently_post);
update_field( 'unit_price_sale',$currently_post['unit_price'], $post_id );
//descripcion
update_field( 'descriptio_sale',$currently_post['description'], $post_id );

    }
    

  

?>
