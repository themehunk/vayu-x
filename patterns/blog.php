<?php
/**
 * Blog Section
 * 
 * slug: blog
 * title: Blog Section
 * categories: vayu-x
 */

return array(
    'title'      =>__( 'Blog Section', 'vayu-x' ),
    'categories' => array( 'vayu-x' ),
    'content'    => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|60","right":"var:preset|spacing|60"}}},"backgroundColor":"bg-prim","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-bg-prim-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--60)"><!-- wp:heading {"textAlign":"center","textColor":"prim-color","fontSize":"wide"} -->
<h2 class="wp-block-heading has-text-align-center has-prim-color-color has-text-color has-wide-font-size">Latest Blog</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"sec-color"} -->
<p class="has-text-align-center has-sec-color-color has-text-color">We offers variety of services to meet out projects requirements Aenean eu mi dictum, faucibus lacus in, euismod turpis. </p>
<!-- /wp:paragraph -->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|60"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;padding-top:var(--wp--preset--spacing--60)"><!-- wp:query {"queryId":20,"query":{"perPage":"9","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":"0"}},"backgroundColor":"bg-sec","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top"}} -->
<div class="wp-block-group has-bg-sec-background-color has-background" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-featured-image {"isLink":true,"aspectRatio":"auto","style":{"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"padding":{"top":"0","bottom":"0"}}}} /-->

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|60","left":"var:preset|spacing|60","top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)"><!-- wp:post-title {"isLink":true} /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"bottom"}} -->
<div class="wp-block-group"><!-- wp:post-author {"avatarSize":24,"showAvatar":false,"showBio":false,"byline":"by","isLink":true,"style":{"layout":{"selfStretch":"fit","flexSize":null},"color":{"duotone":"unset"}}} /-->

<!-- wp:post-date {"textAlign":"left"} /--></div>
<!-- /wp:group -->

<!-- wp:post-excerpt {"moreText":"Read More","excerptLength":21,"style":{"elements":{"link":{"color":{"text":"var:preset|color|prim-color"},":hover":{"color":{"text":"var:preset|color|accent"}}}}},"textColor":"sec-color"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
);