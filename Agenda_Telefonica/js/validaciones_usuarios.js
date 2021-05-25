//funcion validar campos llenos obligatorios
function validarCamposObligatorios() {
  var bandera = true

  for (var i = 0; i < document.forms[0].elements.length; i++) {
    var elemento = document.forms[0].elements[i]
    if (elemento.value == '' && elemento.type == 'text') {
      if (elemento.id == 'cedula') {
        document.getElementById('mensajeCedula').innerHTML = '<br>La cedula esta vacia'
        elemento.style.border = '1px red solid'
        elemento.className = 'error'
      }
      if (elemento.id == 'nombres') {
        document.getElementById('mensajeNombres').innerHTML = '<br>El nombre esta vacio'
        elemento.style.border = '1px red solid'
        elemento.className = 'error'
      }
      if (elemento.id == 'apellidos') {
        document.getElementById('mensajeApellidos').innerHTML = '<br>El apellido esta vacio'
        elemento.style.border = '1px red solid'
        elemento.className = 'error'
      }
      if (elemento.id == 'direccion') {
        document.getElementById('mensajeDireccion').innerHTML = '<br>La direccion esta vacia'
        elemento.style.border = '1px red solid'
        elemento.className = 'error'
      }
      if (elemento.id == 'fechaNacimiento') {
        document.getElementById('mensajeFecha').innerHTML = '<br>La fecha esta vacia'
        elemento.style.border = '1px red solid'
        elemento.className = 'error'
      }
      if (elemento.id == 'correo') {
        document.getElementById('mensajeCorreo').innerHTML = '<br>El correo esta vacio'
        elemento.style.border = '1px red solid'
        elemento.className = 'error'
      }

      bandera = false
    } else if (elemento.value == '' && elemento.type == 'password') {
      if (elemento.id == 'contrasena') {
        document.getElementById('mensajeContra').innerHTML = '<br>El password esta vacio'
        elemento.style.border = '1px red solid'
        elemento.className = 'error'
      }
      bandera = false
    }
  }

  if (!bandera) {
    alert('Error: revisar los comentarios')
  }
  return bandera
}

//Funcion para validar letras nombres

function validarLetrasN(elemento) {
  if (elemento.value.length > 0) {
    var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
    console.log(miAscii)

    if (miAscii >= 65 && miAscii <= 90 || miAscii >= 97 && miAscii <= 122 || miAscii == 32) {
      document.getElementById('mensajeNombres').innerHTML = '<br>'
      elemento.style.border = '1px black solid'
      elemento.className = 'bien'

      return true
    } else {
      elemento.value = elemento.value.substring(0, elemento.value.length - 1)
      document.getElementById('mensajeNombres').innerHTML = '<br>Ingrese solo letras'
      elemento.style.border = '1px red solid'
      elemento.className = 'error'
      return false
    }
  } else {
    return true
  }
}
//Funcion para validar letras apellidos

function validarLetrasA(elemento) {
  if (elemento.value.length > 0) {
    var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
    console.log(miAscii)

    if (miAscii >= 65 && miAscii <= 90 || miAscii >= 97 && miAscii <= 122 || miAscii == 32) {
      document.getElementById('mensajeApellidos').innerHTML = '<br>'
      elemento.style.border = '1px black solid'
      elemento.className = 'bien'

      return true
    } else {
      elemento.value = elemento.value.substring(0, elemento.value.length - 1)
      document.getElementById('mensajeApellidos').innerHTML = '<br>Ingrese solo letras'
      elemento.style.border = '1px red solid'
      elemento.className = 'error'
      return false
    }
  } else {
    return true
  }
}
//Funcion validar dos nombres 
function validarDosNombres() {
  var cadena = document.getElementById("nombres").value.trim();
  var long = cadena.length;
  var contador = 0;
  for (i = 0; i <= long; i++) {
    var aux = cadena.charCodeAt(i)
    if (aux == 32) {
      contador++;
    }
  }
  if (contador == 1) {
    document.getElementById('mensajeNombres').innerHTML = '<br>'
    elemento.style.border = '1px black solid'
    elemento.className = 'bien'
  } else if (contador > 1) {
    document.getElementById('mensajeNombres').innerHTML = '<br>Ingrese dos Nombres'
    elemento.style.border = '1px red solid'
    elemento.className = 'error'
    document.getElementById('nombres').value = ' '
  } else if (contador == 0) {
    document.getElementById('mensajeNombres').innerHTML = '<br>Ingrese dos Nombres'
    elemento.style.border = '1px red solid'
    elemento.className = 'error'

  }
}
//Funcion validar dos apellidos
function validarDosApellidos() {
  var cadena = document.getElementById("apellidos").value.trim();
  var long = cadena.length;
  var contador = 0;
  for (i = 0; i <= long; i++) {
    var aux = cadena.charCodeAt(i)
    if (aux == 32) {
      contador++;
    }
  }
  if (contador == 1) {
    document.getElementById('mensajeApellidos').innerHTML = '<br>'
    elemento.style.border = '1px black solid'
    elemento.className = 'bien'
  } else if (contador > 1) {
    document.getElementById('mensajeApellidos').innerHTML = '<br>Ingrese dos Apellidos'
    elemento.style.border = '1px red solid'
    elemento.className = 'error'
    document.getElementById('apellidos').value = ' '
  } else if (contador == 0) {
    document.getElementById('mensajeApellidos').innerHTML = '<br>Ingrese dos Apellidos'
    elemento.style.border = '1px red solid'
    elemento.className = 'error'

  }
}
//Funcion para validar solo numeros Cedula

