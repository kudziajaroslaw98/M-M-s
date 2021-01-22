<?php

session_start();

class AuthHelper
{
    private static string $admin = 'admin';
    private static string $owner = 'owner';
    private static string $auditor = 'auditor';
    private static string $employee = 'employee';

    private static function getCurrentUser()
    {
        $currentUser = UserLazyLoader::getUser($_SESSION['uid']);

        return $currentUser;
    }

    // -------------- generally front-end --------------
    public static function canAccessInvoice()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$auditor, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessHardware()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$auditor, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$employee, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessLicense()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$auditor, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$employee, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessDoc()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$auditor, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessNotification()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessUsers()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessRoles()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    // -------------- end of generally front-end --------------

    public static function canAccessInvoiveShow()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$auditor, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessInvoiceSearch()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$auditor, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessInvoiceAdd()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessHardwareShow()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$auditor, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$employee, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessHardwareSearch()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$auditor, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$employee, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessHardwareAdd()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$employee, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessLicenseShow()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$auditor, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$employee, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessLicenseAdd()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$employee, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessDocShow()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$auditor, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessDocAdd()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessNotificationExamples()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessUsersAdd()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessUsersShow()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessRolesShow()
    {
        if (in_array(self::$admin, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }
}
