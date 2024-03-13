<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Muestra los alumnos 

        $alumnos = Student::all()->sortBy('id');

        return view('student.home', ['alumnos' => $alumnos]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Carga formulario nuevo alumno
        $cursos = Course::pluck('course', 'id');

        $cursos = Course::all()->sortBy('course');

        return view('student.create', ['cursos' => $cursos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Recibe los datos del formulario 
        // Valida los datos
        // Almacena en la tabla student de la base de datos

        // Validación Formulario 
        // Especifico en un array las reglas de validación de cada campo 
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:35'],
            'last_name' => ['required', 'string', 'max:50'],
            'birth_date' => ['required', 'max:13'],
            'phone' => ['required', 'max:13'],
            'city' => ['required', 'string', 'max:40'],
            'dni' => ['required', 'string', 'max:9', 'unique:students'],
            'email' => ['required', 'string', 'email', 'unique:students'],
            'course_id' => ['required', 'exists:courses,id']
        ]);

        // Cargamos los datos recibidos y creamos el objeto alumno
        $alumno = Student::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'birth_date' => $request['birth_date'],
            'phone' => $request['phone'],
            'city' => $request['city'],
            'dni' => strtoupper($request['dni']),
            'email' => strtolower($request['email']),
            'course_id' => $request['course_id']
        ]);

        // Guardamos 
        $alumno->save();

        // Redireccionamos 
        return redirect()->route('alumnos.index')->with('success', 'Alumno agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alumno = Student::find($id);
        $cursos = Course::all()->sortBy('course');

        return view('student.show', ['alumno' => $alumno, 'cursos' => $cursos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cargo los datos del alumno 
        $alumno = Student::find($id);
        $cursos = Course::all()->sortBy('course');

        // Llamamos a la vista 
        return view('student.edit', ['alumno' => $alumno, 'cursos' => $cursos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación formulario edit
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:35'],
            'last_name' => ['required', 'string', 'max:50'],
            'birth_date' => ['required', 'max:13'],
            'phone' => ['required', 'max:13'],
            'city' => ['required', 'string', 'max:40'],
            'dni' => ['required', 'string', 'max:9', Rule::unique('students')->ignore($id)],
            'email' => ['required', 'string', 'email', Rule::unique('students')->ignore($id)],
            'course_id' => ['required', 'exists:courses,id']
        ]);

        // Cargamos datos del alumno 
        $alumno = Student::find($id);

        // Actualizamos con los datos del formulario 
        $alumno->name = $request->get('name');
        $alumno->last_name = $request->get('last_name');
        $alumno->birth_date = $request->get('birth_date');
        $alumno->phone = $request->get('phone');
        $alumno->city = $request->get('city');
        $alumno->dni = $request->get('dni');
        $alumno->email = $request->get('email');
        $alumno->course_id = $request->get('course_id');

        // Guardamos el registro en BD
        $alumno->save();

        // Redireccionamos a la lista de alumnos
        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $alumno)
    {
        $alumno->delete();

        return redirect()->route('alumnos.index')
            ->with('success', 'El alumno se ha eliminado correctamente');
    }
}
