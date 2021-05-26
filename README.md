 # Agenda Telefonica en PHP

**CARRERA:**  Computación 

**NOMBRES:**  José Quinde
               Byron Vásquez   	
**NRO. PRÁCTICA:**	2	

**TÍTULO PRÁCTICA:** Resolución de problemas sobre PHP y MySQL

## OBJETIVOS

•  Diseñar adecuadamente elementos gráficos en sitios web en Internet.

• Crear sitios web aplicando estándares actuales.

• Desarrollar aplicaciones web interactivas y amigables al usuario

## ACTIVIDADES DESARROLLADAS

**1)	Crear un repositorio en GitHub con el nombre “Practica01 – Agenda Telefónica en PHP”.**
**USUARIO:** VasquezB1-JoseQ1996

**Repositorio:** VasquezB1/Practica02-Agenda-Telef-nica-en-PHP (github.com) 

 ![image](https://user-images.githubusercontent.com/49071271/119596603-1dac0b80-bda5-11eb-8f8a-2bf1e17261a0.png)


**2)	Realizar un commit y push por cada requerimiento de los puntos antes descritos.**

![image](https://user-images.githubusercontent.com/49071271/119596703-47653280-bda5-11eb-81f7-919132fae214.png)


**3)	El diagrama E-R de la solución propuesta**

 ![image](https://user-images.githubusercontent.com/49071271/119596710-4d5b1380-bda5-11eb-8101-ec87d010b6f2.png)


Cada tabla posee una llave Primary en sus códigos, y también se crea una relación foránea entre usuario y teléfono donde un usuario puede tener uno o más teléfonos por lo que teléfono tendrá un atributo mas que se lo denomina tele_usu_codigo.

**4)	 Nombre de la base de datos**
 
La base de dato se creo con el nombre agenda y se le dio el tipo uf8_general_cli
 
![image](https://user-images.githubusercontent.com/49071271/119596718-54822180-bda5-11eb-87e3-98471ec04a55.png)


**5)	Sentencias SQL de la estructura de la base de datos**

Sentencia para crear la tabla Usuario
 
