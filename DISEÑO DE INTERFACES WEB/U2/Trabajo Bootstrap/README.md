# Trabajo de Bootstrap: web de compras de artículos

Diseño de Interfaces Web, 2º DAW. Evaluación: RA2, criterios i) y j).

**Autor/es:** (poner nombre/s)

Web de una tienda online ("TiendaSur") hecha con plantillas de Bootstrap 5 y una hoja de estilos propia. Tiene carrito, detalles de envío y factura.

## Páginas

| Página | Contenido |
| --- | --- |
| `index.html` | Catálogo de artículos en tarjetas (rejilla responsive) |
| `carrito.html` | Tabla con los artículos del carrito y el resumen del pedido |
| `envio.html` | Formulario con los detalles de envío y el método de envío |
| `factura.html` | Confirmación del pedido y factura (se puede imprimir) |

## Componentes de Bootstrap usados

- Rejilla: `container`, `row`, `col-*` y `row-cols-*`
- Navbar responsive con menú hamburguesa
- Tarjetas (`card`), badges, botones y grupos de botones
- Tablas (`table`, `table-responsive`)
- Formularios: `form-control`, `form-select`, `form-check`, `input-group`
- Breadcrumb, barra de progreso, alertas, `list-group` y acordeón
- Utilidades: espaciado, flex, colores y tipografía

## CSS propio (`css/estilos.css`)

- Selectores de etiqueta, clase, id, descendiente, hijo (`>`), de atributo, pseudo-clases (`:hover`, `:focus`, `:nth-child`, `:has`) y pseudo-elementos (`::before`, `::after`)
- Unidades: `px`, `rem`, `em`, `%`, `vh` y `ch`
- Colores en hexadecimal, `rgb()`, `rgba()` y `hsl()`, variables CSS y degradados
- Propiedades de texto, listas (`list-style-type`, `list-style-position`) y tablas (`border-collapse`, `caption-side`)
- Contenedores: modelo de caja, flexbox, `border-radius`, `box-shadow` y transiciones
- Media queries para móvil y para impresión

## Cómo verlo

Abre `index.html` en el navegador. Bootstrap se carga desde un CDN, así que hace falta conexión a internet.
