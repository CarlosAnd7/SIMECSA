<?php
class CompraContexto {
    private $metodoCompra;

    public function __construct(MetodoCompra $metodoCompra) {
        $this->metodoCompra = $metodoCompra;
    }

    public function realizarCompra() {
        $this->metodoCompra->comprar();
    }
}