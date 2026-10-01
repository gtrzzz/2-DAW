# ACTIVIDAD DE INVESTIGACIÓN INICIAL: MODELOS Y SERVICIOS WEB

## BLOQUE I: FUNDAMENTOS DE ARQUITECTURAS Y PILAS DE SOFTWARE

### 1. Servidor Web frente a Servidor de Aplicaciones

Un **servidor web**, como Apache HTTPD, se encarga principalmente de recibir peticiones HTTP/HTTPS y entregar recursos al cliente. Entre estos recursos se encuentran archivos estáticos como HTML, CSS, JavaScript, imágenes, vídeos o documentos.

Por otro lado, un **servidor de aplicaciones**, como Apache Tomcat, está orientado a ejecutar aplicaciones y generar contenido dinámico. Tomcat, por ejemplo, proporciona un contenedor para aplicaciones Java basadas en **Servlets y JSP**, procesando la lógica de la aplicación y generando respuestas dinámicas.

En una arquitectura multicapa es habitual colocar Apache delante de Tomcat. Apache recibe las peticiones del usuario y puede entregar directamente los recursos estáticos, mientras que las peticiones que necesitan ejecutar código se envían al servidor de aplicaciones.

No es recomendable que Tomcat se encargue directamente de grandes cantidades de contenido estático porque su función principal es ejecutar aplicaciones y gestionar peticiones dinámicas. Delegar los archivos estáticos al servidor web permite separar responsabilidades y reducir la carga del servidor de aplicaciones, dejando sus recursos disponibles para ejecutar la lógica de negocio.

---

### 2. Renderizado y ejecución en ausencia de servidor HTTP

Sí es posible visualizar una página web sin utilizar un servidor HTTP. Por ejemplo, podemos abrir directamente un archivo `index.html` mediante una dirección como:

`file:///ruta/index.html`

En este caso, el navegador obtiene el archivo directamente del sistema de archivos local, sin realizar una petición HTTP a un servidor.

Sin embargo, existen importantes restricciones de seguridad. Los archivos cargados mediante `file://` suelen recibir un **origen opaco**, por lo que el navegador no considera necesariamente que dos archivos locales pertenezcan al mismo origen. Esto puede provocar errores de CORS al intentar cargar otros recursos locales.

Estas restricciones afectan especialmente a aplicaciones que utilizan `fetch()`, `XMLHttpRequest`, módulos JavaScript mediante `type="module"` o determinadas APIs que requieren un origen HTTP o HTTPS.

La política **Same-Origin Policy** impide que un documento pueda acceder libremente a recursos de otros orígenes. Cuando se necesita realizar peticiones entre diferentes orígenes se utiliza **CORS**, mediante cabeceras HTTP como `Access-Control-Allow-Origin`.

Por ello, aunque una página HTML sencilla puede funcionar mediante `file://`, para desarrollar aplicaciones web modernas es recomendable utilizar un servidor local, por ejemplo Apache, Nginx o el servidor de desarrollo de un framework. De esta manera la aplicación funciona mediante `http://localhost` y se comporta de forma mucho más parecida a un entorno real.

---

### 3. Transición y obsolescencia tecnológica

Las primeras aplicaciones web utilizaron tecnologías como **CGI**, los **Java Applets**, ActiveX y VBScript. Con el tiempo fueron sustituidas por tecnologías más seguras, eficientes, portables y compatibles con diferentes sistemas.

Los **CGI (Common Gateway Interface)** permitían ejecutar programas externos, escritos por ejemplo en Perl o C, para generar respuestas dinámicas. Uno de sus principales problemas era que el modelo tradicional podía crear un nuevo proceso para atender las peticiones, provocando un consumo elevado de recursos cuando existía mucho tráfico.

Los **Java Applets** permitían ejecutar código Java dentro del navegador, pero dependían de complementos externos y provocaban problemas de seguridad, compatibilidad y mantenimiento. Los navegadores modernos eliminaron el soporte para los plugins de Java y la propia API de Applet fue posteriormente marcada como obsoleta y destinada a desaparecer.

Por otra parte, **ActiveX y VBScript** estaban especialmente ligados al ecosistema de Internet Explorer y Windows. Su dependencia de tecnologías propietarias y su acceso más amplio al sistema podían aumentar los riesgos de seguridad y dificultaban la compatibilidad multiplataforma.

