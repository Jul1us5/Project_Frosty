<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
        
        $restaurants = Restaurant::all();
        return view('menu.create', ['restaurants' => $restaurants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu;
        $menu->title = $request->title;
        $menu->price = $request->price;
        $menu->weight = $request->weight;
        $menu->meat = $request->meat;
        $menu->about = $request->about;
        $menu->restaurant_id = $request->restaurant_id; 
        $menu->save();
        return redirect()->route('menu.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $restaurants = Restaurant::all();
        return view('menu.edit', ['menu' => $menu, 'restaurants' => $restaurants]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->title = $request->title;
        $menu->price = $request->price;
        $menu->weight = $request->weight;
        $menu->meat = $request->meat;
        $menu->about = $request->about;
        $menu->restaurant_id = $request->restaurant_id; 
        $menu->save();
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index');
    }
}
