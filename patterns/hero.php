<?php
/**
 * Hero Section
 * 
 * slug: hero
 * title: Hero Section
 * categories: vayu-x
 */

$strings = array(
    'title'    => __( 'Vayu X Theme', 'vayu-x' ),
    'subtitle' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua.', 'vayu-x' ),
    'button'   => __( 'Learn More', 'vayu-x' ),
    'image'    => ''
);

return array(
    'title'      =>__( 'Hero Section', 'vayu-x' ),
    'categories' => array( 'vayu-x' ),
    'content'    => '<!-- wp:group {"tagName":"main","align":"full","style":{"dimensions":{"minHeight":""},"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}},"backgroundColor":"bg-prim","layout":{"type":"constrained"}} -->
<main class="wp-block-group alignfull has-bg-prim-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--60)"><!-- wp:cover {"url":"' . esc_url( VAYU_X_URL . 'assets/images/').'bg.png","id":23,"dimRatio":20,"overlayColor":"bg-prim","isUserOverlayColor":true,"contentPosition":"center center","isDark":false,"align":"full","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"0","bottom":"0"}},"color":{"duotone":"var:preset|duotone|bg-prim-and-prim-color"}},"layout":{"type":"constrained","contentSize":"700px"}} -->
<div class="wp-block-cover alignfull is-light" style="padding-top:0;padding-right:var(--wp--preset--spacing--30);padding-bottom:0;padding-left:var(--wp--preset--spacing--30)"><img class="wp-block-cover__image-background wp-image-23" alt="" src="' . esc_url( VAYU_X_URL . 'assets/images/').'bg.png" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-bg-prim-background-color has-background-dim-20 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"dimensions":{"minHeight":""},"spacing":{"padding":{"right":"0","left":"0","top":"90px","bottom":"90px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group alignwide" style="padding-top:90px;padding-right:0;padding-bottom:90px;padding-left:0"><!-- wp:heading {"style":{"typography":{"textAlign":"center"}},"textColor":"prim-color","fontSize":"large"} -->
<h2 class="wp-block-heading has-text-align-center has-prim-color-color has-text-color has-large-font-size">Beautiful Templates, Powerful Websites</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"textColor":"prim-color"} -->
<p class="has-text-align-center has-prim-color-color has-text-color">Start with a professionally designed template and build a beautiful website in no time.
Choose from our stunning collection and customize it to match your unique style.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:button {"backgroundColor":"accent","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-accent-background-color has-background wp-element-button" href="#" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">Get Started</a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"accent","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-accent-background-color has-background wp-element-button" href="#" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></main>
<!-- /wp:group -->',
);