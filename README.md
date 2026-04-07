# Logic/Mastermind Project

- **Autor:** Václav Balek
- **URL:** [http://localhost/logic/index.php](http://localhost/logic/index.php) / [http://localhost/logic/index.php?p=main](http://localhost/logic/index.php?p=main)
- **Informations:** [http://localhost/logic/index.php?p=informations](http://localhost/logic/index.php?p=informations)
- Projekt je postaven na čistém PHP + JavaScript + Bootstrap.
- Routing je řešen přes  parametr ?p= (např. ?p=informations) , tedy nevyžaduje .htaccess.

## Technologie

- Php 8.2
- Bootstrap
- Javascript ES6

## Soubory

- Vše je směřováno na `index.php` a rozepsáno v /app/pages/informations.php **Informations:** [http://localhost/logic/index.php?p=informations](http://localhost/logic/index.php?p=informations)


## Požadavky

- PHP 8.2 (Pokud nechcete použít docker)
- Docker (dobrovolný)
- Make (pokud chcete použít Makefile)  

---

## Dobrovolně:  verze Docker s využitím Makefile

### Spuštění projektu

```bash
make start
```

- Spustí Docker kontejnery (`logic/docker/docker-compose.yml`)
- Sestaví image, pokud nejsou aktuální
- Otavře [http://localhost:8080](http://localhost:8080)

### Zastavení kontejnerů

```bash
make end
```

### Restart kontejnerů

```bash
make restart
```

### Přístup do kontejnerů

- Do aplikace:

```bash
make fish
```

## Dobrovolně: verze pouze s Dockerem

### Spuštění projektu

```bash
docker-compose -f logic/docker/docker-compose.yml up -d --build
```

### Zastavení kontejnerů

```bash
docker-compose -f docker/docker-compose.yml down
```

### Restart kontejnerů

```bash
docker-compose -f logic/docker/docker-compose.yml down
docker-compose -f logic/docker/docker-compose.yml up -d --build
```

### Přístup do kontejnerů

- Do aplikace:

```bash
docker exec -it logic bash
```



