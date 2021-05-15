<?php
/*
Plugin Name: dla-add-metadata
Plugin URI: https://agenziassicurativabonatesotto.it/
Description: add metadata
Version: 1.0
Author: Deniset Losada Alvarez
Author URI: https://agenziassicurativabonatesotto.it/
License: GPLv2
*/
add_action( 'add_meta_boxes','dla_mtd_sale' );
add_action('save_post','dla_salvar_articulo');//crear if para agregar solo a los post con categoria(term =item or sale depende )

function dla_mtd_sale(){
    //add_meta_box( id, title, callback, screen, context, priority, callback_args )
    add_meta_box( "item","Metadato para articulo en venda", "dla_item_funcion", "post","normal", "high" );
    }
 
    function dla_item_funcion(){
                
        $idpost = get_the_ID();
        //print($idpost);
        //$valores = get_post_custom($post->ID); da error
        $valores = get_post_custom($idpost); 
        
        //da error con la key dla_idmeta
        //http://codex.wordpress.org/Function_Reference/add_meta_box
        $dla_v=esc_attr($valores['item'][0]);//esc_attresc_attr
        
        echo'<label for="dla_label" >campo ejemplo</label><input type="text" id="dla_label" name="dla_label" value="'.$dla_v.'"/>';
        
        }
        /*................................. */
        
        //SALVAR LOS DATOS INTRODUCIDOS EN EL METADATOS*/
        function dla_salvar_articulo($idP){
        //don't save metadata if it's autosave
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return; 
        }    
        
        //check if user can edit post
        if( !current_user_can( 'edit_post' ) ) {
            return;  
        }
        
        
        //no gurada error
        if(isset($_POST['dla_idmeta'])){//si el campo 'dla_idmeta' del formulario tiene un valor
        update_post_meta($idpost,'dla_idmeta', esc_url($_POST['dla_idmeta']) );
        
        }
        
        }
        



?>
