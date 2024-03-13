{{-- 
    
    Creamos una vista a partir del layout 
    Vista principal Alumnos
    
--}}

@extends('layouts.layout')
@section('titulo', 'Home Alumnos')
@section('subtitulo', 'Panel Control Alumnos')

@section('contenido')
    {{-- Menú Alumnos --}}
    @include('student.partials.menu')
    @include('student.partials.alerts')

    {{-- Lista de alumnos --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Telefono</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Email</th>
                <th scope="col">Curso</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->name }}</td>
                    <td>{{ $alumno->last_name }}</td>
                    <td>{{ $alumno->phone }}</td>
                    <td>{{ $alumno->city }}</td>
                    <td>{{ $alumno->email }}</td>
                    <td>{{ $alumno->course->course }}</td>
                    <td>
                        <!-- botones de acción -->
                        <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Confirmar borrado de alumno')"><i class="bi bi-trash"></i></button>
                        </form>

                        <a href="{{ route('alumnos.edit', $alumno->id) }}" title="Editar" class="btn btn-primary"> <i
                                class="bi bi-pencil"></i> </a>
                        <a href="{{ route('alumnos.show', $alumno->id) }}" title="Mostrar" class="btn btn-warning"> <i class="bi bi-eye"></i> </a>
                    </td>
                @empty
                    <p>No hay alumnos registrados.</p>
            @endforelse
        </tbody>
    </table>
    <br>
    <br>
    <br>
@endsection
