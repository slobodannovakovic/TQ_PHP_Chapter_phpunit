<?php
declare(strict_types=1);

namespace App\Models;

abstract class Model {
	private array $data;

	public function __construct() {
		$this->data = json_decode(file_get_contents(dirname(__DIR__).'/../db-response.json'));
	}

	public function all(): array {
		return $this->data;
	}

	public function find(int $id): \stdClass {
		return $this->data[$id - 1];
	} 
}