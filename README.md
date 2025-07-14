# 📝 Laravel Blog

> **Proyecto educativo de blog full-stack** desarrollado con Laravel 12 para el aprendizaje práctico del framework, implementando autenticación segura, gestión completa de contenido y soporte multilenguaje.

---

## 📖 Sobre el proyecto

Este es un proyecto de práctica diseñado para aprender y dominar los conceptos fundamentales de Laravel 12. Implementa un sistema de blog completo que demuestra las mejores prácticas de desarrollo web moderno, incluyendo arquitectura MVC, autenticación segura, operaciones CRUD y internacionalización.

## ✨ Características principales

- 📝 **Sistema de publicaciones** - CRUD completo para crear, leer, actualizar y eliminar posts
- 🔐 **Autenticación robusta** - Registro, login y gestión de usuarios con Laravel Breeze
- 🎨 **Interfaz moderna** - Diseño responsivo y atractivo con Tailwind CSS
- 🌍 **Multilenguaje** - Soporte completo para español e inglés, extensible a otros idiomas
- 🔧 **Arquitectura limpia** - Implementación de patrones MVC y mejores prácticas de Laravel
- 📱 **Responsive design** - Optimizado para dispositivos móviles y desktop
- 🛡️ **Seguridad** - Protección CSRF, validación de datos y sanitización de entradas

## 🎯 Objetivos de aprendizaje

Este proyecto está diseñado para practicar:
- **Fundamentos de Laravel**: Routing, Controllers, Models, Views
- **Autenticación y autorización**: Laravel Breeze, middleware, gates
- **Base de datos**: Migraciones, Eloquent ORM, relaciones
- **Frontend**: Blade templating, Tailwind CSS, componentes reutilizables
- **Internacionalización**: Sistema de traducciones de Laravel
- **Mejores prácticas**: Estructura de proyecto, naming conventions, documentación

## 🛠️ Tecnologías

- **Laravel 12** - Framework PHP
- **Laravel Breeze** - Sistema de autenticación
- **Tailwind CSS** - Framework CSS
- **Blade** - Motor de plantillas
- **Laravel Lang** - Paquete de traducciones
- **PHP 8.1+** - Versión recomendada

## 🚀 Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/hectorgm26/laravel-blog.git
cd laravel-blog
```

### 2. Instalar dependencias

```bash
# Dependencias PHP
composer install

# Dependencias JavaScript
npm install
```

### 3. Configurar entorno

```bash
# Copiar archivo de configuración
cp .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### 4. Configurar base de datos

Edita el archivo `.env` y configura tu base de datos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

### 5. Ejecutar migraciones

```bash
php artisan migrate
```

### 6. Compilar assets

```bash
# Para desarrollo
npm run dev

# Para producción
npm run build
```

### 7. Levantar servidor

```bash
php artisan serve
```

