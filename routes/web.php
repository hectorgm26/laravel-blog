<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
Route::get();
Route::post();
Route::put();
Route::patch();
Route::delete();
Route::options();
Route::any(); PARA RESPONDER A CUALQUIER TIPO DE PETICION

Y CUANDO QUEREMOS QUE UN METODO SEA ACEPTADO POR VARIOS TIPOS DE PETICIONES, USAMOS:
Route::match(['get', 'post'], 'ruta', function () { 
});
*/

// blog.test => welcome
// blog.test/contact => contact
// blog.test/blog => blog
// blog.test/nosotros => about

// Normalmmente las rutas reciben como primer parámetro una cadena de texto que representa la URL de la ruta, y como segundo parámetro una función anónima que devuelve una vista o un controlador. Pero cuando la ruta es de tipo view, el segundo parámetro es una cadena de texto que representa la vista que se va a devolver.

// las rutas view son rutas que no tienen un controlador asociado, ni lógica de negocio, simplemente devuelven una vista. Son útiles para páginas estáticas o de contenido fijo, y en si, son de tipo GET.

Route::view('/', 'welcome')->name('home'); // el nombre de la ruta es opcional, pero es una buena práctica darle un nombre a las rutas para poder referenciarlas fácilmente en el código.

Route::view('contacto', 'contact')->name('contact');

Route::view('nosotros', 'about')->name('about');

// Para mantener limpios el enrutado es recomendable usar controladores, sobre todo siempre que necesitemos realizar una accion entre la peticion y la respuesta. Los controladores son clases que agrupan la logica de negocio de una ruta, encargandose de recibir la peticicion, procesarla y devolver una respuesta.

// Route::get('blog', PostController::class)->name('blog'); FORMA PARA ENRUTAR UN CONTROLADOR CON UN SOLO METODO

// Mostrar todos los posts
// Route::get('blog', [PostController::class, 'index'])->name('posts.index');

// El orden del enrutado es importante, ya que con rutas con parametros dinamicos, si se colocan primeros que las rutas estaticas, estas ultimas nunca se alcanzaran, ya que el enrutador siempre buscara una coincidencia con la ruta dinamica. Por eso, las rutas estaticas deben ir antes que las rutas dinamicas.

// create para mostrar el formulario de creacion de un nuevo post
//Route::get('/blog/create', [PostController::class, 'create'])->name('posts.create');

// store para guardar el nuevo post en la base de datos
//Route::post('/blog', [PostController::class, 'store'])->name('posts.store');

// Para hacer referencia a un post en concreto, se puede usar una ruta con un parametro dinamico con llaves simples y sin el $, aceptando cualquier valor que se le pase en la URL.
//Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');

// Editar
// Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// Actualizar
//Route::patch('/blog/{post}', [PostController::class, 'update'])->name('posts.update');

// Eliminar
// Route::delete('/blog/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


// El metodo resource permite crear todas las rutas necesarias para un recurso, en este caso, el recurso es el modelo Post. Esto incluye las rutas para listar, mostrar, crear, almacenar, editar, actualizar y eliminar un post. El controlador que se encargara de manejar estas rutas es PostController.
Route::resource('blog', PostController::class, [
    'names' => 'posts', // Esto permite que la definicion de los nombres de las rutas generadas tengan el prefijo 'posts' en lugar de 'blog', siendo post.index, post.show, post.create, post.store, post.edit, post.update y post.destroy.
    'parameters' => [
        'blog' => 'post'
    ] // Esto permite renombrar los parametros, para que la ruta sea /blog/{post} en lugar de /blog/{blog}, y que el controlador reciba el modelo Post en lugar del modelo Blog.
]);

/*
Route::get('blog', function() {
    $posts = [
        ['title' => 'Primer post'],
        ['title' => 'Segundo post'],
        ['title' => 'Tercer post'],
        ['title' => 'Cuarto post'],
    ];

    return view('blog', ['posts' => $posts]); // el return view recibe el nombre de la vista, y cualquier dato que queramos pasarle a la vista, en este caso un array de posts.

})->name('blog');
*/


// RUTAS AGREGADAS POR LARAVEL BREEZE
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'password.confirm'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
