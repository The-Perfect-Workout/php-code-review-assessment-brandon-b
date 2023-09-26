## Language & Tools

- PHP v8.2
- [Composer](https://getcomposer.org/) - as a dependency manager for PHP
- [CakePHP 2.x](https://book.cakephp.org/2/en/index.html) - PHP framework for web applications
- [SQLite](https://www.sqlite.org/) for the database
- [PHPUnit](https://phpunit.de/) for unit tests

Before continuing to the next steps, you'll need PHP 8.2 and Composer installed on your computer. The other tools will be installed with Composer.

### Project Setup

The following instructions are used to run and use the application. These instructions are written for a Mac/Linux/WSL (Windows Subsystem for Linux) environment. If you are running on Windows and not using WSL, you might need to modify the commands slightly.

```bash
# Install dependencies
$ composer install

# Run a local web server
$ php -S localhost:8000

# Create the database locally
$ symfony console doctrine:migrations:migrate

# Refresh seed data to make data relevant to today
$ symfony console doctrine:fixtures:load -n

# Run example scenario
$ symfony console ProcessPayrollNotificationsCommand

# Create the database for testing
$ symfony console doctrine:migrations:migrate --env=test

# Run tests
$ composer test
```
