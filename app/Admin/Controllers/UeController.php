<?php

namespace App\Admin\Controllers;

use App\Models\Ue;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UeController extends Controller
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
        $grid = new Grid(new Ue);

        $grid->id('ID');
        $grid->intituler('INTITULER');
        $grid->code('CODE');
        $grid->matiere('MATIERE')->display(function($matiere){
            return Matiere::find($matiere)->nom;
        });
        $grid->niveau('NIVEAU')->display(function($niveau){
            return Niveau::find($niveau)->nom;
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
        $show = new Show(Ue::findOrFail($id));

        $show->id('ID');
        $show->intituler('INTITULER');
        $show->code('CODE');
        $show->matiere('MATIERE')->as(function($matiere){
            return Matiere::find($matiere)->nom;
        });
        $show->niveau('NIVEAU')->as(function($niveau){
            return Niveau::find($niveau)->nom;
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Ue);

        $form->display('id','ID');
        $form->text('intituler');
        $form->text('code')->rules('required');
        $form->select('niveau','NIVEAU')->options(Niveau::all()->pluck('nom', 'id'))->default(1)->rules('required');
        $form->select('matiere','MATIERE')->options(Matiere::all()->pluck('nom', 'id'))->default(1)->rules('required');

        return $form;
    }
}
