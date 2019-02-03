<?php

namespace App\Admin\Controllers;

use App\Models\Salle;
use App\Models\TypeEmplacement;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SalleController extends Controller
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
        $grid = new Grid(new Salle);

        $grid->id('ID');
        $grid->nom('NOM');
        $grid->code('CODE');
        $grid->type('CATHEGORIE')->display(function($type){
            return TypeEmplacement::find($type)->nom;
        });
        $grid->places('PLACES');

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
        $show = new Show(Salle::findOrFail($id));

        $show->id('ID');
        $show->nom('NOM');
        $show->code('CODE');
        $show->type('CATHEGORIE')->display(function($type){
            return TypeEmplacement::find($type)->nom;
        });
        $show->places('PLACES');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Salle);

        $form->display('id','ID');
        $form->text('nom');
        $form->text('code')->rules('required');
        $form->select('type','CATHEGORIE')->options(TypeEmplacement::all()->pluck('nom', 'id'))->default(1)->rules('required');
        $form->number('places','PLACES')->min(1);
        return $form;
    }
}
