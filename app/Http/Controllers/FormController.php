<?php

namespace App\Http\Controllers;



use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FormController extends Controller
{


    public function listForms()
    {

        $element =Form::orderByDesc('id')->get();

        return view('webformulaire.index')
            ->with('data', $element);
    }

    public function index()
    {

        $element = config('webform.data_form');

        return view('webformulaire.building.index')
            ->with('element', $element);
    }

    public function getForm(){
//        $data = Form::where('slug', '=', $id)->first();
//        return $data;
        return view('webformulaire.building.iframe')
          /*  ->with('element', $element)*/;
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

        $existingRecord = Form::where('slug', $request->id)->first();


        if ($existingRecord) {
            $existingRecord->update([
                "data" => $request->data,
                "name" => $request->name,
            ]);
            $existingRecord = Form::where('slug', $request->id)->first();

        } else {
            $slug = Str::slug(Str::reverse($request->name), '');
            $count = Form::where('slug', 'LIKE', $slug . "%")->count();

            if ($count > 0) {
                $slug = Str::slug(Str::reverse($request->name) . $count++, '');
            }

            $existingRecord = Form::create([
                "data" => $request->data,
                "name" => $request->name,
                "slug" => $slug,
            ]);
        }
        return $existingRecord;
    }

    public function uploadImagesForm(Request $request)
    {
        // Retrieve all input data from the request
        $data = $request->all();

        $routeImage = "";

        if ($request->hasFile('image')) {
            // Check if the uploaded file is valid
            if (!$request->file('image')->isValid()) {
                return response("Invalid image file", 500);
            }

            $imageFile = $request->file('image');

            $extension = $imageFile->getClientOriginalExtension();
            $originalFilename = $imageFile->getClientOriginalName();

            $directory = $request->dir;


            // If 'name' field exists and is not empty, use it as the filename
            if ($request->has('name') && !empty($request->name)) {
                $oldImageName = $request->name;

                if (Storage::disk('public')->exists($directory . '/' . $oldImageName)) {
                    Storage::disk('public')->delete($directory . '/' . $oldImageName);
                }

                $newImageName = explode('.',$oldImageName)[0].'.'.$extension;
            }else{
                $newImageName = 'option'.time().'.'.$extension;
            }

            $routeImage = $imageFile->storeAs($request->dir, $newImageName, 'public');
        }

        // Return the path to the stored image or an empty string if no image was uploaded
        return response(["img"=>$routeImage,"name"=>$newImageName], 200);
    }

    public function deleteImagesForm(Request $request){

        try {
            $directory = $request->dir;
            if ($request->type == "folder" ){

                if (Storage::disk('public')->exists($directory )) {
                    Storage::disk('public')->deleteDirectory($directory);
                }
            }

            if ($request->has('name') && !empty($request->name)) {
                $oldImageName = $request->name;

                if (Storage::disk('public')->exists($directory . '/' . $oldImageName)) {
                    Storage::disk('public')->delete($directory . '/' . $oldImageName);
                }
            }
            return response(["status"=>"success"],200);
        }catch (\Exception $e){
            return response(["status"=>"error"],500);
        }


    }

    public function getDataForm(Request $request)
    {
        if ($request->form){
            $data = Form::where('slug', '=', $request->form)->first();

            return response([
                "data"=>json_decode($data->data),
            ]);
        }
        return Form::where('slug', '=', $request->slug)->first();

    }

    public function getViewEditField(Request $request)
    {

        $data = Form::where('slug', '=', $request->slug)->first();

        if ($request->action == "option") {

            return view('webformulaire.editing.include.list_edit_options')
                ->with("champ", json_decode($data->data)[$request->index]->champ->{$request->name})->render();

        }

        return view('webformulaire.editing.index'/*.$request->name*/)
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
