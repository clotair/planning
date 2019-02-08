<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Layout\Grid;
use Auth;
use Alert;
use App\Rules\Jour;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{   
    public function index(Content $content)
    {
        Alert::error('Something went wrong', 'Oops!');
        return $content
            ->header('Planning')
            ->description('Une Gestion efficace pour une grande rentabilite')
            
            ->body(view('admin.index'));
            
    }
    public function reunion(Content $content)
    {
  
        return $content
            ->header('Planning')
            ->description('Une Gestion efficace pour une grande rentabilite')
            ->body(view('admin.reunion'));
    }
    public function cour(Content $content)
    {
        return $content
            ->header('Planning')
            ->description('Une Gestion efficace pour une grande rentabilite')
            ->body(view('admin.cour'));
    }
    public function materiel(Content $content)
    {
        return $content
            ->header('Planning')
            ->description('Une Gestion efficace pour une grande rentabilite')
            ->body(view('admin.materiel'));
    }
    protected function add_cour (Request $request)
    {
       

        $body =  $request->all();

        $validator = Validator::make($request->all(), [
            'salle' => 'required',
            'enseignant' => 'required',
            'classe' => 'required',
            'matiere' => 'required',
            'type_cour'=> 'required',
            'date_debut'=> ['required',new Jour],
            'date_fin'=>['required',new Jour] 
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if(!array_key_exists('frequence',  $body)){
            
            Alert::error('les frequences doivent etre definies')->persistent("Close");
            $validator->errors()->add('info', 'Entrez les jours et heures');
            return redirect('/admin/planning/cour/create')->withErrors($validator)->withInput();
        }
 
        if($request->date_debut>$request->date_fin){
           
            $validator->errors()->add('date_fin', 'la date de fin doit etre superieur a la date de debut!');
            
            return redirect()->back()->withErrors($validator)->withInput();
           
        }
        $validator->errors()->add('date_fin', 'la date de fin doit etre superieur a la date de debut!');
        session()->flash('error', $validator);
        foreach($body['frequence'] as $key=>$value){
            if($value['heure_debut']>$value['heure_fin']){
                 $validator->errors()->add('frequence.'.$key.'.heure_fin', "l'heure de fin doit etre superieur a la heure de but!");
                 return redirect()->back()->withErrors($validator)->withInput();
            }
            $event = DB::select('select * from planning_evenements where salle=? AND(((date_debut <=? OR date_fin >=?) AND (heure_debut >=? AND heure_debut<=?) OR (heure_fin <=? AND heure_fin >=?) AND jour=?)OR((date_debut <=? OR date_debut >=?) AND (heure_debut >=? AND heure_fin<=?) AND (heure_fin <=? AND heure_fin >=?) AND jour=?))', [$request->salle,$request->date_debut,$request->date_debut,$value['heure_debut'],$value['heure_debut'],$value['heure_fin'],$value['heure_fin'],$value['jour'],$request->date_fin,$request->date_fin,$value['heure_debut'],$value['heure_debut'],$value['heure_fin'],$value['heure_fin'],$value['jour']]);
            $classeoccuper = DB::select('select * from planning_cours where classe=? AND(((date_debut <=? OR date_fin >=?) AND (heure_debut >=? AND heure_debut<=?) OR (heure_fin <=? AND heure_fin >=?) AND jour=?)OR((date_debut <=? OR date_debut >=?) AND (heure_debut >=? AND heure_fin<=?) AND (heure_fin <=? AND heure_fin >=?) AND jour=?))', [$request->classe,$request->date_debut,$request->date_debut,$value['heure_debut'],$value['heure_debut'],$value['heure_fin'],$value['heure_fin'],$value['jour'],$request->date_fin,$request->date_fin,$value['heure_debut'],$value['heure_debut'],$value['heure_fin'],$value['heure_fin'],$value['jour']]);
            $salleoccuper = DB::select('select * from planning_cours where salle=? AND(((date_debut <=? OR date_fin >=?) AND (heure_debut >=? AND heure_debut<=?) OR (heure_fin <=? AND heure_fin >=?) AND jour=?)OR((date_debut <=? OR date_debut >=?) AND (heure_debut >=? AND heure_fin<=?) AND (heure_fin <=? AND heure_fin >=?) AND jour=?))', [$request->salle,$request->date_debut,$request->date_debut,$value['heure_debut'],$value['heure_debut'],$value['heure_fin'],$value['heure_fin'],$value['jour'],$request->date_fin,$request->date_fin,$value['heure_debut'],$value['heure_debut'],$value['heure_fin'],$value['heure_fin'],$value['jour']]);
            $enseignantoccuper = DB::select('select * from planning_cours where enseignant=? AND(((date_debut <=? OR date_fin >=?) AND heure_debut =? AND heure_fin =? AND jour=?)OR((date_debut <=? OR date_fin >=?) AND (heure_debut >=? AND heure_fin<=?) AND (heure_fin <=? AND heure_fin >=?) AND jour=?))', [$request->enseignant,$request->date_debut,$request->date_debut,$value['heure_debut'],$value['heure_debut'],$value['heure_fin'],$value['heure_fin'],$value['jour'],$request->date_fin,$request->date_fin,$value['heure_debut'],$value['heure_fin'],$value['jour']]);

            if( $classeoccuper){
                $validator->errors()->add('info', 'Classe occuper!');
                return redirect('admin/planning/cour/create')
                        ->withErrors($validator)->withInput();
            }
            if($salleoccuper){
                $validator->errors()->add('info', 'Salle occuper!');
                return redirect('admin/planning/cour/create')
                ->withErrors($validator)->withInput();
            }
            if($enseignantoccuper){
                $validator->errors()->add('info', 'Enseignant occuper!');
                return redirect('admin/planning/cour/create')
                ->withErrors($validator)->withInput();
            }
            if($event){
                $validator->errors()->add('info', 'Occuper par un evenement!');
                return redirect('admin/planning/cour/create')
                ->withErrors($validator)->withInput();
            }

        }
        foreach($body['frequence'] as $key=>$value){  
            if($value['_remove_']==0){

                DB::insert('insert into planning_cours (salle, enseignant, classe, matiere, type_cour, date_debut, date_fin, heure_debut, heure_fin, jour) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$request->salle,$request->enseignant,$request->classe,$request->matiere,$request->type_cour,$request->date_debut,$request->date_fin,$value['heure_debut'],$value['heure_fin'],$value['jour']]);
            }
        }
        return redirect('admin/planning/cour');
    }
}