Actualmente, muchas de las funciones que realizaban estas tecnologías se cubren mediante estándares abiertos como:

- **HTML5** para la estructura y los elementos de las páginas.
- **CSS** para la presentación.
- **JavaScript y ECMAScript** para la lógica ejecutada en el navegador.
- **Web APIs** para acceder a funcionalidades del navegador.
- **HTTP/HTTPS** para la comunicación cliente-servidor.
- **Servlets, PHP, Node.js, Python, .NET, etc.** para ejecutar lógica en el servidor.

De esta forma, el desarrollo web actual depende mucho menos de plugins propietarios y permite utilizar aplicaciones en diferentes sistemas operativos y navegadores.

---

### 4. Comparativa de arquitecturas LAMP vs. WISA y virtualización

**LAMP** es un conjunto de tecnologías formado tradicionalmente por:

- **L**inux.
- **A**pache.
- **M**ySQL.
- **P**HP.

Es una pila muy utilizada en servidores web y está basada principalmente en tecnologías de código abierto. Linux y Apache son software de código abierto y PHP utiliza una licencia de tipo BSD. MySQL también dispone de una edición Community distribuida bajo GPL, además de opciones comerciales.

**WISA** está formada por:

- **W**indows Server.
- **I**IS (Internet Information Services).
- **S**QL Server.
- **A**SP.NET.

Se basa principalmente en tecnologías del ecosistema Microsoft. Windows Server y SQL Server son productos comerciales con modelos de licencia propios, mientras que ASP.NET dispone actualmente de componentes de código abierto.

La instalación manual de estas pilas sobre un sistema operativo podía resultar complicada porque había que instalar, configurar y mantener individualmente cada componente, además de controlar versiones, dependencias, puertos, configuraciones y posibles conflictos entre servicios.

Los **contenedores Docker** solucionan gran parte de estos problemas porque permiten empaquetar una aplicación junto con sus dependencias y configuraciones dentro de una imagen. Después, esa imagen puede ejecutarse como un contenedor de forma aislada.

Por ejemplo, una aplicación podría utilizar un contenedor para Apache/Nginx, otro para PHP y otro para MySQL. De esta forma se facilita la instalación, reproducción del entorno, actualización y despliegue de las aplicaciones.

Docker no elimina la necesidad de administrar los servicios, pero hace que los entornos sean mucho más reproducibles y fáciles de trasladar entre máquinas.

---

### 5. Alojamientos múltiples y Virtual Hosts

Apache permite alojar varios sitios web en un mismo servidor mediante los **Virtual Hosts**.

Las directivas principales son:

- `Listen`: indica en qué puerto o dirección debe escuchar Apache.
- `DocumentRoot`: indica el directorio desde el que se sirven los archivos de un sitio.
- `ServerName`: identifica el nombre de dominio asociado al Virtual Host.

Por ejemplo, un servidor podría tener:

```apache
<VirtualHost *:80>
    ServerName web1.es
    DocumentRoot /var/www/web1
</VirtualHost>

<VirtualHost *:80>
    ServerName web2.es
    DocumentRoot /var/www/web2
</VirtualHost>
```

Ambos sitios pueden utilizar la misma dirección IP pública y el mismo puerto 80.

Cuando un navegador solicita:

```http
GET /index.html HTTP/1.1
Host: web1.es
```

Apache recibe la conexión en la misma dirección IP y puerto que utilizaría `web2.es`, pero utiliza la cabecera `Host` para determinar qué Virtual Host debe atender la petición.

Por tanto, el mecanismo es:

**DNS → misma IP → puerto 80/443 → Apache → cabecera Host → Virtual Host correspondiente → DocumentRoot correspondiente.**

En HTTPS el proceso también permite alojar múltiples dominios en una misma dirección mediante el uso conjunto de Virtual Hosts y tecnologías como **SNI (Server Name Indication)**.

---

# BLOQUE II: ESCALABILIDAD, BALANCEO E INTEGRACIÓN DE SERVICIOS

### 6. Escalabilidad vertical vs. horizontal

