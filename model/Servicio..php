<?php
class Servicio {
    private $idServicio;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $disponibilidad;
    private $CotizacionidCotizacion;
    
    public function __construct($idServicio, $nombre, $descripcion, $imagen, $disponibilidad, $CotizacionidCotizacion) {
        $this->idServicio = $idServicio;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->disponibilidad = $disponibilidad;
        $this->CotizacionidCotizacion = $CotizacionidCotizacion;
    }

    public function getIdServicio() {
        return $this->idServicio;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getDisponibilidad() {
        return $this->disponibilidad;
    }

    public function getCotizacionidCotizacion() {
        return $this->CotizacionidCotizacion;
    }
}
