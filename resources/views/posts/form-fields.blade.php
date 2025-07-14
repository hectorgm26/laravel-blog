<div>

    <x-input-label for="title" :value="__('Title')" /> {{-- para que funcione el forr, en el input el id debe ser igual al valor del foor en el x-input-label --}}

    <x-text-input id="title" 
        name="title" 
        type="text" 
        value="{{ old('title', $post->title) }}"
        class="block w-full mt-1" />
    {{-- old('title') es una funcion que recupera el valor del campo title del formulario, si este se ha enviado y ha fallado la validacion (OTROS DATOS FALLARON) para que el usuario no tenga que volver a escribirlo --}}


    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
    
    {{-- la variable $errors puede recorrerse con un foreach, o acceder con la directiva error, PERO MEJOR USAR CON LARAVEL BREEZE EL COMPONENTE ERROR
    @error('title')
        <br>
        <small style="color: red"> {{ $message }}</small>
    @enderror
    --}}
</div>

<div>
    {{-- {{ __('Body') }} <br> --}}
    <x-input-label for="body" :value="__('Body')" />

    <x-textarea id="body"
        name="body"
        class="block w-full mt-1">
        {{ old('body', $post->body) }}
    </x-textarea>

    <x-input-error :messages="$errors->get('body')" class="mt-2"/>

</div>