| Característica     | Escalabilidad vertical (Scale-up)                       | Escalabilidad horizontal (Scale-out)                |
| ------------------ | ------------------------------------------------------- | --------------------------------------------------- |
| Funcionamiento     | Aumentar CPU, RAM, almacenamiento, etc. del servidor    | Añadir nuevos servidores o instancias               |
| Ventaja principal  | Es relativamente sencilla de implementar                | Permite repartir el tráfico y aumentar la capacidad |
| Coste              | Puede aumentar mucho al utilizar hardware de mayor gama | Se pueden añadir máquinas progresivamente           |
| Complejidad        | Menor inicialmente                                      | Mayor, porque hay que coordinar varios nodos        |
| Disponibilidad     | Un único servidor puede convertirse en SPOF             | Puede ofrecer mayor tolerancia a fallos             |
| Límite             | El hardware tiene un límite físico o económico          | Puede seguir creciendo añadiendo nodos              |
| Mantenimiento      | Más sencillo al existir un único nodo                   | Requiere gestionar varios nodos                     |
| Fallo del servidor | Puede dejar todo el servicio fuera de línea             | Otros nodos pueden continuar atendiendo peticiones  |

En el **scale-up**, se aumenta la capacidad de una máquina existente. Por ejemplo, pasar de 16 a 64 GB de RAM o utilizar una CPU más potente.

En el **scale-out**, se añaden nuevas instancias de la aplicación y un balanceador distribuye las peticiones entre ellas.

La escalabilidad horizontal es especialmente interesante en aplicaciones diseñadas para funcionar de forma distribuida, aunque introduce problemas adicionales relacionados con sesiones, bases de datos, almacenamiento y coordinación entre servidores.

---

### 7. Persistencia de sesiones en entornos distribuidos

Cuando una aplicación se ejecuta en varios servidores, una petición de un mismo usuario puede llegar a máquinas diferentes. Esto supone un problema si la información de sesión se encuentra almacenada únicamente en la memoria local de uno de los servidores.

Una solución tradicional son las **sticky sessions** o sesiones persistentes. El balanceador intenta enviar siempre al mismo servidor a un determinado usuario, utilizando mecanismos como la dirección IP o una cookie.

Su ventaja es que resulta relativamente sencillo de implementar, pero tiene una desventaja importante: si el servidor asociado al usuario falla, puede perderse la sesión.

Otra solución es la **replicación de sesiones**, mediante la cual varios servidores mantienen copias de la información de sesión. Esto mejora la disponibilidad, pero aumenta la complejidad y el tráfico entre servidores.

Una alternativa moderna es diseñar aplicaciones **stateless**, donde los servidores no dependen de una memoria de sesión local. La información necesaria puede almacenarse en un sistema compartido como **Redis** o **Memcached**, o determinadas credenciales pueden representarse mediante tokens firmados como **JWT**.

Con este enfoque cualquier instancia puede procesar la siguiente petición del usuario, lo que facilita el escalado horizontal.

---

### 8. Algoritmos de reparto de carga

**Round Robin**

El algoritmo Round Robin distribuye las peticiones de forma secuencial entre los servidores.

Por ejemplo, con tres servidores:

```text
Petición 1 → Servidor A
Petición 2 → Servidor B
Petición 3 → Servidor C
Petición 4 → Servidor A
Petición 5 → Servidor B
...
```

Es sencillo y funciona bien cuando los servidores tienen capacidades similares y las peticiones tienen un coste parecido.

**LRU (Least Recently Used)**

LRU significa _Least Recently Used_. En un contexto de gestión de recursos, selecciona el recurso o elemento que lleva más tiempo sin utilizarse para su sustitución o gestión.

No debe confundirse con los algoritmos de balanceo habituales de tráfico HTTP. En balanceadores modernos son mucho más comunes algoritmos como Round Robin, Least Connections, IP Hash o métodos ponderados.

**Least Connections**

Envía la nueva petición al servidor que tenga actualmente el menor número de conexiones activas. Es útil cuando las peticiones tienen duraciones diferentes, porque intenta evitar que un servidor acumule demasiadas conexiones mientras otros están menos ocupados.

**Weighted Round Robin**

Es una variante de Round Robin en la que los servidores tienen diferentes pesos según su capacidad.

Por ejemplo:

```text
Servidor A → peso 3
Servidor B → peso 1
Servidor C → peso 1
```

Aproximadamente, de cada cinco peticiones, tres se enviarán a A y una a cada uno de los otros servidores.

También existen otros métodos, como **IP Hash**, que utiliza la dirección IP del cliente para seleccionar un servidor, y algoritmos basados en tiempo de respuesta.

