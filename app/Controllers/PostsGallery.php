<?php

namespace App\Controllers;

use WP_Query;

class PostsGallery
{
    public function getAllPosts()
    {
        $args  = [
            'post_type'      => 'post',
            'orderby'        => 'ID',
            'post_status'    => 'publish',
            'order'          => 'DESC',
            'posts_per_page' => -1,
        ];
        $query = new WP_Query($args);

        return $query;
    }
}