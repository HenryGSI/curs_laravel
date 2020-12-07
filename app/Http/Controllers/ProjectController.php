<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\SaveProjecRequest;
//importamos el modelo
use App\Models\Project;

//use DB; //importamos la classe de base de datos por si es necesaria

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }


    /**
     * Display a listing of the proyectos.
     *
     * Listar los proyectos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //opción 1
        //$portafolio = DB::table('projects')->get();

        //Opcion 2 usando el ORM Eloquent
        //$portafolio = Project::orderBy('created_at', 'DESC')->get();  //orderBy('created_at', 'DESC') ordenar por el campo en orden descendente
        //Tambien se puede usar esta alternativa para ordenar por los ultimos
        //$portafolio = Project::latest('updated_at')->get();

        //paginar
        $projects = Project::latest('updated_at')->paginate(); //por defecto pagina por 15 elementos, se puede personalizar asi paginate(10)

        return view('projects.index', compact('projects')); //devolvemos la vista y la variable



        /*
         //alternativa

        return view('portfolio', [
            'projects' => Project::latest('updated_at')->paginate()
        ]);
        */
    }



    /*public function show($id)
    {
        return view('projects.show',[
            'project' => Project::findOrFail($id), //findOrFail() falla en caso que no lo encuentre y da error 404

        ]);
    }*/

    //Route Model Bind - Laravel pasandole el $id automaticamente busca el objeto con ese id
    //si queremos que busque por el nombre tenemos que sobreescribir(override) el metodo getRouteKeyName de Model en Project
    public function show(Project $project)
    {
        return view('projects.show',[
            'project' => $project,
        ]);
    }

    public function create(){

        return view('projects.create', [
            'project' => new Project
        ]);

    }


    //si validamos aqui en ProjectController
    /*
    public function store(){

        // return request('title'); //saldria solo el contenido del campo como un string
        // return request(['title']); //saldria un json {"title": "dfgfddgg"}

        //tambien se podria usar
        /*
        public function store(Request $request){

            return $request->get('title');

        }
        */
        //return request()->all();
        //return request()->only('title', 'url', 'description');

        //con el metodo create le tenemos que pasar un array con los campos
        /*Project::create([
            'title' => request('title'),
            'url' => request('url'),
            'description' => request('description'),
        ]);
        */

        //si sale el error:
        // Add [title] to fillable property to allow mass assignment on [App\Models\Project].
        // tenemos que añadir en el modelo Project.php la variable $fillable y en un array pasarle las
        // propiedades que podemos definir masivamente

        //si los inputs coinciden con los campos de la base de datos, se puede hacer así (Pero no es seguro, ya que
        //un usuario malintencionado puede añadir algun campo extra, y tendriamos que filtrarlo con $fillable y $guarded
        //Project::create(request()->all());

        //Esto funcionaria, pero en caso de poner algun campo vacio daria error por NULL
        //Project::create(request()->only('title', 'url', 'description'));

        //esto devuelve solo los campos que hemos validado, si algun usuario malintencionado ha
        //intentado añadir algun campo extra ya no estaria
        /*
        $fields = request()->validate([
            'title' => 'required',
            'url' => 'required',
            'description' => 'required'
        ]);

        Project::create($fields);

        return redirect()->route('projects.index');

    }
    */

    //Validación mediante Form Request

    public function store(SaveProjecRequest $request){

        Project::create($request->validated());

        return redirect()->route('projects.index')->with('status',__('El proyecto fue creado con exito'));

    }

    public function edit(Project $project){

        return view('projects.edit',[
            'project' => $project,
        ]);
    }

    /*
    //asi se actualizaria, pero no estarian validados los campos
    public function update(Project $project){

        $project->update([
            'title' => request('title'),
            'url' => request('url'),
            'description' => request('description')
        ]);

        return redirect()->route('projects.show', $project);
    }
    */



    public function update(Project $project, SaveProjecRequest $request){

       $project->update($request->validated());

       return redirect()->route('projects.show', $project)->with('status',__('El proyecto fue actualizado con exito'));

    }

    public function destroy(Project $project){

        //una forma de eliminar seria pasarle el id a este metodo
        //Project::destroy($id);

        //pero como ya tenemos el producto gracias a Route Model Binding
        $project->delete();

        return redirect()->route('projects.index')->with('status',__('El proyecto fue eliminado con exito'));
    }




}
