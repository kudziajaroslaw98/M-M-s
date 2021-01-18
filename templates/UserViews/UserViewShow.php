<?php

class UserViewShow
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <?= Layout::header($params); ?>

        <div class="UsersFound card">

            <h5 class="card-header">Found Users</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Login</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Job Title</th>
                                <th scope="col">Phone number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- <th scope="row">1</th>
                                <td>12312</td>
                                <td>Windows 10</td>
                                <td>1.10.2025</td>
                                <td>64712-15212-24124-12421</td>
                                <td>49129</td>
                                <td>19.12.2025</td>
                                <td>Jaroslaw Kudzia</td>
                                <td>Aktywny</td> -->
                            </tr>
                            <?= self::renderUsersRows() ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <?= Layout::footer() ?>
<?php
        $html = ob_get_clean();
        return $html;
    }

    public static function renderUsersRows()
    {
        // repositories
        $userRepository = new UserRepository();

        // result entities
        $users = $userRepository->select();

        // render results
        $i = 1;
        foreach ($users as $key => &$user) {
            self::renderRow($user, $i);
            $i++;
        }
    }

    public static function renderRow(User &$user, int $lp)
    {
        echo "
    <tr>
        <th scope='row'>$lp</th>
        <td>" . $user->getLogin() . "</td>
        <td>" . $user->getFirstName() . "</td>
        <td>" . $user->getLastName() . "</td>
        <td>" . $user->getJobtitle() . "</td>
        <td>" . $user->getPhoneNumber() . "</td>
    </tr>
    ";
    }
}
