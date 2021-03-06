<?php

namespace App\Admin\Controllers;

use App\Models\Enseignement;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EnseignementController extends Controller
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
            ->header('ENSEIGNEMENT')
            ->description('Liste des enseignements')
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
            ->description('Details sur un enseignement')
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
            ->description("Modification des infos d'un enseignement")
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
            ->description("Ajout d'un nouvel enseignement")
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Enseignement);

        $grid->id('ID');
        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();
        
            // Add a column filter
            $filter->like('nom', 'nom');
            $filter->like('heure_debut', 'HEURE DE DEBUT');
            $filter->like('heure_fin', 'HEURE DE FIN');
        });
        $grid->nom('NOM');

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
        $show = new Show(Enseignement::findOrFail($id));

        $show->id('ID');
        $show->nom('NOM');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Enseignement);

        $form->display('id','ID');
        $form->text('nom','NOM')->rules('required');
        return $form;
    }
}
