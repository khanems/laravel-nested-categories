<?php

function recursiveCategoryDropdown($categories, $prefix = '')
{
    $dropdown = '';

    foreach ($categories as $category) {
        $dropdown .= '<option value="' . $category->id . '">' . $prefix . $category->name . '</option>';

        if (count($category->children) > 0) {
            $dropdown .= recursiveCategoryDropdown($category->children, $prefix . '&nbsp;&nbsp;&nbsp;&nbsp;');
        }
    }

    return $dropdown;
}