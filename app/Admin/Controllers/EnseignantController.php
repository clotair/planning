<?php

namespace App\Admin\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Enseignant;
use App\Models\Grade;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class EnseignantController extends Controller
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
        $enseignant = DB::table('enseignants')
            ->join('grades', 'enseignants.id', '=', 'grades.id')
            ->select('enseignants.nom', 'enseignants.id', 'grades.nom')
            ->get();
        $grid = new Grid(new Enseignant);
        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();
        
            // Add a column filter
            $filter->like('nom', 'nom');
        
        });

        $grid->id('ID');
        $grid->nom('NOM');
        $grid->grade('GRADE')->display(function($grade) {
            return Grade::find($grade)->nom;
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
        $enseignant = DB::table('enseignants')
            ->join('grades', $id, '=', 'grades.id')
            ->select('enseignants.nom', 'enseignants.id', 'grades.nom')
            ->get();
        $show = new Show($enseignant);

        $show->id('ID');
        $show->nom('NOM');
        $show->grade('GRADE');
        

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Enseignant);

        $form->display('id','ID');
        $form->text('nom','NOM')->rules('required');
        $form->select('grade','GRADE')->options(Grade::all()->pluck('nom', 'id'))->default(1)->rules('required');
        

        return $form;
    }
}
