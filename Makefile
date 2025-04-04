install:
	composer install
lint:
	composer run-script phpcs
lint-fix:
	composer run-script phpcbf
analyze:
	composer run-script phpstan
play:
	bin/brain-games
