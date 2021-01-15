<?php

class Role
{
    private $roleID;
    private string $roleName;

    /**
     * Get the value of roleID
     */
    public function getRoleID()
    {
        return $this->roleID;
    }

    /**
     * Set the value of roleID
     *
     * @return  self
     */
    public function setRoleID($roleID)
    {
        $this->roleID = $roleID;

        return $this;
    }

    /**
     * Get the value of roleName
     */
    public function getRoleName()
    {
        return $this->roleName;
    }

    /**
     * Set the value of roleName
     *
     * @return  self
     */
    public function setRoleName($roleName)
    {
        $this->roleName = $roleName;

        return $this;
    }
}
