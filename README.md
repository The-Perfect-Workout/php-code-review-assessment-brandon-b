## Language & Tools

- PHP 8.2
- [Composer](https://getcomposer.org/) - as a dependency manager for PHP
- [CakePHP 2.x](https://book.cakephp.org/2/en/index.html) - PHP framework for web applications
- [SQLite](https://www.sqlite.org/) for the database
- [PHPUnit](https://phpunit.de/) for unit tests

Before continuing to the next steps, you'll need PHP 8.2 and Composer installed on your computer. The other tools will be installed with Composer.

### Project Setup

The following instructions are used to run and use the application. These instructions are written for a Mac/Linux/WSL (Windows Subsystem for Linux) environment with PHP 8.2 installed. If you are running on Windows and not using WSL, you might need to modify the commands slightly.

```bash
# Install dependencies
$ composer install

# Run a local web server
$ php -S localhost:8000

# Initialize the database
$ http://localhost:8000/data/initialize

# Run example scenario
$ http://localhost:8000/cron/processPayrollNotifications

# Run tests
$ composer test
```
