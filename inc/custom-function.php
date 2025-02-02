<?php
    function debug($data){
        echo '<pre>' . print_r($data, true) . '</pre>';
    }

    function delete_all_posts_programmatically(){
        $args = [
            'post_type' => 'post',
            'posts_per_page' => -1,
            'fields' => 'ids'
        ];

        $all_posts = new WP_Query($args);

        if ($all_posts->have_posts()){
            foreach ($all_posts->posts as $post_id){
                wp_delete_post($post_id, true);
            }
        }
		return true;
    }

	function delete_all_terms() {
		$categories = get_terms(array(
			'taxonomy'   => 'category',
			'hide_empty' => false,
			'fields'     => 'ids'
		));

		if (!empty($categories)) {
			foreach ($categories as $term_id) {
				wp_delete_term($term_id, 'category');
			}
		}

		$taxonomies = get_taxonomies(array('public' => true), 'names');
		foreach ($taxonomies as $taxonomy) {
			$terms = get_terms(array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => false,
				'fields'     => 'ids'
			));

			if (!empty($terms)) {
				foreach ($terms as $term_id) {
					wp_delete_term($term_id, $taxonomy);
				}
			}
		}
	}