¡Listo! Visita [http://localhost:8000](http://localhost:8000) para ver tu blog.

## 🌍 Configuración Multilenguaje

### Cambiar idioma predeterminado

En el archivo `.env`:

```env
APP_LOCALE=es
```

### Publicar archivos de idioma

```bash
php artisan lang:publish
```

### Instalar traducciones de la comunidad

Para obtener traducciones más completas:

```bash
composer require --dev laravel-lang/lang
php artisan lang:update
```

### Agregar nuevos idiomas

```bash
# Ejemplo: agregar portugués
php artisan lang:add pt
```

### Usar traducciones en vistas

```blade
<!-- En archivos Blade -->
<h1>{{ __('Welcome') }}</h1>
<p>{{ __('This is my blog') }}</p>
```

Agregar traducciones en `lang/es.json`:

```json
{
    "Welcome": "Bienvenido",
    "This is my blog": "Este es mi blog"
}
```

## 📁 Estructura del proyecto

```
laravel-blog/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── PostController.php      # Controlador de publicaciones
│   │   │   └── ProfileController.php   # Controlador de perfiles
│   │   ├── Middleware/
│   │   └── Requests/
│   └── Models/
│       ├── User.php                     # Modelo de usuario
│       └── Post.php                     # Modelo de publicación
├── database/
│   ├── migrations/
│   │   ├── create_users_table.php
│   │   └── create_posts_table.php
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── posts/                       # Vistas de publicaciones
│   │   ├── auth/                        # Vistas de autenticación
│   │   └── layouts/
│   │       └── app.blade.php            # Layout principal
│   └── lang/
│       ├── en/                          # Traducciones en inglés
│       └── es/                          # Traducciones en español
├── routes/
│   ├── web.php                          # Rutas web
│   └── auth.php                         # Rutas de autenticación
└── public/
    ├── css/
    └── js/
```

## 🚀 Funcionalidades implementadas

### 📝 Gestión de publicaciones
- Crear nuevas publicaciones con título, contenido y fecha
- Listado paginado de todas las publicaciones
- Visualización individual de publicaciones
- Edición de publicaciones existentes
- Eliminación de publicaciones con confirmación

### 👤 Sistema de usuarios
- Registro de nuevos usuarios
- Login y logout seguro
- Perfil de usuario editable
- Verificación de email
- Recuperación de contraseña

### 🌐 Internacionalización
- Interfaz completamente traducida al español
- Cambio dinámico de idioma
- Fechas localizadas
- Mensajes de error y éxito traducidos

## 🔧 Comandos útiles para desarrollo

```bash
# Limpiar cachés del sistema
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Ejecutar migraciones con datos de prueba
php artisan migrate:fresh --seed

# Compilar assets en modo desarrollo con auto-recarga
npm run dev

# Generar nueva migración
php artisan make:migration create_posts_table

# Crear controlador con recursos
php artisan make:controller PostController --resource

# Crear modelo con migración
php artisan make:model Post -m

# Ejecutar tests
php artisan test
```

## 🧪 Testing

```bash
# Ejecutar todos los tests
php artisan test

# Ejecutar tests con coverage
php artisan test --coverage

# Ejecutar tests específicos
php artisan test --filter PostTest
```

## 📚 Recursos de aprendizaje

Este proyecto fue desarrollado siguiendo:
- [Documentación oficial de Laravel 12](https://laravel.com/docs)
- [Laravel Breeze Documentation](https://laravel.com/docs/starter-kits#breeze)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Laravel Localization](https://laravel.com/docs/localization)

## 📋 Requisitos del sistema

- PHP 8.2 o superior
- Composer
- Node.js y npm
- Base de datos (MySQL, PostgreSQL, SQLite)

## 🤝 Contribuir

¡Las contribuciones son bienvenidas! Este es un proyecto educativo perfecto para:

- 🔰 **Principiantes**: Aprender Laravel con ejemplos prácticos
- 📖 **Estudiantes**: Entender conceptos de desarrollo web
- 👨‍💻 **Desarrolladores**: Mejorar funcionalidades existentes

### Cómo contribuir:

1. **Fork** el proyecto
2. **Crea** una rama para tu feature:
   ```bash
   git checkout -b feature/nueva-funcionalidad
   ```
3. **Commit** tus cambios:
   ```bash
   git commit -m "feat: agregar nueva funcionalidad"
   ```
4. **Push** a la rama:
   ```bash
   git push origin feature/nueva-funcionalidad
   ```
5. **Abre** un Pull Request

## 📝 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 📧 Contacto

**Héctor González** - [@hectorgm26](https://github.com/hectorgm26)

Link del proyecto: [https://github.com/hectorgm26/laravel-blog](https://github.com/hectorgm26/laravel-blog)

---

## 🎓 Aprendizajes clave

Durante el desarrollo de este proyecto se practicaron:

- ✅ **Routing y Controllers**: Manejo de rutas y controladores RESTful
- ✅ **Eloquent ORM**: Relaciones entre modelos y consultas de base de datos
- ✅ **Blade Templates**: Sistema de plantillas y componentes reutilizables
- ✅ **Middleware**: Protección de rutas y autenticación
- ✅ **Validación**: Validación de formularios y datos de entrada
- ✅ **Migrations**: Versionado de base de datos
- ✅ **Localization**: Sistema de traducciones multi-idioma
- ✅ **Frontend Integration**: Integración con Tailwind CSS

---

⭐ **Si este proyecto te ayudó a aprender Laravel, ¡considera darle una estrella!**
