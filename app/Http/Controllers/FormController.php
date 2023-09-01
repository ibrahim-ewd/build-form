<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appearance;
use App\Models\Field_button;
use App\Models\Field_caseacocher;
use App\Models\Field_media;
use App\Models\Field_menuderoulant;
use App\Models\Field_multiple;
use App\Models\Field_satisfaction;
use App\Models\FormCategories;
use App\Models\Client;
use App\Models\Confirmation_Webformulaire;
use App\Models\Elementmcd;

use App\Models\Form;
use App\Models\Steppers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function Symfony\Component\String\length;

class FormController extends Controller
{


    public function index()
    {

        $element = config('webform.data_form');

        return view('webformulaire.building.index')
            ->with('element', $element);
    }


    public function getiframe()
    {

        $element = config('webform.data_form');

        return view('webformulaire.building.iframe')
            ->with('element', $element);
    }


    public function newform()
    {
//        return view('webformulaire.form');
    }

    public function store(Request $request)
    {

        // Find the existing record by slug
        $existingRecord = Form::where('slug', $request->id)->first();

// If the existing record exists, update it; otherwise, create a new one
        if ($existingRecord) {
            $existingRecord->update([
                "data" => $request->data,
                "name" => $request->name,
            ]);
            $existingRecord = Form::where('slug', $request->id)->first();

        } else {
            $slug = Str::slug(Str::reverse($request->name),'');
            $count = Form::where('slug','LIKE', $slug."%")->count();

            if ($count > 0) {
                $slug = Str::slug(Str::reverse($request->name) . $count++,'');
            }

            $existingRecord = Form::create([
                "data" => $request->data,
                "name" => $request->name,
                "slug" => $slug,
            ]);
        }
        return $existingRecord;
    }

    public function getDataForm(Request $request)
    {
//        return Form::find($request->id);
        return Form::where('slug', '=', $request->slug)->first();

        //        return view('webformulaire.building.iframe')
//            ->with('data',json_decode($data->data)[$request->index]);
    }

    public function getViewEditField(Request $request)
    {
        $data = Form::where('slug', '=', $request->slug)->first();

        return view('webformulaire.editing.index')
            ->with('nameChamp', $request->name)
            ->with('index', $request->index)
            ->with('data', json_decode($data->data)[$request->index]);
    }

    public function destroy($id)
    {
        Form::destroy($id);
        return redirect()->back()->with('message', 'les forms ont été supprimées avec succès');
    }


}
