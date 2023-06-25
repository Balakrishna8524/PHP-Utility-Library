<?php
namespace UtilityLibrary;

class FileUtils {
    public static function readFile($filename) {
        return file_get_contents($filename);
    }
}




