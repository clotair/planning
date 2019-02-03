<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('Planning')
            ->description('Une Gestion efficace pour une grande rentabilite');
            
            
    }
    public function reunion(Content $content)
    {
  
        return $content
            ->header('Planning')
            ->description('Une Gestion efficace pour une grande rentabilite')
            ->body(view('admin.reunion'));
    }
    public function cour(Content $content)
    {
        return $content
            ->header('Planning')
            ->description('Une Gestion efficace pour une grande rentabilite')
            ->body(view('admin.cour'));
    }
    public function materiel(Content $content)
    {
        return $content
            ->header('Planning')
            ->description('Une Gestion efficace pour une grande rentabilite')
            ->body(view('admin.materiel'));
    }
}
