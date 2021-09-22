up:
	@docker-compose up -d
down:
	@docker-compose down
build:
	@docker-compose up --build -d
phpunit:
	@docker exec branas-curso-php vendor/bin/phpunit
infection:
	@docker exec branas-curso-php vendor/bin/infection
composer-install:
	@docker exec  branas-curso-php composer install
composer-update:
	@docker exec  branas-curso-php composer update
sh:
	docker exec -it branas-curso-php /bin/sh
