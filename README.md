# Epptec Project

- **Autor:** Václav Balek
- **URL:** [http://localhost:8080](http://localhost:8080)
- **Informations:** [http://localhost:8080/informations](http://localhost:8080/informations)
- Tento projekt používá **Docker** pro spuštění aplikace. Makefile usnadňuje práci, ale vše lze spustit i bez něj.
- Jelikož jsem od vás dostal informaci, že projekt, který bych zaštiťoval není postavený čistě na frameworku, tak jsem zde chtěl ukázat hlavně php a javascript bez frameworku.

## Technologie

- Php 8.2
- Bootstrap
- Javascript ES6

## Soubory

- Vše je směřováno na `index.php` a rozepsáno v /app/pages/informations.php **Informations:** [http://localhost:8080/informations](http://localhost:8080/informations)


## Požadavky

- PHP 8.2 (Pokud nechcete použít docker)
- Docker (dobrovolný)
- Make (pokud chcete použít Makefile)  

---

## Verze s Makefile

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

## Verze bez Makefile

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



