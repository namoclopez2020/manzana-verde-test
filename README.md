# Manzana verde api - namoclopez2020

## Guía de como consumir esta API:

Ver [Guía para Manzana-verde-API](https://josenamoc-manzana-verde-api.herokuapp.com/).

## Pasos para instalar esta API en local:

### Clonar el repositorio
```
git clone https://github.com/namoclopez2020/manzana-verde-test.git
```
### Dirigirse a la carpeta
```
cd manzana-verde-test
```

### Crear el archivo ".env"
```
touch .env
```

### Editar el archivo ".env"
```
sudo nano .env
```

### Indicar en el archivo ".env", JWT_SECRET para poder generar token. Ejemplo:
```
JWT_SECRET=QAo8tsN2TXM110mB3U85JohTb2W3kZTphIW1XVleCandO2H0YnTYwD3O33ZpERE0

```
### Indicar en el archivo ".env", PEXEL_API_KEY para generar imagenes aleatorias(https://www.pexels.com/es-es/). Ejemplo:
```
PEXEL_API_KEY=QAo8taa2TXM110mB3U85JohTb2W3kZTphIW1XVleCandO2H0YnTYwD3O33ZpERE0

```

### Instalar los paquetes necesarios
```
composer install
```

### Arrancar el servidor
```
php artisan serve
```