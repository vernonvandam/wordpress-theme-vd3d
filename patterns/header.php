<?php
/**
 * Title: Site header
 * Slug: vd3d/header
 * Categories: header
 * Block Types: core/template-part/header
 * Inserter: no
 */
$vd3d_logo = esc_url( get_theme_file_uri( 'assets/images/vd3d-mark-green.svg' ) );
$vd3d_home = esc_url( home_url( '/' ) );
?>
<!-- wp:group {"tagName":"div","className":"vd3d-header","backgroundColor":"industrial","textColor":"industrial-text","layout":{"type":"default"}} -->
<div class="wp-block-group vd3d-header has-industrial-text-color has-industrial-background-color has-text-color has-background">
<!-- wp:group {"className":"vd3d-header-top","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group vd3d-header-top">
<!-- wp:html -->
<a class="vd3d-brand" href="<?php echo $vd3d_home; ?>" aria-label="VD3D shop home"><img src="<?php echo $vd3d_logo; ?>" alt="VD3D" width="136" height="100"></a>
<!-- /wp:html -->

<!-- wp:group {"className":"vd3d-header-actions","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group vd3d-header-actions">
<!-- wp:html -->
<a class="vd3d-header-back" href="<?php echo esc_url( VD3D_MAIN_SITE ); ?>">vd3d.com.au <span aria-hidden="true">↗</span></a>
<!-- /wp:html -->

<!-- wp:woocommerce/customer-account {"displayStyle":"icon_only","iconStyle":"line","iconClass":"wc-block-customer-account__account-icon"} /-->

<!-- wp:woocommerce/mini-cart {"addToCartBehaviour":"open_drawer","hasHiddenPrice":true} /-->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"vd3d-header-nav","layout":{"type":"default"}} -->
<div class="wp-block-group vd3d-header-nav">
<!-- wp:html -->
<nav class="vd3d-nav" aria-label="<?php esc_attr_e( 'Shop navigation', 'vd3d' ); ?>">
	<a href="<?php echo $vd3d_home; ?>"><?php esc_html_e( 'Shop home', 'vd3d' ); ?></a>
	<a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' ) ); ?>"><?php esc_html_e( 'All products', 'vd3d' ); ?></a>
	<a href="<?php echo esc_url( VD3D_MAIN_SITE . '/quote' ); ?>"><?php esc_html_e( 'Custom job? Get a quote', 'vd3d' ); ?></a>
	<a href="<?php echo esc_url( VD3D_MAIN_SITE . '/faq' ); ?>"><?php esc_html_e( 'FAQ', 'vd3d' ); ?></a>
</nav>
<!-- /wp:html -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
