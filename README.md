<p align="center"><img width="300" src="www/img/sucre/logo_iglesia.png" alt="Campamento Tu decides logo"></p>
<p align="center">"Alcanzando a la juventud con el evangelio de Jesucristo"</p>

### Campamento Virtual Tu Decides

<p align="center"><img width="200" src="www/img/sucre/logo_camp.png" alt="Campamento Streaming logo"></p>

### Proceso de instalacion

Previamente tener instalado Docker y Docker-Compose para trabajar con Apache, MySql 8.0, PhpMyAdmin y Php

- Puedes usar MariaDB 10.1 si tu miras el tag en el archivo docker-compose.yml `mariadb-10.1`
- Puedes usar MySql 5.7 si tu miras el tag en el archivo docker-compose.yml `mysql5.7`

Usa docker-compose como el orquestador. Para correr el sistema simplemente ejecuta el siguiente comando:

```
docker-compose up -d
```

Abre phpmyadmin en [http://localhost:8000](http://localhost:8000) para realizar consultas SQL

Abre tu navegador web e ingresa en el siguiente link para acceder a la pagina [http://localhost:80](http://localhost:80)

Ejectua el cliente de mysql por consola en el puerto 3307:

```
docker-compose exec db mysql -u root -p
```

Y Listo !!!