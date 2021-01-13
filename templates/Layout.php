<?php

class Layout
{
    public static function requires(string $title)
    {
        ob_start();
?>
        <title>M&M's Karczma - <?= $title ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="./dev_dependency/css/bootstrap.min.css" />
        <link rel="stylesheet" href="./styles/style.min.css" />
        <link rel="stylesheet" href="./styles/styles.css" />
        <link href="./fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script src="./scripts/jquery-3.5.1.min.js"></script>
        <script src="./dev_dependency/js/popper.min.js"></script>
        <script src="./dev_dependency/js/bootstrap.min.js"></script>
        <link href="./styles/sb-admin-2.min.css" rel="stylesheet">
    <?php
        $html = ob_get_clean();
        return $html;
    }

    public static function header(array $params = array())
    {
        ob_start();
    ?>

        <html lang="en">

        <head>
            <?= self::requires($params['title']) ?>
        </head>

        <body id="page-top">
            <div id="wrapper">
                <?= self::navbar() ?>
                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <!-- Main Content -->
                    <div id="content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                                <h1 class="h3 mb-0 text-gray-800"><?= $params['subtitle'] ?></h1>
                            </div>

                            <!-- Content Row -->
                            <div class="row col-lg-12 d-flex justify-content-center">
                                <div class='card col-sm-12'>
                                    <div class='card-body'>


                                    <?php
                                    $html = ob_get_clean();
                                    return $html;
                                }

                                public static function navbar()
                                {
                                    ob_start();
                                    ?>
                                        <!-- Sidebar -->
                                        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                                            <!-- Sidebar - Brand -->
                                            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                                                <div class="sidebar-brand-text mx-3">M&M's<sup>Karczma</sup></div>
                                            </a>

                                            <!-- Divider -->
                                            <hr class="sidebar-divider my-0">

                                            <!-- Nav Item - Dashboard -->
                                            <li class="nav-item active">
                                                <a class="nav-link" href="index.php">
                                                    <i class="fas fa-fw fa-tachometer-alt"></i>
                                                    <span>HOME</span></a>
                                            </li>

                                            <!-- Divider -->
                                            <hr class="sidebar-divider">

                                            <!-- Heading -->
                                            <div class="sidebar-heading">
                                                Interface
                                            </div>

                                            <!-- Nav Item - Pages Collapse Menu -->
                                            <li class="nav-item">
                                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                    <i class="fas fa-fw fa-cog"></i>
                                                    <span>Invoice</span>
                                                </a>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                                    <div class="bg-white py-2 collapse-inner rounded">
                                                        <h6 class="collapse-header">Options:</h6>
                                                        <?php if (AuthHelper::canAccessInvoiceAdd()) : ?><a class="collapse-item" href="index.php?action=invoice-add">Add Invoice</a><?php endif; ?>
                                                        <?php if (AuthHelper::canAccessInvoiveShow()) : ?><a class="collapse-item" href="index.php?action=invoice-show">Show Invoices</a><?php endif; ?>
                                                        <?php if (AuthHelper::canAccessInvoiceSearch()) : ?><a class="collapse-item" href="index.php?action=invoice-search">Search For Invoices</a><?php endif; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                                    <i class="fas fa-fw fa-cog"></i>
                                                    <span>Hardware</span>
                                                </a>
                                                <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                                    <div class="bg-white py-2 collapse-inner rounded">
                                                        <h6 class="collapse-header">Options:</h6>
                                                        <?php if (AuthHelper::canAccessHardwareShow()) : ?><a class="collapse-item" href="index.php?action=hardware-show">Show Hardware</a><?php endif; ?>
                                                        <?php if (AuthHelper::canAccessHardwareAdd()) : ?><a class="collapse-item" href="index.php?action=hardware-add">Add Hardware</a><?php endif; ?>
                                                        <?php if (AuthHelper::canAccessHardwareSearch()) : ?><a class="collapse-item" href="index.php?action=hardware-search">Search For Hardware</a><?php endif; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                                    <i class="fas fa-fw fa-cog"></i>
                                                    <span>Licences</span>
                                                </a>
                                                <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                                    <div class="bg-white py-2 collapse-inner rounded">
                                                        <h6 class="collapse-header">Options:</h6>
                                                        <?php if (AuthHelper::canAccessLicenseShow()) : ?><a class="collapse-item" href="index.php?action=license-show">Show Licences</a><?php endif; ?>
                                                        <?php if (AuthHelper::canAccessLicenseAdd()) : ?><a class="collapse-item" href="index.php?action=license-add">Add Licence</a><?php endif; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                                    <i class="fas fa-fw fa-cog"></i>
                                                    <span>Documents</span>
                                                </a>
                                                <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                                    <div class="bg-white py-2 collapse-inner rounded">
                                                        <h6 class="collapse-header">Options:</h6>
                                                        <?php if (AuthHelper::canAccessDocShow()) : ?><a class="collapse-item" href="index.php?action=doc-show">Show Documents</a><?php endif; ?>
                                                        <?php if (AuthHelper::canAccessDocAdd()) : ?><a class="collapse-item" href="index.php?action=doc-add">Add Documents</a><?php endif; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                                    <i class="fas fa-fw fa-cog"></i>
                                                    <span>Notification</span>
                                                </a>
                                                <div id="collapseSeven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                                    <div class="bg-white py-2 collapse-inner rounded">
                                                        <h6 class="collapse-header">Options:</h6>
                                                        <?php if (AuthHelper::canAccessLogout()) : ?><a class="collapse-item" href="Notification.php">Examples</a><?php endif; ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link collapsed" href="index.php?action=logout">
                                                    <i class="fas fa-fw fa-cog"></i>
                                                    <?php if (AuthHelper::canAccessLogout()) : ?><span>Logout</span><?php endif; ?>
                                                </a>
                                            </li>

                                            <!-- Sidebar Toggler (Sidebar) -->
                                            <div class="text-center d-none d-md-inline">
                                                <button class="rounded-circle border-0" id="sidebarToggle"></button>
                                            </div>

                                        </ul>
                                    <?php
                                    $html = ob_get_clean();
                                    return $html;
                                }


                                public static function footer()
                                {
                                    ob_start();
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; M&M's Karczma</span></br></br>
                                <span>Authors: Kudzia, Czarnota, Olejarczyk, Marcinkowski</span>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </body>

        </html>
<?php
                                    $html = ob_get_clean();
                                    return $html;
                                }
                            }
