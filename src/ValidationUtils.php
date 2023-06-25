<?php
namespace UtilityLibrary;

class ValidationUtils {
    public static function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
