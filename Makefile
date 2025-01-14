up:
	docker compose up -d

down:
	docker compose down

bash:
	docker exec -it api-php sh

host:
	 docker inspect api-mysql sh
