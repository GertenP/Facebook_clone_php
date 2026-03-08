<?php

namespace App\Service;

use App\Models\Journal;

interface IjournalsService{

    function getAll(): array;
    function add(Journal $journal): void;
    function get(int $id): Journal;
    function save(Journal $journal): void;
    function delete(int $id): void;
    
}