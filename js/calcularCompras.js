function setTotalIndividual(i) {
    var cantidad = document.querySelector("#cantidad" + i)
    if (cantidad.value <= 0) {
        cantidad.value = 1
    }
    var precioIndividual = document.querySelector("#precioIndividual" + i)
    var precioIndividualTotal = document.querySelector("#precioIndividualTotal" + i)
    precioIndividualTotal.value = (cantidad.value * precioIndividual.value)
    setTotal()
}

function setTotal() {
    var total = document.querySelector("#totalCompleto")
    var t = 0
    i = 1
    while (document.querySelector("#precioIndividualTotal" + i) != null) {
        t += parseFloat(document.querySelector("#precioIndividualTotal" + i).value)
        i++

    }
    total.value = t
}

checkFields()