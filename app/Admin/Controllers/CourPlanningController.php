<?php

namespace App\Admin\Controllers;

use App\Models\CourPlanning;
use App\Models\Salle;
use App\Models\Frequence;
use App\Models\Enseignant;
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
        $show = new Show(CourPlanning::findOrFail($id));

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
        $form = new Form(new CourPlanning);

        $form->display('id','ID');
        $form->select('salle','SALLE')->options(Salle::all()->pluck('nom', 'id'))->default(1)->rules('required');
        $form->select('enseigant','Enseignant')->options(Enseignant::all()->pluck('nom', 'id'))->default(1)->rules('required');
        $form->select('classe','CLASSE')->options(Classe::all()->pluck('nom', 'id'))->default(1)->rules('required');
        $form->select('matiere','MATIERE')->options(Ue::all()->pluck('nom', 'id'))->default(1)->rules('required');
        $form->select('type_cour','CATHEGORIE')->options(EnseignementType::all()->pluck('nom', 'id'))->default(1)->rules('required');
        $form->date('date_debut','DATE DE DEBUT');
        $form->date('date_fin','DATE DE FIN');

        return $form;
    }
}
