# 🧪 Taller A1 – API REST con PHP y MySQL

Este proyecto implementa una API REST básica en PHP (sin frameworks) conectada a una base de datos MySQL. Permite la gestión de productos, categorías y promociones, con respuestas en formato JSON y lista para ser probada desde Postman.

---

## 🗃️ Estructura de la Base de Datos

**Base de datos:** `taller_api`

### 📁 Tablas

#### `categorias`
- `id` INT AUTO_INCREMENT PRIMARY KEY
- `nombre` VARCHAR(100) NOT NULL

#### `productos`
- `id` INT AUTO_INCREMENT PRIMARY KEY
- `nombre` VARCHAR(100) NOT NULL
- `precio` DECIMAL(10,2) NOT NULL
- `categoria_id` INT NOT NULL  
  (FOREIGN KEY → `categorias(id)`)

#### `promociones`
- `id` INT AUTO_INCREMENT PRIMARY KEY
- `descripcion` TEXT NOT NULL
- `descuento` DECIMAL(5,2) NOT NULL  — (% entre 0 y 100)
- `producto_id` INT NOT NULL  
  (FOREIGN KEY → `productos(id)`)

---

## 🎯 Funcionalidades de la API

- **CRUD completo** para:
  - Productos
  - Categorías
  - Promociones
- **Relaciones:** 
  - Cada producto muestra su categoría asociada.
  - Se indica si tiene o no una promoción.
- **Ruta extra:**  
  - Listar productos con promociones mayores al 20%.

---

## 📌 Endpoints Sugeridos

### 🛍 Productos
| Método | Ruta             | Descripción                      |
|--------|------------------|----------------------------------|
| GET    | /productos        | Obtener todos los productos      |
| GET    | /productos/{id}   | Obtener un producto por ID       |
| POST   | /productos        | Crear un nuevo producto          |
| PUT    | /productos/{id}   | Editar un producto               |
| DELETE | /productos/{id}   | Eliminar un producto             |

### 🗂 Categorías
| Método | Ruta               | Descripción                    |
|--------|--------------------|--------------------------------|
| GET    | /categorias         | Listar categorías              |
| POST   | /categorias         | Crear nueva categoría          |
| PUT    | /categorias/{id}    | Editar una categoría           |
| DELETE | /categorias/{id}    | Eliminar una categoría         |

### 💸 Promociones
| Método | Ruta                | Descripción                   |
|--------|---------------------|-------------------------------|
| GET    | /promociones         | Listar promociones             |
| POST   | /promociones         | Crear promoción                |
| PUT    | /promociones/{id}    | Editar promoción               |
| DELETE | /promociones/{id}    | Eliminar promoción             |

### 🏆 Reto extra
| Método | Ruta                           | Descripción                                  |
|--------|----------------------------------|----------------------------------------------|
| GET    | /promociones/mayores-a-20       | Productos con promociones > 20% descuento     |

---

## ⚙️ Tecnologías

- PHP (sin frameworks)
- MySQL (via PDO)
- JSON como formato de respuesta
- Postman para pruebas de endpoints
- Docker (opcional)

## 🚀 Cómo probar

1. Clonar el repositorio
2. Importar la base de datos `taller_api.sql`
3. Configurar conexión en `db.php`
4. Iniciar servidor local (XAMPP, Docker o similar)
5. Usar Postman para probar rutas (colección incluida)

**Hecho por:**  
RONAL DAVID VALDERRAMA GOMEZ
