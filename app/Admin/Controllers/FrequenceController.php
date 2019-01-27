<?php

namespace App\Admin\Controllers;

use App\Models\Frequence;
use App\Models\Jour;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class FrequenceController extends Controller
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
        $grid = new Grid(new Frequence);
        $grid->id('ID');
        $grid->jour();
        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();
        
            // Add a column filter
            $filter->like('jour', 'JOUR');
            $filter->like('heure_debut', 'HEURE DE DEBUT');
            $filter->like('heure_fin', 'HEURE DE FIN');
        });
        $grid->heure_debut('HEURE DE DEBUT');
        $grid->heure_fin('HEURE DE FIN');

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
        $show = new Show(Frequence::findOrFail($id));
        $show->id('ID');
        $show->jour('JOUR');
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
        $form = new Form(new Frequence);
        $form->display('id','ID');
        $form->select('jour','JOUR')->options(Jour::all()->pluck('nom', 'nom'))->default(1)->rules('required');
        $form->time('heure_debut','HEURE DE DEBUT')->default(12);
        $form->time('heure_fin','HEURE DE FIN')->default(12);

        return $form;
    }
}
