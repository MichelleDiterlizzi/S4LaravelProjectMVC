<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;

class CategoryController extends Controller
{
    public function index()
    {
        
        $categories = Category::all();

        
        return view('categories.index', compact('categories'));
        
    }

    public function show($id)
    {
        $category = Category::findOrFail($id); 
        $events = Event::where('category_id', $id)->get(); 
        return view('categories.show', compact('category', 'events'));
        
    }
}
