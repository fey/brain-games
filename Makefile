install:
	composer install
lint:
	composer run-script phpcs -- --standard=PSR12 src bin
fix-lint:
	composer run-script phpcbf -- --standard=PSR12 src bin
analyze:
	composer run-script phpstan analyze -- -l max src bin