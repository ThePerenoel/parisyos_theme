<?php

  function mf_theme_script_enqueue() {
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('customstyle', get_template_directory_uri().'/css/mf_theme.css', array(), '1.0.0', 'all');

    wp_enqueue_script('customjs', get_template_directory_uri().'/js/mf_theme.js', array(), '1.0.0', true);
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array(), '1.0.0', true);
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array(), '1.0.0', true);
    wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array(), '1.0.0', true);
  }

  function mf_theme_setup() {
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('footer', 'Footer Navigation');
  }

  /**
  * New walker class to extend Walker_Nav_Menu
  * It adds 'nav-item' & 'nav-link' to li and a tags
  *
  */
  
function Mf_theme_register_nav_menu_class() {

    class Mf_theme_nav_menu_walker extends Walker_Nav_Menu {

      public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;

        $output .= "<li class='nav-item" .  implode(" ", $item->classes) . "'>";

        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) {
          $output .= '<a class="nav-link" href="' . $permalink . '">';
        } else {
          $output .= '<span>';
        }

        $output .= $title;

        if( $description != '' && $depth == 0 ) {
          $output .= '<small class="description">' . $description . '</small>';
        }

        if( $permalink && $permalink != '#' ) {
          $output .= '</a>';
        } else {
          $output .= '</span>';
        }
      }
    }
}

function PY_register_nav_menu_class(){
  class PY_register_nav_menu_walker extends Walker_Nav_Menu
  {
        function start_el(&$output, $item, $depth = 0, $args = array(), $id = 1)
        {
            global $wp_query;

            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

              $item_output = '<a'. $attributes .'>';
              $item_output .= apply_filters( 'the_title', $item->title, $item->ID );
              $item_output .= '</a>&nbsp;|&nbsp;';

              $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
              }

        function end_el(&$output, $item, $depth=0, $args=array()) {  
          $output .= "";  

        } 

  }
}

add_action('wp_enqueue_scripts', 'mf_theme_script_enqueue');
add_action('init', 'mf_theme_setup');
add_action('wp_loaded','Mf_theme_register_nav_menu_class');
add_action('wp_loaded','PY_register_nav_menu_class');

add_theme_support('post-formats', array('aside', 'image', 'video'));
add_theme_support('post-thumbnails');
