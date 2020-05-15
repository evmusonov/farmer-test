<?php

namespace models;

class File
{
    private string $name;
    private string $type;
    private string $tmpName;
    private int $error;
    private int $size;

    public function __construct(string $name, string $type, string $tmpName, int $error, int $size)
    {
        $this->name = $name;
        $this->type = $type;
        $this->tmpName = $tmpName;
        $this->error = $error;
        $this->size = $size;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name) : void
    {
        if (!empty($name)) {
            $this->name = $name;
        }
    }
}