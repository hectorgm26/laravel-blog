<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller {

    // Metodo obtenido de heredar de Controller
    public function __construct()
    {
        // $this->middleware('auth')->only(['create', 'store', 'edit', 'update', 'destroy']);
        $this->middleware('auth')->except(['index', 'show']);
    }

// Por convencion para listar datos se usa un metodo llamado index, y para mostrar un solo dato se usa un metodo llamado show.
    public function index()
    {
        // EL modelo es Post
        $posts = Post::get(); // Con el ORM no es necesario especificar el nombre de la tabla, ya que Eloquent lo infiere a partir del nombre del modelo. Si el nombre del modelo es Post, Eloquent buscará una tabla llamada posts (en plural) en la base de datos.

        // Pero, si en la base de datos la tabla tiene otro nombre distinto al del Modelo, o simplemente queremos utilizar otro nombre, DENTRO DEL MODELO utilizaremos protected $table = 'nombre_de_la_tabla'. De esta forma las consultas a la BD se haran a esa tabla en concreto.

        return view('posts.index', ['posts' => $posts]);
        // al metodo return view se le pasan como primer parametro el nombre de la vista, y como segundo parametro un array asociativo con los datos que queremos pasar a la vista. En este caso, pasamos el array de posts. Y dentro de $posts, 
    }

    // Mostrar el detalle de un post en concreto
    public function show(Post $post) {

        // al view se le pasa como primer parametro el nombre de la vista, y como segundo parametro un array asociativo con los datos que queremos pasar a la vista.
        return view('posts.show', ['post' => $post]);

        // return $post;

        // return Post::findOrFail($post); ESTO EN EL CASO DE NO HABER PUESTO Post en los argumementos del metodo, ya que al ponerlo, Laravel automaticamente inyecta el modelo Post y busca el registro con el id que se le pasa en la URL. Si no encuentra el registro, devuelve un error 404.

        // Laravel automaticamente convierte los modelos de Eloquent a JSON cuando se devuelve una respuesta desde un controlador.
    }

    // Devuelve el formulario para crear un nuevo post
    public function create() {
        return view('posts.create', ['post' => new Post()]);
    }

    // Almacena el post en la base de datos
    public function store(SavePostRequest $request) {

        // La forma recomendada es pasandole por parametro el objeto Request, que contiene toda la informacion de la peticion, incluyendo los datos del formulario. Pero se puede hacer con un simple return request();

        /* ESTA VALIDACION NO ES NECESARIA CUANDO SE UTILIZA UN FORM REQUEST, Y DE PASO, EN EL METODO YA NO SE USA Request, si no que se utiliza el Form Request que hemos creado, que es una clase que extiende de FormRequest y contiene las reglas de validacion y autorizacion para la peticion.
        
        $validated = $request->validate([
            'title' => ['required', 'min:4'],
            'body' => ['required'],
        ]); 

        dd($validated); // Esto nos permite ver los datos validados

        Para ver mas validaciones ver laravel.com/docs/12/validation y clic en Available Validation Rules.
        */

        /*
        Podemos tambien aqui agregar por otro array traducciones a los mensajes de error. Ejemplo:
        ], [
            'title.required' => 'El campo titulo es obligatorio.',
            'title.min' => 'El titulo debe tener al menos :min caracteres.',
            'body.required' => 'El campo contenido es obligatorio.',
        ]);
        */

        /* 
        Eloquent permite hacer esta insersion de forma mas sencilla, sin necesidad de crear un objeto Post y asignarle los valores.
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();
        */

        /*
        PARA NO REPETIR LOS VALORES Y PONERLOS MANUALMENTE, COMO LO SIGUIENTE, SE HACE ASI:
        Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);
        */

        Post::create($request->validated());

        // Para que despues del envio no se quede en blanco, podemos utilizar una redireccion
        //return redirect('/blog'); // se le pasa como parametro la ruta a que queremos redirigir al usuario

        // return redirect()->route('posts.index'); // Pero con nombres de rutas es mejor. SIN EMBARGO CON UN HELPER SE HACE LO MISMO

        // ********* MENSAJES DE EXITO **********
        // El metodo flash recibe dos parametros, el primero es el nombre con que se guardara el mensaje, y el segundo es el contenido del mensaje. Este mensaje se guardara en la sesion y se mostrara donde se quiera en la vista. En este caso, luego de crear el post, redirigimos al usuario a la lista de posts, y alli mostraremos el mensaje de exito. 

        // Este mensaje dura por una peticion, por lo que al recargar la pagina, el mensaje desaparecera.
        // Si se quiere que el mensaje dure mas tiempo, se puede usar el metodo session()->put('status', 'Post created!');, pero en este caso no es necesario.
        
        // session()->flash('status', 'Post created!'); PODEMOS ELIMINAR ESTA LINEA, PASANDOLE EL WITDH A LA REDIRECCION
        return to_route('posts.index')->with('status', 'Post created!');

        // Con $request->input('title') podemos acceder a los datos del formulario enviados por POST.
    }

    // Muestra el formulario para editar un post. Se le pasa el post que queremos editar
    public function edit(Post $post) {
        return view('posts.edit', ['post' => $post]);
    }

    // Almacena los cambios del post en la base de datos
    public function update(SavePostRequest $request, Post $post) {
        
        // $post = Post::findOrFail($post); // Buscamos el post por su id, si no lo encuentra, lanza un error 404. PERO SI AGREGAMOS Post en los argumentos, Laravel automaticamente inyecta el modelo Post y busca el registro con el id que se le pasa en la URL.

        // Como ya tenemos una instancia de Post, proveniente de la inyeccion de dependencias en el metodo, podemos actualizarlo directamente con el metodo update

        $post->update($request->validated());

        return to_route('posts.show', $post)->with('status', 'Post updated!');
        // Es lo mismo que return to_route('posts.show', $post->id), ya que Laravel automaticamente convierte el modelo a su id.
    }

    // Elimina un post de la base de datos
    // Si se usa $post solo, sin nombrar el tipo de la clase, laravel buscara por el id del post
    public function destroy(Post $post) {

        $post->delete();

        return to_route('posts.index')->with('status', 'Post deleted!');
    }

}

