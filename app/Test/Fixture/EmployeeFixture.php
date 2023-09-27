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

	public function init()
	{
		$this->records[] = [
			'id' => 1,
			'company_id' => 1,
			'name' => 'Frank Bryce',
			'payroll_schedule' => 'bi-weekly',
			'start_date' => date('Y-m-d'),
			'end_date' => null,
			'is_admin' => 1,
			'created' => '2023-09-27 13:52:01',
			'modified' => '2023-09-27 13:52:01'
		];

		$this->records[] = [
			'id' => 2,
			'company_id' => 1,
			'name' => 'Tobias Snape',
			'payroll_schedule' => 'monthly',
			'start_date' => date('Y-m-d'),
			'end_date' => null,
			'is_admin' => 0,
			'created' => '2023-09-27 13:52:01',
			'modified' => '2023-09-27 13:52:01'
		];

		$this->records[] = [
			'id' => 3,
			'company_id' => 1,
			'name' => 'Vernon Dursley',
			'payroll_schedule' => 'bi-weekly',
			'start_date' => date('Y-m-d'),
			'end_date' => null,
			'is_admin' => 0,
			'created' => '2023-09-27 13:52:01',
			'modified' => '2023-09-27 13:52:01'
		];

		$this->records[] = [
			'id' => 4,
			'company_id' => 2,
			'name' => 'Dumbledore',
			'payroll_schedule' => 'bi-monthly',
			'start_date' => date('Y-m-d'),
			'end_date' => null,
			'is_admin' => 1,
			'created' => '2023-09-27 13:52:01',
			'modified' => '2023-09-27 13:52:01'
		];

		$this->records[] = [
			'id' => 5,
			'company_id' => 2,
			'name' => 'Harry',
			'payroll_schedule' => 'bi-monthly',
			'start_date' => date('Y-m-d'),
			'end_date' => null,
			'is_admin' => 0,
			'created' => '2023-09-27 13:52:01',
			'modified' => '2023-09-27 13:52:01'
		];

		$this->records[] = [
			'id' => 6,
			'company_id' => 2,
			'name' => 'Ron',
			'payroll_schedule' => 'bi-monthly',
			'start_date' => date('Y-m-d'),
			'end_date' => null,
			'is_admin' => 0,
			'created' => '2023-09-27 13:52:01',
			'modified' => '2023-09-27 13:52:01'
		];

		parent::init();
	}
}
