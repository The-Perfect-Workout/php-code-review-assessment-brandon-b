<?php

namespace AC\Lib;

use ClassRegistry;
use Employee;

class PayrollNotificationsLib
{
	private Employee $employee;

	public function __construct()
	{
		/** @noinspection PhpFieldAssignmentTypeMismatchInspection */
		$this->employee = ClassRegistry::init('Employee');
	}

	public function getPayrollNotifications(\DateTimeInterface $today): array
	{
		$payrollNotifications = [];

		$employees = $this->employee->find('all', [
			'conditions' => [],
			'contain' => [],
		]);

		foreach ($employees as $employee) {
			$end_date = $employee['Employee']['end_date'] ? null : new \DateTimeImmutable($employee['Employee']['end_date']);

			if (null === $end_date || $end_date > $today) {
				$start_date = new \DateTimeImmutable($employee['Employee']['start_date']);

				if ('bi-weekly' === $employee['Employee']['payroll_schedule'] && 0 == $today->diff($start_date)->days % 14) {
					$allAdmins = $this->employee->find('all', [
						'conditions' => [
							'is_admin' => true,
							'company_id' => $employee['Employee']['company_id'],
						],
						'contain' => [],
					]);

					foreach ($allAdmins as $admin) {
						$payrollNotifications[] = [
							'admin' => $admin,
							'employee' => $employee,
						];
					}
				} elseif ('bi-monthly' === $employee['Employee']['payroll_schedule'] && 15 == $today->format('d')) {
					$allAdmins = $this->employee->find('all', [
						'conditions' => [
							'is_admin' => true,
							'company_id' => $employee['Employee']['company_id'],
						],
						'contain' => [],
					]);

					foreach ($allAdmins as $admin) {
						$payrollNotifications[] = [
							'admin' => $admin,
							'employee' => $employee,
						];
					}
				} elseif ('monthly' === $employee['Employee']['payroll_schedule'] && 1 == $today->format('d')) {
					$allAdmins = $this->employee->find('all', [
						'conditions' => [
							'is_admin' => true,
							'company_id' => $employee['Employee']['company_id'],
						],
						'contain' => [],
					]);

					foreach ($allAdmins as $admin) {
						$payrollNotifications[] = [
							'admin' => $admin,
							'employee' => $employee,
						];
					}
				}
			}
		}

		return $payrollNotifications;
	}
}
