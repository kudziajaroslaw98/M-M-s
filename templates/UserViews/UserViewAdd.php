<?php

class UserViewAdd
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <?= Layout::header($params); ?>
        <form class='col-12' method="POST">
            <div class='row col-12'>
                <div class='row col-12'>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="FirstName">First Name</label>
                            <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="FirstName">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="LastName">Last Name</label>
                            <input type="text" class="form-control" id="LastName" name="LastName" placeholder="LastName">
                        </div>
                    </div>
                </div>
                <div class='row col-12'>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="Jobtitle">Job Title</label>
                            <input type="text" class="form-control" id="Jobtitle" name="Jobtitle" placeholder="Jobtitle">
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="form-group">
                            <label for="PhoneNumber">Phone Number</label>
                            <input type="number" class="form-control" id="PhoneNumber" name="PhoneNumber" placeholder="PhoneNumber">
                        </div>
                    </div>
                </div>

                <div class="row col-12">
                    <div class='col-4 offset-md-4'>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-user btn-block form-control-input" id="AddEqSubmit">
                        </div>
                    </div>
                </div>

            </div>
        </form>

        <div class="info">
            <?= self::addUser() ?>
        </div>

        <?= Layout::footer() ?>
<?php
        $html = ob_get_clean();
        return $html;
    }

    private static function addUser()
    {
        try {
            if (!empty($_POST)) {
                // security
                $dataForm = new DataForm($_POST);
                $dataForm->sanitizeData();
                $dataForm->checkIfExistsData();

                // validate phone number
                if (!is_numeric($dataForm->data['PhoneNumber'])) {
                    throw new InvalidInputExcetion('Given phone number is not number!');
                }
                if (strlen($dataForm->data['PhoneNumber']) != 9) {
                    throw new InvalidInputExcetion('Given phone number is invalid!');
                }

                // remove all whitespaces from FirstName and LastName
                $dataForm->data['FirstName'] = preg_replace('/\s+/', '', $dataForm->data['FirstName']);
                $dataForm->data['LastName'] = preg_replace('/\s+/', '', $dataForm->data['LastName']);

                // create login
                $login = strtolower(substr($dataForm->data['FirstName'], 0, 1)) . ucfirst($dataForm->data['LastName']);

                // hash password; default password is the same as login
                $password = password_hash($login, PASSWORD_DEFAULT);

                // create entity object
                $user = new User();
                $user->setUserID(null)->setFirstName($dataForm->data['FirstName'])->setLastName($dataForm->data['LastName'])->setJobtitle($dataForm->data['Jobtitle'])->setPhoneNumber($dataForm->data['PhoneNumber'])->setLogin($login)->setPassword($password);

                // repository and result
                $userRepository = new UserRepository();
                $result = $userRepository->insert($user);

                // something goes wrong
                if (!$result) {
                    throw new PDOException('Request processing error.');
                }

                // all OK
                echo NotificationController::renderViewSuccess('User has been added.');
            }
        } catch (Exception $e) {
            echo NotificationController::renderViewDanger($e->getMessage());
        }
    }
}
