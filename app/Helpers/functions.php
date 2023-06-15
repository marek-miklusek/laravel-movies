<?php

function change_color($title, $segment)
{
    $title = str_replace(' ', '', $title);
    $segment = str_replace('-', '', $segment);
    
    $title = strtolower($title);
    $segment = strtolower($segment);
   
    // Binary safe string comparison
    if (strcmp($title, $segment) === 0) {
        return 'text-[#e50914]';
    }
}