/* DATOS PASADOS MANUALMENTE A LA VISTA

    public function index() {
    // Existen controladores con un solo metodo o una sola accion (__invoke). PERO PARA CONTROLADORES DE MULTIPLES ACCIONES, EN EL ENRUTADO SE DEBE PASAR EL CONTROLADOR COMO ARRAY, Y EL NOMBRE DEL METODO QUE SE QUIERE INVOCAR.

        $posts = [
            ['title' => 'Primer post'],
            ['title' => 'Segundo post'],
            ['title' => 'Tercer post'],
            ['title' => 'Cuarto post'],
        ];

        return view('blog', ['posts' => $posts]);
    }

    // PODEMOS CREAR CONTROLADORES DE FORMA SENCILLA CON ARTISAN Y EL COMANDO: php artisan make:controller NombreDelControlador opciones

    // -i = controlador inbocable, es decir de una sola accion con el metodo __invoke
    // -r = controlador de recursos, es decir que contendra los 7 metodos RESTful (index, create, store, show, edit, update, destroy)
    // --api = solo generara 5 metodos RESTful (index, store, show, update, destroy) y no generara los metodos create y edit, ya que dichas vistas seran del front end

*/


/* DATOS PASADOS DESDE UNA BASE DE DATOS, PERO SIN EL ORM ELOQUENT
   
    public function index() {

        $posts = DB::table('posts')->get();
        // Podemos pasarle sql directamente con DB::raw(), pero es mejor usar el constructor de consultas de Laravel para evitar problemas de inyeccion SQL.

        return view('blog', ['posts' => $posts]);
    }

*/
?>