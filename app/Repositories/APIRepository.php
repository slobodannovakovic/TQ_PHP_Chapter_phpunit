<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\DataRepositoryInterface;

class APIRepository implements DataRepositoryInterface {
	private array $data;

	public function __construct() {
		$this->data = json_decode(file_get_contents(dirname(__DIR__).'/../api-response.json'));
	}

	public function all(): array {
		return $this->data;
	}

	public function find(int $id): \stdClass {
		return $this->data[$id - 1];
	}
}