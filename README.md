## Rutas - Se puede acceder mediante Postman o programas similares

http://127.0.0.1:8000 - Rutas en ambas aplicaciones:

- **GET** /products/ - Listar todos los productos
- **GET** /products/{id}/ - Obtener un producto por ID
- **POST** /products/ - Crear un nuevo producto
- **PUT** /products/{id}/ - Actualizar un producto existente
- **DELETE** /products/{id}/ - Eliminar un producto

- Example - http://127.0.0.1:8000/products/1/
# jm-crud-app | Laravel

## Requisitos

Para correr la aplicacion se necesita tener instalado lo siguiente:

- [PHP](https://www.php.net/downloads) (8.3.12 ThreadSafe)
- [Composer](https://getcomposer.org/download/) ("Composer-Setup.exe")
- [Laravel](https://laravel.com/docs/installation)
- [XAMPP](https://www.apachefriends.org/index.html)
- [MySQL](https://www.mysql.com/downloads/)  

## Instalación

1. **Descargar el repositorio:**
Ve a la página del repositorio y descarga el archivo ZIP. Luego, mueve la carpeta "jm-crud-app" a la instalación de XAMPP en "xampp/htdocs/".Abrir CMD dentro del folder de la aplicacion.
   
   https://github.com/JoaquinMorenoCode/jm-backend-demo.git

2. **Instala dependecias (opcional):**
   En CMD usar:

   composer install

3. **Configura tu base de datos (Modificar con tus datos):**

    Dentro de ".env"

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=DBNAME
    DB_USERNAME=USER
    DB_PASSWORD=PASSWORD

4. **Ejecuta las migraciones:**
    En CMD usar:

    php artisan migrate

5. **Ejecuta la aplicacion:**
    En CMD usar:

    php artisan serve

# jm-crud-django-app | Django

## Documentación del Proceso de Aprendizaje:

 Django :  
- https://youtu.be/rHux0gMZ3Eg?si=bTdAmrDqfZHhXngz,
- https://www.youtube.com/watch?v=OJdFj5hPAKs&t=86s
- https://docs.djangoproject.com/en/5.1/ref/validators/

    Aprendi a usar el framework siguiendo tutoriales en YouTube, consultando Stack Overflow para algunas configuraciones desactualizadas y la documentacion de Django. 
    El mayor desafio fue la instalacion de Pipenv en mi maquina, ya que enfrente problemas de compatibilidad con Python debido a la version de la MS Store y algunas
    instalaciones antiguas. Para resolverlo, desinstale todas las instancias de Python en mi maquina, las reinstale y agregue las variables de sistema necesarias.
    
    Estuve atento a las validaciones y al manejo de errores para que la aplicacion no se cayera. Hice comprobaciones con postman para detectar posibles problemas 
    con la ausencia de campos, entidades no existentes, etc, logre que la aplicacion fuera mas robusta para evitar errores molestos, adicionalmente comunique los errores
     necesarios en el response.


## Requisitos

Antes de comenzar, asegúrate de tener instalado:

- [Python](https://www.python.org/downloads/) (versión usada 3.12.4)
- [Pipenv](https://pipenv.pypa.io/en/latest/#install-pep508) 
- [MySQL](https://www.mysql.com/downloads/)
- [XAMPP](https://www.apachefriends.org/index.html)


1. **Descargar el repositorio:**
   Ve a la página del repositorio y descarga el archivo ZIP. Luego Ubicate dentro del folder "jm-django-crud-app" y abre CMD
   
   https://github.com/JoaquinMorenoCode/jm-backend-demo.git

2. **Instala dependecias:**
    En CMD:

    pipenv install

3. **Configura tu base de datos(Modificar con tus datos) :**

    A diferencia de Laravel, Django no creará la base de datos al iniciar la aplicación. Es importante crear la base de datos antes de iniciar la aplicación y utilizar el mismo nombre que en la configuración de "crudapp/settings.py"

    DATABASES = {
    'default': {
        'ENGINE': 'django.db.backends.mysql', <br>
        'NAME': 'jm-django-app',<br>
        'USER' : 'USER',<br>
        'PASSWORD' : 'PASSWORD',<br>
        'HOST' : 'localhost',<br>
        'PORT' :'3306'<br>
    }
}

4. **Activar el entorno virtual:**
    En CMD:

    pipenv shell

5. **Migrar la Base de datos:**
    En CMD:

    python manage.py migrate   

5. **Correr aplicacion:**
    En CMD:

    python manage.py runserver   



# URL Filter | Python

El algoritmo funciona leyendo el archivo de URLs una por una, sin cargar todo el archivo al mismo tiempo, lo que ahorra memoria. Antes de iniciar el proceso, se crea una estructura set() que permite solo registros unicos. Luego, para cada URL, verifica si contiene "shop" y termine en ".html" usando una expresión regular (regex).

Si la URL cumple con los requisitos, se añade al conjunto. Este metodo hace que el programa sea rapido y use poca memoria. Si bien se podria crear un "set" con todo el registro desde el inicio, esto podria aumentar el uso de memoria al ser un archivo muy grande.

## Requisitos

Python 3.6^

## Uso

1. Incluir un archivo de texto con URLs, una por línea dentro de la misma carpeta del archivo "filter_url.py" y renombrarlo a "demo_file.txt".
2. Modifique el script de ser necesario para un nuevo .txt
3. Usando CMD ejecute el scrip "python filter_url.py"

 



