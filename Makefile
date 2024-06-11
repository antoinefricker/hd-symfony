build: 
	@echo 'Build docker environment'
	docker compose build --no-cache

start:
	@echo 'Start docker environment'
	docker compose up --pull always -d --wait