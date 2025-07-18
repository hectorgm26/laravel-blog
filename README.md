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
- **PHP 8.2+** - Versión recomendada

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

---

## 📚 Guía de aprendizaje Laravel

### 🛣️ Gestión de rutas

**Ver todas las rutas del proyecto:**
```bash
php artisan route:list
```

**Filtrar rutas por palabra clave:**
```bash
php artisan route:list --path=PalabraParaFiltrar
```

**Rutas de recursos (Resource Routes):**
En lugar de crear múltiples rutas individuales, Laravel permite generar todas las rutas CRUD automáticamente:

```php
// En lugar de crear 7 rutas individuales
Route::resource('blog', PostController::class);
```

**Recomendaciones para el desarrollo:**
1. Crear la vista que apunte a la ruta
2. Crear la ruta con el controlador y método correspondiente
3. Crear el controlador o método del controlador
4. Establecer la lógica de validaciones respectivas

### 🔐 Laravel Breeze - Sistema de autenticación

Laravel Breeze ofrece un punto de partida completo para autenticación, añadiendo vistas y controladores personalizables.

**Funcionalidades incluidas:**
- **Vista login** - Ingreso de usuarios
- **Vista register** - Registro de usuarios
- **Vista dashboard** - Panel principal
- **Vista forgot-password** - Recuperación de contraseña
- **Vista reset-password** - Reseteo de contraseña
- **Vista verify-email** - Verificación de email

> **Nota:** Las verificaciones de email se guardan en `storage/logs/laravel.log` al no tener configurado un proveedor de emails.

**Estructura de componentes:**
```
resources/views/
├── components/           # Componentes reutilizables de Breeze
└── layouts/
    ├── app.blade.php    # Layout para usuarios autenticados
    ├── guest.blade.php  # Layout para login/registro
    └── navigation.blade.php # Navegación principal
```

**Componentes Blade de Breeze:**
```blade
<x-input-label for="title" :value="__('Title')" />
<x-text-input id="title" name="title" type="text" value="{{ old('title', $post->title) }}" />
<x-input-error :messages="$errors->get('title')" />
<x-primary-button type="submit">{{ __('Send') }}</x-primary-button>
```

### 🛡️ Protección de rutas (Middleware)

**Proteger rutas individuales:**
```php
Route::view('nosotros', 'about')->name('about')->middleware('auth');
```

**Proteger desde el controlador:**
```php
class PostController extends Controller
{
    public function __construct()
    {
        // Proteger solo métodos específicos
        $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
        
        // Proteger todos excepto algunos métodos
        $this->middleware('auth')->except(['index', 'show']);
    }
}
```

### 🌍 Sistema de traducción (Localization)

**Configuración básica:**
```bash
# Publicar archivos de idioma
php artisan lang:publish

# Instalar traducciones de la comunidad
composer require --dev laravel-lang/lang
php artisan lang:update

# Agregar nuevos idiomas
php artisan lang:add pt
```

**Configuración en `.env`:**
```env
APP_LOCALE=es
APP_FALLBACK_LOCALE=en
```

**Uso en vistas Blade:**
```blade
<h1>{{ __('Title') }}</h1>
```

**Archivo de traducciones (`lang/es.json`):**
```json
{
    "Title": "Título",
    "Welcome": "Bienvenido"
}
```

### 🗄️ Migraciones de base de datos

Las migraciones son clases PHP que permiten crear y modificar esquemas de bases de datos.

**Métodos principales:**
- `up()` - Crear o modificar estructura de tabla
- `down()` - Eliminar o deshacer cambios

**Comandos de migración:**
```bash
# Ejecutar todas las migraciones
php artisan migrate

# Deshacer último lote de migraciones
php artisan migrate:rollback

# Deshacer número específico de migraciones
php artisan migrate:rollback --step=2

# Eliminar todas las tablas y ejecutar desde cero
php artisan migrate:fresh

# Crear nueva migración
php artisan make:migration create_posts_table

# Modificar tabla existente
php artisan make:migration add_body_to_posts_table
```

### 📊 Modelos Eloquent

Los modelos permiten al ORM Eloquent interactuar con la base de datos usando POO.

**Crear modelo:**
```bash
# Solo modelo
php artisan make:model Post

# Modelo con migración
php artisan make:model Post -m
```

**Uso con Tinker:**
```bash
php artisan tinker
```

```php
// Obtener todos los posts
App\Models\Post::get();

// Buscar por ID
App\Models\Post::find(1);

// Crear nuevo post
$post = new App\Models\Post;
$post->title = "Nuevo título";
$post->save();

// Actualizar post existente
$post = App\Models\Post::find(1);
$post->title = "Título modificado";
$post->save();

// Eliminar post
$post->delete();
```

### 📝 Form Requests (Validaciones)

Para encapsular la lógica de validación:

```bash
php artisan make:request SavePost
```

**Estructura del Form Request:**
```php
class SavePost extends FormRequest
{
    public function authorize()
    {
        return true; // Cambiar de false a true para autorizar
    }

    public function rules()
    {
        return [
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:10'
        ];
    }
}
```

**Flujo de trabajo para agregar nuevos campos:**
1. Agregar campo en el formulario Blade
2. Agregar validación en el Form Request
3. Actualizar el array `$fillable` en el modelo

## 🧪 Testing

```bash
# Ejecutar todos los tests
php artisan test

# Ejecutar tests con coverage
php artisan test --coverage

# Ejecutar tests específicos
php artisan test --filter PostTest
```

## 💡 Tips y buenas prácticas

### 🔍 Debugging y desarrollo
- Usa `php artisan tinker` para probar modelos y consultas interactivamente
- Los logs de aplicación se encuentran en `storage/logs/laravel.log`
- Las verificaciones de email sin configurar SMTP aparecen en los logs

### 🎨 Componentes y layouts
- Los componentes de Breeze tienen clases asociadas en `app/View/Components`
- `AppLayout` se usa para usuarios autenticados
- `GuestLayout` se usa para login/registro
- Para pasar propiedades a layouts, agrégalas como propiedades de la clase

### 🛠️ Convenciones de Laravel
- Modelos en **PascalCase** y **singular** (Post)
- Tablas en **snake_case** y **plural** (posts)
- Controladores terminan en **Controller** (PostController)
- Migraciones descriptivas: `create_posts_table`, `add_body_to_posts_table`

### 📄 Estructura de archivos
```
app/Http/
├── Controllers/     # Lógica de negocio
├── Requests/       # Validaciones de formularios
└── Middleware/     # Filtros de peticiones

resources/views/
├── components/     # Componentes reutilizables
├── layouts/       # Plantillas base
└── posts/         # Vistas específicas de posts
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

### 💡 Ideas para contribuir:
- Agregar sistema de comentarios
- Implementar categorías y tags
- Mejorar el diseño responsive
- Agregar más idiomas
- Implementar sistema de búsqueda
- Agregar tests unitarios

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

💡 **¿Tienes sugerencias?** Abre un issue o contribuye directamente al código.
