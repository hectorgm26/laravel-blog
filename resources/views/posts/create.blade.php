
<x-app-layout
    meta-title="Create new post"
    meta-description="Form to create a new post">

    {{-- Hay un posible error 419, por expirar el token CSRF, que es un token de seguridad que se genera al cargar la pagina, y se envia junto con el formulario para evitar ataques CSRF. Si no se envia, Laravel devuelve un error 419. EL TOKEN DURA 2 HORAS, y se regenera al recargar la pagina --}}

    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new post') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('posts.store') }}" 
                        method="POST"
                        class="space-y-4 max-w-xl">

                        @include('posts.form-fields')
                        
                        <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>

                        @csrf {{-- Esta directiva es obligatorio con POST, PUT, PATCH y DELETE, ya que son metodos que modifican datos en el servidor. La directiva imprimira un token en un campo oculto del formulario, que servira para verificar el origen de este.--}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <a href="{{ route('posts.index') }}">{{ __('Back') }}</a> --}}
     
</x-app-layout>