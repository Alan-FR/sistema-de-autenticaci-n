<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <?php include '../controllers/SessionController.php'; ?>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md text-center">
            <h1 class="text-2xl font-bold mb-6">Bienvenid@, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h1>
            <p class="mb-4">Tu correo electrónico es: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
            <a href="../controllers/LogoutController.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>