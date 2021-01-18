<?php

class RoleViewShow
{
    public static function render(array $params = array())
    {
        ob_start();
?>
        <?= Layout::header($params); ?>

        <div class="RolesFound card">

            <h5 class="card-header">Found Roles</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role ID</th>
                                <th scope="col">Role Name</th>
                            </tr>
                        </thead>
                        <tbody>
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
        $roleRepository = new RoleRepository();

        // result entities
        $roles = $roleRepository->select();

        // render results
        $i = 1;
        foreach ($roles as $key => &$role) {
            self::renderRow($role, $i);
            $i++;
        }
    }

    public static function renderRow(Role &$role, int $lp)
    {
        echo "
    <tr>
        <th scope='row'>$lp</th>
        <td>" . $role->getRoleID() . "</td>
        <td>" . $role->getRoleName() . "</td>
    </tr>
    ";
    }
}
