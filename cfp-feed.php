<?php

/**
 * Registers our custom feed
 */
function cfp_register()
{
    add_feed('rss2-with-featured-images', __NAMESPACE__ . '\cfp_generate_content');
}
add_action('init', __NAMESPACE__ . '\cfp_register');

/**
 * Generates the content of our custom feed
 */
function cfp_generate_content()
{

    add_filter('the_content_feed', __NAMESPACE__ . '\cfp_prepend_thumbnail');
    add_filter('the_excerpt_rss',  __NAMESPACE__ . '\cfp_prepend_thumbnail');

    if (file_exists(ABSPATH . WPINC . '/feed-rss2.php')) {
        require(ABSPATH . WPINC . '/feed-rss2.php');
    }

    remove_filter('the_content_feed', __NAMESPACE__ . '\cfp_prepend_thumbnail');
    remove_filter('the_excerpt_rss',  __NAMESPACE__ . '\cfp_prepend_thumbnail');
}

/**
 * Prepends the post's featured image to the feed content
 *
 * @param string $content The feed content.
 *
 * @return string The filtered content.
 */
function cfp_prepend_thumbnail($content)
{

    if (!has_post_thumbnail()) {
        return $content;
    }

    $thumbnail_html = sprintf(
        "<p>%s</p>\n",
        get_the_post_thumbnail()
    );

    return $thumbnail_html . $content;
}
