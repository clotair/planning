<?php

namespace App\Admin\Controllers;

use App\Models\Etalle;
use App\Models\CourPlanning;
use App\Models\SallePlanning;
use App\Models\EnseignantPlanning;
use App\Models\ClassePlanning;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EtalleController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Etalle);

        $grid->id('ID');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Etalle::findOrFail($id));

        $show->id('ID');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Etalle);

        $form->display('ID');
        $form->display('Created at');
        $form->display('Updated at');

        return $form;
    }
    protected function add (Request $request)
    {
        
        Validator::make($request->all(), [
            'salle' => 'required',
            'enseignant' => 'required',
            'classe' => 'required',
            'matiere' => 'required',
            'type_cour'=> 'required',
            'date_debut'=> 'required',
            'date_fin'=>'required',
            'frequence'=>'required'
        ])->validate();
        $body =  $request->all();
        if($request->date_debut>$request->date_fin){
            return redirect('admin/planning/cour/create')
            ->withError('la date de debut doit etre plus petite que la date de fin');
           
        }
        foreach($body['frequence'] as $key=>$value){
            if($value['heure_debut']>$value['heure_fin']){
                return die("l'heure de debut doit etre plus petite que la date de fin");
            }
            $event = DB::select('select * from planning_evenements where salle=? AND(((date_debut <=? OR date_fin >=?) AND (heure_debut >=? AND heure_debut<=?) OR (heure_fin <=? AND heure_fin >=?) AND jour=?)OR((date_debut <=? OR date_debut >=?) AND (heure_debut >=? AND heure_fin<=?) AND (heure_fin <=? AND heure_fin >=?) AND jour=?))', [$request->salle,$request->date_debut,$request->date_debut,$value['heure_debut'],$value['heure_debut'],$value['heure_fin'],$value['heure_fin'],$value['jour'],$request->date_fin,$request->date_fin,$value['heure_debut'],$value['heure_debut'],$value['heure_fin'],$value['heure_fin'],$value['jour']]);
            $classeoccuper = DB::select('select * from planning_classes where classe=? AND(((date_debut <=? OR date_fin >=?) AND (heure_debut >=? AND heure_debut<=?) OR (heure_fin <=? AND heure_fin >=?) AND jour=?)OR((date_debut <=? OR date_debut >=?) AND (heure_debut >=? AND heure_fin<=?) AND (heure_fin <=? AND heure_fin >=?) AND jour=?))', [$request->classe,$request->date_debut,$request->date_debut,$value['heure_debut'],$value['heure_debut'],$value['heure_fin'],$value['heure_fin'],$value['jour'],$request->date_fin,$request->date_fin,$value['heure_debut'],$value['heure_debut'],$value['heure_fin'],$value['heure_fin'],$value['jour']]);
            $salleoccuper = DB::select('select * from planning_salles where salle=? AND(((date_debut <=? OR date_fin >=?) AND (heure_debut >=? AND heure_debut<=?) OR (heure_fin <=? AND heure_fin >=?) AND jour=?)OR((date_debut <=? OR date_debut >=?) AND (heure_debut >=? AND heure_fin<=?) AND (heure_fin <=? AND heure_fin >=?) AND jour=?))', [$request->salle,$request->date_debut,$request->date_debut,$value['heure_debut'],$value['heure_debut'],$value['heure_fin'],$value['heure_fin'],$value['jour'],$request->date_fin,$request->date_fin,$value['heure_debut'],$value['heure_debut'],$value['heure_fin'],$value['heure_fin'],$value['jour']]);
            $enseignantoccuper = DB::select('select * from planning_enseignants where enseignant=? AND(((date_debut <=? OR date_fin >=?) AND heure_debut =? AND heure_fin =? AND jour=?)OR((date_debut <=? OR date_fin >=?) AND (heure_debut >=? AND heure_fin<=?) AND (heure_fin <=? AND heure_fin >=?) AND jour=?))', [$request->enseignant,$request->date_debut,$request->date_debut,$value['heure_debut'],$value['heure_debut'],$value['heure_fin'],$value['heure_fin'],$value['jour'],$request->date_fin,$request->date_fin,$value['heure_debut'],$value['heure_fin'],$value['jour']]);

            if( $classeoccuper){
                return redirect('admin/planning/cour/create')
                        ->withError('Classe occuper');
            }
            if($salleoccuper){
               return die('salle occuper');
            }
            if($enseignantoccuper){
               return die('ensseigant occuper');
            }
            if($event){
                return die('occuper par un evenement');
            }

        }
        foreach($body['frequence'] as $key=>$value){  
            if($value['_remove_']==0){
                DB::insert('insert into planning_classes (classe,jour,heure_debut,heure_fin,date_debut,date_fin) values (?, ?, ?, ?, ?, ?)', [$request->classe, $value['jour'],$value['heure_debut'],$value['heure_fin'],$request->date_debut,$request->date_fin]);
                DB::insert('insert into planning_salles (salle,jour,heure_debut,heure_fin,date_debut,date_fin) values (?, ?, ?, ?, ?, ?)', [$request->salle, $value['jour'],$value['heure_debut'],$value['heure_fin'],$request->date_debut,$request->date_fin]);
                DB::insert('insert into planning_enseignants (enseignant,jour,heure_debut,heure_fin,date_debut,date_fin) values (?, ?, ?, ?, ?, ?)', [ $request->enseignant, $value['jour'],$value['heure_debut'],$value['heure_fin'],$request->date_debut,$request->date_fin]);
                DB::insert('insert into planning_cours (salle, enseignant, classe, matiere, type_cour, date_debut, date_fin, heure_debut, heure_fin, jour) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$request->salle,$request->enseignant,$request->classe,$request->matiere,$request->type_cour,$request->date_debut,$request->date_fin,$value['heure_debut'],$value['heure_fin'],$value['jour']]);
            }
        }
        return redirect('admin/planning/cour');
    }
   
}