CREATE TABLE `agenda`.`usuario` ( `usu_codigo` INT(11) NOT NULL AUTO_INCREMENT ,  `usu_cedula` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `usu_nombres` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `usu_apellidos` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `usu_direccion` VARCHAR(75) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `usu_correo` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `usu_password` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `usu_fecha_nacimiento` DATE NOT NULL ,  `usu_eliminado` VARCHAR(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'N' ,  `usu_fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `usu_fecha_modificacion` TIMESTAMP NULL DEFAULT NULL ,  `usu_rol` VARCHAR(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,    PRIMARY KEY  (`usu_codigo`)) ENGINE = InnoDB;


Sentencia para crear la table Teléfono

CREATE TABLE `agenda`.`telefono` ( `tele_codigo` INT(11) NOT NULL AUTO_INCREMENT ,  `tele_numero` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `tele_tipo` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,  `tele_operadora` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,    PRIMARY KEY  (`tele_codigo`)) ENGINE = InnoDB;


**6)	El desarrollo de cada uno de los requerimientos antes descritos.**

a)	Agregar roles a la tabla usuario. Un usuario puede tener un rol de “admin” o
“user”.

Se creo el atributo rol VARCHAR (1) para la tabla usuario en donde se puede ingresar el tipo de rol que llevara la persona ingresada ya que puede ser Admin o Usuario.

![image](https://user-images.githubusercontent.com/49071271/119597593-fb1af200-bda6-11eb-8d7c-7c552486a3a7.png)

b)	Crear una tabla para almacenar los teléfonos de los usuarios.

Se procedió a crear una tabla mas para poder almacenar los teléfonos de los usuarios esta tabla recibe el código del usuario ya que un usuario puede tener uno o más teléfonos.

![image](https://user-images.githubusercontent.com/49071271/119597598-ffdfa600-bda6-11eb-9c32-49ab5e176b7f.png)

c)	Los usuarios “anónimos” pueden registrarse en la aplicación a través de un formulario de creación de cuentas.

El usuario anonimo puede hacer consultas sin necesidad de estar registrado, aunque también tiene la opción de registrarse, y en el caso de no hacerlo los usuarios están limitados a realizar búsquedas de teléfonos de usuarios por cedula, o código.
El código del usuario se encuentra en la carpeta de public y el anonimo solo puede ingresar a las pagina puestas ahí.
 
![image](https://user-images.githubusercontent.com/49071271/119597607-05d58700-bda7-11eb-8627-5735fbe9f98a.png)

Para la búsqueda por Cedula se utilizo Ajax para que pueda buscar en segundo plano sin necesidad de un submit, se realizo una pagina donde se dan las opciones para que el anonimo realice la búsqueda.

Para realizar la búsqueda de teléfonos por Cedula se utilizó el siguiente código.
 
![image](https://user-images.githubusercontent.com/49071271/119597619-0b32d180-bda7-11eb-8aef-548f91a31055.png)

Primero recibe el campo de la cedula enviado desde la pagina html, en donde luego se envia la información a una pagina javascript donde se encuentra el código del Ajax que luego corre la sentencia SQL vista anteriormente en la pagina php, y así finalmente devuelve la información en el caso de que exista.

_NOTA: Se devolverá la información en el caso de que el cliente no esté eliminado._

![image](https://user-images.githubusercontent.com/49071271/119597789-5220c700-bda7-11eb-843f-4ab8452f2ed9.png)
 
Para el buscar Teléfono tanto por Cedula como por Correo se utilizó la misma lógica solo que diferente sentencia SQL
Sentencia SQL para buscar por Cedula
 
![image](https://user-images.githubusercontent.com/49071271/119597797-55b44e00-bda7-11eb-8909-25d75b166b09.png)

Sentencia SQL para buscar por Correo
 
![image](https://user-images.githubusercontent.com/49071271/119597805-5947d500-bda7-11eb-94b8-f8746cf0f941.png)

De ahí tienen un código similar como el de Cedula, pero en este caso devolverá los teléfonos de la persona que se va a buscar, aunque aquí también se devolverá la información con la opción de realizar la llamada o consultar el email, esto se realizo con el href mailto para el email y el href telef para los teléfonos.

d)	Un usuario puede iniciar sesión usando su correo y contraseña y podrá:

![image](https://user-images.githubusercontent.com/49071271/119597812-5fd64c80-bda7-11eb-8a2f-3c0e7b75f5be.png)
 
Un Usuario puede ingresar sesión y dependiendo el rol que posea le enviara a la interfaz de control de admin o Usuario, para realizar ese control se utilizó el siguiente código.
 
![image](https://user-images.githubusercontent.com/49071271/119597821-64026a00-bda7-11eb-8b86-1e9f0d6ff3a3.png)

En donde simplemente se realiza una sentencia SQL donde dependiendo el rol enviara a un index ya sea de admin o de usuario.

e)	 Los usuarios con rol de “admin” pueden: agregar, modificar, eliminar, buscar, listar y cambiar la contraseña de cualquier usuario de la base de datos.

En la interfaz de Usuario tendremos así

![image](https://user-images.githubusercontent.com/49071271/119597834-695fb480-bda7-11eb-91bf-1c402d2ff03b.png)
 
Un usuario Admin tendrá el control total sobre los otros usuarios, también podrá llevar un registro sobre los usuarios que están en la base de datos ya sea que sigan activos, o estén eliminados.

De la misma manera el Admin tendrá acceso a las paginas que se encuentran en la carpeta admin ya sea controladores o vistas.
 
![image](https://user-images.githubusercontent.com/49071271/119598000-b8a5e500-bda7-11eb-9d39-b9677690c6a4.png)

Para realizar el Buscar, Modificar, Eliminar se utilizo sentencia SQL que se envía a través de la conexión a la base de Datos por pagina php, y en caso de modificar o devolver información se la pedía a través de la conexión a la base.
 
![image](https://user-images.githubusercontent.com/49071271/119598029-c78c9780-bda7-11eb-9cf4-285a1a08c8a7.png)

Para el modificar se pide la información a través del post enviado por la pagina donde se ingresó la información a modificar, luego esta información se la guarda en variables y se la envía por la secuencia UPDATE a la base de datos.

![image](https://user-images.githubusercontent.com/49071271/119598038-cc514b80-bda7-11eb-95c1-15871ef31780.png)
 
Para el eliminar en este caso es diferente ya que no se elimina a la persona con un DELETE lo que se hace es tener el registro guardado, pero a través del campo eliminado solo se le hace un UPDATE para que pase a ser de N a S.
 
![image](https://user-images.githubusercontent.com/49071271/119598045-d1ae9600-bda7-11eb-913d-f679e618119f.png)

La contraseña tiene el mismo funcionamiento ya que solo realiza un UPDATE por la base de datos enviando la contraseña nueva, aunque en este caso se pide la contraseña antigua y nueva para tener un control del usuario.

Para los Listar básicamente se manda una sentencia SQL donde lista dependiendo si los usuarios están activos o eliminados.
 
![image](https://user-images.githubusercontent.com/49071271/119598096-e8ed8380-bda7-11eb-8056-51e11f51e955.png)

Para Crear usuario se realiza la sentencia de INSERT INTO que envía la información del usuario a la base de datos.
 
![image](https://user-images.githubusercontent.com/49071271/119598120-f571dc00-bda7-11eb-8c47-d4d334fd8e82.png)

f)	Los usuarios con rol de “user” pueden modificar, eliminar y cambiar la
contraseña de su usuario.

Si se ingresa como Usuario la interfaz seria así:

![image](https://user-images.githubusercontent.com/49071271/119598153-04588e80-bda8-11eb-9978-7be2e0392796.png)

El usuario tendrá acceso a las paginas situación en la carpeta usuario ya sea controlador o vista.

![image](https://user-images.githubusercontent.com/49071271/119598175-133f4100-bda8-11eb-966c-1990315c39ac.png)

El usuario básicamente puede cambiar su contraseña y modificar su información, aunque el usuario si tendrá un control total sobre sus números telefónicos.

Para modificar su información y contraseña lleva la misma estructura explicada anteriormente ya que se utiliza la sentencia UPDATE en la base de datos para poder modificar.

Para el control del usuario a los teléfonos se utiliza el siguiente código.
 
![image](https://user-images.githubusercontent.com/49071271/119598184-189c8b80-bda8-11eb-8178-ed1eb8eaab48.png)

Se obtiene la información a través del POST y luego se lo envía a través de un INSERT INTO para ingresar la información a la base de datos.

![image](https://user-images.githubusercontent.com/49071271/119598219-29e59800-bda8-11eb-9ac2-761132f43dc2.png)

De igual manera se utiliza el UPDATE para modificar el teléfono de un usuario.
 
![image](https://user-images.githubusercontent.com/49071271/119598229-2ce08880-bda8-11eb-9863-674f3a737d76.png)

Para el eliminar en este caso si se utiliza el DELETE para eliminar el registro de la base de datos.
Los listar tienen el mismo funcionamiento y la misma estructura utilizada en el admin.
g)	Los datos siempre deberán ser validados cuando se trabaje a través de formularios.
Existe un JavaScript con las validaciones utilizadas en lo largo del proyecto para validar los datos de los usuarios y así no se ingresen datos erróneos.

![image](https://user-images.githubusercontent.com/49071271/119598243-32d66980-bda8-11eb-9daa-0f31049901da.png)

Esta función valida que solo se ingrese Letras en el nombre y apellido de la persona
 
![image](https://user-images.githubusercontent.com/49071271/119598297-500b3800-bda8-11eb-9cf1-f7415b339d20.png)

Esta función valida que se ingresen dos nombres o dos apellidos del usuario a través del control de los espacios ingresados en el text.

![image](https://user-images.githubusercontent.com/49071271/119598312-55688280-bda8-11eb-88c3-e0c9bf6892c4.png)
 
Función que sirve para validar Números en los campos de Cedula y Números de teléfonos.

 ![image](https://user-images.githubusercontent.com/49071271/119598324-5a2d3680-bda8-11eb-9516-c6c16c1fadcb.png)

Esta función valida que se ingrese una cedula que exista.

 ![image](https://user-images.githubusercontent.com/49071271/119598333-5ef1ea80-bda8-11eb-8e16-52cc920be777.png)

Función para validar el correo ya que solo se puede ingresar un correo que termine en @est.ups.edu.ec y @ups.edu.ec también se realiza el control del código para que se ingrese al menos un carácter y que tenga al menos una mayúscula y una minúscula.

![image](https://user-images.githubusercontent.com/49071271/119598338-62857180-bda8-11eb-94c4-0f4d2d3bdae0.png)
 
Función para validar que se ingrese una Fecha Correcta.
 
![image](https://user-images.githubusercontent.com/49071271/119598352-6addac80-bda8-11eb-90fc-9c987510496c.png)

**7)	Código CSS de la práctica.**
 
![image](https://user-images.githubusercontent.com/49071271/119598472-a11b2c00-bda8-11eb-8367-692b86cf8d4b.png)
![image](https://user-images.githubusercontent.com/49071271/119598489-a8423a00-bda8-11eb-9af5-acb6c12590ff.png)
![image](https://user-images.githubusercontent.com/49071271/119598491-ab3d2a80-bda8-11eb-8ed4-375e2354c562.png) 

**8)	Anexo (Pantallazos funcionamiento)**

![image](https://user-images.githubusercontent.com/49071271/119598570-d0ca3400-bda8-11eb-888f-5935cb7b343d.png)
![image](https://user-images.githubusercontent.com/49071271/119598575-d4f65180-bda8-11eb-89b9-dd11adab3be1.png)
![image](https://user-images.githubusercontent.com/49071271/119598588-da539c00-bda8-11eb-95b5-841a58eb441d.png)
![image](https://user-images.githubusercontent.com/49071271/119598592-dd4e8c80-bda8-11eb-8571-e99bda37fbc5.png)
![image](https://user-images.githubusercontent.com/49071271/119598603-e17aaa00-bda8-11eb-9adf-02563ac319c4.png)
![image](https://user-images.githubusercontent.com/49071271/119598611-e3dd0400-bda8-11eb-9cea-e69625e369ce.png)
![image](https://user-images.githubusercontent.com/49071271/119598623-e7708b00-bda8-11eb-8d53-0d856beb0d49.png)
![image](https://user-images.githubusercontent.com/49071271/119598631-ea6b7b80-bda8-11eb-8609-faffb9a68258.png)
![image](https://user-images.githubusercontent.com/49071271/119598645-ef302f80-bda8-11eb-9c9d-239881d29cc5.png)

## CONCLUSIONES: ##
Como conclusión puedo decir que al realizar esta práctica entendí como la programación interna de una pagina web, desde sus componentes básicos, hasta los estilos que se usan para que se vea bien la página, también investigue que existen algunas aplicaciones que sirven para crear paginas HTML, también se puede programar dentro de JavaScript para poder conectar con una base de datos a nuestra pagina web, mediante consultas que se realizan enlazando HTML con php y JavaScript, también se aprendió a realizar validaciones para poder controlar los campos de un text para que así la persona pueda ingresar sus datos de manera correcta.

