## Descripción
Proyecto de prueba creado en laravel 8, para demostrar un CRUD funcional

## Componentes del proyecto:
- **Migraciones**
- **Seeders**
- **Auth**
- **Validación de formularios con clases Request**
- **Controladores de recursos**
- **Implementación de plantilla bootstrap 4**
- **Gratión de imagenes**

## Instrucciones de instalación
- **Ejecutar el comando:** git clone https://github.com/prograymer69/Laravel8.git  => Este comando clonara el proyecto
- **Entrar a la carpeta Laravel8**
- **Ejecutar el comando:** composer install  => Este comanto adicionara los paquetes que requiere el proyecto
- **Ajustar los parametros de conexión en el archivo .env**
- **Ejecutar el comando:** php artisan migrate --seed  => Este comando creara la base de datos y un usuario con los siguientes accesos: email => admin@admin.com  password => password.
- **Ejecutar el comando:** php artisan storage:link => Este comando volvera la carpeta storage accesible por el navegador
- **Ejecutar el comando:** php artisan serve => Este comando debe ejecutarse solamente en local. Esto iniciara el servidor local
