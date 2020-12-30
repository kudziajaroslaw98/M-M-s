<?php

abstract class Invoice
{
    private int $ID;
    private string $uploadTime;
    private string $lastModificationTime;
    private string $contractorData;
    private float $amountNetto;
    private float $amountBrutto;
    private string $transactionDate;
    private string $notes;
    private string $filePath;
    private string $currency;
    private float $vat;

    /**
     * Get the value of purchaseInvoiceID
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Set the value of purchaseInvoiceID
     *
     * @return  self
     */
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * Get the value of uploadTime
     */
    public function getUploadTime()
    {
        return $this->uploadTime;
    }

    /**
     * Set the value of uploadTime
     *
     * @return  self
     */
    public function setUploadTime($uploadTime)
    {
        $this->uploadTime = $uploadTime;

        return $this;
    }

    /**
     * Get the value of lastModificationTime
     */
    public function getLastModificationTime()
    {
        return $this->lastModificationTime;
    }

    /**
     * Set the value of lastModificationTime
     *
     * @return  self
     */
    public function setLastModificationTime($lastModificationTime)
    {
        $this->lastModificationTime = $lastModificationTime;

        return $this;
    }

    /**
     * Get the value of contractorData
     */
    public function getContractorData()
    {
        return $this->contractorData;
    }

    /**
     * Set the value of contractorData
     *
     * @return  self
     */
    public function setContractorData($contractorData)
    {
        $this->contractorData = $contractorData;

        return $this;
    }

    /**
     * Get the value of amountNetto
     */
    public function getAmountNetto()
    {
        return $this->amountNetto;
    }

    /**
     * Set the value of amountNetto
     *
     * @return  self
     */
    public function setAmountNetto($amountNetto)
    {
        $this->amountNetto = $amountNetto;

        return $this;
    }

    /**
     * Get the value of amountBrutto
     */
    public function getAmountBrutto()
    {
        return $this->amountBrutto;
    }

    /**
     * Set the value of amountBrutto
     *
     * @return  self
     */
    public function setAmountBrutto($amountBrutto)
    {
        $this->amountBrutto = $amountBrutto;

        return $this;
    }

    /**
     * Get the value of transactionDate
     */
    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    /**
     * Set the value of transactionDate
     *
     * @return  self
     */
    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;

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
     * Get the value of filePath
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * Set the value of filePath
     *
     * @return  self
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * Get the value of currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set the value of currency
     *
     * @return  self
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get the value of vat
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * Set the value of vat
     *
     * @return  self
     */
    public function setVat($vat)
    {
        $this->vat = $vat;

        return $this;
    }
}
