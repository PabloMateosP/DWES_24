<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Home</h1>


    @if ($nivel == 1)
    <p>Estoy en primer curso</p>
    @else
    <p>Estoy en segundo curso</p>
    @endif

    <table>
        <caption>Listado Clientes</caption>
        <thead>
            <th>ID</th>
            <th>Nombre</th>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente['id']}}</td>
                <td>{{$cliente['nombre']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @forelse ($usuarios as $usuario)
        {{print_r($usuario)}}
    @empty
        <p>Sin Usuarios</p>
    @endforelse

    <footer>
        <!-- <p>Autor: <?//= $autor ?></p>
        <p>Curso: <?//= $curso ?></p> -->

        <!-- Para que funcione la directiva blade hay que llamar el archivo index.blade.php -->
        <p>Autor: {{$autor}}</p>
        <p>Curso: {{$curso}}</p>
        <p>Módulo: {{$modulo ?? 'Base de Datos'}}</p>
        {{-- Comentario en blade --}}
    </footer>
</body>

</html>