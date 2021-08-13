@extends('layouts.app')

@section('navegacion')
    @include('ui.adminav') 
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Nueva vacantes</h1>

    <form class="max-w-lg mx-auto my-10">
        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo vacante:</label>
            <input id="titulo" type="titulo" class="p-3 bg-gray-100 rounded form-input w-full @error('titulo') is-invalid @enderror" name="email" value="{{ old('titulo') }}" autocomplete="titulo" autofocus>

        </div>

        <div class="mb-5">
            <label for="categoria" class="block text-gray-700 text-sm mb-2">Titulo vacante:</label>
             <select name="categoria" id="categoria" 
                     class="block appearance-none w-full border border-gray-200 
                          text-gray-700 rounded leading-tight focus:outline-none 
                          focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
              >
             <option disabled selected>-- Seleciona --</option>
             @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
             @endforeach
             </select>
        </div>

        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">Titulo vacante:</label>
             <select name="experiencia" id="experiencia" 
                     class="block appearance-none w-full border border-gray-200 
                          text-gray-700 rounded leading-tight focus:outline-none 
                          focus:bg-white focus:border-gray-500 p-3 bg-gray-100"
              >
             <option disabled selected>-- Seleciona --</option>
             @foreach ($experiencias as $experiencia)
                <option value="{{$experiencia->id}}">{{$experiencia->nombre}}</option>
             @endforeach
             </select>
        </div>
         

        <button type="submit" class="bg-blue-500 w-full hover:bg-blue-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">
            Pubicar vacante
        </button>
    </form>
@endsection