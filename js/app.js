alert('prueba js');
class Carrito {

    constructor(){
        this.id = null;
        this.idUsuario = '';
        this.idProductos = '';
        this.cantidadProductos = '';
        this.totalProductos = '';
        this.total = '';

        /** Estados. (30 caracteres)
         * Hemos recibido tu pedido
         * Estamos haciendo tus comida
         * El repartidor esta de camino
         * Entregado - Bon Apetit! 
         * Cancelado  
         */
        this.estado = '';
        this.fecha = '';
        this.hora = '';
    }   
}

const idsSeleccionados = [], cantidadesSeleccionadas = [], totalesParciales = [];

function quitarProducto(indice ) {
    idsSeleccionados.splice(indice, 1);
    cantidadesSeleccionadas.splice(indice, 1);
    totalesParciales.splice(indice, 1);
    actualizarPedido(carrito);
    actualizarVista(carrito);
}
function agregarProducto(e) {

    idProducto = e.dataset.id;
    precioUnidad = e.dataset.precio;
    cantidad = document.querySelector('#cantidad' + idProducto).value;
    totalProducto = cantidad * precioUnidad;

    /*
    console.log("id Producto: " + idProducto);
    console.log("precio unidad: " + precioUnidad);
    console.log("cantidad: " + cantidad);
    console.log("total Producto: " + totalProducto); */

    if ( parseInt(cantidad) > 0 ) {
        idsSeleccionados.push(idProducto);
        cantidadesSeleccionadas.push(cantidad);
        totalesParciales.push(totalProducto);
    }
}

function configurarBotones(carrito) {
    const productos = document.querySelectorAll('.domicilio-tabla-add');

    productos.forEach(producto => {
        producto.addEventListener('click' ,function() {
            agregarProducto(this);
            actualizarPedido(carrito);
            actualizarVista(carrito); 
        });
    });


}

function actualizarVista(carrito) {
    const carritoDIV = document.querySelector('.carritoArticulos');

    let productosJSON = JSON.parse(document.querySelector("#productosJSON").dataset.lista)
    
    html =   "<h3>Tu Pedido: <span class='material-symbols-outlined'>shopping_cart</span></h3>";
    html +=  "<form method='post' id='formularioPedido'>";
    html +=  "<input type='hidden' name='pedido' id='pedido'>";
    html +=  "<table class='contenedor carrito'>";
    html +=  "<tr>";
    html +=  "<th>Producto</th>";
    html +=  "<th>Cantidad</th>";
    html +=  "<th>Total</th>";
    html +=  "<th></th>";
    html +=  "</tr>";


    for (let index = 0; index < carrito.idProductos.length; index++) {
        
        html +=  "<tr>";
        for (let i = 0; i < productosJSON.length; i++) {
            if (productosJSON[i]["id"] == carrito.idProductos[index] ) {
                html +=  "<td>" + productosJSON[i]["nombre"]  + "</td>";
            }
        }
        html +=  "<td>" + carrito.cantidadProductos[index] + "</td>";
        html +=  "<td>" + carrito.totalProductos[index] + "€</td>";
        html +=  "<td>" + "<button class='buttonDropCarrito' value='"+ index + "' onclick='quitarProducto("+ index +")'><span class='material-symbols-outlined'>delete</span></button> " + "</td>";
        html +=  "</tr>";   
    }

    html +=  "</table>";
    html +=  "<p class='carritoTotal'>Total Pedido: " + carrito.total + "€</p>";
    html +=  "<input class='botonRealizarPedido' id='botonRealizarPedido' type='submit' value='Realizar Pedido'>";
    html +=  "</form>";
   
    carritoDIV.innerHTML = html;

    const botonRealizarPedido = document.querySelector('#botonRealizarPedido');
    
    // Boton REALIZAR PEDIDO 
    botonRealizarPedido.addEventListener('click',((e)=>{
        e.preventDefault();

        // Fecha y Hora del Pedido
        let fecha = new Date();

        carrito.fecha = fecha.getUTCFullYear() + '-' + (fecha.getUTCMonth()+1) + '-' + fecha.getUTCDate();
        carrito.hora = fecha.getHours() + ':' +fecha.getMinutes();
        console.log(carrito);

        // Poner en el formulario JSON
        const pedido = document.querySelector('#pedido');
        pedido.value = JSON.stringify(carrito);
        console.log( window.location);
        
        // Enviar el formulario
        const formularioPedido = document.querySelector('#formularioPedido');
        formularioPedido.method = "POST";
        formularioPedido.action = window.location; 
        formularioPedido.appendChild(pedido);
        formularioPedido.submit();
    }));
}
function actualizarPedido(carrito) {
   
    carrito.idProductos = idsSeleccionados;
    carrito.cantidadProductos = cantidadesSeleccionadas;
    carrito.totalProductos = totalesParciales;

    //Calcular total 
    let total = 0;
    carrito.totalProductos.forEach(parcial => {
        total += parcial;
    });
    carrito.total = total;

    


}

function iniciarJS() {
    
    carrito = new Carrito(); // Generar un carrito (en local)

    // idUsuario
    carrito.idUsuario = document.querySelector('#campoIdUsuario').value;
    
    // Fecha y Hora
    // const fecha = new Date(); 
    // carrito.fecha = fecha.getFullYear() + "-" + fecha.getMonth() + "-" + fecha.getDate();
    // carrito.hora = fecha.getHours() + ":" + fecha.getMinutes();

    // Estado inicial 
    carrito.estado = "Hemos recibido tu pedido";

    configurarBotones (carrito);

    
}


iniciarJS();