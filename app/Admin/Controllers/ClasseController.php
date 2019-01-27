<?php

namespace App\Admin\Controllers;

use App\Models\Classe;
use App\Models\Filiere;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ClasseController extends Controller
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
        $grid = new Grid(new Classe);
        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();
        
            // Add a column filter
            $filter->like('nom', 'nom');
            $filter->like('code', 'CODE');
            $filter->like('code_filiere', 'CODE FILIERE');
        });
        $grid->id('ID');
        $grid->nom('NOM');
        $grid->code('CODE');
        $grid->code_filiere('CODE FILIERE');
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
        $show = new Show(Classe::findOrFail($id));

        $show->id('ID');
        $show->nom('NOM');
        $show->code('CODE');
        $show->code_filiere('CODE FILIERE');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Classe);

        $form->display('id','ID');
        $form->text('nom','NOM');
        $form->text('code','CODE');
        $form->select('code_filiere','CODE FILIERE')->options(Filiere::all()->pluck('code', 'code'))->default(1)->rules('required');

        return $form;
    }
}
