# Documentación del Proyecto

## Descripción del Proyecto

El proyecto proporcionado es una aplicación web diseñada para la gestión de un ciber café. Incluye funcionalidades para el registro y autenticación de usuarios, así como un CRUD (Create, Read, Update, Delete) para controlar el tiempo y el cobro de uso de computadoras en el ciber café.

## Descripción de Partes Importantes del Código

- **Archivos PHP:** Se encuentran en las carpetas `app/controller`, `app/model` y `app/view`, responsables de la lógica del negocio, acceso a datos y presentación respectivamente.
  
- **index.php:** Punto de entrada de la aplicación que carga las rutas y dependencias.
  
- **blue.js:** Script en Node.js que genera archivos PHP automáticamente para los controladores, modelos y vistas del proyecto.

## Principales Características

- **Autenticación de Usuarios:** Registro y login de usuarios.
  
- **CRUD de Máquinas en Ciber Café:** Permite gestionar máquinas (computadoras) disponibles, su estado y tiempo de uso.
  
- **Control de Tiempo y Cobro:** Funcionalidad para iniciar, pausar y reanudar cronómetros de uso y calcular precios basados en el tiempo.

## Requisitos

- **Software:** PHP, MySQL, Node.js
  
- **Dependencias:** Composer (para gestión de paquetes PHP), vlucas/phpdotenv (para carga de variables de entorno)
  
- **Librerías y Frameworks:** Bootstrap (front-end)

## Configuración Recomendada

- **Servidor:** Apache o Nginx
  
- **Base de Datos:** MySQL
  
- **Ambiente de Desarrollo:** XAMPP, WAMP, Laragon, o configuración similar que soporte PHP y MySQL.

## Instalación

1. Clonar el repositorio desde GitHub:

   ```bash
   git clone https://github.com/cometa2000/finalproject
   ```


2. Instalar las dependencias de PHP usando Composer:

    ```bash  
    composer install
    ```
    Configurar las variables de entorno:

3. Crear un archivo .env en la raíz del proyecto y configurar las variables de conexión a la base de datos (ver ejemplo en .env proporcionado).
Configurar la base de datos:

Ejecutar los scripts SQL proporcionados (backend.sql) para crear la base de datos y las tablas necesarias.
Iniciar el servidor web y acceder a la aplicación desde el navegador

## Estructura del Proyecto
    ```bash
    /
    ├── app/
    │   ├── config/
    │   ├── controller/
    │   ├── model/
    │   └── view/
    ├── public/
    │   ├── css/
    │   ├── js/
    │   └── index.php
    ├── vendor/
    │   ├── autoload.php
    │   └── (dependencias de Composer)
    ├── .env
    ├── blue.js
    ├── composer.json
    ├── index.php
    ├── README.md
    └── backend.sql
    ```

- **app/:** Contiene la estructura MVC (Modelo-Vista-Controlador) de la aplicación.
- **public/:** Archivos accesibles públicamente (CSS, JS, index.php para carga de recursos).
- **vendor/:** Directorio de Composer para autoloading y dependencias.
- **.env:** Archivo de configuración para variables de entorno.
- **blue.js:** Script para generación automática de archivos PHP.
- **composer.json:** Configuración de Composer y dependencias.
- **index.php:** Punto de entrada de la aplicación.
- **README.md:** Documentación del proyecto (este archivo).
- **backend.sql:** Scripts SQL para creación de la base de datos y tablas.

## Generador de Archivos (blue.js)
El archivo blue.js simplifica la creación de archivos PHP necesarios para el proyecto:
- **Vistas:** node blue view nombre_vista crea una vista con el nombre especificado.
- **Controladores:** node blue controller nombre_controlador crea un controlador con el nombre especificado.
- **Modelos:** node blue model nombre_modelo crea un modelo con el nombre especificado.

- **Ejemplos:**
## Creación de vistas:
- **VISTAS**
node blue view edit.view
node blue view Login logout.view
Creación de controladores:

- **CONTROLADOR**
node blue controller Ciber
node blue controller ValidateLogin
Creación de modelos:

- **MODELO**
node blue model TablaCiber

## Key Code Parts
- **.env File**
The .env file is used to configure environment variables required for the application, including database connection and other environment-specific settings.


    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=backend
    DB_USERNAME=root
    DB_PASSWORD=
    ```

- **DB_CONNECTION:** Tipo de base de datos utilizada (en este caso, MySQL).
- **DB_HOST:** Dirección IP del servidor de base de datos.
- **DB_PORT:** Puerto utilizado para la conexión a la base de datos.
- **DB_DATABASE:** Nombre de la base de datos que se utilizará para el proyecto.
- **DB_USERNAME:** Nombre de usuario de la base de datos.
- **DB_PASSWORD:** Contraseña de la base de datos.

## SQL Schema
El proyecto utiliza una base de datos MySQL con las siguientes tablas:


```bash

CREATE DATABASE backend;
USE backend;

CREATE TABLE ciber (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_maquina VARCHAR(50) NOT NULL,
    tiempo_de_inicio DATETIME NOT NULL,
    cronometro INT NOT NULL, 
    dia DATE NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    estado ENUM('activo', 'pausado') NOT NULL DEFAULT 'activo'
);

CREATE TABLE t_login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    nombreUser VARCHAR(50) NOT NULL, 
    email VARCHAR(50) NOT NULL,
    password VARCHAR(300) NOT NULL
);
```

- **ciber:** Esta tabla almacena información sobre las máquinas del ciber café, incluyendo nombre de máquina, tiempo de inicio, cronómetro (tiempo transcurrido), día, precio y estado (activo o pausado).
- **t_login:** Esta tabla almacena información de usuarios registrados para el inicio de sesión, incluyendo nombre, apellido, nombre de usuario, correo electrónico y contraseña (se recomienda almacenar las contraseñas de manera segura, por ejemplo, utilizando hash).

## Notes
Asegúrate de actualizar las credenciales de base de datos y otras configuraciones sensibles antes de implementar el proyecto en producción.
Se recomienda implementar prácticas de seguridad adicionales como filtrado de entrada, validación de formularios y protección contra ataques CSRF.