function validarNumeros(elemento) {
  if (elemento.value.length > 0) {
    var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
    //console.log(miAscii)

    if (miAscii >= 48 && miAscii <= 57) {
      document.getElementById('mensajeCedula').innerHTML = '<br>'
      elemento.style.border = '1px black solid'
      elemento.className = 'bien'
      return true

    } else {
      elemento.value = elemento.value.substring(0, elemento.value.length - 1)
      document.getElementById('mensajeCedula').innerHTML = '<br>Ingrese solo numeros'
      elemento.style.border = '1px red solid'
      elemento.className = 'error'
      return false
    }
  } else {
    return true
  }
}
//Funcion para validar solo numeros Telefono

function validarNumerosT(elemento) {
  if (elemento.value.length > 0) {
    var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
    //console.log(miAscii)

    if (miAscii >= 48 && miAscii <= 57) {
      document.getElementById('mensajeTelefono').innerHTML = '<br>'
      elemento.style.border = '1px black solid'
      elemento.className = 'bien'
      return true

    } else {
      elemento.value = elemento.value.substring(0, elemento.value.length - 1)
      document.getElementById('mensajeTelefono').innerHTML = '<br>Ingrese solo numeros'
      elemento.style.border = '1px red solid'
      elemento.className = 'error'
      return false
    }
  } else {
    return true
  }
}
//Funcion para validar Cedula

function validarCedula(elemento) {
  var tamanio = elemento.value.length
  console.log(tamanio)
  if (tamanio <= 10) {
    document.getElementById('mensajeCedula').innerHTML = '<br>'
    elemento.style.border = '1px black solid'
    elemento.className = 'bien'
    validarNumeros(elemento)
    validar()
    return true
  } else {
    elemento.value = elemento.value.substring(0, elemento.value.length - 1)
    document.getElementById('mensajeCedula').innerHTML = '<br>Solo permite 10 valores la cedula'
    elemento.style.border = '1px red solid'
    elemento.className = 'error'
    return false
  }
}

//Funcion para validar Telefono

function validarTelefono(elemento) {
  var tamanio = elemento.value.length
  console.log(tamanio)
  if (tamanio <= 10) {
    document.getElementById('mensajeTelefono').innerHTML = '<br>'
    elemento.style.border = '1px black solid'
    elemento.className = 'bien'
    validarNumerosT(elemento)
    return true
  } else {
    elemento.value = elemento.value.substring(0, elemento.value.length - 1)
    document.getElementById('mensajeTelefono').innerHTML = '<br>Solo permite 10 numeros'
    elemento.style.border = '1px red solid'
    elemento.className = 'error'
    return false
  }
}
//Valida la cedula Ecuatoriana

function validar() {
  var cad = document.getElementById("cedula").value.trim();
  var total = 0;
  var longitud = cad.length;
  var longcheck = longitud - 1;

  if (cad !== "" && longitud === 10) {
    for (i = 0; i < longcheck; i++) {
      if (i % 2 === 0) {
        var aux = cad.charAt(i) * 2;
        if (aux > 9) aux -= 9;
        total += aux;
      } else {
        total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
      }
    }

    total = total % 10 ? 10 - total % 10 : 0;

    if (cad.charAt(longitud - 1) == total) {

      document.getElementById('mensajeCedula').innerHTML = '<br>'
      elemento.style.border = '1px black solid'
      elemento.className = 'bien'
    } else {
      document.getElementById('mensajeCedula').innerHTML = '<br>Cedula Invalida'
      elemento.style.border = '1px red solid'
      elemento.className = 'error'
      document.getElementById('cedula').value = ' '
    }
  }
}
//Funcion para validar letras y caracteres del password

