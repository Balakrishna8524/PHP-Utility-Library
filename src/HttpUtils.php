<?php
namespace UtilityLibrary;

class HttpUtils {
    public static function getUrlContents($url) {
        return file_get_contents($url);
    }
}



