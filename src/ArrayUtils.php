<?php
namespace UtilityLibrary;

class ArrayUtils {
    
    /**
     * Flatten a multidimensional array into a single level array.
     *
     * @param array $array The array to flatten.
     * @return array The flattened array.
     */
    public static function flatten(array $array) {
        $result = [];
        array_walk_recursive($array, function($value) use (&$result) {
            $result[] = $value;
        });
        return $result;
    }

    /**
     * Filter an array based on a callback function.
     *
     * @param array $array The array to filter.
     * @param callable $callback The callback function used to filter the array.
     * @return array The filtered array.
     */
    public static function filter(array $array, callable $callback) {
        return array_filter($array, $callback, ARRAY_FILTER_USE_BOTH);
    }

    /**
     * Sort an array by its keys.
     *
     * @param array $array The array to sort.
     * @param int $sortFlags Optional flags to modify sorting behavior.
     * @return array The sorted array.
     */
    public static function sortByKey(array $array, $sortFlags = SORT_REGULAR) {
        ksort($array, $sortFlags);
        return $array;
    }

    /**
     * Merge two or more arrays recursively.
     *
     * @param array $array1 The first array to merge.
     * @param array $array2 The second array to merge.
     * @return array The merged array.
     */
    public static function mergeRecursive(array $array1, array $array2) {
        return array_merge_recursive($array1, $array2);
    }


    /**
     * Check if an array is associative or sequential.
     *
     * @param array $array The array to check.
     * @return bool True if the array is associative, false if it's sequential.
     */
    public static function isAssociative(array $array) {
        if (array() === $array) return false;
        return array_keys($array) !== range(0, count($array) - 1);
    }

    
}
