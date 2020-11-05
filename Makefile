.PHONY: all

include .make/tests.mk

all: install

install:
	composer install
