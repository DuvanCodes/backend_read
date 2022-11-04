<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

use App\Models\Categorie;
use App\Models\Comic;
use App\Models\CategorieComic;


class ComicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function viewCategory(){

        return view('category.view-category');
    }

    public function createCategory(Request $request){
        $validate = Validator::make($request->all(),[
            'category' => 'required'
        ]);
    
        if ($validate->fails()) {
            return back()->with('error','No se ha guardado el registro, revise los datos ingresados.');
        }

        $categories = new Categorie;
        $categories->name_category = $request->category;
        $categories->save();

        return back()->with('success','Categoría guardada exitosamente');
    }

    public function viewComic(){

        $categories = Categorie::all();
        return view('comics.view-comic', compact('categories'));
    }

    public function createComic(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'author' => 'required',
            'description' => 'required',
            'status' => 'required',
            'scan' => 'required',
            'url' => 'required',
            'multi_category' => 'required',
            'file' => 'required|mimes:jpeg,png,jpg|max:3096',
        ]);

        if ($validate->fails()) {
            return back()->with('error','No se ha guardado el registro, revise los datos ingresados.');
        }

        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $path = $request->file('file')->storeAs('/public/portadas', $fileName);
            
            $comics = new Comic;
            $comics->name = $request->name;
            $comics->author = $request->author;
            $comics->Description = $request->description;
            $comics->status = $request->status;
            $comics->scan = $request->scan;
            $comics->url = $request->url;
            $comics->filename = URL::to('/').'/storage/portadas/'.$fileName;
            $re = $comics->save();

            if(!$re){
                return back()->with('error','No se ha guardado el registro, fallo al guardar.');
            }

            $numCantidad = count($request->multi_category);
            $find = Comic::orderBy('id', 'desc')->first();
            $count = 0;
            for($i=1;$i<=$numCantidad;$i++){
                
                $loopCategory = new CategorieComic;
                $loopCategory->comic_id = $find->id;
                $loopCategory->categorie_id = $_POST["multi_category"][$count];
                $loopCategory->save();
                $count++;
            }

            return back()->with('success','Comic guardado exitosamente');
        }

    }
}
