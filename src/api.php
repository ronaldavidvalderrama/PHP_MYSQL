<?php 

require_once "src/db.php"; // Incluye la conexión a la base de datos

$metodo = $_SERVER['REQUEST_METHOD']; // Obtiene el método HTTP de la solicitud

$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$recurso = $uri[0]; // Obtiene el primer segmento de la URI como recurso
$id = $uri[1] ?? null; // Obtiene el segundo segmento de la URI como ID (opcional)


header('Content-Type: application/json');
// Establece el tipo de contenido de la respuesta a JSON


//http://Localhost:8081{/...} - Enpoint de la API

$recursos_validos = ['categorias', 'productos', 'promociones'];

if (!in_array($recurso, $recursos_validos)) {
    http_response_code(404);
    echo json_encode([
        'Error' => 'Recurso no encontrado',
        'code' => 404,
        'errorurl'=> 'https://http.cat/images/404.jpg']);
    exit;
}


switch ($metodo) {
    case 'GET':
        // REALIZAR CONSULTAS
        if ($recurso === 'categorias') {
            $stmt = $pdo->prepare("SELECT id, nombre FROM categorias");
            $stmt->execute();
            $response = $stmt->fetchAll(PDO::FETCH_ASSOC);  
            echo json_encode($response, JSON_PRETTY_PRINT);
        } elseif ($recurso === 'productos') {
            $stmt = $pdo->prepare("SELECT id, nombre, precio, categoria_id FROM productos");
            $stmt->execute();
            $response = $stmt->fetchAll(PDO::FETCH_ASSOC);  
            echo json_encode($response, JSON_PRETTY_PRINT);
        } elseif ($recurso === 'promociones') {
            $stmt = $pdo->prepare("SELECT id, descripcion, descuento, producto_id FROM promociones");
            $stmt->execute();
            $response = $stmt->fetchAll(PDO::FETCH_ASSOC);  
            echo json_encode($response, JSON_PRETTY_PRINT);
        } else {
            http_response_code(404);
            echo json_encode([
                'Error' => 'Recurso no encontrado',
                'code' => 404,
                'errorurl' => 'https://http.cat/images/404.jpg'
            ]);
        }
        break;

case 'POST':
    // REALIZAR INSERCIONES
    $data = json_decode(file_get_contents('php://input'), true);

    if ($recurso === 'categorias') {
        $stmt = $pdo->prepare('INSERT INTO categorias (nombre) VALUES (?)');
        $stmt->execute([
            $data['nombre']
        ]);
        http_response_code(201); // Código de estado 201 para creación exitosa
        $data['id'] = $pdo->lastInsertId();
        echo json_encode([
            'message' => 'Categoría creada con exito',
            'categoria' => $data
        ]);
    } elseif ($recurso === 'productos') {
        $stmt = $pdo->prepare('INSERT INTO productos (nombre, precio, categoria_id) VALUES (?, ?, ?)');
        $stmt->execute([
            $data['nombre'],
            $data['precio'],
            $data['categoria_id']
        ]);
        http_response_code(201);
        $data['id'] = $pdo->lastInsertId();
        echo json_encode([
            'message' => 'Producto creado con exito',
            'producto' => $data
        ]);
    } elseif ($recurso === 'promociones') {
        $stmt = $pdo->prepare('INSERT INTO promociones (descripcion, descuento, producto_id) VALUES (?, ?, ?)');
        $stmt->execute([
            $data['descripcion'],
            $data['descuento'],
            $data['producto_id']
        ]);
        http_response_code(201);
        $data['id'] = $pdo->lastInsertId();
        echo json_encode([
            'message' => 'promocion creado con exito',
            'producto' => $data
        ]);
    } else {
        http_response_code(404);
        echo json_encode([
            'Error' => 'Recurso no encontrado',
            'code' => 404
        ]);
    }

    break;

    


}




