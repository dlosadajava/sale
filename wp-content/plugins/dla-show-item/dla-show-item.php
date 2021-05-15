<?php
/*
Plugin Name: dla-show-item
Plugin URI: https://agenziassicurativabonatesotto.it/
Description: Show item (Inventory)
Version: 1.0
Author: Deniset Losada Alvarez
Author URI: https://agenziassicurativabonatesotto.it/
License: GPLv2
*/
////javascript
//add_action('wp','registar_js' );//registrar el js



///////////////////
add_action( 'init', 'dlaShortcodeshowitem' );
function dlaShortcodeshowitem(){
    add_shortcode( 'showitem', 'dla_show_item');
}


function dla_show_item(){

    //obtener datos usuario logueado
    //atributos por defecto
    $user_id = get_the_author_meta('ID');

    $current_user = get_userdata($user_id);
    
    $nome = $current_user->first_name;
    
    $cognome = $current_user->last_name;
    
    $email = $current_user->user_email;
    
    //atributos agregados    
    $a = get_field( "description", 11 );//Get a value from a specific post
    $a1 = get_field( "description", 23 );
    
    
    //print_r($datic['link']);
    //print_r($a);
    
       
    //mostrar datos
    
    $args = array(
        'numberposts'	=> 20,
        'category_name'		=> 'item'
    );
    $my_posts = get_posts( $args );
    //print_r($my_posts);
    $output="";
    if( ! empty( $my_posts ) ){
        $output = '<table>'.'<th>Name</th><th>Description</th><th>Unit price</th>';//
        foreach ( $my_posts as $p ){
            
            $output .= '<tr><td>' 
            . $p->post_title . ' </td> '.'<td>'.$p->description.'<td>$'.$p->unit_price.'</td><td>'.'<a href="' . get_permalink( $p->ID ) . '"> Buy Now' 
             . '</a></td></tr>';
            
        }
        $output .= '</table>';
    }
    //$author_id = get_the_author_meta('ID');
    //return '<strong>'.$output.'</strong>'.'<form action="/sale/wp-content/plugins/dla-show-item/fun.php" method="post">
    return '<strong>'.$output.'</strong>';

}
//C:\xampp\htdocs\sale\wp-content\plugins\dla-show-item\dla-show-item.php

//$author_id = get_the_author_meta('ID');
//funcion agregar post articolo de categoria sale



?>