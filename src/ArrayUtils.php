<?php
namespace UtilityLibrary;

class ArrayUtils {
    public static function flatten(array $array) {
        $result = [];
        array_walk_recursive($array, function($value) use (&$result) {
            $result[] = $value;
        });
        return $result;
    }
}
