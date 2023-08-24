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

    public function update(Request $request, $id)
    {


        $request->validate([
            'title' => 'required|max:25',
            'categories' => 'required|max:25',
        ], [
            'required' => 'Le champ :attribute est obligatoire.'
        ]);

        $pp = [
            'title' => $request->post('title'),
            'categorie_id' => $request->post('categories'),
            'detail' => $request->post('detail'),
        ];

        $f = Form::findOrFail($id)->update($pp);


        return redirect()->route('webformulaire.show', $request->clients_id)
            ->with('Profil', Client::find($id))
            ->with('message', 'La mise à jour a été effectuée');

    }

    public function change_status(Request $request, $id)
    {
        //this for update status the webformulaire
        $pp = [
            'status' => $request->post('status'),
        ];

        $result = Form::where('id', '=', $id)
            ->update($pp);

        if ($result) {
            return ['status' => 200];
        } else {
            return ['status' => 500];
        }
    }

    public function update_form($clients_id, $id)
    {
        $forms = Form::findOrFail($id);

        $cate = FormCategories::select(['id', 'name as value'])->get()->toArray();

        return view('webformulaire.edit')
            ->with('clients_id', $clients_id)
            ->with('Profil', Client::findOrFail($clients_id))
            ->with('dataBreadCrumbs', [
                'forms_id' => $forms->id,
                'forms_name' => $forms->id,
                'title' => $forms->title,
                'client_id' => $clients_id,
            ])
            ->with(compact('cate', 'forms'));

    }

    public function duplicate(Request $request, $id)
    {


        $Cate_Web = Form::where("id", "=", $id)->first();


        $newCate_Web = $Cate_Web->duplicate();

        $cat = Form::where('title', '=', $newCate_Web->title)->count();
        $newCate_Web->created_at = Carbon::now();
        $newCate_Web->index_ = $cat;
        $newCate_Web->save();


        return redirect()->back()->with('message', 'Le doublon a été créé avec succès');

    }

    public function destroy($id)
    {
        Form::destroy($id);
        return redirect()->back()->with('message', 'les forms ont été supprimées avec succès');
    }





    public function deleteChump(Request $request, $id)
    {
        $tab_ = "field_" . $request->tb;

        $class = new \ReflectionClass("\App\Models\\" . ucfirst($tab_));
        $instance = $class->newInstanceArgs([]);
        $instance::destroy($id);
        return redirect()->back()->with('message', 'le form ont été supprimées avec succès');
    }


    public function index()
    {

        $element = config('webform.data_form');

        return view('webformulaire.building.index')
            ->with('element', $element)
            ;
    }

    public function logicsConditions($id)
    {

        $element = config('webform.groupsform');

        $form = $this->displayForm($id);
        $all_champ = $this->previewChump();

        $conditions = $form['fields'];
        $arrayCond = [];
        foreach ($conditions as $key => $cond) {
            if (isset($cond['conditions']) && $cond['conditions'] != null) {
                $arrayCond[$key] = collect(json_decode($cond['conditions'])[0]->obligatoire)->flatten()->keyBy('name')->toArray();
            } else {
                $arrayCond[$key] = [];
            }
        }

        $arrayAttr = [];
        foreach ($conditions as $key => $cond) {
            if (isset($cond['attributes']) && $cond['attributes'] != null) {
                $arrayAttr[$key] = collect(json_decode($cond['attributes']));
            } else {
                $arrayAttr[$key] = [];
            }
        }

        $arraylogicConditional = [];
        foreach ($conditions as $key => $cond) {

            if (isset($cond['conditional_logic']) && $cond['conditional_logic'] != null) {
                $arraylogicConditional[] = collect(json_decode($cond['conditional_logic']));
            }
        }


        return $this->getView('webformulaire.logique_conditionnelle.index')
            ->with('id', $id)
            ->with('form', $form)
            ->with('formFields', json_encode($form['fields']))
            ->with('conditions', $arrayCond)
            ->with('attributes', $arrayAttr)
            ->with('logicConditional', json_encode($arraylogicConditional))
            ->with('element', $element)
            ->with('Profil', Client::findOrFail($form['clients_id']))
            ->with('all_champ', $all_champ);
    }


    public function UpdateSteppersWhenDeleteChamp($request)
    {
        foreach ($request->delete as $el) {

            $S = Steppers::where('form_id', '=', $el['cols']['forms_id'])
                ->get();


            foreach ($S as $k => $el_) {
                $json_decode = json_decode($el_->fields);
                if (in_array($el['cols']['name_group'], $json_decode)) {

                    foreach (array_values($json_decode) as $i => $value) {
                        if ($value == $el['cols']['name_group']) {
                            array_splice($json_decode, $i, 1);
                        }
                    }

                    if (count($json_decode) != 0) {
                        $el_->update([
                            'fields' => json_encode($json_decode)
                        ]);
                    } else {
                        $el_->delete();
                    }
                }
            }
        }
    }


    public function CreatElementForm(Request $request, $id)
    {
        $elements = new Elementmcd();

        if ($request->delete != []) {
            $this->UpdateSteppersWhenDeleteChamp($request);
            $deletedData = array_merge($request->delete, $request->data ?: []);
        } else {
            $deletedData = $request->data ?: [];
        }

        foreach ($deletedData as $d) {
            $class = new \ReflectionClass("\App\Models\\" . ucfirst($d['table']));
            $instance = $class->newInstanceArgs([]);


            $elem = $instance::where('forms_id', "=", $id);
            $fisrt = $elem->first();

            if (isset($fisrt->id)) {
                Elementmcd::where('elementmcd_id', "=", $fisrt->id)
                    ->where('elementmcd_type', '=', "App\Models\\" . ucfirst($d['table']))
                    ->delete();
            }

            $elem->delete();
        }


        if ($request->data != null) {

            foreach ($request->data as $d) {
                $class = new \ReflectionClass("\App\Models\\" . ucfirst($d['table']));
                $instance = $class->newInstanceArgs([]);
                $form = $instance::updateOrCreate(
                    ['forms_id' => $id, "Data_duplicate" => $d['cols']['Data_duplicate']],
                    $d['cols']
                );

                foreach ($d['elements'] as $el) {
                    if ($d['table'] == "field_multiple" || $d['table'] == "field_caseacocher" ||
                        $d['table'] == "field_satisfaction" || $d['table'] == "field_menuderoulant" ||
                        $d['table'] == "field_media") {
                        $form->elements()->updateOrCreate(
                            $el
                        );
                    }
                }
            };
            if ($form) {
                return ['status' => 200];
            }
        };


    }


    public function Preview_form($id)
    {


        $steppers = Steppers::where('form_id', '=', $id)->orderBy('steps', 'asc')->get()->toArray();

        if ($steppers != []) {
            foreach ($steppers as $k => $step) {
                $StpLst[$k] = $step['fields'];
            }
        } else {
            $StpLst = [];
        }

        $a = [];
        $form = $this->displayForm($id);
        foreach ($form['fields'] as $k => $e) {
            $a[$e['name_group']] = $e;
        }

        $conditions = $form['fields'];
        $arrayAttr = [];
        foreach ($conditions as $key => $cond) {
            if (isset($cond['attributes']) && $cond['attributes'] != null) {
                $arrayAttr[$key] = collect(json_decode($cond['attributes']));
            } else {
                $arrayAttr[$key] = [];
            }
        }


        $arrayCond = [];
        foreach ($conditions as $key => $cond) {

            if (isset($cond['conditions']) && $cond['conditions'] != null) {
                $arrayCond[$key] = collect(json_decode($cond['conditions'])[0]->obligatoire)->flatten()->keyBy('name')->toArray();
            } else {
                $arrayCond[$key] = [];
            }

        }

        return $this->getView('webformulaire.building.preview')
            ->with('id', $id)
            ->with('form', $this->displayForm($id))
            ->with('fonts', Appearance::Fonts)
            ->with('steppers', $steppers)
            ->with('attributes', $arrayAttr)
            ->with('conditions', $arrayCond)
            ->with('Profil', Client::findOrFail($form['clients_id']))
            ->with('formById', $a)
            ->with('templates', Appearance::TEMPLATE)
            ->with('all_champ', $this->previewChump());
    }


    public function ajouterConditionnel(Request $request, $id)
    {
        $form_ = Form::findOrFail($id);
        $result = $form_->update([
            'conditions' => $request->data,
        ]);
        if ($result) {
            return [
                "status" => 200,
                "data" => $form_->conditions,
            ];
        }

    }
}
