<div class="carrito">
    <h3>Temas Seleccionados </h3>
    <div class="productos">

    </div>
    <div class="detalle">
        <p id="cantidadTemas"></p>
        <p id="totalTemas"></p>
    </div>
    <div class="btn-compra">

    </div>
</div>
<script>
    // let cantItemss = document.querySelector('#cantidadTemas')
    // let divProductos = document.querySelector(".productos")
    // let itemsCarritos = JSON.parse(sessionStorage.getItem("carrito"))
    let cart = JSON.parse(sessionStorage.getItem("carrito"))
    let total = 0;
    for (let i = 0; i < cart.length; i++) {
        document.querySelector(".productos").innerHTML += `
        <div class="producto">
            <p>${i+1}. ${cart[i].nombre}[ ${cart[i].tonos} ](${cart[i].nombre_artista})</p>
            <button type="button" id='${i}' class="btn btn-danger eliminar" onclick="eliminar(${i})">x</button>
        </div>`

        total += parseInt(cart[i].precio)
    }
    if (cart.length == 1) {
        document.querySelector('#cantidadTemas').innerHTML = `Tienes ${cart.length} producto`
    } else {
        document.querySelector('#cantidadTemas').innerHTML = `Tienes ${cart.length} productos`
    }
    // document.querySelector("#totalTemas").innerHTML = `Total: $${total}`
    if (cart.length == 0) {
        document.querySelector('.btn-compra').innerHTML = ``
    } else {
        document.querySelector('.btn-compra').innerHTML = `<a href="./compra.php"><button type="button" class="btn btn-success">Comprar</button></a>`
    }

    function eliminar(id) {
        let alertt = document.getElementsByClassName("alerta")[0]
        let mensaje = document.getElementById("mensaje")
        let btn_eliminar = document.getElementsByClassName("eliminar")[id]


        let carrito = JSON.parse(sessionStorage.getItem("carrito"));
        alertt.classList.add("show")
        alertt.style.background = "#28a745"
        mensaje.innerHTML = `Eliminaste a ${carrito[id].nombre} de tus temas seleccionados.`

        const carritoFiltered = carrito.filter(cart => cart.id === id)
        // carrito.splice(id, id + 1);
        sessionStorage.setItem("carrito", JSON.stringify(carritoFiltered))
        // eliminarElemento(id)

        // document.querySelector('#cantidadTemas').innerHTML = `Tienes ${carritoFiltered.length} producto`
        // document.querySelector("#totalTemas").innerHTML = `Total: $${total}`
        // setTimeout(() => {
        //     location.reload()
        // }, 2000);
    }
</script>