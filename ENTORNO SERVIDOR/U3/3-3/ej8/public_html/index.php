<?php

// Por defecto se carga el tema claro, solo se cambia si en la URL viene el tema oscuro
$estilo = isset($_GET["estilo"]) ? $_GET["estilo"] : "temaClaro";

if ($estilo == "temaOscuro"){
  require __DIR__ . "/../resources/templates/cabeceraTemaOscuro.php";
} else {
  require __DIR__ . "/../resources/templates/cabeceraTemaClaro.php";
}

?>
    <main>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus elementum eros suscipit nisl maximus accumsan. Pellentesque non auctor mauris. Cras non lacus feugiat dui ullamcorper pulvinar. Vivamus tincidunt consectetur ex a lacinia. Proin et euismod arcu. Quisque nunc lectus, pellentesque id neque ut, mollis ullamcorper lacus. Maecenas rutrum congue leo, in porttitor lacus euismod a. Maecenas quis eros ac justo faucibus auctor vel non turpis. Nam vehicula nisl sit amet nulla placerat tempus. Nullam erat tortor, ultricies at dolor sit amet, fermentum accumsan nisi. Proin eu elit consectetur, mattis sapien eget, convallis magna.</p>
    </main>

<?php require __DIR__ . "/../resources/templates/footer.php"; ?>
</body>
</html>
