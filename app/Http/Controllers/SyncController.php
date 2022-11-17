<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Form;
use App\Models\Comic;
use App\Models\Like;

class SyncController extends Controller
{
    

    /**
     * It returns a form if it exists, otherwise it returns a 403 error
     * 
     * @return The form is being returned.
    */
    public function detailForm()
    {
        $form = Form::where('user_id', Auth::user()->id)->first();

        if(!$form)
        {
            return response([
                'message' => 'Form not found'
            ], 403);
        }

        return response([
            'message' => 'Form found'
        ], 200);
    }


    /**
     * It creates a new form, assigns the user id of the currently logged in user to it, and then saves it
     * to the database
     * 
     * @param Request request The request object.
     * 
     * @return A JSON object with a message and the form object.
    */
    public function store(Request $request)
    {

        $str  = preg_replace( "([ ]+)","-",$request->country);
        $explode = explode("-",$str);

        $contador = count($explode);
        $loop = $contador - 1;
        $name_country = null;
        for ($i=1; $i <= $loop ; $i++) { 
            $name_country = $name_country.' '.$explode[$i];
        }

        //Log::alert($explode);

        $form = new Form;
        $form->user_id = Auth::user()->id;
        $form->country = ltrim($name_country);
        $form->gender = $request->gender;
        $form->birthday = $request->birthday;
        $form->save();

        return response([
            'message' => 'Form created.',
            'form' => $form,
        ], 200);
    }

    /**
     * It returns the top 5 comics that have been liked the most in the past week.
     * 
     * @return the top 5 comics that have been liked the most in the past week.
    */
    public function trends(){

        $now = Carbon::now();


        $likes = Like::select(DB::raw('likes.comic_id, COUNT(likes.id) AS liked'))->whereBetween('likes.created_at', [$now->startOfWeek()->format('Y-m-d H:i:s'),$now->endOfWeek()->format('Y-m-d H:i:s')])
            ->groupBy('likes.comic_id')->orderBy('liked', 'DESC')->take(5)->pluck('likes.comic_id');
                  
        $trends = Comic::whereIn('id', $likes)->get();

        foreach($trends as $trend){
            $trend->likes = Like::whereBetween('likes.created_at', [$now->startOfWeek()->format('Y-m-d H:i:s'),$now->endOfWeek()->format('Y-m-d H:i:s')])->where('likes.comic_id', $trend->id)->count();
        }
        $trends = $trends->map(function ($trend) {
            return $trend->only(['name', 'filename', 'author', 'description', 'status', 'scan', 'url', 'likes']);
        });

        Log::alert('GetTrendComic ' . $trends);
        return response([
            'trends' => $trends
        ], 200);      

    }

    /**
     * It returns the 5 most recently added comics.
     * 
     * @return The recently added comics are being returned.
    */
    public function recently(){
        $comics = Comic::select('name', 'filename', 'author', 'description', 'status', 'scan', 'url')->orderBy('created_at', 'DESC')->take(5)->get();

        Log::alert('GetRencentlyComic ' . $comics);
        return response([
            'comics' => $comics
        ], 200);
    }
}
