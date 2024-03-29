<?php

if (!function_exists('getSlugName')) {
    function getSlugName($name)
    {
        return strtolower(str_replace(str_split(' ,:-!.~'), '', $name));
    }
}
