<?php

class Document
{
    private int $documentID;
    private $uploadTime;
    private $lastModificationTime;
    private $notes;
    private string $filePath;
    private string $editor;

    /**
     * Get the value of documentID
     */
    public function getDocumentID()
    {
        return $this->documentID;
    }

    /**
     * Set the value of documentID
     *
     * @return  self
     */
    public function setDocumentID($documentID)
    {
        $this->documentID = $documentID;

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
     * @return string
     */
    public function getEditor(): string
    {
        return $this->editor;
    }

    /**
     * @param string $editor
     */
    public function setEditor(string $editor): void
    {
        $this->editor = $editor;
    }

}
