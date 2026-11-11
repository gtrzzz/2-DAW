# Práctica UD2: panel de administración y usuarios en WordPress

Optativa · Gestores de contenido · 2º DAW. Autor: Iván Gutiérrez Mateos.

Configuración del WordPress de la UD1 (CDMON, http://www.wordpresspruebas.com.mialias.net) con la temática **Aeviternus Automation**: ajustes generales, de escritura y de lectura, personalización del escritorio, 5 usuarios con roles distintos, comprobación de permisos y un flujo editorial completo.

## Archivos

| Archivo | Qué es |
| --- | --- |
| `UD2_Practica_GutierrezMateosIvan.pdf` | Entrega: portada, tareas 1 a 6 con capturas, tabla de permisos y conclusiones |
| `informe.html` | Fuente del PDF |
| `capturas/` | Capturas de cada tarea (`tN_...png`) |
| `Practica2.pdf` / `Practica2.md` | Enunciado |

## Regenerar el PDF

```bash
msedge --headless=new --no-pdf-header-footer --print-to-pdf="UD2_Practica_GutierrezMateosIvan.pdf" "file:///.../informe.html"
```

## Lo que se ha hecho en WordPress

- Título "Aeviternus Automation", descripción corta, zona horaria Madrid, formatos de fecha y hora españoles y registro libre desactivado.
- Categorías Artículos (predeterminada), Auditorías y Automatización, y la etiqueta "errores web".
- Páginas Inicio (portada), Blog (entradas), Quiénes somos y Contacto. 5 entradas por página, 10 en el feed y solo el extracto.
- Escritorio en 2 columnas, sin "Eventos y noticias" ni "Borrador rápido", con el esquema de color Medianoche.
- Usuarios `admin.ivan`, `editor.lucia`, `autor.daniel`, `colaborador.marta` y `suscriptor.pablo`, con correos `@aeviternus.local`.
- Plugin **User Switching** activo, para cambiar de usuario sin contraseñas.
