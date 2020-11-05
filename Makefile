.PHONY: all composer.install

include .make/tests.mk

all: install

install: composer.install php-cs-fixer.install

composer.install:
	composer install
