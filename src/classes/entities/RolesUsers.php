<?php

class RolesUsers
{
    private int $roleID;
    private int $userID;

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
     * Get the value of userID
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * Set the value of userID
     *
     * @return  self
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;

        return $this;
    }
}
