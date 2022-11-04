<?php
declare(strict_types=1);

namespace App\Contracts;

interface DataRepositoryInterface {
	public function all(): array;

	public function find(int $id): \stdClass;
}