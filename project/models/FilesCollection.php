<?php

namespace models;

class FilesCollection
{
    private array $files = [];

    public function getAllFiles() : array
    {
        return $this->files;
    }

    public function addFile(File $file) : bool
    {
        if (!in_array($file, $this->files)) {
            $this->files[] = $file;
            return true;
        }

        return false;
    }

    public function getFile(int $index) : ?File
    {
        if (isset($this->files[$index])) {
            return $this->files[$index];
        }

        return null;
    }

    public function __clone()
    {
        foreach ($this->files as $index => $file) {
            $this->files[$index] = clone $file;
        }
    }
}