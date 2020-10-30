<?php

add_action( 'cmb2_admin_init', 'cfp_register_widget_metabox' );

function cfp_register_widget_metabox() {
	$prefix = 'widget_options_';

	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Opções', 'cfp' ),
		'object_types'  => array( 'widget' ), // Post type
	) );

	$cmb->add_field( array(
		'name'             => esc_html__( 'Posição', 'cfp' ),
		'desc'             => esc_html__( 'Selecione a posição do widget (esquerda ou direita)', 'cfp' ),
		'id'               => $prefix . 'select',
		'type'             => 'select',
		// 'show_option_none' => true,
		'options'          => array(
			'normal' => esc_html__( 'Esquerda', 'cfp' ),
			'side'   => esc_html__( 'Direita', 'cfp' ),
		),
	) );

}

add_action( 'cmb2_admin_init', 'cfp_register_notice_metabox' );

function cfp_register_notice_metabox() {
	$prefix = 'notice_options_';

	$cmb = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => esc_html__( 'Opções', 'cfp' ),
		'object_types'  => array( 'notice' ), // Post type
	) );

	$cmb->add_field( array(
		'name'				=> esc_html__( 'Cor', 'cfp' ),
		'desc'				=> esc_html__( 'Selecione a cor de destaque do aviso.', 'cfp' ),
		'id'				=> $prefix . 'notice_type',
		'type'				=> 'radio',
		'attributes'		=> array(
			'required' 			=> 'required',
		),
		'options'			=> array(
			'notice-info'		=> esc_html__( 'Azul', 'cfp' ),
			'notice-warning'	=> esc_html__( 'Amarelo', 'cfp' ),
			'notice-error'		=> esc_html__( 'Vermelho', 'cfp' ),
		),
		'default'			=> 'notice-info'
	) );
	$cmb->add_field( array(
		'name'				=> esc_html__( 'Telas', 'cfp' ),
		'desc'				=> esc_html__( 'Selecione as telas em que o Aviso deve ser exibido.', 'cfp' ),
		'id'				=> $prefix . 'screen',
		'type'				=> 'multicheck',
		'required' 			=> 'required',
		'multiple'			=> true,
		'options'			=> array(
			'dashboard'			=> esc_html__( 'Dashboard Converte Fácil', 'cfp' ),
			'posts'				=> esc_html__( 'Conteúdo e SEO Inteligente', 'cfp' ),
			'media'				=> esc_html__( 'Biblioteca de Arquivos', 'cfp' ),
			'pages'				=> esc_html__( 'Páginas do Site e Landing Pages', 'cfp' ),
			'comments'				=> esc_html__( 'Moderar Comentários', 'cfp' ),
			'cf7'				=> esc_html__( 'Formulários de Contato', 'cfp' ),
			'templates'			=> esc_html__( 'Temas e Banco de Imagem', 'cfp' ),
			'menus'				=> esc_html__( 'Menus', 'cfp' ),
			'profile'			=> esc_html__( 'Perfil', 'cfp' ),
			'users'				=> esc_html__( 'Usuários', 'cfp' ),
		),
		'default'			=> 'dashboard'
	) );

}