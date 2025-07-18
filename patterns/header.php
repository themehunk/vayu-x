<?php
/**
 * Header Section
 * 
 * slug: header
 * title: Header Section
 * categories: vayu-x
 */

return array(
    'title'      =>__( 'Header Section', 'vayu-x' ),
    'categories' => array( 'vayu-x','header' ),
    'content'    => '<!-- wp:group {"align":"wide","className":"vayu-transparent-header","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"0"},"position":{"type":""}},"backgroundColor":"bg-prim","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide vayu-transparent-header has-bg-prim-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"0","bottom":"var:preset|spacing|30","left":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--30);padding-right:0;padding-bottom:var(--wp--preset--spacing--30);padding-left:0"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:site-title {"textAlign":"left","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:navigation {"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"flex","setCascadingProperties":true,"justifyContent":"center"}} -->
<!-- wp:navigation-link {"label":"About","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Blog","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Shop","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Home","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Products","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- /wp:navigation --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}}} -->
<p style="font-style:normal;font-weight:400">SignIn</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"accent","className":"is-style-fill","style":{"spacing":{"padding":{"left":"var:preset|spacing|30","right":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}},"border":{"radius":"4px"}}} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-accent-background-color has-background wp-element-button" style="border-radius:4px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">SignUp</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
);