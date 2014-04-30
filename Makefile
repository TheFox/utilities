
DELETE = rm -rf

default: install tests

install: composer.phar
	./composer.phar update

composer.phar:
	curl -sS https://getcomposer.org/installer | php

tests: test_phpunit test_phpcs

test_phpunit: phpunit.xml vendor/bin/phpunit
	vendor/bin/phpunit

test_phpcs: vendor/bin/phpcs vendor/thefox/phpcsrs/Standards/TheFox
	vendor/bin/phpcs -v -s --report=full --report-width=160 --standard=vendor/thefox/phpcsrs/Standards/TheFox src

clean:
	$(DELETE) composer.lock composer.phar
	$(DELETE) vendor/*
	$(DELETE) vendor
