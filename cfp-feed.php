<?php

/**
 * Deal with the custom RSS templates.
 */
function cfp_rss($for_comments)
{

    if ('widget' === get_query_var('post_type')) {
        include_once 'feed-templates/feed-widget.php';
    } else if ('notice' === get_query_var('post_type')) {
        include_once 'feed-templates/feed-notice.php';
    } else if ($for_comments) {
        load_template(ABSPATH . WPINC . '/feed-rss2-comments.php');
    } else {
        load_template(ABSPATH . WPINC . '/feed-rss2.php');
    }
}
remove_all_actions('do_feed_rss2');

add_action('do_feed_rss2', 'cfp_rss', 11);
