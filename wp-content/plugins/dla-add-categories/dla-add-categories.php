<?php
/*
Plugin Name: dla-add-categories
Plugin URI: https://agenziassicurativabonatesotto.it/
Description: add categories (sale, item)
Version: 1.0
Author: Deniset Losada Alvarez
Author URI: https://agenziassicurativabonatesotto.it/
License: GPLv2
*/

function sample_insert_categorySale() {
    if(!term_exists('sale')) {
        wp_insert_term(
            'Sale',
            'category',
            array(
              'description' => 'record all sales in a database',
              'slug'        => 'Sale'
            )
        );
    }
}
function sample_insert_categoryItem() {
    if(!term_exists('item')) {
        wp_insert_term(
            'item',
            'category',
            array(
              'description' => 'Item List',
              'slug'        => 'item'
            )
        );
    }
}
add_action( 'init', 'sample_insert_categorySale' );
add_action( 'init', 'sample_insert_categoryItem' );
?>