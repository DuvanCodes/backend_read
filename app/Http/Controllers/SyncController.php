<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $form = new Form;
        $form->user_id = Auth::user()->id;
        $form->country = $request->country;
        $form->gender = $request->gender;
        $form->birthday = $request->birthday;
        $form->save();

        return response([
            'message' => 'Form created.',
            'form' => $form,
        ], 200);
    }
}
