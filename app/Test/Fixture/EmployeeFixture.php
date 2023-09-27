<?php

class EmployeeFixture extends CakeTestFixture {

	public $fields = [
		'id' => ['type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'],
		'company_id' => ['type' => 'integer', 'null' => true, 'default' => null],
		'name' => ['type' => 'string', 'null' => false],
		'payroll_schedule' => ['type' => 'string', 'null' => true, 'default' => null],
		'start_date' => ['type' => 'date', 'null' => true, 'default' => null],
		'end_date' => ['type' => 'date', 'null' => true, 'default' => null],
		'is_admin' => ['type' => 'boolean', 'null' => false],
		'created' => ['type' => 'datetime', 'null' => false],
		'modified' => ['type' => 'datetime', 'null' => false],
		'indexes' => [
			'employees_company_id_index' => ['column' => 'company_id', 'unique' => false]
		],
		'tableParameters' => []
	];

	public $records = [];
}
