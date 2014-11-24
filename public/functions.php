<?php

function getAge ($time)
{

    $time = time() - $time; // to get the time since that moment

    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second',
        0 => 'seconds'       
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        if ($unit == 0) {
            $unit = 1;
        }
        $numberOfUnits = floor($time / $unit);
        if($time < 60){
            return 'Just now ';
        }
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s ago':' ago');
    }

}