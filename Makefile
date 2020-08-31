.PHONY: all

all: install

install:
	composer install

tests:
	bin/var-dump-check --symfony --doctrine --tracy src
