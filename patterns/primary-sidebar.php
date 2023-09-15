<?php
/**
 * Primary Sidebar
 * 
 * slug: primary-sidebar
 * title: Primary Sidebar
 * categories: vayu-x
 */

 return array(
    'title'      =>__( 'Sidebar Section', 'vayu-x' ),
    'categories' => array( 'vayu-x' ),
    'content'    =>'<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"className":"th-blog-page","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull th-blog-page" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:columns {"align":"wide"} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"25%","style":{"spacing":{"padding":{"right":"var:preset|spacing|60","left":"var:preset|spacing|60"}}},"backgroundColor":"bg-sec"} -->
<div class="wp-block-column has-bg-sec-background-color has-background" style="padding-right:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60);flex-basis:25%"><!-- wp:search {"label":"Search","showLabel":false,"buttonText":"Search","buttonUseIcon":true,"backgroundColor":"accent"} /-->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">Recent Categories </h2>
<!-- /wp:heading -->

<!-- wp:categories /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">Recent Posts </h2>
<!-- /wp:heading -->

<!-- wp:latest-posts {"displayPostDate":true,"textColor":"sec-color"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">Post Archive </h2>
<!-- /wp:heading -->

<!-- wp:archives /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">Category Tags </h2>
<!-- /wp:heading -->

<!-- wp:tag-cloud /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2 class="wp-block-heading">Connect With Us </h2>
<!-- /wp:heading -->

<!-- wp:social-links {"size":"has-small-icon-size"} -->
<ul class="wp-block-social-links has-small-icon-size"><!-- wp:social-link {"url":"#","service":"youtube"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"snapchat"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"wordpress"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->'
);