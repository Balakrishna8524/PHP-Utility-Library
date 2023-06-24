<?php
namespace UtilityLibrary;

class DateUtils {
    public static function format($date, $format) {
        return date($format, strtotime($date));
    }
}
