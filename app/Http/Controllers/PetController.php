<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;
use App\Http\Requests\PetRequest;
use Illuminate\Support\Carbon;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'All Kangaroo',
            'description' => 'List of all Kangaroos',
        ];

        return view('pet.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Add Kangaroo',
            'description' => 'Add new Kangaroo to the list',
        ];

        return view('pet.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetRequest $request)
    {
        $pet = new Pet();
        
        $pet->name = $request->name;
        $pet->nickname = $request->nickname;
        $pet->weight = $request->weight;
        $pet->height = $request->height;
        $pet->gender = $request->gender;
        $pet->color = $request->color;
        $pet->friendliness = $request->friendliness;
        $pet->birthday = Carbon::parse($request->birthday);

        $pet->save();

        session()->flash('message', 'Pet added successfully!'); 

        return route('pet.create');
    }

    public function validateName(Request $request)
    {
        $pet = Pet::where('name', $request->name)->count();

        if($pet == 0) echo 'true';
        else echo 'false';
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
