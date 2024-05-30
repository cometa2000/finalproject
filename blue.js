import fs, { existsSync, mkdir, writeFile } from "fs";
import path from "path";

class Blue {
    constructor() {
        this.tipo_archivo = {
            "controller": (nombre) => `<?php\n\nclass ${nombre} {\n\n\tpublic function __construct() {\n\t\techo "Desde el controlador";\n\t}\n\n}\n?>`,
            "model": `<?php\n\techo "Desde modelo";\n?>`,
            "view": `<div class="container">\n\t\t<div class="row">\n\t\t\t<div class="col">\n\t\t\t\t<h1>Vista</h1>\n\t\t\t</div>\n\t\t</div>\n\t</div>`
        };
        this.basePath = 'C:/laragon/www/back-end';
    }

    comprobar_ruta(tipo, ruta) {
        const rutaCompleta = `./app/${tipo}/${ruta}`;
        if (!existsSync(rutaCompleta)) {
            fs.mkdir(rutaCompleta, { recursive: true }, error => {
                if (!error) {
                    console.log("Carpeta creada correctamente!!");
                } else {
                    console.log("Error al crear la carpeta");
                }
            });
        }
    }

    crear_vista(ruta) {
        const rutaCompleta = `./view/${ruta}`;
        if (!existsSync(rutaCompleta)) {
            fs.mkdir(rutaCompleta, { recursive: true }, error => {
                if (!error) {
                    console.log("Carpeta creada correctamente!!");
                } else {
                    console.log("Error al crear la carpeta");
                }
            });
        }
    }

    async crear_archivo([tipo, archivo, ruta = ""]) {
        let contenido;

        if (tipo === "controller") {
            contenido = this.tipo_archivo[tipo](archivo);
        } else {
            contenido = this.tipo_archivo[tipo];
        }

        if (tipo === "view") {
            this.crear_vista(ruta);
            const destino = `./view/${ruta}/${archivo}.php`;
            fs.writeFile(destino, contenido, error => {
                if (!error) {
                    console.log(`Archivo creado correctamente en ${destino}`);
                } else {
                    console.log("Error al crear el archivo");
                }
            });
        } else {
            this.comprobar_ruta(tipo, ruta);
            const destino = `./app/${tipo}/${ruta}/${archivo}.php`;
            fs.writeFile(destino, contenido, error => {
                if (!error) {
                    console.log(`Archivo creado correctamente en ${destino}`);
                } else {
                    console.log("Error al crear el archivo");
                }
            });
        }
    }
}

let blue = new Blue();
let comando = process.argv.slice(2);
blue.crear_archivo(comando);
