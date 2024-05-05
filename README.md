# Desplegament-web
Aquesta és una petita aplicació web feta amb PHP.
# Características Principales:
1. CRUD Completo: Permite realizar las operaciones básicas de Crear, Leer, Actualizar y Eliminar (CRUD) sobre una base de datos de productos.
2. Interfaz de Usuario Amigable: Presenta una interfaz de usuario sencilla y limpia, utilizando Bootstrap para el diseño y la presentación.
3. Gestión de Categorías: Asocia cada producto con una categoría y permite seleccionar la categoría al crear o modificar un producto.
4. Redireccionamiento Efectivo: Después de realizar operaciones exitosas como actualizar o eliminar un producto, redirige al usuario a la página principal.
5. Mensajes de Error Claros: Muestra mensajes de error informativos en caso de fallos en las operaciones, proporcionando detalles como el error de la base de datos.
# Componentes:
1. Principal.php: Muestra una lista de productos con sus detalles, incluyendo opciones para modificar o eliminar cada producto.
2. Modificar.php: Presenta un formulario para modificar un producto existente, prellenando los campos con la información actual del producto.
3. Actualizar.php: Maneja la actualización de un producto en la base de datos, validando los campos y ejecutando la consulta SQL correspondiente.
4. Eliminar.php: Controla la eliminación de un producto de la base de datos, verificando la validez del ID y ejecutando la consulta SQL para eliminar.
5. Nou.php: Permite agregar un nuevo producto a la base de datos mediante un formulario.
6. Connexio.php: Contiene la clase de conexión para establecer y obtener la conexión a la base de datos.
7. Footer.php y Header.php: Fragmentos de código incluidos para mantener una estructura consistente en las páginas.
# Tecnologías Utilizadas:
1. PHP: Para el desarrollo del backend y la lógica del servidor.
2. MySQL: Como sistema de gestión de base de datos relacional.
3. Bootstrap: Para el diseño y la presentación de la interfaz de usuario.
