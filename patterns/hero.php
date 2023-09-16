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
    'content'    => '<!-- wp:group {"align":"full","style":{"dimensions":{"minHeight":""}},"backgroundColor":"bg-prim","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignfull has-bg-prim-background-color has-background"><!-- wp:cover {"url":"http://localhost/wp2023/wp-content/uploads/2023/08/bg.png","id":23,"dimRatio":20,"overlayColor":"bg-prim","isDark":false,"align":"full","layout":{"type":"constrained","contentSize":"700px"}} -->
    <div class="wp-block-cover alignfull is-light"><span aria-hidden="true" class="wp-block-cover__background has-bg-prim-background-color has-background-dim-20 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-23" alt="" src="' . esc_url( VAYU_X_URL . 'assets/images/').'hero.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:columns -->
    <div class="wp-block-columns"><!-- wp:column {"width":"700px","layout":{"type":"constrained","justifyContent":"right","contentSize":"700px"}} -->
    <div class="wp-block-column" style="flex-basis:700px"><!-- wp:group {"align":"wide","style":{"dimensions":{"minHeight":"80vh"},"spacing":{"padding":{"right":"0rem","left":"0rem"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
    <div class="wp-block-group alignwide" style="min-height:80vh;padding-right:0rem;padding-left:0rem"><!-- wp:heading {"textAlign":"center","textColor":"prim-color","fontSize":"vast"} -->
    <h2 class="wp-block-heading has-text-align-center has-prim-color-color has-text-color has-vast-font-size">Now a days everyone want premade templates.</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"align":"center","textColor":"prim-color"} -->
    <p class="has-text-align-center has-prim-color-color has-text-color">n at justo lacus. Sed a ipsum sapien. Suspendisse arcu elit, cursus consectetur interdum vitae, aliquam id elit. Aliquam ac dui tellus. Fusce ac orci erat. Sed sed gravida ipsum, quis auctor tortor. </p>
    <!-- /wp:paragraph -->
    
    <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:button {"backgroundColor":"accent","textColor":"prim-color","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-button"><a class="wp-block-button__link has-prim-color-color has-accent-background-color has-text-color has-background wp-element-button" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">Get Started</a></div>
    <!-- /wp:button -->
    
    <!-- wp:button {"backgroundColor":"accent","textColor":"prim-color","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
    <div class="wp-block-button"><a class="wp-block-button__link has-prim-color-color has-accent-background-color has-text-color has-background wp-element-button" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)">Learn More</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons --></div>
    <!-- /wp:group --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns --></div></div>
    <!-- /wp:cover --></div>
    <!-- /wp:group -->',
);