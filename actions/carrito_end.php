<?php
// session_start();
?>
<div class="carrito" style="margin-top: 1rem;">
    <h3>Temas Seleccionados </h3>
    <div class="productos">
    </div>
    <div class="detalle">
        <p id="cantidadTemas"></p>
        <p id="totalTemas"></p>
    </div>
</div>
<script>
    let cantidadItems = document.querySelector('#cantidadTemas')
    let divProductos = document.querySelector(".productos")
    let itemsCarrito = JSON.parse(sessionStorage.getItem("carrito"))
    tottal = 0;
    tottalP = 0;
    for (let i = 0; i < itemsCarrito.length; i++) {
        divProductos.innerHTML += `
        <div class="producto">
            <p>${i+1}. ${itemsCarrito[i].nombre}[ ${itemsCarrito[i].tonos} ](${itemsCarrito[i].nombre_artista})</p>
            <button type="button" id='${i}' class="btn btn-danger eliminar" onclick="eliminar(${i})">x</button>
        </div>`
    }

    function eliminar(id) {
        let alertt = document.getElementsByClassName("alerta")[0]
        let mensaje = document.getElementById("mensaje")
        let btn_eliminar = document.getElementsByClassName("eliminar")[id]


        let carrito = JSON.parse(sessionStorage.getItem("carrito"));
        alertt.classList.add("show")
        alertt.style.background = "#28a745"
        mensaje.innerHTML = `Eliminaste a ${carrito[id].nombre} de tus temas seleccionados.`

        carrito.splice(id, id + 1);
        sessionStorage.setItem("carrito", JSON.stringify(carrito))
        // eliminarElemento(id)
        setTimeout(() => {
            location.reload()
        }, 2000);
    }

    //     else if (itemsCarrito.length >= 3 || itemsCarrito.length <= 9) {

    // } else if (itemsCarrito.length >= 10 || itemsCarrito.length <= 19) {
    //     for (let i = 0; i < itemsCarrito.length; i++) {
    //         itemsCarrito[i].precio = Math.ceil(parseInt(itemsCarrito[i].precio) * 1.17)
    //     }
    // } else if (itemsCarrito.length >= 20 || itemsCarrito.length <= 29) {

    // } else {

    // }
    if (itemsCarrito.length == 1) {
        cantidadItems.innerHTML = `Tienes ${itemsCarrito.length} producto`
    } else {
        cantidadItems.innerHTML = `Tienes ${itemsCarrito.length} productos`
    }
</script>