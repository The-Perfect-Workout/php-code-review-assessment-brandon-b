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

	public $records = [];

}
