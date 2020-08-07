<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Restaurant;
use Validator;
use Illuminate\Http\Request;

class MenuController extends Controller
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
        $restaurants = Restaurant::all();
        

        if($request->menu_id) {
            $menus = Menu::where('id', $request->menu_id)->get();
            
        } else {
            $menus = Menu::all();
        }

        
        return view('menu.index', compact('menus', 'restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create')->with('success_message', 'Sekmingai sukurta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(),
        [
            'title' => ['min:4', 'max:64'],
            'price' => ['min:1', 'max:64'],
            'weight' => ['min:1', 'max:64'],
            'meat' => ['min:1', 'max:64'],
            'about' => ['min:3', 'max:300'],
        ],
            [
            'title.min' => 'Reikia užpildyti pavadinimą.',
            'price.min' => 'Kaina nurodyta blogai.',
            'weight.min' => 'Blogas svoris',
            'meat.min' => 'Blogas svoris',
            'about.min' => 'Nera komentaro.',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        } 
        if($request->price > 9999) {
            $request->flash();
            return redirect()->back()->with('bad_message', 'Tokios kainos negali buti.');
        }
        if($request->meat > $request->weight) {
            return redirect()->back()->with('bad_message', 'Mėsos daugiau už svorio...');
        }
      
    

        $menu = new Menu;
        $menu->title = $request->title;
        $menu->price = $request->price;
        $menu->weight = $request->weight;
        $menu->meat = $request->meat;
        $menu->about = $request->about;
        $menu->img = 'menu.jpg';

        if($request->hasFile('img')) {
            $imgae = $request->file('img');
            $name = $request->file('img')->getClientOriginalName();
            $destinationPath = public_path('/images/menu');
            $imgae->move($destinationPath, $name);
            $menu->img = $name;
        }

        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Patiekalas pridėtas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('menu.show', compact('menu'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
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
        $validator = Validator::make($request->all(),
        [
            'title' => ['min:4', 'max:64'],
            'price' => ['min:1', 'max:64'],
            'weight' => ['min:1', 'max:64'],
            'meat' => ['min:1', 'max:64'],
            'about' => ['min:3', 'max:300'],
        ],
            [
            'title.min' => 'Reikia užpildyti pavadinimą.',
            'price.min' => 'Kaina nurodyta blogai.',
            'weight.min' => 'Blogas svoris',
            'meat.min' => 'Blogas svoris',
            'about.min' => 'Nera komentaro.',
            ]
        );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
        
        $menu->title = $request->title;
        $menu->price = $request->price;
        $menu->weight = $request->weight;
        $menu->meat = $request->meat;
        $menu->about = $request->about;

        $menu->save();
        return redirect()->route('menu.index')->with('success_message', 'Atnaujinta :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {


        if($menu->restaurant->count()){
            return redirect()->route('menu.index')->with('bad_message', 'Šis menių priskirtas prie Restorano.');
        }
        $menu->delete();
        return redirect()->route('menu.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
