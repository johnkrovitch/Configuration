.PHONY: tests tests.ci tests.stop-on-failure php-cs-fixer.fix php-cs-fixer.ci phpstan.analyse phpunit.run tests.stop-on-failure bc.check tests.var-dump-checker.ci

# PHPUnit
tests: phpunit.run php-cs-fixer.fix phpstan.analyse tests.var-dump-checker

tests.ci: phpunit.run php-cs-fixer.ci phpstan.analyse tests.var-dump-checker.ci

tests.stop-on-failure:
	bin/phpunit --stop-on-failure -v

phpunit.run:
	bin/phpunit
	@echo "Results file generated file://$(current_dir)/var/phpunit/coverage/index.html"

phpunit.run.stop-on-failure:
	bin/phpunit --stop-on-failure
	@echo "Results file generated file://$(current_dir)/var/phpunit/coverage/index.html"

# CodeStyle
php-cs-fixer.fix:
	bin/php-cs-fixer fix --allow-risky=yes

php-cs-fixer.ci:
	bin/php-cs-fixer fix --allow-risky=yes --dry-run --using-cache=no --verbose

php-cs-fixer.install:
	@echo "Install binary using composer (globally)"
	composer require friendsofphp/php-cs-fixer
	@echo "Exporting composer binary path"
	@export PATH="$PATH:$HOME/.composer/vendor/bin"

phpstan.analyse:
	bin/phpstan analyse --level=5 src
	bin/phpstan analyse --level=1 tests

# Misc
bc.check:
	bin/roave-backward-compatibility-check

tests.var-dump-checker:
	bin/var-dump-check --symfony --exclude vendor --exclude demo .

tests.var-dump-checker.ci: tests.var-dump-checker
