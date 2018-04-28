<?php
/**
 * Created by PhpStorm.
 * User: andy
 * Date: 4/28/18
 * Time: 1:16 AM
 */

add_action( 'init', 'create_acf_opt_page' );


function create_acf_opt_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {

		acf_add_options_page(
			[
				'page_title' => 'BOM Fields',
				'menu_title' => 'BOM Fields',
				'menu_slug'  => 'wc-bom-fields',
				'capability' => 'edit_posts',
				'redirect'   => false,
			] );
	}
}

add_action( 'init', 'create_acf_field_groups' );
//create_acf_field_groups();

function create_acf_field_groups() {

	if ( function_exists( 'acf_add_local_field_group' ) ):

		acf_add_local_field_group( [
			'key'                   => 'group_58bec9c065391',
			'title'                 => 'Assembly',
			'fields'                => [
				[
					'key'               => 'field_58bed89fe21dc',
					'label'             => 'Basic',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'placement'         => 'top',
					'endpoint'          => 0,
				],
				[
					'key'               => 'field_58bec9d3ae35b',
					'label'             => 'Assembly No.',
					'name'              => 'assembly_no',
					'type'              => 'text',
					'instructions'      => 'Unique identifier of assembly',
					'required'          => 1,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => 'assem-808',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				],
				[
					'key'               => 'field_59077aa89c6ff',
					'label'             => 'Assembly SKU',
					'name'              => 'assembly_sku',
					'type'              => 'text',
					'instructions'      => 'SKU number used to characterize part.',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => 'GBPP-808',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				],
				[
					'key'               => 'field_58bed73b66f46',
					'label'             => 'Assembly Category',
					'name'              => 'assembly_category',
					'type'              => 'taxonomy',
					'instructions'      => 'Category used to group assemblies.',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'taxonomy'          => 'assembly_category',
					'field_type'        => 'checkbox',
					'allow_null'        => 1,
					'add_term'          => 1,
					'save_terms'        => 1,
					'load_terms'        => 1,
					'return_format'     => 'object',
					'multiple'          => 0,
				],
				[
					'key'               => 'field_58bed72466f45',
					'label'             => 'Assembly Description',
					'name'              => 'assembly_description',
					'type'              => 'textarea',
					'instructions'      => 'Description of assembly',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => 'Some text describing the nature of this assembly.',
					'maxlength'         => '',
					'rows'              => 4,
					'new_lines'         => 'wpautop',
				],
				[
					'key'               => 'field_58bed8b1e21dd',
					'label'             => 'Materials',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'placement'         => 'top',
					'endpoint'          => 0,
				],
				[
					'key'               => 'field_58bec9fc4dcd4',
					'label'             => 'Sub-Assemblies',
					'name'              => 'sub-assemblies',
					'type'              => 'repeater',
					'instructions'      => 'Enter qty of parts & sub-assemblies used in building this assmelby.',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'collapsed'         => 'field_58beca404dcd5',
					'min'               => 0,
					'max'               => 0,
					'layout'            => 'table',
					'button_label'      => 'Add Row',
					'sub_fields'        => [
						[
							'key'               => 'field_58beca404dcd5',
							'label'             => 'Sub-Assembly',
							'name'              => 'sub-assembly',
							'type'              => 'post_object',
							'instructions'      => 'Part or Sub-assmelby',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => [
								'width' => '',
								'class' => '',
								'id'    => '',
							],
							'post_type'         => [
								0 => 'part',
								1 => 'assembly',
							],
							'taxonomy'          => [
							],
							'allow_null'        => 0,
							'multiple'          => 0,
							'return_format'     => 'object',
							'ui'                => 1,
						],
						[
							'key'               => 'field_58beca774dcd6',
							'label'             => 'Qty',
							'name'              => 'qty',
							'type'              => 'text',
							'instructions'      => 'Qty of objects used',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => [
								'width' => '',
								'class' => '',
								'id'    => '',
							],
							'default_value'     => 0,
							'placeholder'       => '',
							'prepend'           => '',
							'append'            => '',
							'maxlength'         => '',
						],
					],
				],
				[
					'key'               => 'field_58bed77ab852a',
					'label'             => 'Assembly File',
					'name'              => 'assembly_file',
					'type'              => 'file',
					'instructions'      => 'Add files that associate with the assembly',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'return_format'     => 'array',
					'library'           => 'all',
					'min_size'          => '',
					'max_size'          => 15,
					'mime_types'        => '',
				],
			],
			'location'              => [
				[
					[
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'assembly',
					],
				],
			],
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'left',
			'instruction_placement' => 'label',
			'hide_on_screen'        => [
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'author',
				4 => 'categories',
				5 => 'send-trackbacks',
			],
			'active'                => 1,
			'description'           => 'Assembly object made of parts and sub-assemblies that make up a product.',
		] );

		acf_add_local_field_group( [
			'key'                   => 'group_59078715877bf',
			'title'                 => 'Components',
			'fields'                => [
				[
					'key'               => 'field_59078744765a7',
					'label'             => 'Components',
					'name'              => 'components',
					'type'              => 'repeater',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'collapsed'         => 'field_590787bf75331',
					'min'               => 0,
					'max'               => 0,
					'layout'            => 'table',
					'button_label'      => '',
					'sub_fields'        => [
						[
							'key'               => 'field_590787bf75331',
							'label'             => 'Component',
							'name'              => 'component',
							'type'              => 'post_object',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => [
								'width' => '',
								'class' => '',
								'id'    => '',
							],
							'post_type'         => [
								0 => 'part',
							],
							'taxonomy'          => [
							],
							'allow_null'        => 0,
							'multiple'          => 0,
							'return_format'     => 'object',
							'ui'                => 1,
						],
						[
							'key'               => 'field_590787e975332',
							'label'             => 'Quantity',
							'name'              => 'quantity',
							'type'              => 'number',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => [
								'width' => '',
								'class' => '',
								'id'    => '',
							],
							'default_value'     => 0,
							'placeholder'       => '',
							'prepend'           => '',
							'append'            => '',
							'min'               => '',
							'max'               => '',
							'step'              => '',
						],
					],
				],
			],
			'location'              => [
				[
					[
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'post',
					],
				],
			],
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => 1,
			'description'           => '',
		] );

		acf_add_local_field_group( [
			'key'                   => 'group_590789593ae7c',
			'title'                 => 'General',
			'fields'                => [
				[
					'key'               => 'field_59078de084b6f',
					'label'             => 'Security',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'placement'         => 'top',
					'endpoint'          => 0,
				],
				[
					'key'               => 'field_590789c94f0b3',
					'label'             => 'Super Users',
					'name'              => 'super_users',
					'type'              => 'user',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '65',
						'class' => '',
						'id'    => '',
					],
					'role'              => [
						0 => 'administrator',
						1 => 'shop_manager',
					],
					'allow_null'        => 0,
					'multiple'          => 1,
				],
				[
					'key'               => 'field_59078baf42e11',
					'label'             => 'Password',
					'name'              => 'password',
					'type'              => 'password',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '50',
						'class' => '',
						'id'    => '',
					],
					'placeholder'       => 'Password',
					'prepend'           => '',
					'append'            => '',
					'readonly'          => 0,
					'disabled'          => 0,
				],
				[
					'key'               => 'field_59078b7a42e10',
					'label'             => 'Email',
					'name'              => 'email',
					'type'              => 'email',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '65',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => 'email@domain.com',
					'prepend'           => '',
					'append'            => '',
				],
				[
					'key'               => 'field_59078bd12d18e',
					'label'             => 'URL',
					'name'              => 'url',
					'type'              => 'url',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '50',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => 'http://domain.com',
				],
			],
			'location'              => [
				[
					[
						'param'    => 'options_page',
						'operator' => '==',
						'value'    => 'wc-bom-fields',
					],
				],
			],
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'left',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => 1,
			'description'           => '',
		] );

		acf_add_local_field_group( [
			'key'                   => 'group_58be21633a48e',
			'title'                 => 'Part',
			'fields'                => [
				[
					'key'               => 'field_58bed3428e47c',
					'label'             => 'Basic',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'placement'         => 'top',
					'endpoint'          => 0,
				],
				[
					'key'               => 'field_58be224180f49',
					'label'             => 'Part No.',
					'name'              => 'part_no',
					'type'              => 'text',
					'instructions'      => 'Unique identifier of part',
					'required'          => 1,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => 'CPU-808',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				],
				[
					'key'               => 'field_58bed5eb041ea',
					'label'             => 'Part Category',
					'name'              => 'part_category',
					'type'              => 'taxonomy',
					'instructions'      => 'Categorize parts to create groupings',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'taxonomy'          => 'part-category',
					'field_type'        => 'checkbox',
					'allow_null'        => 1,
					'add_term'          => 1,
					'save_terms'        => 1,
					'load_terms'        => 1,
					'return_format'     => 'object',
					'multiple'          => 0,
				],
				[
					'key'               => 'field_58be224e80f4a',
					'label'             => 'Part Name',
					'name'              => 'part_name',
					'type'              => 'text',
					'instructions'      => 'Name of part in readable format',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => 'Steel plates',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				],
				[
					'key'               => 'field_58be2211b049f',
					'label'             => 'Part Sku',
					'name'              => 'part_sku',
					'type'              => 'text',
					'instructions'      => 'SKU number for part',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => 'STPL-18',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				],
				[
					'key'               => 'field_58be225a80f4b',
					'label'             => 'Part Description',
					'name'              => 'part_description',
					'type'              => 'textarea',
					'instructions'      => 'Enter any information used to describe the part.',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => '',
					'maxlength'         => '',
					'rows'              => 4,
					'new_lines'         => 'br',
				],
				[
					'key'               => 'field_58bed39aaa35e',
					'label'             => 'Details',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'placement'         => 'top',
					'endpoint'          => 0,
				],
				[
					'key'               => 'field_58be23ec87b4e',
					'label'             => 'Part Units',
					'name'              => 'part_units',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				],
				[
					'key'               => 'field_58be26e874984',
					'label'             => 'Part Cost',
					'name'              => 'part_cost',
					'type'              => 'number',
					'instructions'      => 'Unit price of part',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => '0.00',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'min'               => '',
					'max'               => '',
					'step'              => '',
				],
				[
					'key'               => 'field_58be25d7bc42b',
					'label'             => 'Part Weight',
					'name'              => 'part_weight',
					'type'              => 'number',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'min'               => '',
					'max'               => '',
					'step'              => '',
				],
				[
					'key'               => 'field_58be27115df5e',
					'label'             => 'Part Measurement',
					'name'              => 'part_measurement',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				],
				[
					'key'               => 'field_58be268b32e00',
					'label'             => 'Part Notes',
					'name'              => 'part_notes',
					'type'              => 'textarea',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'default_value'     => '',
					'placeholder'       => '',
					'maxlength'         => '',
					'rows'              => 4,
					'new_lines'         => 'br',
				],
				[
					'key'               => 'field_59077a78ee559',
					'label'             => 'Part File',
					'name'              => 'part_file',
					'type'              => 'file',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'return_format'     => 'array',
					'library'           => 'all',
					'min_size'          => '',
					'max_size'          => 15,
					'mime_types'        => '',
				],
				[
					'key'               => 'field_5907815c0e74e',
					'label'             => 'Part Images',
					'name'              => 'part_images',
					'type'              => 'gallery',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'min'               => '',
					'max'               => '',
					'insert'            => 'append',
					'library'           => 'all',
					'min_width'         => '',
					'min_height'        => '',
					'min_size'          => '',
					'max_width'         => '',
					'max_height'        => '',
					'max_size'          => '',
					'mime_types'        => '',
				],
				[
					'key'               => 'field_5907849f8c8a8',
					'label'             => 'Part Compoents',
					'name'              => 'part_compoents',
					'type'              => 'repeater',
					'instructions'      => 'Component objects used in constructing a part',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'collapsed'         => 'field_590784c18c8a9',
					'min'               => 0,
					'max'               => 0,
					'layout'            => 'table',
					'button_label'      => '',
					'sub_fields'        => [
						[
							'key'               => 'field_590784c18c8a9',
							'label'             => 'Compoent',
							'name'              => 'compoent',
							'type'              => 'post_object',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => [
								'width' => '',
								'class' => '',
								'id'    => '',
							],
							'post_type'         => [
								0 => 'part',
							],
							'taxonomy'          => [
							],
							'allow_null'        => 0,
							'multiple'          => 0,
							'return_format'     => 'object',
							'ui'                => 1,
						],
						[
							'key'               => 'field_590784e28c8aa',
							'label'             => 'Qty',
							'name'              => 'qty',
							'type'              => 'text',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => [
								'width' => '',
								'class' => '',
								'id'    => '',
							],
							'default_value'     => 1,
							'placeholder'       => '',
							'prepend'           => '',
							'append'            => '',
							'maxlength'         => '',
						],
					],
				],
			],
			'location'              => [
				[
					[
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'part',
					],
				],
			],
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'left',
			'instruction_placement' => 'label',
			'hide_on_screen'        => [
				0 => 'the_content',
				1 => 'author',
				2 => 'send-trackbacks',
			],
			'active'                => 1,
			'description'           => 'Part object used in process of manufacturing assemblies or products.',
		] );

		acf_add_local_field_group( [
			'key'                   => 'group_590779985a45c',
			'title'                 => 'Product',
			'fields'                => [
				[
					'key'               => 'field_5907799d06cf9',
					'label'             => 'Material',
					'name'              => 'material',
					'type'              => 'repeater',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => [
						'width' => '',
						'class' => '',
						'id'    => '',
					],
					'collapsed'         => '',
					'min'               => 0,
					'max'               => 0,
					'layout'            => 'table',
					'button_label'      => '',
					'sub_fields'        => [
						[
							'key'               => 'field_590779b206cfa',
							'label'             => 'Assembly',
							'name'              => 'assembly',
							'type'              => 'post_object',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => [
								'width' => '',
								'class' => '',
								'id'    => '',
							],
							'post_type'         => [
								0 => 'part',
								1 => 'assembly',
							],
							'taxonomy'          => [
							],
							'allow_null'        => 0,
							'multiple'          => 0,
							'return_format'     => 'object',
							'ui'                => 1,
						],
						[
							'key'               => 'field_590779d506cfb',
							'label'             => 'Qty',
							'name'              => 'qty',
							'type'              => 'text',
							'instructions'      => '',
							'required'          => 0,
							'conditional_logic' => 0,
							'wrapper'           => [
								'width' => '',
								'class' => '',
								'id'    => '',
							],
							'default_value'     => '',
							'placeholder'       => '',
							'prepend'           => '',
							'append'            => '',
							'maxlength'         => '',
						],
					],
				],
			],
			'location'              => [
				[
					[
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'product',
					],
				],
			],
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => '',
			'active'                => 1,
			'description'           => 'Relation between Products and the parts & assemblies they use',
		] );

	endif;
}
