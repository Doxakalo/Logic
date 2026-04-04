ifeq ($(OS),Windows_NT)
BROWSER_OPEN=cmd /c start
else
BROWSER_OPEN=xdg-open
endif

start:
	docker-compose -f docker/docker-compose.yml up -d --build
	$(BROWSER_OPEN) http://localhost:8080

end:
	docker-compose -f docker/docker-compose.yml down

restart:
	docker-compose -f docker/docker-compose.yml down
	docker-compose -f docker/docker-compose.yml up -d --build
	$(BROWSER_OPEN) http://localhost:8080

fish:
	docker exec -it logic bash