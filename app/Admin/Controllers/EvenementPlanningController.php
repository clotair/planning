<?php

namespace App\Admin\Controllers;

use App\Models\EvenementPlanning;
use App\Models\Salle;
use App\Models\Jour;
use App\Models\Frequence;
use App\Models\Evenement;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EvenementPlanningController extends Controller
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
            ->header('Evenement')
            ->description('Liste des evenements')
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
            ->description('un evenement')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new EvenementPlanning);

        $grid->id('ID');
        $grid->evenement('EVENEMENT')->display(function($id){
            return Evenement::find($id)->description;
        });
        $grid->salle('SALLE')->display(function($id){
            return Salle::find($id)->code;
        });
        $grid->date_debut('DATE DE DEBUT');
        $grid->date_fin('DATE DE FIN');
        $grid->heure_debut('HEURE DEBUT');
        $grid->heure_fin('HEURE FIN');
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
        $show = new Show(EvenementPlanning::findOrFail($id));
        $show->evenement('EVENEMENT')->as(function($id){
            return Evenement::find($id)->description;
        });
        $show->salle('SALLE')->as(function($id){
            return Salle::find($id)->code;
        });
        $show->id('ID');
        $show->date_debut('DATE DE DEBUT');
        $show->date_fin('DATE DE FIN');
        $show->jour('JOUR')->as(function($id){
            return Jour::find($id)->nom;
        });
        $show->heure_debut('HEURE DE DEBUT');
        $show->heure_fin('HEURE DE FIN');
        $show->heure_debut('HEURE DEBUT');
        $show->heure_fin('HEURE FIN');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new EvenementPlanning);
        $form->display('id','ID');
        $form->select('evenement','Evenement')->options(Evenement::all()->pluck('description' ,'id'))->default(1)->rules('required');
        $form->select('salle','SALLE')->options(Salle::all()->pluck('nom', 'id'))->default(1)->rules('required');
        $form->date('date_debut','DATE DE DEBUT');
        $form->date('date_fin','DATE DE FIN');
        $form->hasMany('frequence', function (Form\NestedForm $form) {
            $form->time('heure_debut')->rules('required')->default(12);
            $form->time('heure_fin')->rules('required')->default(15);
            $form->select('jour','JOUR')->options(Jour::all()->pluck('nom', 'id'))->default(1)->rules('required');
        });
        $form->setAction('/admin/api/evenement/add');

        return $form;
    }
}
