<?php
function cfp_notices_cpt() {
    $notice = new Cfp_Post_Type(
        'Aviso', // Nome (Singular) do Post Type.
        'notice' // Slug do Post Type.
    );

    $notice->set_arguments(
    	array(
    		'supports'	=> array( 'title', 'editor', 'page-attributes' ),
    		'show_in_rest' => true,
    	)
    );

    // $notice->set_arguments(
    // 	array(
    // 		'set_in_rest'	=> true
    // 	)
    // );

    $notice->set_labels(
    	array(
			'name'               => __( 'Avisos', 'cfp' ),
			'singular_name'      => __( 'Aviso', 'cfp' ),
			'view_item'          => __( 'Ver Aviso', 'cfp' ),
			'edit_item'          => __( 'Editar Aviso', 'cfp' ),
			'search_items'       => __( 'Pesquisar Aviso', 'cfp' ),
			'update_item'        => __( 'Atualizar Aviso', 'cfp' ),
			'parent_item_colon'  => __( 'Aviso Pai:', 'cfp' ),
			'menu_name'          => __( 'Avisos', 'cfp' ),
			'add_new'            => __( 'Adicionar novo', 'cfp' ),
			'add_new_item'       => __( 'Adicionar novo Aviso', 'cfp' ),
			'new_item'           => __( 'Novo Aviso', 'cfp' ),
			'all_items'          => __( 'Todos', 'cfp' ),
			'not_found'          => __( 'Nenhum Aviso encontrado', 'cfp' ),
			'not_found_in_trash' => __( 'Nenhum Aviso encontrado na Lixeira', 'cfp' )
		)
    );

}

add_action( 'init', 'cfp_notices_cpt', 1 );

add_action( 'rest_api_init', 'cfp_create_api_notices_meta_field' );

function cfp_create_api_notices_meta_field() {

// register_rest_field ( 'name-of-post-type', 'name-of-field-to-return', array-of-callbacks-and-schema() )
	register_rest_field( 'notice', 'post-meta-fields', 
		array(
			'get_callback' => 'cfp_get_notice_meta_for_api',
			'schema' => null,
		)
	);
}

function cfp_get_notice_meta_for_api( $object ) {
//get the id of the post object array
	$post_id = $object['id'];

//return the post meta
	return get_post_meta( $post_id );
}