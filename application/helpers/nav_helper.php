<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Sistem Informasi Akademik
 * Dibuat oleh priludestudio.com
 * Lisensi dan hak cipta sepenuhnya dimiliki oleh priludestudio.com
 * Sangat dilarang keras untuk mendistribusikan ulang aplikasi ini tanpa izin dari
 * Prilude Studio
 */

/**
 * Description of newPHPClass
 *
 * @author Taofik Muhammad
 */

if ( ! function_exists('active_link'))
{
    function active_link($controller)
    {
        $CI =& get_instance();
        
        $class = $CI->router->fetch_class();
        return ($class == $controller) ? 'active' : '';
    }
}