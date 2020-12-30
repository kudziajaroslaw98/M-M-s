<?php

class Software
{
    private $softwareID;
    private int $userID;
    private $purchaseInvoiceID;
    private string $name;
    private string $licenceKey;
    private $notes;
    private $expirationDate;
    private $techSupportDate;

    /**
     * Get the value of softwareID
     */
    public function getSoftwareID()
    {
        return $this->softwareID;
    }

    /**
     * Set the value of softwareID
     *
     * @return  self
     */
    public function setSoftwareID($softwareID)
    {
        $this->softwareID = $softwareID;

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

    /**
     * Get the value of purchaseInvoiceID
     */
    public function getPurchaseInvoiceID()
    {
        return $this->purchaseInvoiceID;
    }

    /**
     * Set the value of purchaseInvoiceID
     *
     * @return  self
     */
    public function setPurchaseInvoiceID($purchaseInvoiceID)
    {
        $this->purchaseInvoiceID = $purchaseInvoiceID;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of licenceKey
     */
    public function getLicenceKey()
    {
        return $this->licenceKey;
    }

    /**
     * Set the value of licenceKey
     *
     * @return  self
     */
    public function setLicenceKey($licenceKey)
    {
        $this->licenceKey = $licenceKey;

        return $this;
    }

    /**
     * Get the value of notes
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set the value of notes
     *
     * @return  self
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get the value of expirationDate
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    /**
     * Set the value of expirationDate
     *
     * @return  self
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * Get the value of techSupportDate
     */
    public function getTechSupportDate()
    {
        return $this->techSupportDate;
    }

    /**
     * Set the value of techSupportDate
     *
     * @return  self
     */
    public function setTechSupportDate($techSupportDate)
    {
        $this->techSupportDate = $techSupportDate;

        return $this;
    }
}
