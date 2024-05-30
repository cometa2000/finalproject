
// class Validation {
//     static async validarURL(url) {
//         const urlRegex = /^(http|https):\/\/[^ "]+$/;
//         if (!url || typeof url !== 'string' || !urlRegex.test(url)) {
//             throw new Error('URL no válida');
//         }
//     }

    
// }
class Validation {
    static async validarURL(url) {
        try {
            const respuesta = await fetch(url);
            const data = await respuesta.json(); 
            console.log("Respuesta de la URL:", data);
        } catch (error) {
            console.log(`Se produjo un error al validar la URL: ${error}`);
        }
    }

    static async validarInsercion(respuesta) {
        if (respuesta && respuesta.mensaje && respuesta.mensaje.match(/^Éxito:/)) {
            console.log("La inserción fue exitosa:", respuesta);
        } else {
            console.log("La inserción falló o la respuesta no es válida:", respuesta);
        }
    }

    static async validarConsulta(respuesta) {
        const objetoEsperado = { id: /^\d+$/, nombre: /^\w+$/ };
        if (Array.isArray(respuesta) && respuesta.every(objeto => Object.keys(objeto).every(key => key in objetoEsperado && String(objeto[key]).match(objetoEsperado[key])))) {
            console.log("La consulta fue exitosa y los datos son válidos:", respuesta);
        } else {
            console.log("La consulta falló o los datos no son válidos:", respuesta);
        }
    }

    static async validarEliminacion(respuesta) {
        if (respuesta && respuesta.eliminado === true) {
            console.log("La eliminación fue exitosa:", respuesta);
        } else {
            console.log("La eliminación falló o la respuesta no es válida:", respuesta);
        }
    }

    static async validarActualizacion(respuesta) {
        if (respuesta && respuesta.actualizado === true) {
            console.log("La actualización fue exitosa:", respuesta);
        } else {
            console.log("La actualización falló o la respuesta no es válida:", respuesta);
        }
    }
}
