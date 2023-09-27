<?php

App::uses('AppController', 'Controller');
App::uses('Sqlite', 'Model/Datasource/Database');

class DataController extends AppController {
	public function initialize() {
		$this->autoRender = false;

		echo 'Connecting to database...<br><br>';
		$sqlite = new Sqlite([
			'datasource' => 'Database/Sqlite',
			'persistent' => false,
			'database' => 'example_database',
			'prefix' => '',
			'encoding' => 'utf8',
		]);

		echo 'Creating `companies` table...<br>';
		$sqlite->execute('CREATE TABLE IF NOT EXISTS `companies` (
			`id` INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
			`name` VARCHAR(255) NOT NULL,
			`created` DATETIME NOT NULL,
			`modified` DATETIME NOT NULL
		)');

		echo 'Creating `employees` table...<br>';
		$sqlite->execute('CREATE TABLE IF NOT EXISTS `employees` (
			`id` INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
			`company_id` INTEGER DEFAULT NULL
				CONSTRAINT `employees_companies_id_fk` REFERENCES `companies`,
			`name` VARCHAR(255) NOT NULL,
			`payroll_schedule` VARCHAR(255) DEFAULT NULL,
			`start_date` DATE DEFAULT NULL,
			`end_date` DATE DEFAULT NULL,
			`is_admin` BOOLEAN NOT NULL,
			`created` DATETIME NOT NULL,
			`modified` DATETIME NOT NULL
		)');

		echo 'Creating indexes for `employees` tables...<br>';
		$sqlite->execute('CREATE INDEX IF NOT EXISTS `employees_company_id_index` on `employees` (`company_id`)');

		echo '<br>';
		echo 'Database initialization complete.<br>';
	}
}
