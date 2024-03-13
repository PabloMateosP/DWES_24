@extends('layouts.layout')

@section('titulo', 'Alumnos')
@section('subtitulo', 'Actualizar Alumno')
@section('contenido')
    <div class="card">
        <div class="card-header">
            Formulario Edit Alumno
        </div>
        @include('student.partials.alerts')
        <div class="card-body">
            <!-- Formulario  -->

            <form action={{ route('alumnos.update', $alumno->id) }} method="POST">
                @csrf
                @method('PUT')

                <!-- name  -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name', $alumno->name) }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- last_name  -->
                <div class="mb-3">
                    <label for="last_name" class="form-label">Apellidos</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                        value="{{ old('last_name', $alumno->last_name) }}" required autocomplete="name" autofocus>
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- phone  -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        value="{{ old('phone', $alumno->phone) }}" required autocomplete="name" autofocus>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Poblacion  -->
                <div class="mb-3">
                    <label for="city" class="form-label">city</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                        value="{{ old('city', $alumno->city) }}" required autocomplete="name" autofocus>
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Dni  -->
                <div class="mb-3">
                    <label for="dni" class="form-label">Dni</label>
                    <input type="text" class="form-control @error('dni') is-invalid @enderror" name="dni"
                        value="{{ old('dni', $alumno->dni) }}" required autocomplete="name" autofocus>
                    @error('dni')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email  -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email', $alumno->email) }}" required autocomplete="name" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Birthday -->
                <div class="mb-3">
                    <label for="email" class="form-label">Cumpleaños</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="birth_date"
                        value="{{ old('birth_date', $alumno->birth_date) }}" required autocomplete="name" autofocus>
                    @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Curso -->
                <div class="mb-3">
                    <label for="course" class="form-label">Curso</label>
                    <select class="form-select" aria-label="Default select example" name="course_id">
                        <option selected disabled value="">Seleccione curso</option>
                        @foreach ($cursos as $item)
                        <option value="{{$item->id}}" @if($item->id == old('course_id', $alumno->course_id)) selected @endif>{{ $item->course }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        </div>
        {{-- Fin Formulario --}}

        <div class="card-footer text-muted">
            <!-- Botones de acción --------------------------------------------------->
            <a class="btn btn-secondary" href="{{ route('alumnos.index') }}" role="button">Cancelar</a>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

        </form>
    </div>
    <br><br><br>



@endsection
