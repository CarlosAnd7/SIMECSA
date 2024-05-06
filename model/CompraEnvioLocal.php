<?php
class CompraEnvioLocal implements MetodoCompra {
    public function comprar() {
        echo "Compra realizada: Envío a domicilio local\n";
        // Lógica específica para envío local
    }
}