@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('navegacion')
    @include('ui.adminav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Editar Vacante {{$vacante->titulo}}</h1>

    <form action="{{route('vacantes.update',['vacante' => $vacante->id])}}" method="POST" class="max-w-lg mx-auto my-10">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo vacante:</label>
            <input
                placeholder="Titulo de la vacante"
                id="titulo" type="titulo"
                class="p-3 bg-gray-100 rounded form-input w-full @error('titulo') is-invalid @enderror"
                name="titulo"
                value="{{ $vacante->titulo }}"
                autocomplete="titulo"
                autofocus>

            @error('titulo')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria:</label>
             <select name="categoria" id="categoria"
                     class="block appearance-none w-full border border-gray-200
                          text-gray-700 rounded leading-tight focus:outline-none
                          focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
              >
             <option disabled selected>-- Seleciona --</option>
             @foreach ($categorias as $categoria)
                <option  {{$vacante->categoria_id == $categoria->id ? 'selected' : ''}}
                    value="{{$categoria->id}}"
                >{{$categoria->nombre}}</option>
             @endforeach
             </select>

             @error('categoria')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">Experiencia:</label>
             <select name="experiencia" id="experiencia"
                     class="block appearance-none w-full border border-gray-200
                          text-gray-700 rounded leading-tight focus:outline-none
                          focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
              >
             <option disabled selected>-- Seleciona --</option>
             @foreach ($experiencias as $experiencia)
                <option value="{{$experiencia->id}}" {{$vacante->experiencia_id == $experiencia->id ? 'selected' : ''}}>{{$experiencia->nombre}}</option>
             @endforeach
             </select>

             @error('experiencia')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicación:</label>
             <select name="ubicacion" id="ubicacion"
                     class="block appearance-none w-full border border-gray-200
                          text-gray-700 rounded leading-tight focus:outline-none
                          focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
              >
             <option disabled selected>-- Seleciona --</option>
             @foreach ($ubicaciones as $ubicacion)
                <option value="{{$ubicacion->id}}" {{$vacante->ubicacion_id == $ubicacion->id ? 'selected' : ''}}>{{$ubicacion->nombre}}</option>
             @endforeach
             </select>

             @error('ubicacion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2">Salario:</label>
             <select name="salario" id="salario"
                     class="block appearance-none w-full border border-gray-200
                          text-gray-700 rounded leading-tight focus:outline-none
                          focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
              >
             <option disabled selected>-- Seleciona --</option>
             @foreach ($salarios as $salario)
                <option value="{{$salario->id}}" {{$vacante->salario_id == $salario->id ? 'selected' : ''}}>{{$salario->nombre}}</option>
             @endforeach
             </select>

             @error('salario')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>


        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">Descripción del Puesto:</label>

            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>

            <input type="hidden" name="descripcion" id="descripcion" value="{{ $vacante->descripcion }}" >

            @error('descripcion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label for="imagen" class="block text-gray-700 text-sm mb-2">Imagen vacante:</label>

            <div id="dropzoneDevjob" class="dropzone bg-gray-100"></div>

            <input type="hidden" name="imagen" id="imagen"  value="{{ $vacante->imagen }}">

            <p id="error"> </p>

            @error('imagen')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror

        </div>

        <div class="mb-5">
            <label for="skills" class="block text-gray-700 text-sm mb-5">Habilidades y conocimientos: <span class="xs">(Elige al menos 3)</span></label>

            @php
                $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter', 'MobX', 'C#', 'Ruby on Rails']
            @endphp

            <lista-skills :skills="{{ json_encode($skills) }}" :oldskills="{{json_encode($vacante->skills)}}"></lista-skills>

            @error('skills')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror
        </div>



        <button type="submit" class="bg-blue-500 w-full hover:bg-blue-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">
            Pubicar vacante
        </button>
    </form>
@endsection

@section('scripts')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     <script>
         Dropzone.autoDiscover = false;

         document.addEventListener('DOMContentLoaded', () => {
             //medium editor
             const editor = new MediumEditor('.editable', {
                toolbar: {
                    buttons: ['bold','italic','underline','quote', 'anchor', 'justifyLeft',
                            'justifyCenter','justifyRight', 'justifyFull', 'orderedList',
                            'unorderedList', 'h2','h3'],
                    static: true,
                    sticky: true
                },
                placeholder:{
                    text: 'Información de la vacante'
                }
             });

             //agregar al input hidden lo que el usuario escribe en medium ditor
             editor.subscribe('editableInput', function(eventObj, editable){
                 const contenido = editor.getContent();
                 document.querySelector('#descripcion').value = contenido;
             })

             //llena el editor  con el contenido del input hidden
             editor.setContent(document.querySelector('#descripcion').value);

             //dropzone
             const dropzoneDevjob= new Dropzone('#dropzoneDevjob', {
                 url: "/vacantes/imagen",
                 dictDefaultMessage: 'Sube aqui tu archivo',
                 acceptedFiles: ".png, .jpg, .jpeg, .gif, .bmp",
                 addRemoveLinks: true,
                 dictRemoveFile: 'Borrar archivo',
                 maxFiles: 1,
                 headers: {
                     'X-CSRF-TOKEN' : document.querySelector('meta[name=csrf-token]').content
                 },
                 init: function(){
                    if (document.querySelector('#imagen').value.trim()) {
                        let imagenPublicada = {};
                        imagenPublicada.size = 1234;
                        imagenPublicada.name = document.querySelector('#imagen').value;
                        imagenPublicada.nombreServidor = document.querySelector('#imagen').value;

                        this.options.addedfile.call(this, imagenPublicada);
                        this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);

                        imagenPublicada.previewElement.classList.add('dz-sucess');
                        imagenPublicada.previewElement.classList.add('dz-complete');
                    }
                 },
                 success: function(file, response){
                     //console.log(response);
                     document.querySelector('#error').textContent = '';

                     //coloca la respuesta del servidor en el input hiiden
                     document.querySelector('#imagen').value = response.correcto;

                     //añadir al objeto de archivo el nombre del servidor
                     file.nombreServidor = response.correcto;
                 },
                 maxfilesexceeded: function(file){
                     if (this.files[1] != null) {
                         this.removeFile(this.files[0]); //eliminar el archivo anterior
                         this.addFile(file); //agregar el nuevo archivo
                     }
                 },
                 removedfile: function(file, response){
                    file.previewElement.parentNode.removeChild(file.previewElement);

                     params = {
                         imagen: file.nombreServidor
                     }

                     axios.post('/vacantes/borrarimagen', params)
                                .then(respuesta => console.log(respuesta));
                 }
             });

         })
     </script>
@endsection
