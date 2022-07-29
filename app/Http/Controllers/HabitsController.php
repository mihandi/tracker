<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use App\Models\User;
use Illuminate\Http\Request;

class HabitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $habit = new Habit();
        $habit->name = $request->name;
        $habit->description = $request->description;
        $habit->category_id = $request->category_id;

        $habit->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $habit = Habit::find($id);

        $habit->name = $request->name;
        $habit->description = $request->description;
        $habit->category_id = $request->category_id;

        $habit->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habit = Habit::find($id);

        $habit->delete();
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getHabits(){
        $habits = Habit::with('category')->get();

        return response()->json([
            'habits' => $habits
            ], 200
        );
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getHabit($id) {
        $habit = Habit::find($id);

        return response()->json([
            'habit' => $habit
        ], 200
        );
    }
}
