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

            <form>
                @csrf

                <!-- name  -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $alumno->name) }}" disabled>
                </div>

                <!-- last_name  -->
                <div class="mb-3">
                    <label for="last_name" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="last_name"
                        value="{{ old('last_name', $alumno->last_name) }}" disabled>
                </div>

                <!-- phone  -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" name="phone" value="{{ old('phone', $alumno->phone) }}"
                        disabled>
                </div>

                <!-- Poblacion  -->
                <div class="mb-3">
                    <label for="city" class="form-label">city</label>
                    <input type="text" class="form-control" name="city" value="{{ old('city', $alumno->city) }}"
                        disabled>
                </div>

                <!-- Dni  -->
                <div class="mb-3">
                    <label for="dni" class="form-label">Dni</label>
                    <input type="text" class="form-control" name="dni" value="{{ old('dni', $alumno->dni) }}"
                        disabled>
                </div>

                <!-- Email  -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $alumno->email) }}"
                        disabled>
                </div>

                <!-- Birthday -->
                <div class="mb-3">
                    <label for="email" class="form-label">Cumpleaños</label>
                    <input type="date" class="form-control" name="birth_date"
                        value="{{ old('birth_date', $alumno->birth_date) }}" disabled>
                </div>

                <!-- Curso -->
                <div class="mb-3">
                    <label for="course" class="form-label">Curso</label>
                    <input type="text" class="form-control" name="curso" value="{{ $alumno->course->course }}" disabled>
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
