<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Menu;
use Validator;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $restaurants = Restaurant::orderBy('name')->get();
        $menus = Menu::all();
        $select = 0;

        if ($request->menu_id) {
            $restaurants = Restaurant::where('menu_id', $request->menu_id)->get();
            $select = $request->menu_id;
        } else {
            $restaurants = Restaurant::orderBy('name')->get();
        }

        return view('restaurant.index', compact('restaurants', 'menus', 'select'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::orderBy('title')->get();
        return view('restaurant.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['min:4', 'max:64'],
                'customers' => ['min:1', 'max:64'],
                'employees' => ['min:1', 'max:64'],
                'menu_id' => ['min:1', 'max:64'],
            ],
            [
                'name.min' => 'Reikia užpildyti pavadinimą.',
                'customers.min' => 'Žmonių skaičius nurodytas blogai.',
                'employees.min' => 'Darbuotojų skaičius nurodytas blogai.',
                'menu_id.min' => 'Blogas meniu',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $restaurant = new Restaurant;
        $restaurant->name = $request->name;
        $restaurant->customers = $request->customers;
        $restaurant->employees = $request->employees;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->save();
        return redirect()->route('restaurant.index')->with('success_message', 'Restoranas pridėtas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $menus = Menu::all();
        return view('restaurant.edit', compact('restaurant', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['min:4', 'max:64'],
                'customers' => ['min:1', 'max:64'],
                'employees' => ['min:1', 'max:64'],
                'menu_id' => ['min:1', 'max:64'],
            ],
            [
                'name.min' => 'Reikia užpildyti pavadinimą.',
                'customers.min' => 'Žmonių skaičius nurodytas blogai.',
                'employees.min' => 'Darbuotojų skaičius nurodytas blogai.',
                'menu_id.min' => 'Blogas meniu',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $restaurant->name = $request->name;
        $restaurant->customers = $request->customers;
        $restaurant->employees = $request->employees;
        $restaurant->menu_id = $request->menu_id;
        $restaurant->save();
        return redirect()->route('restaurant.index')->with('success_message', 'Atnaujinta :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('restaurant.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
