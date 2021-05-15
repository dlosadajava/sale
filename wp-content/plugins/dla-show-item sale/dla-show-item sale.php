<?php
/*
Plugin Name: dla-show-item-sale
Plugin URI: https://agenziassicurativabonatesotto.it/
Description: Show item sale(History)
Version: 1.0
Author: Deniset Losada Alvarez
Author URI: https://agenziassicurativabonatesotto.it/
License: GPLv2
*/
add_action( 'init', 'dlaShortcodeshowitemsale' );
function dlaShortcodeshowitemsale(){
    add_shortcode( 'showitemsale', 'dla_show_item_sale');
}
function dla_show_item_sale(){

    //$user_id = get_the_author_meta('ID');//autor del post actual
    $user_id =get_current_user_id();//user logueado ahora
    //print(get_current_user_id());

    $current_user = get_userdata($user_id);
    
    $nome = $current_user->first_name;
    
    $cognome = $current_user->last_name;
    
    $email = $current_user->user_email;
    
    $cart = get_field ('item_sale', 'user_'.$user_id);//
    
   //print_r($cart);
    //print_r($cart[0]);
    
   // $value = get_field( "item_sale", 70 );
    //print_r($value);
  $args = array(
    'numberposts'	=> 20,
    'category_name'		=> 'sale'
);
$my_posts = get_posts( $args );
//print_r($my_posts[1]->post_author);

//print_r($my_posts[1]);

$output="";
if( ! empty( $my_posts ) ){
    $output = '<table>'.'<th>Name</th><th>Description</th><th>Unit price</th>';
    $result='';
    foreach ( $my_posts as $p ){
       //print_r($p->post_author);
       $idap=$p->post_author;
       if($idap==$user_id){
        $result .= '<tr><td>' 
        . $p->post_title . ' </td> '.'<td>'.$p->descriptio_sale.'<td>$'.$p->unit_price_sale.'</td><td>'.'<a href="' . get_permalink( $p->ID ) . '"> View' 
         . '</a></td></tr>';
        
    }else{

        
    }
    $output= '<table><th>Name</th><th>Description</th><th>Unit price</th>'.$result.'</table>';
}
}

return '<strong>'.$output.'</strong>';
 
}
 


?>