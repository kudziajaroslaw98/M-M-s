<?php

require_once __DIR__ . './../autoload.php';

session_start();
$_SESSION['records-limit'] = 4;
$page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
$action = isset($_GET['action']) ? $_GET['action'] : null;
$actionPartOne = explode('-', $action)[0];

switch ($actionPartOne) {
    case 'hardware':
        HardwareHandler::handle($action);
        break;
    case 'invoice':
        InvoiceHandler::handle($action);
        break;
    case 'license':
        LicenseHandler::handle($action);
        break;
    case 'doc':
        DocHandler::handle($action);
        break;
    default:
        header('Location: home.php?action=hardware-add');
        break;
}
