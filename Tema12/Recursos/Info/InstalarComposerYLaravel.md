## Instalar Composer y Laravel en Windows ##

Debemos de entrar en el siguiente comando para descargar Composer --> [Composer Setup](https://getcomposer.org/download/)

Una vez instalado el software composer entramos en la carpeta de actividades de nuestra carpeta donde hayamos creado el proyecto en la url superior escribimos cmd / powershell 

- composer create-project laravel/laravel <nombreProyecto> (Para crear un proyecto)


---------------------------------------------
- composer global require laravel/installer
 
- laravel new example-app
--------------------------------------------

En mi caso me daba fallo a la hora de instalar y es que en el archivo php.init tenemos que descomentar la línea --> ;extension:zip 