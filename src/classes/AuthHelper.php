<?php

session_start();

class AuthHelper
{
    private static function getCurrentUser()
    {
        $userRepository = new UserRepository();
        // $currentUser = $userRepository->findById($_SESSION['uid']);

        /* remove below code later */
        $currentUser = new User();
        $currentUser->setUserID(1)->setFirstName('Jan')->setLastName('Kowalski')->setJobtitle('Pucybus')->setPhoneNumber(111222333);

        return $currentUser;
    }

    public static function canAccessInvoiveShow()
    {
        if (in_array('rolas', self::getCurrentUser()->getRoles())) {
            return true;
        }

        return false;
    }

    public static function canAccessInvoiceSearch()
    {
        if (in_array('rolas', self::getCurrentUser()->getRoles())) {
            return true;
        }

        return false;
    }

    public static function canAccessInvoiceAdd()
    {
        if (in_array('rolaAddInvoice', self::getCurrentUser()->getRoles())) {
            return true;
        }

        return false;
    }

    public static function canAccessHardwareShow()
    {
        if (in_array('rolas', self::getCurrentUser()->getRoles())) {
            return true;
        }

        return false;
    }

    public static function canAccessHardwareSearch()
    {
        if (in_array('rola', self::getCurrentUser()->getRoles())) {
            return true;
        }

        return false;
    }

    public static function canAccessHardwareAdd()
    {
        if (in_array('rola', self::getCurrentUser()->getRoles())) {
            return true;
        }

        return false;
    }

    public static function canAccessLicenseShow()
    {
        if (in_array('rola', self::getCurrentUser()->getRoles())) {
            return true;
        }

        return false;
    }

    public static function canAccessLicenseAdd()
    {
        if (in_array('rola', self::getCurrentUser()->getRoles())) {
            return true;
        }

        return false;
    }

    public static function canAccessDocShow()
    {
        if (in_array('rola', self::getCurrentUser()->getRoles())) {
            return true;
        }

        return false;
    }

    public static function canAccessDocAdd()
    {
        if (in_array('rola', self::getCurrentUser()->getRoles())) {
            return true;
        }

        return false;
    }

    public static function canAccessNotificationExamples()
    {
        if (in_array('rola', self::getCurrentUser()->getRoles())) {
            return true;
        }

        return false;
    }
}
