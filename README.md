# wp-mock-test-demo
Dummy plugin for demonstrating WP_Mock unit testing in a WordPress Plugin

## Installation

First, clone this repository to your `wp-content/plugins`:

```bash
git clone https://github.com/codex-m/wp-mock-test-demo.git
```

Then go to `wp-content/plugins/wp-mock-test-demo/` in terminal to install third party libraries with:

```bash
composer install
```

Finally, you can run the test inside the wp-content/plugins/wp-mock-test-demo directory in terminal:

```bash
./vendor/bin/phpunit --configuration phpunit.xml
```

For details, please follow this [tutorial](https://www.php-developer.org/wp_mock-phpunit-testing-framework-wordpress-plugin-complete-guide/).