<?php
/**
 * WooCommerce Section
 * 
 * slug: woocommerce
 * title: WooCommerce Section
 * categories: vayu-x
 */

return array(
    'title'      =>__( 'WooCommerce Section', 'vayu-x' ),
    'categories' => array( 'vayu-x' ),
    'content'    => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","right":"var:preset|spacing|60","bottom":"var:preset|spacing|80","left":"var:preset|spacing|60"}}},"backgroundColor":"bg-prim","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-bg-prim-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--60)"><!-- wp:heading {"textAlign":"center","textColor":"prim-color","fontSize":"wide"} -->
<h2 class="wp-block-heading has-text-align-center has-prim-color-color has-text-color has-wide-font-size">Latest Products</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|70"}}},"textColor":"sec-color"} -->
<p class="has-text-align-center has-sec-color-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--70)">We offers variety of services to meet out projects requirements Aenean eu mi dictum, faucibus lacus in, euismod turpis. </p>
<!-- /wp:paragraph -->

<!-- wp:woocommerce/product-new {"columns":4,"rows":2,"align":"wide"} /--></div>
<!-- /wp:group -->',
);