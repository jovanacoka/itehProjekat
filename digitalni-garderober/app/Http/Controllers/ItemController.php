<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create()
    {
        $categories = ItemCategory::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validacija i unos u bazu
        $request->validate([
            'item_category_id' => 'required',
            'color' => 'required',
            'size' => 'required',
        ]);

        Item::create([
            'user_id' => auth()->id(),
            'item_category_id' => $request->item_category_id,
            'color' => $request->color,
            'size' => $request->size,
            'weather_category_id' => $this->getWeatherCategory($request->weather), // Primer kako bi mogao da odrediš vremensku kategoriju
        ]);

        return redirect()->route('items.index');
    }
}
