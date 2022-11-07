<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Models\Form;

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
}
