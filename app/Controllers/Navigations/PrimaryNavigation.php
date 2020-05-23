<?php

namespace App\Controllers\Navigations;

use Walker_Nav_Menu;

class PrimaryNavigation extends Walker_Nav_Menu
{

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $currentClass = ($item->current || $item->current_item_parent || $item->current_item_ancestor) ? 'active' : '';
        $hasParent    = ($item->menu_item_parent !== '0') ? 'text-dark' : '';
        if (in_array('menu-item-has-children', $item->classes)) {
            $output .= '<li class="nav-item dropdown">';
            $output .= "<a class='nav-link dropdown-toggle {$hasParent} {$currentClass}' href='#' ";
            $output .= "id='{$item->ID}' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>{$item->title}</a>";
            $output .= "<ul class='dropdown-menu' aria-labelledby='{$item->ID}'>";
        } elseif ($item->menu_item_parent !== '0') {
            $output .= "<a class='dropdown-item {$currentClass}' href='{$item->url}'>{$item->title}</a>";
        } elseif ($item->menu_item_parent === '0') {
            $output .= '<li class="nav-item">';
            $output .= "<a class='nav-link js-scroll-trigger {$currentClass}' href='{$item->url}'>{$item->title}</a>";
        } else {
            $output .= "<a class='nav-link text-dark js-scroll-trigger {$currentClass}' href='{$item->url}'>{$item->title}</a>";
        }

    }

    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        // if ($depth > 0) {
        //     $output .="<script>console.log({$depth})</script>";
        //     $output .= "<div class='dropdown-submenu' aria-labelledby='navbarDropdown'>";
        // }else
        //     {
        // }
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        $output .= '</ul>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {

        if (in_array('menu-item-has-children', $item->classes) && $item->menu_item_parent === '0') {
            $output .= '</li>';
        } elseif (in_array('menu-item-has-children', $item->classes)) {
            $output .= '</li>';
        } elseif ($item->menu_item_parent === '0') {
            $output .= '</li>';
        }
        // elseif ($item->menu_item_parent !== '') {
        //     $output .= '</a>';
        //     // $output .= '</div>';
        // } else {
        //     $output .= '</a>';
        // }

    }

}

/*
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
 */