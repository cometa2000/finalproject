class Main{
    constructor(nombre,apellido,edad,estatura){
        this.nombre = nombre;
        this.apellido = apellido;
        this.edad = edad
        this.estatura = estatura
    }

    mostrarDatos(){
        console.log(`
            NOMBRE: ${this.nombre}, 
            APELLIDO: ${this.apellido}, 
            EDAD: ${this.edad}, 
            ESTATURA: ${this.estatura}
        `);
    }

    actualizarDatos(nombre=this.nombre,apellido=this.nombre,edad=this.edad,estatura=this.estatura){
        this.nombre = nombre;
        this.apellido = apellido;
        this.edad = edad;
        this.estatura = estatura;
        this.mostrarDatos();
    }

    setNombre(nombre){
        this.nombre = nombre;
    }
    setApellido(apellido){
        this.apellido = apellido;
    }
    setEdad(edad){
        this.edad = edad;
    }
    setEstatura(estatura){
        this.estatura = estatura;
    }
    getNombre(){
        return this.nombre;
    }
    getApellido(){
        return this.apellido;
    }
    getEdad(){
        return this.edad
    }
    getEstatura(){
        return this.estatura;
    }
}

let persona1 = new Main("Brayan","Solis",23,170);
// persona1.mostrarDatos();
// persona1.actualizarDatos("Random","Ract");
persona1.actualizarDatos(undefined,undefined,100,230);
let persona2 = new Main("Random","Ract",23,170);

//new es un nuevo espacio de memoria
