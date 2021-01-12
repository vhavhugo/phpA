<?php

namespace Helpers;

use Services\OptionsMethodShippingService;

class TimeHelper
{
    /**
     * Function to define custom delivery time
     * 
     * @param array $data
     * @param object $extra
     *
     * @return string
     */
    public static function label($data, $extra)
    {

        $min = intval($data->min) + intval($extra);
        $max = intval($data->max) + intval($extra);

        if (empty($data)) {
            return ' (*)';
        }

        if ($max == 1) {
            return " (1 dia útil)";
        }

        if ($min == $max) {
            return sprintf(" (%s dias úteis)", $max);
        }

        if ($min < $max) {
            return sprintf(" (%s a %s dias úteis)", $min, $max);
        }

        return sprintf(" (%s dias úteis)", $max);
    }
}
