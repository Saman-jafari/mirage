<?php


namespace App\Controllers\Navigations;

use Walker_Nav_Menu;

class PrimaryNavigation extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $output .= "<li class='nav-item'>";
        $output .= "<a class='nav-link js-scroll-trigger' href='{$item->url}'>{$item->post_title}";

    }
    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= '</a>';
        $output .= '</li>';
    }
}
