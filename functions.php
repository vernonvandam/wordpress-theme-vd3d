<?php
/**
 * VD3D shop theme.
 *
 * Per-category layouts: every product category is assigned a layout in
 * vd3d_category_layouts(). Category pages then use templates/taxonomy-product_cat-layout-{layout}.html
 * and product pages templates/single-product-layout-{layout}.html when those files exist,
 * falling back to the standard templates. A category can also get a fully bespoke template
 * by adding taxonomy-product_cat-{slug}.html (WordPress core) or single-product-cat-{slug}.html.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const VD3D_MAIN_SITE = 'https://vd3d.com.au';

/**
 * Category slug => layout. Unlisted categories use "grid".
 *   grid     3 columns, the default
 *   showcase 2 columns of large images, for display pieces and gifts
 *   compact  4 columns of smaller cards, for small parts and accessories
 */
function vd3d_category_layouts(): array {
	return array(
		'motorbike-gift-sets' => 'showcase',
		'signs'               => 'showcase',
		'lights'              => 'showcase',
		'bowls'               => 'showcase',
		'pots'                => 'showcase',
		'decorations'         => 'showcase',
		'keyrings'            => 'compact',
		'tools'               => 'compact',
		'functional-parts'    => 'compact',
		'organisation'        => 'compact',
		'storage'             => 'compact',
	);
}

function vd3d_layout_for_category( string $slug ): string {
	$layouts = vd3d_category_layouts();
	return $layouts[ $slug ] ?? 'grid';
}

/** The category that decides a product's look: its first (primary) product category. */
function vd3d_primary_category( int $product_id ): ?WP_Term {
	$terms = get_the_terms( $product_id, 'product_cat' );
	if ( ! is_array( $terms ) || ! $terms ) {
		return null;
	}
	$terms = array_values( array_filter( $terms, fn( $t ) => 'uncategorized' !== $t->slug ) );
	return $terms[0] ?? null;
}

add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/theme.css' );
		remove_theme_support( 'core-block-patterns' );
	}
);

add_action(
	'wp_enqueue_scripts',
	function () {
		$version = wp_get_theme()->get( 'Version' );
		wp_enqueue_style( 'vd3d-theme', get_theme_file_uri( 'assets/css/theme.css' ), array(), $version );
	}
);

// Favicon matches vd3d.com.au (and flips colour in dark browser themes).
add_action(
	'wp_head',
	function () {
		if ( ! has_site_icon() ) {
			printf( '<link rel="icon" href="%s" type="image/svg+xml">' . "\n", esc_url( get_theme_file_uri( 'assets/images/favicon.svg' ) ) );
		}
	},
	2
);

// Category-specific templates, most specific first.
add_filter(
	'taxonomy_template_hierarchy',
	function ( array $templates ) {
		if ( is_tax( 'product_cat' ) ) {
			$term = get_queried_object();
			if ( $term instanceof WP_Term ) {
				$layout = vd3d_layout_for_category( $term->slug );
				array_splice( $templates, 1, 0, array( "taxonomy-product_cat-layout-{$layout}" ) );
			}
		}
		return $templates;
	}
);

add_filter(
	'single_template_hierarchy',
	function ( array $templates ) {
		if ( is_singular( 'product' ) ) {
			$term = vd3d_primary_category( get_queried_object_id() );
			if ( $term ) {
				$layout = vd3d_layout_for_category( $term->slug );
				// After single-product-{product-slug}, so a one-off product template still wins.
				array_splice( $templates, 1, 0, array( "single-product-cat-{$term->slug}", "single-product-layout-{$layout}" ) );
			}
		}
		return $templates;
	}
);

// Body classes so CSS can tune a category's look: vd3d-cat-{slug} and vd3d-layout-{layout}.
add_filter(
	'body_class',
	function ( array $classes ) {
		$term = null;
		if ( is_tax( 'product_cat' ) ) {
			$term = get_queried_object();
		} elseif ( is_singular( 'product' ) ) {
			$term = vd3d_primary_category( get_queried_object_id() );
		}
		if ( $term instanceof WP_Term ) {
			$classes[] = 'vd3d-cat-' . sanitize_html_class( $term->slug );
			$classes[] = 'vd3d-layout-' . vd3d_layout_for_category( $term->slug );
		}
		return $classes;
	}
);

// Pattern category for the theme's own patterns.
add_action(
	'init',
	function () {
		register_block_pattern_category( 'vd3d', array( 'label' => __( 'VD3D', 'vd3d' ) ) );
	}
);

// Keep the admin focused: no WooCommerce marketplace suggestions.
add_filter( 'woocommerce_allow_marketplace_suggestions', '__return_false' );

// Remove emoji scripts WordPress adds to every page.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
