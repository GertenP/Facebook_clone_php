<?php
namespace App\Service;

use App\Models\Journal;
use App\Repository\journalsRepository;

class JournalsService implements IjournalsService
{

    private journalsRepository $_journalsRepository;

    function __construct(journalsRepository $JournalsRepository)
    {
        $this->_journalsRepository = $JournalsRepository;
    }


	function getAll(): array {
        return $this->_journalsRepository->getAll();
    }
	
	function add(Journal $journal): void {
        $this->_journalsRepository->add($journal);
    }
	
	function get(int $id): Journal {
        return $this->_journalsRepository->get($id);
    }
	
	function save(Journal $journal): void {
        $this->_journalsRepository->save($journal);
    }
	
	function delete(int $id): void {
        $this->_journalsRepository->delete($id);
    }
}