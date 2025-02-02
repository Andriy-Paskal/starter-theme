<?php

    function paskal_setup() {
        add_theme_support('post-thumbnails');
    }
    add_action('after_setup_theme', 'paskal_setup');

    function rename_uncategorized_category() {
        $uncategorized = get_category_by_slug('uncategorized');

        if ($uncategorized) {

            $new_name = 'Blog';

            wp_update_term($uncategorized->term_id, 'category', array(
                'name' => $new_name,
                'slug' => sanitize_title($new_name),
            ));
        }
    }

    add_action('init', 'rename_uncategorized_category');