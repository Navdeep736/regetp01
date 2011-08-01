Documentación de RFIETP:

=========================================================================================================
TECNOLOGIAS UTILIZADAS
=========================================================================================================
CakePHP Framework v.1.2
Base de datos PostgreSQL

=========================================================================================================
REQUERIMIENTOS
=========================================================================================================
HTTP Server. Preferentemente Apache con mod_rewrite activado
PHP 4.3.2 o mayor

=========================================================================================================
SVN
=========================================================================================================
Estructura:
Las dos aplicaciones (Registro y Catálogo) estan separados cada una en su directorio.

svn
--branches
--tags
--trunk
----app_shared (modelos compartidos por las dos aplicaciones)
----catalogo
-------*
----docs (carpeta de documentación general)
----registro
-------*


=========================================================================================================
ENCODINGS
=========================================================================================================
Tanto las aplicaciones como la base de datos tienen encoding ISO-8859-1 (LATIN1)

=========================================================================================================
INSTALACION
=========================================================================================================
1. Hacer checkout del trunk.
2. Crear base de datos en PostgreSQL.
3. Crear en cada aplicación en directorio app/config/ archivo database.php con configuración de conexión a base de datos 
[Para más información dirigirse a http://book.cakephp.org/view/922/Database-Configuration]
4. Dar perimsos de escritura en cada aplicación a directorio /app/tmp/.
5. Activar aspell en español (solo en Linux) preferentemente, para uso de corrector ortográfico. En caso de correr bajo Windows o simplemente no querer utilizar esta funcionalidad se debe setear en "false" la variable de configuración "modo_linux" de registro/app/config/core.php
[Para más información dirigirse a trunk/docs/instructivo_aspell.txt]

