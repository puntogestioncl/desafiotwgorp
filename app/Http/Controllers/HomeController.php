<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getPost(){

        $publications = Publication::select('id', 'title', 'content');

        return DataTables::of($publications)
            ->addColumn('actions', function($publications){
                return '<a href="publications/'.$publications->id.'" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Ver</a>';
            })
            ->rawColumns(['actions'])
            ->toJson();
    }
}
