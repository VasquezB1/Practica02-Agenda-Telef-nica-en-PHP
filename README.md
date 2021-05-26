 Agenda Telefonica en PHP

CARRERA: Computación 
NOMBRES: José Quinde
                       Byron Vásquez   	
NRO. PRÁCTICA:	2	TÍTULO PRÁCTICA: Resolución de problemas sobre PHP y MySQL
OBJETIVOS
•  Diseñar adecuadamente elementos gráficos en sitios web en Internet.
• Crear sitios web aplicando estándares actuales.
• Desarrollar aplicaciones web interactivas y amigables al usuario

ACTIVIDADES DESARROLLADAS
1)	Crear un repositorio en GitHub con el nombre “Practica01 – Agenda Telefónica en PHP”.
USUARIO: VasquezB1-JoseQ1996
Repositorio: VasquezB1/Practica02-Agenda-Telef-nica-en-PHP (github.com) 

 


2)	Realizar un commit y push por cada requerimiento de los puntos antes descritos. 
3)	El diagrama E-R de la solución propuesta

 

Cada tabla posee una llave Primary en sus códigos, y también se crea una relación foránea entre usuario y teléfono donde un usuario puede tener uno o más teléfonos por lo que teléfono tendrá un atributo mas que se lo denomina tele_usu_codigo.

4)	 Nombre de la base de datos
 
La base de dato se creo con el nombre agenda y se le dio el tipo uf8_general_cli
 

5)	Sentencias SQL de la estructura de la base de datos
Sentencia para crear la tabla Usuario
 
CREATE TABLE `agenda`.`usuario` ( `usu_codigo` INT(11) NOT NULL AUTO_INCREMENT ,  `usu_cedula` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `usu_nombres` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `usu_apellidos` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `usu_direccion` VARCHAR(75) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `usu_correo` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `usu_password` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `usu_fecha_nacimiento` DATE NOT NULL ,  `usu_eliminado` VARCHAR(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N' ,  `usu_fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `usu_fecha_modificacion` TIMESTAMP NULL DEFAULT NULL ,  `usu_rol` VARCHAR(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,    PRIMARY KEY  (`usu_codigo`)) ENGINE = InnoDB;


Sentencia para crear la table Teléfono

CREATE TABLE `agenda`.`telefono` ( `tele_codigo` INT(11) NOT NULL AUTO_INCREMENT ,  `tele_numero` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `tele_tipo` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `tele_operadora` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,    PRIMARY KEY  (`tele_codigo`)) ENGINE = InnoDB;


6)	El desarrollo de cada uno de los requerimientos antes descritos.
a)	Agregar roles a la tabla usuario. Un usuario puede tener un rol de “admin” o
“user”.
Se creo el atributo rol VARCHAR (1) para la tabla usuario en donde se puede ingresar el tipo de rol que llevara la persona ingresada ya que puede ser Admin o Usuario.
 
b)	Crear una tabla para almacenar los teléfonos de los usuarios.
Se procedió a crear una tabla mas para poder almacenar los teléfonos de los usuarios esta tabla recibe el código del usuario ya que un usuario puede tener uno o más teléfonos.

 
c)	Los usuarios “anónimos” pueden registrarse en la aplicación a través de un formulario de creación de cuentas.
El usuario anonimo puede hacer consultas sin necesidad de estar registrado, aunque también tiene la opción de registrarse, y en el caso de no hacerlo los usuarios están limitados a realizar búsquedas de teléfonos de usuarios por cedula, o código.
El código del usuario se encuentra en la carpeta de public y el anonimo solo puede ingresar a las pagina puestas ahí.
 

Para la búsqueda por Cedula se utilizo Ajax para que pueda buscar en segundo plano sin necesidad de un submit, se realizo una pagina donde se dan las opciones para que el anonimo realice la búsqueda.

Para realizar la búsqueda de teléfonos por Cedula se utilizó el siguiente código.
 

Primero recibe el campo de la cedula enviado desde la pagina html, en donde luego se envia la información a una pagina javascript donde se encuentra el código del Ajax que luego corre la sentencia SQL vista anteriormente en la pagina php, y así finalmente devuelve la información en el caso de que exista.

NOTA: Se devolverá la información en el caso de que el cliente no esté eliminado.

 

Para el buscar Teléfono tanto por Cedula como por Correo se utilizó la misma lógica solo que diferente sentencia SQL
Sentencia SQL para buscar por Cedula
 

Sentencia SQL para buscar por Correo
 

De ahí tienen un código similar como el de Cedula, pero en este caso devolverá los teléfonos de la persona que se va a buscar, aunque aquí también se devolverá la información con la opción de realizar la llamada o consultar el email, esto se realizo con el href mailto para el email y el href telef para los teléfonos.

