<?php

use AC\Lib\PayrollNotificationsLib;

class PayrollNotificationsLibTest extends CakeTestCase
{
	private PayrollNotificationsLib $payrollNotificationsLib;
	private Company $company;
	private Employee $employee;

	public array $fixtures = [
		'company',
		'employee',
	];

	public function setUp()
	{
		$this->payrollNotificationsLib = new PayrollNotificationsLib();

		/** @noinspection PhpFieldAssignmentTypeMismatchInspection */
		$this->company = ClassRegistry::init('Company');

		/** @noinspection PhpFieldAssignmentTypeMismatchInspection */
		$this->employee = ClassRegistry::init('Employee');

		parent::setUp();
	}

	private function createCompany(): array
	{
		$this->company->create();
		return $this->company->save([
			'name' => 'Test Company',
		]);
	}

	private function createEmployee($name, $schedule, $startDate, $isAdmin, $company): array
	{
		$this->employee->create();
		return $this->employee->save([
			'name' => $name,
			'payroll_schedule' => $schedule,
			'start_date' => $startDate,
			'is_admin' => $isAdmin,
			'company_id' => $company['Company']['id'],
		]);
	}

	public function testMonthlyNotificationsFirstOfMonth()
	{
		$company = $this->createCompany();
		$harry = $this->createEmployee('Harry', 'monthly', '2022-01-01', false, $company);
		$hermione = $this->createEmployee('Hermione', 'monthly', '2022-01-01', true, $company);

		$frozenTime = new DateTimeImmutable('2023-01-01');
		$notifications = $this->payrollNotificationsLib->getPayrollNotifications($frozenTime);

		$this->assertCount(2, $notifications);
	}

	public function testMonthlyNotificationsNotOnFirstDayOfMonth()
	{
		$company = $this->createCompany();
		$harry = $this->createEmployee('Harry', 'monthly', '2022-01-01', false, $company);
		$hermione = $this->createEmployee('Hermione', 'monthly', '2022-01-01', true, $company);

		$frozenTime = new DateTimeImmutable('2023-01-02');
		$notifications = $this->payrollNotificationsLib->getPayrollNotifications($frozenTime);

		$this->assertCount(0, $notifications);
	}

	public function testBiWeeklyNotificationOnFollowingThursday()
	{
		$company = $this->createCompany();
		$harry = $this->createEmployee('Harry', 'bi-weekly', '2023-01-03', false, $company);
		$hermione = $this->createEmployee('Hermione', 'bi-weekly', '2023-01-03', true, $company);

		$frozenTime = new DateTimeImmutable('2023-01-12');
		$notifications = $this->payrollNotificationsLib->getPayrollNotifications($frozenTime);

		$this->assertCount(2, $notifications);
	}

	public function testBiWeeklyNotificationsNotOnThursday()
	{
		$company = $this->createCompany();
		$harry = $this->createEmployee('Harry', 'bi-weekly', '2023-01-03', false, $company);
		$hermione = $this->createEmployee('Hermione', 'bi-weekly', '2023-01-03', true, $company);

		$frozenTime = new DateTimeImmutable('2023-01-13');
		$notifications = $this->payrollNotificationsLib->getPayrollNotifications($frozenTime);

		$this->assertCount(0, $notifications);
	}

	public function testBiMonthlyNotificationsMiddleOfMonth()
	{
		$company = $this->createCompany();
		$harry = $this->createEmployee('Harry', 'bi-monthly', '2022-01-01', false, $company);
		$hermione = $this->createEmployee('Hermione', 'bi-monthly', '2022-01-01', true, $company);

		$frozenTime = new DateTimeImmutable('2023-01-15');
		$notifications = $this->payrollNotificationsLib->getPayrollNotifications($frozenTime);

		$this->assertCount(2, $notifications);
	}

	public function testBiMonthlyNotificationsEndOfMonth()
	{
		$company = $this->createCompany();
		$harry = $this->createEmployee('Harry', 'bi-monthly', '2022-01-01', false, $company);
		$hermione = $this->createEmployee('Hermione', 'bi-monthly', '2022-01-01', true, $company);

		$frozenTime = new DateTimeImmutable('2023-01-31');
		$notifications = $this->payrollNotificationsLib->getPayrollNotifications($frozenTime);

		$this->assertCount(2, $notifications);
	}

	public function testBiMonthlyNotificationsFirstDayOfMonth()
	{
		$company = $this->createCompany();
		$harry = $this->createEmployee('Harry', 'bi-monthly', '2022-01-01', false, $company);
		$hermione = $this->createEmployee('Hermione', 'bi-monthly', '2022-01-01', true, $company);

		$frozenTime = new DateTimeImmutable('2023-01-01');
		$notifications = $this->payrollNotificationsLib->getPayrollNotifications($frozenTime);

		$this->assertCount(0, $notifications);
	}

	public function tearDown()
	{
		$this->company->deleteAll([]);
		$this->employee->deleteAll([]);

		parent::tearDown();
	}
}
