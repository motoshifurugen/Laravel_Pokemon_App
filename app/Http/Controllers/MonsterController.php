<?php

namespace App\Http\Controllers;

use App\Monster;
use App\Attribute;
use App\Region;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MonsterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort_query = [];
        $sorted = "";

        if ($request->sort !== null) {
            $slices = explode(' ', $request->sort);
            $sort_query[$slices[0]] = $slices[1];
            $sorted = $request->sort;
        }

        if ($request->attribute !== null ) {
            $monsters = Monster::where('attribute_id', $request->attribute)->sortable($sort_query)->paginate(5);
            $attribute = Attribute::find($request->attribute);
        } else {
            $monsters = Monster::sortable($sort_query)->paginate(5);
            $attribute = null;
        }

        $sort = [
            '並び替え' => ' ',
            '高さの低い順' => 'size asc',
            '高さの高い順' => 'size desc',
            '重さの軽い順' => 'weight asc',
            '重さの思い順' => 'weight desc'
        ];
        // if ($request->region !== null) {
        //     $monsters = Monster::where('region_id', $request->region)->paginate(5);
        //     $region = Region::find($request->region);
        // } else {
        //     $monsters = Monster::paginate(5);
        //     $region = null;
        // }
        $attributes = Attribute::all();
        // $regions = Region::all();

        return view('monsters.index', compact('monsters', 'attribute', 'attributes', 'sort', 'sorted'));
    }

        // public function favorite(monster $monster)
        // {
        //     $user = Auth::user();

        //     if ($user->hasFavorited($monster)) {
        //         $user->unfavorite($monster);
        //     } else {
        //         $user->favorite($monster);
        //     }

        //     return redirect()->route('monsters.show', $monster);
        // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = Attribute::all();
        $regions = Region::all();

        return view('monsters.create', compact('attributes', 'regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $monster = new Monster();
        $monster->name = request('name');
        $monster->attribute_id = request('attribute_id');
        $monster->region_id = request('region_id');
        $monster->size = request('size');
        $monster->weight = request('weight');
        $monster->attack_name = request('attack_name');
        $monster->attack_description = request('attack_description');
        $monster->save();

        return redirect()->route('monsters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Monster  $monster
     * @return \Illuminate\Http\Response
     */
    public function show(Monster $monster)
    {
        $attributes = Attribute::all();
        $regions = Region::all();

        return view('monsters.show', compact('monster', 'attributes', 'regions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Monster  $monster
     * @return \Illuminate\Http\Response
     */
    public function edit(Monster $monster)
    {
        $attributes = Attribute::all();
        $regions = Region::all();

        return view('monsters.edit', compact('monster', 'attributes', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Monster  $monster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monster $monster)
    {
        $monster->name = request('name');
        $monster->attribute_id = request('attribute_id');
        $monster->region_id = request('region_id');
        $monster->size = request('size');
        $monster->weight = request('weight');
        $monster->attack_name = request('attack_name');
        $monster->attack_description = request('attack_description');
        $monster->save();

        return redirect()->route('monsters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Monster  $monster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monster $monster)
    {
        $monster->delete();
        return redirect()->route('monsters.index');
    }
}