d)	Un usuario puede iniciar sesión usando su correo y contraseña y podrá:

 

Un Usuario puede ingresar sesión y dependiendo el rol que posea le enviara a la interfaz de control de admin o Usuario, para realizar ese control se utilizó el siguiente código.
 

En donde simplemente se realiza una sentencia SQL donde dependiendo el rol enviara a un index ya sea de admin o de usuario.

e)	 Los usuarios con rol de “admin” pueden: agregar, modificar, eliminar, buscar, listar y cambiar la contraseña de cualquier usuario de la base de datos.

En la interfaz de Usuario tendremos así

 
Un usuario Admin tendrá el control total sobre los otros usuarios, también podrá llevar un registro sobre los usuarios que están en la base de datos ya sea que sigan activos, o estén eliminados.
De la misma manera el Admin tendrá acceso a las paginas que se encuentran en la carpeta admin ya sea controladores o vistas.
 

Para realizar el Buscar, Modificar, Eliminar se utilizo sentencia SQL que se envía a través de la conexión a la base de Datos por pagina php, y en caso de modificar o devolver información se la pedía a través de la conexión a la base.
 

Para el modificar se pide la información a través del post enviado por la pagina donde se ingresó la información a modificar, luego esta información se la guarda en variables y se la envía por la secuencia UPDATE a la base de datos.

 

Para el eliminar en este caso es diferente ya que no se elimina a la persona con un DELETE lo que se hace es tener el registro guardado, pero a través del campo eliminado solo se le hace un UPDATE para que pase a ser de N a S.
 

La contraseña tiene el mismo funcionamiento ya que solo realiza un UPDATE por la base de datos enviando la contraseña nueva, aunque en este caso se pide la contraseña antigua y nueva para tener un control del usuario.

Para los Listar básicamente se manda una sentencia SQL donde lista dependiendo si los usuarios están activos o eliminados.
 

Para Crear usuario se realiza la sentencia de INSERT INTO que envía la información del usuario a la base de datos.
 

f)	Los usuarios con rol de “user” pueden modificar, eliminar y cambiar la
contraseña de su usuario.

Si se ingresa como Usuario la interfaz seria así:


















El usuario tendrá acceso a las paginas situación en la carpeta usuario ya sea controlador o vista.
 
El usuario básicamente puede cambiar su contraseña y modificar su información, aunque el usuario si tendrá un control total sobre sus números telefónicos.

Para modificar su información y contraseña lleva la misma estructura explicada anteriormente ya que se utiliza la sentencia UPDATE en la base de datos para poder modificar.

Para el control del usuario a los teléfonos se utiliza el siguiente código.
 

Se obtiene la información a través del POST y luego se lo envía a través de un INSERT INTO para ingresar la información a la base de datos.
 
De igual manera se utiliza el UPDATE para modificar el teléfono de un usuario.
 

Para el eliminar en este caso si se utiliza el DELETE para eliminar el registro de la base de datos.
Los listar tienen el mismo funcionamiento y la misma estructura utilizada en el admin.
g)	Los datos siempre deberán ser validados cuando se trabaje a través de formularios.
Existe un JavaScript con las validaciones utilizadas en lo largo del proyecto para validar los datos de los usuarios y así no se ingresen datos erróneos.
 
Esta función valida que solo se ingrese Letras en el nombre y apellido de la persona
 

Esta función valida que se ingresen dos nombres o dos apellidos del usuario a través del control de los espacios ingresados en el text.

 

Función que sirve para validar Números en los campos de Cedula y Números de teléfonos.

 

Esta función valida que se ingrese una cedula que exista.

 

Función para validar el correo ya que solo se puede ingresar un correo que termine en @est.ups.edu.ec y @ups.edu.ec también se realiza el control del código para que se ingrese al menos un carácter y que tenga al menos una mayúscula y una minúscula.

 
Función para validar que se ingrese una Fecha Correcta.
 

7)	Código CSS de la práctica.
 
 

8)	Anexo (Pantallazos funcionamiento)























































































































CONCLUSIONES:
Como conclusión puedo decir que al realizar esta práctica entendí como la programación interna de una pagina web, desde sus componentes básicos, hasta los estilos que se usan para que se vea bien la página, también investigue que existen algunas aplicaciones que sirven para crear paginas HTML, también se puede programar dentro de JavaScript para poder conectar con una base de datos a nuestra pagina web, mediante consultas que se realizan enlazando HTML con php y JavaScript, también se aprendió a realizar validaciones para poder controlar los campos de un text para que así la persona pueda ingresar sus datos de manera correcta.

