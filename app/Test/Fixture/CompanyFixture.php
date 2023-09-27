<?php

class CompanyFixture extends CakeTestFixture {

	public $fields = [
		'id' => ['type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'],
		'name' => ['type' => 'string', 'null' => false],
		'created' => ['type' => 'datetime', 'null' => false],
		'modified' => ['type' => 'datetime', 'null' => false],
		'indexes' => [

		],
		'tableParameters' => []
	];

	public $records = [
		[
			'id' => 1,
			'name' => 'Muggles Inc.',
			'created' => '2023-09-27 13:51:56',
			'modified' => '2023-09-27 13:51:56'
		],
		[
			'id' => 2,
			'name' => 'Hogwarts',
			'created' => '2023-09-27 13:51:56',
			'modified' => '2023-09-27 13:51:56'
		],
	];

}
