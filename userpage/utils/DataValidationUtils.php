<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataValidationUtils
 *
 * @author DELL
 */
class DataValidationUtils {

    function checkEmailValid($email) {
        $pattern_email = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
        return (!preg_match($pattern_email, $email)) ? FALSE : TRUE;
    }

    function checkPasswordValid($pass) {
        $pattern = "/^[a-zA-Z-' ]*$/";
        return (!preg_match($pattern, $pass)) ? FALSE : TRUE;
    }

}
