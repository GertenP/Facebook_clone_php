<?php

namespace App\Models;

class Journal
{
    public $id;
    public $name;
    public $date;

    public function __construct(?int $id, $name, $date)
    {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
    }
}