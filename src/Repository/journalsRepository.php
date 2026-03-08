<?php

namespace App\Repository;

use App\Models\Journal;
use App\Repository\IJournalsRepository;
use PDO;

class journalsRepository implements IJournalsRepository
{

    public $test_conn;

    function __construct()
    {
        global $test_conn;
        $this->test_conn = $test_conn;
    }

    function getAll(): array
    {
        $stmt = $this->test_conn->query("SELECT * FROM journals");
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
        $journals = [];
        foreach ($rows as $row) {
            $journals[] = new Journal($row->id, $row->name, $row->date);
        }

        return $journals;
    }

    function add(Journal $journal): void
    {
        $stmt = $this->test_conn->prepare("INSERT INTO journals (name, date) VALUES (:name, :date)");
        var_dump($journal);
        $stmt->execute([':name' => $journal->name, ':date' => $journal->date]);
    }

    function get(int $id): Journal
    {
        $stmt = $this->test_conn->prepare("SELECT * FROM journals WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $value = new Journal($row->id, $row->name, $row->date);
        return $value;
    }

    function save(Journal $journal): void
    {
        var_dump($journal);
        $stmt = $this->test_conn->prepare("UPDATE journals SET name = :name, date = :date WHERE id = :id");
        $stmt->execute([':id' => $journal->id, ':name' => $journal->name, ':date' => $journal->date]);
    }

    function delete(int $id): void
    {
        $stmt = $this->test_conn->prepare("DELETE FROM journals WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
