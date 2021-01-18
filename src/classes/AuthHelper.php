<?php

session_start();

abstract class Roles
{
}

class AuthHelper
{
    private static string $admin = 'admin';
    private static string $owner = 'owner';
    private static string $auditor = 'auditor';
    private static string $employee = 'employee';

    private static function getCurrentUser()
    {
        $userRepository = new UserRepository();
        $currentUser = $userRepository->findById($_SESSION['uid']);

        return $currentUser;
    }

    public static function canAccessInvoiveShow()
    {
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
        if (in_array(self::$owner, self::getCurrentUser()->getRoleNames())) {
            return true;
        }

        return false;
    }

    public static function canAccessHardwareShow()
    {
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
