<?php

function get_age($age)
{
    $new = new DateTime($age);
    $date = new DateTime();
    $interval = $date->diff($new);
    return $interval->y;
}

?>