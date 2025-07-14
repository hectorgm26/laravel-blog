<!-- Para usar componente hay dos opciones, usar la directiva @ component, o usar la etiqueta de blade para componentes -->

{{--@component('components.layout')--}}

{{-- Con x-layout el componente asume que la ubicacion es la carpeta components (la x), y luego se coloca el nombre del componente sin la extension .blade.php --}}
{{-- Si queremos imprimir algo que se evalue como php y no como string literal, se usa un dos puntos : antes del nombre de la propiedad --}}
<x-blog-layout meta-title="Home Title" meta-description="Esta es la pagina de inicio de mi sitio web." :sum="2 + 2">

    {{-- Todo lo que pongas dentro de <x-layout>...</x-layout>, pero fuera de cualquier otro <x-slot>, será parte de $slot --}}
        <div class="mx-auto mt-4 max-w-6xl">
            <h1 class="mt-4 mb-8 text-center font-serif text-4xl font-extrabold text-sky-600 md:text-5xl">
                Inicio</h1>
        </div>

    {{--
    <x-slot:metaTitle>
        Pagina de Inicio
    </x-slot:metaTitle> 

    PODRIAMOS HACER ESTO PARA DARLE VALOR A LA PROPIEDAD, PERO COMO SOLO QUEREMOS IMPRIMIR UN STRING, PODEMOS UTILIZAR PROPIEDADES COMO SI FUERAN ATRIBUTOS HTML DENTRO DEL COMPOMENTE <x></x>. 
    Por convencion, para referenciar las propiedades se utiliza kebab-case, y para definirlas se usa camelCase.
    --}}

    {{-- la estructura x-slot permite imprimir estrucutras html con propiedades del componente blade pasandoselas en el name
    <x-slot name="sidebar"> tambien funciona <x-slot:sidebar> 
        Home Sidebar
    </x-slot> --}}

</x-blog-layout>

{{--@endcomponent--}}