function validarLetrasP(elemento) {
  if (elemento.value.length > 0) {
    var miAscii = elemento.value.charCodeAt(elemento.value.length - 1)
    console.log(miAscii)

    if (miAscii >= 48 && miAscii <= 57 || miAscii >= 65 && miAscii <= 90 || miAscii >= 97 && miAscii <= 122 || miAscii == 64 || miAscii == 36 || miAscii == 95) {
      document.getElementById('mensajeContra').innerHTML = '<br>'
      elemento.style.border = '1px black solid'
      elemento.className = 'bien'

      return true
    } else {
      elemento.value = elemento.value.substring(0, elemento.value.length - 1)
      document.getElementById('mensajeContra').innerHTML = '<br>Permitido letras y los caracteres @,_,$'
      elemento.style.border = '1px red solid'
      elemento.className = 'error'
      return false
    }
  } else {
    return true
  }
}
//Funcion validar password
function validarCaracteres() {
  var cadena = document.getElementById("contrasena").value.trim();
  var long = cadena.length;
  var contador1 = 0;
  var contador2 = 0;
  var contador3 = 0;
  for (i = 0; i <= long; i++) {
    var aux = cadena.charCodeAt(i)
    if (aux == 36 || aux == 90 || aux == 64) {
      contador1++;
    }
    if (aux >= 65 && aux <= 90) {
      contador2++;
    }
    if (aux >= 97 && aux <= 122) {
      contador3++;
    }
  }
  if (contador1 == 0) {
    document.getElementById('mensajeContra').innerHTML = '<br>Ingrese al menos un caracter @ , _ , $$'
    elemento.style.border = '1px red solid'
    elemento.className = 'error'
    document.getElementById('contrasena').value = ' '
  } else if (contador2 == 0) {
    document.getElementById('mensajeContra').innerHTML = '<br>Ingrese al menos una letra Mayuscula'
    elemento.style.border = '1px red solid'
    elemento.className = 'error'
    document.getElementById('contrasena').value = ' '
  } else if (contador3 == 0) {
    document.getElementById('mensajeContra').innerHTML = '<br>Ingrese al menos una letra Minuscula'
    elemento.style.border = '1px red solid'
    elemento.className = 'error'
    document.getElementById('contrasena').value = ' '

  }
}
//Funcion para validar Los  8 digitos del password

function validarPassword(elemento) {
  var tamanio = elemento.value.length
  console.log(tamanio)
  if (tamanio <= 8) {
    document.getElementById('mensajeContra').innerHTML = '<br>'
    elemento.style.border = '1px black solid'
    elemento.className = 'bien'
    validarLetrasP(elemento)
    return true
  } else {
    elemento.value = elemento.value.substring(0, elemento.value.length - 1)
    document.getElementById('mensajeContra').innerHTML = '<br>Solo permite 8 digitos en la password'
    elemento.style.border = '1px red solid'
    elemento.className = 'error'
    return false
  }
}
//Funcion para validar correo
function validarCorreo(elemento) {
  if (elemento.value.length > 2) {
    document.getElementById('mensajeCorreo').innerHTML = ''
    var pos = elemento.value.indexOf('@')
    if (pos != -1) {
      var cor = elemento.value.substring(pos + 1, elemento.value.length)

      if ((cor == 'est.ups.edu.ec') || (cor == 'ups.edu.ec')) {
        return true
      } else {
        document.getElementById('mensajeCorreo').innerHTML = '<br>las Direcciones validas son  ups.edu.ec y est.ups.edu.ec'

      }
    } else {
      document.getElementById('mensajeCorreo').innerHTML = '<br>Le falta ingresar el @'

    }
  } else {
    document.getElementById('mensajeCorreo').innerHTML = '<br> Correo no valio'

  }
  if (elemento.value.length == 0) {
    document.getElementById('mensajeCorreo').innerHTML = ''

  }
}
//Validar Fecha
function validarFecha(elemento) {
  if (elemento.value.length == 10) {
    document.getElementById('mensajeFechaNac').innerHTML = ''
    //console.log(elemento.value.charCodeAt(elemento.value.length-1))
    if (elemento.value.charCodeAt(4) == 45 && elemento.value.charCodeAt(7) == 45) {
      var yyyy = parseInt(elemento.value.substring(0, 4))
      var MM = parseInt(elemento.value.substring(5, 7))
      var dd = parseInt(elemento.value.substring(8, 10))

      if (MM < 13 && MM > 0) {

        if ((MM == 01) || (MM == 03) || (MM == 05) || (MM == 07) || (MM == 09) || (MM == 11)) {
          if (dd > 31 || dd < 1) {
            document.getElementById('mensajeFechaNac').innerHTML = '<br> El dia que ingreso no existe en el mes indicado'
          }
        } else {
          if (MM == 02) {
            if (dd > 29 || dd < 1) {
              document.getElementById('mensajeFechaNac').innerHTML = '<br> El dia que ingreso no existe en el mes indicado'
            }
          } else {
            if (dd > 30 || dd < 1) {
              document.getElementById('mensajeFechaNac').innerHTML = '<br> El dia que ingreso no existe en el mes indicado'
            }
          }
        }

        if (yyyy > 2021 || yyyy < 1900) {
          document.getElementById('mensajeFechaNac').innerHTML = '<br> El año ingresado no existe'
        }
      } else {
        document.getElementById('mensajeFechaNac').innerHTML = '<br> El mes ingresado no existe'
      }
    } else {
      document.getElementById('mensajeFechaNac').innerHTML = '<br> La fecha ingresada es invalida (yyyy-mm-dd)'
    }
  } else {
    document.getElementById('mensajeFechaNac').innerHTML = '<br> La fecha ingresada es invalida (yyyy-mm-dd)'
  }

  if (elemento.value.length == 0) {
    document.getElementById('mensajeFechaNac').innerHTML = ''
  }

}