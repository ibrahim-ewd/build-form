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
use function Symfony\Component\String\length;

class FormController extends Controller
{



    public function index()
    {

        $element = config('webform.data_form');

        return view('webformulaire.building.index')
            ->with('element', $element);
    }

    public function show($id)
    {
        $forms = Form::where('clients_id', '=', $id)
            ->with('categories')
            ->get();
        return $this->getView('webformulaire.index')
            ->with('forms', $forms)
            ->with('Profil', Client::findOrFail($id))
            ->with('clients_id', $id)
            ->with('cate', FormCategories::all());
    }

    public function newform()
    {
//        return view('webformulaire.form');
    }

    public function store(Request $request)
    {
       $res = Form::updateOrCreate([
           'id'=>$request->id,
       ],
       [
           "data"=>$request->data,
       ]);

       return $res;
    }

    public function getDataForm(Request $request){
        return Form::find($request->id);
    }

    public function getViewEditField(Request $request){
        $data = Form::find($request->id);

        return view('webformulaire.editing.'.$request->name)
            ->with('index',$request->index)
            ->with('data',json_decode($data->data)[$request->index]);
    }

    public function destroy($id)
    {
        Form::destroy($id);
        return redirect()->back()->with('message', 'les forms ont été supprimées avec succès');
    }





}
