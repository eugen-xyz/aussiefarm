<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Kangaroos',
            'description' => 'AussieFarm\'s Kangaroo catalogue',
        ];

        $data['pets'] = Pet::orderByName('asc')->status(1)->get();

        return view('home.index', compact('data'));
    }
}
