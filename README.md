# MobileIA Core Expressive
Libreria con utilidades basicas

1. Incluir libreria:
```bash
composer require mobileia/mia-core-expressive
```
2. Incluir configuración en el archivo: "config/config.php"
```php
// Configurar modulo de emails
\Mobileia\Expressive\ConfigProvider::class,

// Default App module config
//App\ConfigProvider::class,
```
3. Crear archivo de configuracion: "config/autoload/google.global.php":
```php
return [
    'google' => [
        'keyFilePath' => __DIR__ . '/../../google/credentials.json',
        'projectId' => 'project-id'
    ],
];
```