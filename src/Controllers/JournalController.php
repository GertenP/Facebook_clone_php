<?php

namespace App\Controllers;

use App\Controller;
use App\Service\JournalsService;
use App\Repository\journalsRepository;
use App\Models\Journal;

class JournalController extends Controller
{
    private JournalsService $_journalsService;

    function __construct()
    {
        $repository = new journalsRepository();
        $this->_journalsService = new JournalsService($repository);
    }

    public function index()
    {
        $journals = $this->_journalsService->getAll();
        $this->render('index', ['journals' => $journals]);
    }

    public function details()
    {
        $id = $_GET['id'];
        $journal = $this->_journalsService->get($id);
        $this->render('details', ['journals' => $journal]);
    }

    public function edit()
    {
        $id = $_GET['id'];
        $journal = $this->_journalsService->get($id);
        $this->render('edit', ['journals' => $journal]);
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $date = $_POST['date'];

        $journal = new Journal($id, $name, $date);
        $this->_journalsService->save($journal);

        header('Location: /journals');
    }

    public function delete()
    {
        $id = $_GET['id'];
        $journal = $this->_journalsService->get($id);
        $this->render('delete', ['journals' => $journal]);
    }


    public function remove()
    {
        $id = $_POST['id'];
        $journal = $this->_journalsService->delete($id);
        header('Location: /journals');
    }

    public function create()
    {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $journal = new Journal(null, $name, $date);  // ← id on null
        $journal = $this->_journalsService->add($journal);
        header('Location: /journals');
    }
}
