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
     * Check if an array is associative or sequential.
     *
     * @param array $array The array to check.
     * @return bool True if the array is associative, false if it's sequential.
     */
    public static function isAssociative(array $array) {
        if (array() === $array) return false;
        return array_keys($array) !== range(0, count($array) - 1);
    }


    /**
     * Transpose a multidimensional array.
     *
     * @param array $array The array to transpose.
     * @return array The transposed array.
     */
    public static function arrayTranspose(array $array) {
        $transposed = [];
        foreach ($array as $rowKey => $row) {
            foreach ($row as $colKey => $value) {
                $transposed[$colKey][$rowKey] = $value;
            }
        }
        return $transposed;
    }

    /**
     * Compute the intersection of arrays using keys.
     *
     * @param array ...$arrays The arrays to intersect.
     * @return array The intersection of arrays using keys.
     */
    public static function arrayIntersectByKey(array ...$arrays) {
        return array_intersect_key(...$arrays);
    }


    /**
     * Shuffle an associative array without losing its keys.
     *
     * @param array $array The array to shuffle.
     * @return array The shuffled array.
     */
    public static function shuffleAssoc(array $array) {
        $keys = array_keys($array);
        shuffle($keys);
        $shuffledArray = [];
        foreach ($keys as $key) {
            $shuffledArray[$key] = $array[$key];
        }
        return $shuffledArray;
    }

    /**
     * Get the intersection of multiple arrays.
     *
     * @param array ...$arrays The arrays to intersect.
     * @return array The intersection of the arrays.
     */
    public static function multiArrayIntersect(array ...$arrays) {
        $intersect = array_shift($arrays);
        foreach ($arrays as $array) {
            $intersect = array_intersect($intersect, $array);
        }
        return $intersect;
    }

    /**
     * Check if an array is a subset of another array.
     *
     * @param array $subset The array to check.
     * @param array $superset The superset array.
     * @return bool True if $subset is a subset of $superset, false otherwise.
     */
    public static function isSubset(array $subset, array $superset) {
        return count(array_diff($subset, $superset)) === 0;
    }


    /**
     * Group an array of associative arrays by a specific key.
     *
     * @param array $array The array to group.
     * @param string $key The key to group by.
     * @return array The grouped array.
     */
    public static function groupBy(array $array, $key) {
        $grouped = [];
        foreach ($array as $item) {
            $grouped[$item[$key]][] = $item;
        }
        return $grouped;
    }


    /**
     * Get a random element from an array.
     *
     * @param array $array The array to choose from.
     * @return mixed|null A random element from the array, or null if the array is empty.
     */
    public static function randomElement(array $array) {
        if (empty($array)) {
            return null;
        }
        $keys = array_rand($array);
        return $array[$keys];
    }

    /**
     * Sorts a multidimensional array by a specific column value.
     *
     * @param array $array The array to sort.
     * @param string $column The column to sort by.
     * @param int $direction Sorting direction (SORT_ASC or SORT_DESC).
     * @param int $flags Flags to modify sorting behavior.
     * @return array The sorted array.
     */
    public static function sortByColumn(array &$array, $column, $direction = SORT_ASC, $flags = SORT_REGULAR) {
        $sortColumn = [];
        foreach ($array as $key => $row) {
            $sortColumn[$key] = $row[$column];
        }
        array_multisort($sortColumn, $direction, $flags, $array);
        return $array;
    }

    /**
     * Computes the sum of values in a multidimensional array recursively.
     *
     * @param array $array The array to compute the sum.
     * @return float The sum of values.
     */
    public static function arraySumRecursive(array $array) {
        $sum = 0;
        foreach ($array as $value) {
            if (is_array($value)) {
                $sum += self::arraySumRecursive($value);
            } else {
                $sum += $value;
            }
        }
        return $sum;
    }

}