---

### 9. Patrón Reverse Proxy y protocolo AJP

Un **Reverse Proxy** se coloca delante de los servidores de aplicación. El cliente se comunica con Apache y Apache decide a qué servidor interno debe enviar la petición.

Por ejemplo:

```text
Cliente
   ↓
HTTPS :443
   ↓
Apache
   ↓
AJP :8009
   ↓
Tomcat
```

Otra posibilidad es utilizar HTTP internamente:

```text
Cliente
   ↓
HTTPS :443
   ↓
Apache
   ↓
HTTP :8080
   ↓
Tomcat
```

La utilización de Apache como servidor frontal tiene varias ventajas.

En primer lugar, permite centralizar la gestión de **SSL/TLS**. El cliente establece HTTPS con Apache y este puede comunicarse con Tomcat mediante una conexión interna protegida por la red privada y las medidas de seguridad correspondientes.

También permite que Tomcat no tenga que estar expuesto directamente a Internet. El puerto `8080` puede quedar accesible únicamente desde la red interna o incluso desde `localhost`.

Apache puede encargarse además de servir contenido estático, aplicar reglas de acceso, gestionar Virtual Hosts, realizar redirecciones y distribuir las peticiones entre diferentes instancias de Tomcat.

AJP es un protocolo binario diseñado para la comunicación entre un servidor web y Tomcat. Tradicionalmente se utilizaba el puerto `8009`.

Actualmente debe configurarse con especial cuidado porque AJP proporciona un acceso más directo a determinadas estructuras internas de Tomcat. La documentación oficial de Tomcat recomienda prestar especial atención a parámetros como `address`, `secret`, `secretRequired` y `allowedRequestAttributesPattern`.

Por tanto, AJP no debería exponerse directamente a Internet. Lo habitual es que solo sea accesible desde el servidor o desde una red interna de confianza.

---

### 10. Evolución de la administración de servicios en GNU/Linux

En sistemas GNU/Linux antiguos era habitual administrar servicios mediante **SysV init**, utilizando scripts ubicados en directorios como:

```text
/etc/init.d/
```

Por ejemplo:

```text
/etc/init.d/apache2
```

También podían utilizarse herramientas específicas como `apachectl`.

Las distribuciones Linux modernas utilizan principalmente **systemd** como sistema de inicio y gestor de servicios. Debian utiliza systemd como sistema de inicio predeterminado desde Debian 8, y también es el sistema empleado habitualmente por distribuciones como Ubuntu y RHEL.

El comando principal para administrar los servicios es:

```bash
systemctl
```

Para iniciar Apache:

```bash
sudo systemctl start apache2
```

Para reiniciar Apache:

```bash
sudo systemctl restart apache2
```

Para detenerlo:

```bash
sudo systemctl stop apache2
```

Para consultar su estado:

```bash
sudo systemctl status apache2
```

Para habilitar Apache para que se inicie automáticamente al arrancar el sistema:

```bash
sudo systemctl enable apache2
```

También podemos habilitarlo y arrancarlo inmediatamente mediante:

```bash
sudo systemctl enable --now apache2
```

En sistemas basados en RHEL, el nombre habitual del servicio es `httpd`, por lo que los comandos serían, por ejemplo:

```bash
sudo systemctl start httpd
sudo systemctl restart httpd
sudo systemctl stop httpd
sudo systemctl status httpd
sudo systemctl enable httpd
```

La principal ventaja de `systemd` es que centraliza la administración de servicios y permite gestionar dependencias, arranque automático, estados, procesos y registros de una forma más integrada que el antiguo sistema SysV.

---

# FUENTES CONSULTADAS

- Apache Software Foundation — Apache HTTP Server Documentation.
- Apache Software Foundation — Apache Tomcat Configuration Reference.
- Mozilla Developer Network (MDN) — Same-Origin Policy, CORS, `file://` y HTTP.
- Docker Documentation — Docker concepts and containers.
- NGINX Documentation — HTTP Load Balancing.
- Oracle Java Documentation — Applet API y tecnologías eliminadas.
- PHP Documentation — PHP Licensing.
- MySQL Documentation — MySQL Licensing and Community Edition.
- Debian Documentation — systemd e inicialización del sistema.
- systemd Documentation — System and Service Manager.
