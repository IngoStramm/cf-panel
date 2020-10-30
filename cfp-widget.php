<?php
function cfp_widgets_cpt() {
    $widget = new Cfp_Post_Type(
        'Widget', // Nome (Singular) do Post Type.
        'widget' // Slug do Post Type.
    );

    $widget->set_arguments(
    	array(
    		'supports'	=> array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
    		'show_in_rest' => true,
    	)
    );

    // $widget->set_arguments(
    // 	array(
    // 		'set_in_rest'	=> true
    // 	)
    // );

    $widget->set_labels(
    	array(
			'name'               => __( 'Widgets', 'cfp' ),
			'singular_name'      => __( 'Widget', 'cfp' ),
			'view_item'          => __( 'Ver Widget', 'cfp' ),
			'edit_item'          => __( 'Editar Widget', 'cfp' ),
			'search_items'       => __( 'Pesquisar Widget', 'cfp' ),
			'update_item'        => __( 'Atualizar Widget', 'cfp' ),
			'parent_item_colon'  => __( 'Widget Pai:', 'cfp' ),
			'menu_name'          => __( 'Widgets', 'cfp' ),
			'add_new'            => __( 'Adicionar novo', 'cfp' ),
			'add_new_item'       => __( 'Adicionar novo Widget', 'cfp' ),
			'new_item'           => __( 'Novo Widget', 'cfp' ),
			'all_items'          => __( 'Todos', 'cfp' ),
			'not_found'          => __( 'Nenhum Widget encontrado', 'cfp' ),
			'not_found_in_trash' => __( 'Nenhum Widget encontrado na Lixeira', 'cfp' )
		)
    );

}

add_action( 'init', 'cfp_widgets_cpt', 1 );

add_action( 'rest_api_init', 'cfp_create_api_widgets_meta_field' );

function cfp_create_api_widgets_meta_field() {

// register_rest_field ( 'name-of-post-type', 'name-of-field-to-return', array-of-callbacks-and-schema() )
	register_rest_field( 'widget', 'post-meta-fields', 
		array(
			'get_callback' => 'cfp_get_widget_meta_for_api',
			'schema' => null,
		)
	);
}

function cfp_get_widget_meta_for_api( $object ) {
//get the id of the post object array
	$post_id = $object['id'];

//return the post meta
	return get_post_meta( $post_id );
}