include .env
CURRENT_UID=$(id -u):$(id -g)
COMPOSE_FILES=docker-compose-local.yml
ROOT_USER=root

SHELL = /bin/sh

CURRENT_UID := $(shell id -u)
CURRENT_GID := $(shell id -g)

export CURRENT_UID
export CURRENT_GID

up:
	@echo "App: STARTING ..."
	@docker compose -f $(COMPOSE_FILES) up -d
	@echo "App: STARTED"
	@echo "click to open: http://localhost:"${APP_PORT}

down:
	@echo "App: STOPPING..."
	@docker compose -f $(COMPOSE_FILES) down
	@echo "App: STOPPED..."

build:
	@docker compose -f $(COMPOSE_FILES) up -d --build


shell:
	@docker compose -f $(COMPOSE_FILES) exec php bash

logs: 
	@docker compose -f $(COMPOSE_FILES) logs -f

test:
	@docker compose -f $(COMPOSE_FILES) exec php ./vendor/bin/phpunit --testdox --colors

provision:
	@echo "\n\033[92m ---------- Composer Install ------------ \033[0m"
	@docker compose -f $(COMPOSE_FILES) exec php composer install
	@echo "\033[92m ---------- Set Keys ------------ \033[0m"
	@docker compose -f $(COMPOSE_FILES) exec php php artisan key:gen
	@echo "\033[92m ---------- Set Storage & Bootstrap Permisssion ------------ \033[0m"
	@docker compose -f $(COMPOSE_FILES) exec php chmod -R 777 storage
	@docker compose -f $(COMPOSE_FILES) exec php chmod -R 777 bootstrap

	@echo "\033[92m ---------- Migrate ------------ \033[0m"
	@docker compose -f $(COMPOSE_FILES) exec php php artisan migrate
	@docker compose -f $(COMPOSE_FILES) exec php php artisan optimize:clear
	@docker compose -f $(COMPOSE_FILES) exec php nvm use v20
	@docker compose -f $(COMPOSE_FILES) exec php npm i
	@docker compose -f $(COMPOSE_FILES) exec php npm run build


