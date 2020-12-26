<?php

class Gear
{
    private int $id;
    private int $purchaseInvoiceID;
    private int $userID;
    private string $name;
    private string $serialNumber;
    private string $notes;
    private float $netValue;
    private DateTime $warrantyDate;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

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
     * Get the value of serialNumber
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * Set the value of serialNumber
     *
     * @return  self
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;

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
     * Get the value of netValue
     */
    public function getNetValue()
    {
        return $this->netValue;
    }

    /**
     * Set the value of netValue
     *
     * @return  self
     */
    public function setNetValue($netValue)
    {
        $this->netValue = $netValue;

        return $this;
    }

    /**
     * Get the value of warrantyDate
     */
    public function getWarrantyDate()
    {
        return $this->warrantyDate;
    }

    /**
     * Set the value of warrantyDate
     *
     * @return  self
     */
    public function setWarrantyDate($warrantyDate)
    {
        $this->warrantyDate = $warrantyDate;

        return $this;
    }
}
