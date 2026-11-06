<?php
/**
 * Title: Site footer
 * Slug: vd3d/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Inserter: no
 */
$vd3d_logo = esc_url( get_theme_file_uri( 'assets/images/vd3d-horizontal-green.svg' ) );
$vd3d_main = VD3D_MAIN_SITE;
?>
<!-- wp:group {"className":"vd3d-footer","backgroundColor":"industrial-deep","textColor":"industrial-text","layout":{"type":"default"}} -->
<div class="wp-block-group vd3d-footer has-industrial-text-color has-industrial-deep-background-color has-text-color has-background">
<!-- wp:html -->
<div class="vd3d-footer-main">
	<a class="vd3d-brand" href="<?php echo esc_url( $vd3d_main ); ?>" aria-label="VD3D home"><img src="<?php echo $vd3d_logo; ?>" alt="VD3D: 3D printing, prototyping and laser engraving" width="300" height="70"></a>
	<nav class="vd3d-footer-links" aria-label="<?php esc_attr_e( 'Footer', 'vd3d' ); ?>">
		<a href="<?php echo esc_url( $vd3d_main . '/#services' ); ?>">Our services</a>
		<a href="<?php echo esc_url( $vd3d_main . '/#about' ); ?>">About us</a>
		<a href="<?php echo esc_url( $vd3d_main . '/faq' ); ?>">FAQ</a>
		<a href="mailto:hello@vd3d.com.au">hello@vd3d.com.au</a>
		<a href="https://www.instagram.com/vandam3d/" target="_blank" rel="noreferrer">Instagram <span aria-hidden="true">↗</span></a>
	</nav>
</div>
<div class="vd3d-footer-bottom">
	<span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> VD3D. All rights reserved.</span>
	<nav class="vd3d-legal-links" aria-label="<?php esc_attr_e( 'Legal', 'vd3d' ); ?>">
		<a href="<?php echo esc_url( $vd3d_main . '/privacy' ); ?>">Privacy</a>
		<a href="<?php echo esc_url( $vd3d_main . '/terms' ); ?>">Terms</a>
		<a href="<?php echo esc_url( $vd3d_main . '/shipping-returns' ); ?>">Shipping &amp; returns</a>
	</nav>
	<span>Designed, printed and created in Perth, Western Australia.</span>
</div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->
