<?php

namespace App\Admin\Controllers;

use App\Models\Classe;
use App\Models\Filiere;
use App\Models\Niveau;
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
            ->header('CLASSES')
            ->description('Liste des classes')
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
            ->header('DETAILS')
            ->description('Details sur une classe')
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
            ->header('EDITION')
            ->description("Modification des informations d'une classe")
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
            ->header('CREATION')
            ->description("Ajout d'une nouvelle classe")
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
            $filter->like('filiere', 'FILIERE');
        });
        $grid->id('ID');
        $grid->nom('NOM');
        $grid->code('CODE');
        $grid->niveau('NIVEAU')->display(function($niveau){
            return Niveau::find($niveau)->nom;
        });
        $grid->filiere('FILIERE')->display(function($filiere){
            return Filiere::find($filiere)->nom;
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
        $show = new Show(Classe::findOrFail($id));

        $show->id('ID');
        $show->nom('NOM');
        $show->code('CODE');
        $show->niveau('NIVEAU')->display(function($niveau){
            return Niveau::find($niveau)->nom;
        });
        $show->code_filiere('CODE FILIERE')->display(function($filiere){
            return Filiere::find($filiere)->nom;
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
        $form = new Form(new Classe);

        $form->display('id','ID');
        $form->text('nom','NOM')->rules('required');
        $form->text('code','CODE')->rules('required');
        $form->select('niveau','NIVEAU')->options(Niveau::all()->pluck('nom', 'id'))->default(1)->rules('required');
        $form->select('filiere','CODE FILIERE')->options(Filiere::all()->pluck('nom', 'id'))->default(1)->rules('required');

        return $form;
    }
}
