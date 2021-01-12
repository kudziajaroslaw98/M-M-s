<?php

class LoginView
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <html lang="en">

        <head>
            <?= Layout::requires($params['title']) ?>
        </head>

        <body class="bg-gradient-primary d-flex align-items-center">

            <div class="container ">

                <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class="col-xl-10 col-lg-6 col-md-9">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                            </div>
                                            <form class="user" method="post">
                                                <div class="form-group">
                                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="login">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                                </div>
                                                <!-- <a href="templates/home.php" class="btn btn-primary btn-user btn-block">
                                                    Login
                                                </a> -->
                                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                            </form>
                                            <div class="info">
                                                <?= self::checkLogin() ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </body>

        </html>
<?php
        $html = ob_get_clean();
        return $html;
    }

    private static function checkLogin()
    {
        try {
            if (!empty($_POST)) {
                $dataForm = new DataForm($_POST);
                $dataForm->sanitizeData();
                $dataForm->checkIfExistsData();

                LoginController::set();
                header('Location: index.php?action=hardware-show');
            }
        } catch (Exception $e) {
            echo NotificationController::renderViewDanger($e->getMessage());
        }
    }
}
