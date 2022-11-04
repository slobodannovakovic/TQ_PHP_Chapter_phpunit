<?php

declare(strict_types=1);

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase {

	/** @test */
	public function string_contains_php() : void {
		$this->assertStringContainsString('PHP', \App\Writer::write('Using PHPUnit'));
	}

}