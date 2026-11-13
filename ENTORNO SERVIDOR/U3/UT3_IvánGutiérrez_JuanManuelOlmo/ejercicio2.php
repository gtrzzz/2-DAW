<?php
# Conductor: Iván, navegante: Juan Manuel

require_once 'libreria.php';

$precios = [100, 250, 50, 80, 120];

echo "<h2>Precios iniciales</h2>";
echo "<pre>";
print_r($precios);
echo "</pre>";

aplicarDescuento($precios);

echo "<h2>Precios con descuento (10 % por defecto)</h2>";
echo "<pre>";
print_r($precios);
echo "</pre>";

$importe = 100;

echo "<h2>Facturas sobre un importe de $importe €</h2>";
echo "Con IVA general (21 %): " . procesarFactura("calcularIvaGeneral", $importe) . " €<br>";
echo "Con IVA reducido (10 %): " . procesarFactura("calcularIvaReducido", $importe) . " €<br>";