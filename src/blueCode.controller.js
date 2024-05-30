class BlueCode {
    constructor(url, data, method) {
        this.url = url;
        this.data = data;
        this.method = method;
    }

    async insercion() {
        try {
            const respuesta = await fetch(this.url, {
                body: this.data,
                method: this.method
            });
            const data = await respuesta.json();
            return data;
        } catch (error) {
            console.log(`Se produjo un error en el proceso: ${error}`);
        }
    }

    async consulta(filtro = "") {
        try {
            const respuesta = await fetch(`${this.url}/${filtro}`, {
                method: this.method 
            });
            const data = await respuesta.json();
            return data;
            // data.map(contenido => {
            //     return contenido;
            // });
        } catch (error) {
            console.log(`Se produjo un error en el proceso: ${error}`);
        }
    }

    async eliminar(id) {
        try {
            const respuesta = await fetch(`${this.url}/${id}`, {
                method: 'DELETE'
            });
            const data = await respuesta.json();
            return data;
        } catch (error) {
            console.log(`Se produjo un error en el proceso: ${error}`);
        }
    }

    async actualizar(id) {
        try {
            const respuesta = await fetch(`${this.url}/${id}`, {
                method: 'PUT'
            });
            const data = await respuesta.json();
            return data;
        } catch (error) {
            console.log(`Se produjo un error en el proceso: ${error}`);
        }
    }
}

/* let datos = new FormData();
datos.append('usuario', 'front');
datos.append('pass', '12345678');
console.log(datos);

let envio = new BlueCode('php/info.php', datos, 'POST');

await Validation.validarURL('https://pokeapi.co/api/v2/pokemon/ditto');
await envio.insercion();

 */



const mis_input = ["nombre","apellidos","email","telefono"];

class Validacion{
    vacios(datos_validar){
        for(let i = 0; i < datos_validar.length; i++){
            let valor = document.getElementById(datos_validar[i]).value;
            if(valor == ""){
                alert(`El campo ${datos_validar[i]} no puede ir vacio!!`);
                break;
            }else{
                return true;
            }
        }
    }
    
    nombres(input){
        let validacion = document.getElementById(input).value;
        let letras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s-]+/;
        if(!letras.test(validacion)){
            alert(`El campo ${input} debe contener solo letras`)
        }else{
            return true;
        }
    }

    apellidos(input){
        let validacion = document.getElementById(input).value;
        let letras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s-]+/;
        if(!letras.test(validacion)){
            alert(`El campo ${input} debe contener solo letras`)
        }else{
            return true;
        }
    }

    emails(input){
        let validacion = document.getElementById(input).value;
        let letras = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/;
        if(!letras.test(validacion)){
            alert(`El campo ${input} debe contener correos electronicos`)
        }else{
            return true;
        }
    }
    
    telefonos(input){
        let validacion = document.getElementById(input).value;
        let letras = /\+?(\d{1,3})?[-.\s]?(\(\d{1,3}\)|\d{1,3})[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,10}/;
        if(!letras.test(validacion)){
            alert(`El campo ${input} debe contener numeros telefonicos`)
        } else{
            return true;
        }
    }

   
}
let validate = new Validacion();
const enviar = () => {
    validate.vacios(mis_input);
    validate.nombres("nombre");
    validate.apellidos("apellidos");
    validate.emails("email");
    validate.telefonos("telefono");
}


class Interfas {
    msj_error(msj){
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Something went wrong!"
        });
    }

    msj_exito(msj){
        Swal.fire({
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500
          });
    }

    msj_warnnig(msj){
        Swal.fire({
            title: "The Internet?",
            text: "That thing is still around?",
            icon: "question"
        });
    }

}

