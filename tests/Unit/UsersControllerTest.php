<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;

class UsersControllerTest extends TestCase {
	public function setUp(): void {
		$this->dbResource = file_get_contents(dirname(__DIR__).'/../db-response.json');
		$this->DBRepository = $this->createMock(\App\Repositories\DBRepository::class);
		$this->apiResource = file_get_contents(dirname(__DIR__).'/../api-response.json');
		$this->APIRepository = $this->createMock(\App\Repositories\APIRepository::class);
	}

	/** @test */
	public function can_fetch_all_users_from_db_resource(): void {
		$this->DBRepository->method('all')->willReturn(json_decode($this->dbResource));
		$usersController = new \App\Controllers\UsersController($this->DBRepository);

		$users = $usersController->index();

		$this->assertSame('DB', $users[0]->source);
		$this->assertCount(10, $users);
	}

	/** @test */
	public function can_find_specific_user_from_db_resource(): void {
		$this->DBRepository->method('find')->willReturn(json_decode($this->dbResource)[0]);
		$usersController = new \App\Controllers\UsersController($this->DBRepository);

		$user = $usersController->find(1);

		$this->assertSame('DB', $user->source);
		$this->assertSame(1, $user->id);
	}

	/** @test */
	public function can_fetch_all_users_from_api_resource(): void {
		$this->APIRepository->method('all')->willReturn(json_decode($this->apiResource));
		$usersController = new \App\Controllers\UsersController($this->APIRepository);

		$users = $usersController->index();

		$this->assertSame('API', $users[0]->source);
		$this->assertCount(10, $users);
	}

	/** @test */
	public function can_find_specific_user_from_api_resource(): void {
		$this->APIRepository->method('find')->willReturn(json_decode($this->apiResource)[0]);
		$usersController = new \App\Controllers\UsersController($this->APIRepository);

		$user = $usersController->find(1);

		$this->assertSame('API', $user->source);
		$this->assertSame(1, $user->id);
	}
}