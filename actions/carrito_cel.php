<div class="carrito_cel">
    <h3>Temas Seleccionados </h3>
    <div class="productos_cel">

    </div>
    <div class="detalle_cel">
        <p id="cantidadTemas_cel"></p>
    </div>
    <div class="btn-compra_cel">

    </div>
</div>
<script>
    let cantItemss = document.querySelector('#cantidadTemas_cel')
    // let divProductos = document.querySelector(".productos_cel")
    // let itemsCarritos = JSON.parse(sessionStorage.getItem("carrito"))
    let cart_cel = JSON.parse(sessionStorage.getItem("carrito"))
    for (let i = 0; i < cart_cel.length; i++) {
        document.querySelector(".productos_cel").innerHTML += `
        <div class="producto producto_cel">
            <p>${i+1}. ${cart_cel[i].nombre}[ ${cart_cel[i].tonos} ](${cart_cel[i].nombre_artista})</p>
            <button type="button" id='${i}' class="btn btn-danger eliminar" onclick="eliminar(${i})">x</button>
        </div>`
    }
    if (cart_cel.length == 1) {
        cantItemss.innerHTML = `Tienes ${cart_cel.length} producto`
    } else {
        cantItemss.innerHTML = `Tienes ${cart_cel.length} productos`
    }
    if (cart_cel.length == 0) {
        document.querySelector('.btn-compra_cel').innerHTML = ``
    } else {
        document.querySelector('.btn-compra_cel').innerHTML = `<a href="../compra.php"><button type="button" class="btn btn-success">Comprar</button></a>`
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
</script>