<?php

namespace App\Admin\Controllers;

use App\Models\CourPlanning;
use App\Models\Salle;
use App\Models\Frequence;
use App\Models\Enseignant;
use App\Models\Jour;
use App\Models\Ue;
use App\Models\Classe;
use App\Models\EnseignementType;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CourPlanningController extends Controller
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
        $grid = new Grid(new CourPlanning);

        $grid->id('ID');
        $grid->salle('SALLE')->display(function($id){
            return Salle::find($id)->code;
        });
        $grid->enseignant('ENSEIGNANT')->display(function($id){
            return Enseignant::find($id)->nom;
        });       
        $grid->classe('CLASSE')->display(function($id){
            return Classe::find($id)->code;
        });
        $grid->matiere('MATHIERE')->display(function($id){
            return Ue::find($id)->code;
        });
        $grid->type_cour('TYPE COUR')->display(function($id){
            return EnseignementType::find($id)->nom;
        });
        $grid->date_debut('DATE DE DEBUT');
        $grid->date_fin('DATE DE FIN');
        $grid->jour('JOUR')->display(function($id){
            return Jour::find($id)->nom;
        });

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
        $show = new Show(CourPlanning::findOrFail($id));

        $show->id('ID');
        $show->salle('SALLE')->as(function($id){
            return Salle::find($id)->code;
        });
        $show->enseignant('ENSEIGNANT')->as(function($id){
            return Enseignant::find($id)->nom;
        });       
        $show->classe('CLASSE')->as(function($id){
            return Classe::find($id)->code;
        });
        
        $show->matiere('MATHIERE')->as(function($id){
            return Ue::find($id)->code;
        });
        $show->type_cour('TYPE COUR')->as(function($id){
            return EnseignementType::find($id)->nom;
        });
        $show->date_debut('DATE DE DEBUT');
        $show->date_fin('DATE DE FIN');
        $show->jour('JOUR')->as(function($id){
            return Jour::find($id)->nom;
        });
        $show->heure_debut('HEURE DE DEBUT');
        $show->heure_fin('HEURE DE FIN');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CourPlanning);
        $form->ignore('info');
        $form->display('info');
        $form->display('id','ID');
        $form->select('salle','SALLE')->options(Salle::all()->pluck('nom', 'id'))->default(1)->rules('required');
        $form->select('enseignant','Enseignant')->options(Enseignant::all()->pluck('nom', 'id'))->default(1)->rules('required');
        $form->select('classe','CLASSE')->options(Classe::all()->pluck('nom', 'id'))->default(1)->rules('required');
        $form->select('matiere','MATIERE')->options(Ue::all()->pluck('code', 'id'))->default(1)->rules('required');
        $form->select('type_cour','CATHEGORIE')->options(EnseignementType::all()->pluck('nom', 'id'))->default(1)->rules('required');
        $form->date('date_debut','DATE DE DEBUT');
        $form->date('date_fin','DATE DE FIN');
        $form->hasMany('frequence', function (Form\NestedForm $form) {
            $form->time('heure_debut')->rules('required')->default(12);
            $form->time('heure_fin')->rules('required')->default(15);
            $form->select('jour','JOUR')->options(Jour::all()->pluck('nom', 'id'))->default(1)->rules('required');
        });
        $form->setAction('/admin/api/cour/add');
        return $form;
    }
    
}