class Validacion extends Interfas {
    static restriccion = {
        "vacios" : {
            "expresion": /(?!(^$))/,
            "msj": "No puedes dejar vacio el campo"
        },
        "letras" : {
            "expresion": /^([a-zA-Záéíóú]+[\s]?)/i,
            "msj": "Solo puedes ingresar letras en el campo"
        },
        "numeros" : {
            "expresion": /^[0-9]+$/,
            "msj": "Solo puedes ingresar numeros en el campo"
        },
        "email" : {
            "expresion": /^\w+([\.-]?\w+)*@\w+([\.-]?)/,
            "msj": "Estructura de correo no valida! en campo"
        },
        "curp" : {
            "expresion": /[A-Z]{4}\d{6}[HM][A-Z]{5}[0-9A-Z])/,
            "msj": "Estructura de CURP no valida! en campo"
        },
        "rfc" : {
            "expresion": /[A-ZÑ&]{3,4}\d{6}[A-V1-9][A-Z\d]?\d)/,
            "msj": "Estructura de RFC no valida! en campo"
        },
        "password" : {
            "expresion": /(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}/,
        "msj": "Estructura de Contraseña no valida! en campo contraseña!\n\nRequisitos para una contraseña:\n-Minimo 8 caracteres\n-Maximo 15 caracteres\n-Al menos una letra mayuscula\n-Al menos una letra minuscula\n-Al menos un digito\n-No espacios en blanco\n-Al menos 1 caracter especial : Q $ ! % * ? &"
        }
    }

    limpiar_cadena = (cadena, caracter_busqueda, caracter_remplazo) => {
        return cadena.replace(`${caracter_busqueda}`,`${caracter_remplazo}`);
    }

    validar_campo (input, tipo_validacion, mensaje = ""){
        let resultado = true;
        let error = "";
        let msj_final = "";
        const incorrecto = (nombre, msj) => {
            error = (error == "")? nombre :  error;
            msj_final= (msj_final == "")? msj : msj_final;
            return false;
        }

        if (Array.isArray(input)){
            if(Array.isArray(tipo_validacion)){
                tipo_validacion.map(validacion => {
                    let {expresion, msj} = Validacion.restriccion[validacion];
                    input.map(nombre => {
                        resultado = expresion.test(document.getElementsByName(`${nombre}`)
                        [0].value)? resultado : incorrecto(document.querySelector(`[for="`
                        +nombre+`"]`).textContent, msj);
                    });
                });
            } else {
                const {expresion, msj} = Validacion.restriccion[tipo_validacion];
                input.map(nombre => {
                    resultado = expresion.test(document.getElementsByName(`${nombre}`)[0].
                    value) ? resultado : incorrecto(document.querySelector('for="'+nombre+'"]').textContent, msj);
                });
            }
        }
        error != ""? this.msj_error(mensaje != "" ? mensaje : `${msj_final} ${error}`) : error;
        return resultado;

    }

    caracter_mayus = (input) => {
        document.getElementsByName(`${input}`)[0].addEventListener("input", () => {
            document.getElementsByName(`${input}`)[0].value = document.getElementsByName(`${input}`)[0].value.toUpperCase();
        });
    }

    caracter_minus = (input) => {
        document.getElementsByName(`${input}`)[0].addEventListener("input", () => {
            document.getElementsByName(`${input}`)[0].value = document.getElementsByName(`${input}`)[0].value.replace(/[^0-9]/g, '');
        });
    }

    caracter_letras = (input) => {
        document.getElementsByName(`${input}`)[0].addEventListener("input", () => {
            document.getElementsByName(`${input}`)[0].value = document.getElementsByName(`${input}`)[0].value.replace(/([^a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s])/i, '');
        });
    }

    caracter_varios = (input) => {
        document.getElementsByName(`${input}`)[0].addEventListener("input", () => {
            document.getElementsByName(`${input}`)[0].value = document.getElementsByName(`${input}`)[0].value.replace(/[^A-Za-z0-9ñÑ]/g, '')
        });
    }

    primera_mayusculas = (input) => {
        document.getElementsByName(`${input}`)[0].addEventListener("input", () => {
            document.getElementsByName(`${input}`)[0].value = document.getElementsByName(`${input}`)[0].value.charAT(0).toUpperCase() + document.getElementsByName(`${input}`)[0].value.slice(1);
        });
    }

    limitar_valor = (input, inicio, fin , msj) => {
        return document.getElementsByName(`${input}`)[0].value > inicio && document.getElementsByName(`${input}`)[0].value < fin ? true : this.msj_error(msj);
    }

    longitud_campo = (input, inicio, fin, msj) => {
        let campo = document.getElementsByName(`${input}`)[0].value;
        return campo.length > inicio && campo.length < fin ? true : this.msj_error(msj);
    }

    logitud_campo_estra = (input, longitud, msj) => {
        let campo = document.getElementsByName(`${input}`)[0].value;
        return campo.length == longitud ? true : this.msj_error(msj);
    }
}

