<?php

namespace App\Admin\Controllers;

use App\Models\MaterielPlanning;
use App\Models\Materiel;
use App\Models\Jour;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\MessageBag;

class MaterielPlanningController extends Controller
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
        $grid = new Grid(new MaterielPlanning);

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
        $show = new Show(MaterielPlanning::findOrFail($id));

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
        $form = new Form(new MaterielPlanning);
        $form->display('id','ID');
        $form->select('materiel','Materiel')->options(Materiel::all()->pluck('nom' ,'id'))->default(1)->rules('required');
        $form->date('date_debut','DATE DE DEBUT');
        $form->date('date_fin','DATE DE FIN');
        $form->hasMany('frequence', function (Form\NestedForm $form) {
            $form->time('heure_debut')->rules('required')->default(12);
            $form->time('heure_fin')->rules('required')->default(15);
            $form->select('jour','JOUR')->options(Jour::all()->pluck('nom', 'id'))->default(1)->rules('required');
        });
        $form->setAction('/admin/api/materiel/add');

        return $form;
    }
}
