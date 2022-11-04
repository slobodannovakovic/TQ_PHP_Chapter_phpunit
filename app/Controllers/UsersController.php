<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Contracts\DataRepositoryInterface;
use App\Controllers\Controller;

class UsersController extends Controller {
	public function __construct(private DataRepositoryInterface $dataRepo) {}

	public function index(): array {
		return $this->dataRepo->all();
	}

	public function find(int $id): \stdClass {
		return $this->dataRepo->find($id);
	}
}