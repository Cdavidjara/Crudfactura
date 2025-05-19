# Sistema CRUD Factura

## Descripción del sistema
Este proyecto es un sistema CRUD para la gestión de facturas, clientes y productos, diseñado para facilitar el manejo eficiente de la información comercial. Además, incluye pruebas automatizadas para asegurar la correcta funcionalidad de los módulos principales, garantizando así la calidad y estabilidad del sistema a lo largo del tiempo.

## Requisitos para la instalación
Antes de instalar el sistema, asegúrate de contar con los siguientes componentes instalados y configurados en tu entorno:
- PHP (versión 8.0 o superior recomendada)
- Composer (para gestionar dependencias de PHP)
- Servidor web Apache o similar
- Base de datos MySQL o MariaDB
- Git (para clonar el repositorio y control de versiones)

## Cómo instalar el sistema
1. Clona el repositorio a tu máquina local usando el siguiente comando:
git clone https://github.com/Cdavidjara/Crudfactura.git

2. Ingresa a la carpeta del proyecto:
cd Crudfactura

3. Instala las dependencias necesarias con Composer:
composer install

4. Configura el archivo `.env` copiando el archivo `.env.example` y ajustando los datos de conexión a la base de datos y otros parámetros necesarios:
cp .env.example .env

5. Genera la clave de la aplicación:
php artisan key:generate

6. Ejecuta las migraciones para crear las tablas en la base de datos:
php artisan migrate

## Base de datos
El proyecto utiliza una base de datos llamada `pruebas_factura`. Para facilitar la configuración, se incluye un respaldo SQL ubicado en:
database/backup/pruebas_factura.sql

Puedes importar este archivo en tu gestor de base de datos para tener los datos iniciales y la estructura lista para usar.

## Cómo ejecutar el sistema
Para iniciar el servidor local y probar la aplicación, ejecuta:
php artisan serve

Editar
Luego, abre tu navegador y visita la URL que aparecerá en consola, típicamente:
http://127.0.0.1:8000
### Acceso a las secciones del sistema

Una vez iniciado el sistema, puedes acceder a las diferentes tablas (módulos) del sistema utilizando las siguientes rutas en tu navegador:

- **Clientes:**  
http://127.0.0.1:8000/clientes

- **Productos:**  
http://127.0.0.1:8000/productos

- **Facturas:**  
http://127.0.0.1:8000/facturas

Cada ruta te llevará a una interfaz donde podrás crear, visualizar, editar y eliminar registros según el módulo correspondiente.

## Cómo ejecutar las pruebas automatizadas
Este proyecto incluye tests automatizados para verificar el correcto funcionamiento de sus componentes. Para correr las pruebas, utiliza el siguiente comando en la raíz del proyecto:

php artisan test
Esto ejecutará todas las pruebas definidas y mostrará un resumen con los resultados, ayudando a garantizar la estabilidad y calidad del sistema durante el desarrollo.

---


