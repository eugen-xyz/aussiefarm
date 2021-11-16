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

    public function getList()
    {

        $pet = Pet::orderByName('asc')->status(1)->get();

        return $pet;
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
        $pet->birthday = Carbon::parse($request->birthday)->format('Y-m-d');
        $pet->status = 1;

        $pet->save();

        session()->flash('message', 'Pet added successfully!'); 

        return route('pet.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {

        $data = [
            'title' => $request,
            'description' => 'know more about your favorite pet',
        ];

        $name = str_replace('-', ' ', $request);
        $pet = Pet::where('name', $name)->status(1)->first();

        $related = Pet::gender($pet->gender)->where('pet_id', '!=', $pet->pet_id)->limit(4)->get();
      
        return view('pet.show', compact('data', 'pet', 'related'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        $data = [
            'title' => 'Edit Kangaroo',
            'description' => 'Edit Kangaroo',
        ];

        $data['pet'] = $pet;

        return view('pet.edit', compact('data' , 'pet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(PetRequest $request, Pet $pet)
    {
    
        $pet->name = $request->name;
        $pet->nickname = $request->nickname;
        $pet->weight = $request->weight;
        $pet->height = $request->height;
        $pet->gender = $request->gender;
        $pet->color = $request->color;
        $pet->friendliness = $request->friendliness;
        $pet->birthday = Carbon::parse($request->birthday)->format('Y-m-d');
        $pet->status = 1;

        $pet->save();

        session()->flash('message', 'Pet updated successfully!'); 

        return route('pet.edit', $pet->pet_id);
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

    public function validateName(Request $request)
    {
        // return 'true';
        $pet = Pet::where('name', $request->name)->first();

        if($pet === null) {
            echo 'true';
            exit;
        } 
        
        if($pet['pet_id'] == $request->pet_id) {
            echo 'true';
            exit;
        }
        echo 'false';
        exit;
        
    
    }
}
