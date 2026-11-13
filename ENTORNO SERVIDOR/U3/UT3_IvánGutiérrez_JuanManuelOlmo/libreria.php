<?php
# Conductor: Iván, navegante: Juan Manuel
 
function aplicarDescuento(&$precios, $porcentaje = 10) {
  foreach ($precios as &$precio) {
    $precio -= $precio * ($porcentaje / 100);
  }
  unset($precio);
}
 
function calcularIvaGeneral($importe) {
  return $importe * 1.21;
}
 
function calcularIvaReducido($importe) {
  return $importe * 1.10;
}
 
function procesarFactura($funcionIva, $importe) {
  return $funcionIva($importe);
}
