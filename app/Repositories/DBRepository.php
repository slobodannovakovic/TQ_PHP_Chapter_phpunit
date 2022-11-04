<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\DataRepositoryInterface;
use App\Models\User;

class DBRepository implements DataRepositoryInterface {
	public function all(): array {
		return (new User)->all();
	}

	public function find(int $id): \stdClass {
		return (new User)->find(1);
	}
}