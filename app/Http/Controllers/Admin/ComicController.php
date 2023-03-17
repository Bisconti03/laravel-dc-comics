<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

// Models
use App\Models\Comic;

// Helpers
use Illuminate\Validation\Rule;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:2048',
            'price' => 'required|numeric|min:1',
            'series' => 'required|max:255',
            'type' => [
                'required',
                Rule::in(['comic book', 'graphic novel'])
            ]

        ]); 

        $data = $request->all();


        $newComic = new Comic;
        $newComic->title= $data['title'];
        $newComic->description=$data['description'];
        $newComic->image=null;
        $newComic->price=$data['price'];
        $newComic->series=$data['series'];
        $newComic->sale_date=null;
        $newComic->type=$data['type'];
        $newComic->save();

        return redirect()->route('comics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);

        return view('comics.show',compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);

        return view('comics.edit', compact('comic'));
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
        $comic = Comic::findOrFail($id);
         // Validation
         $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:2048',
            'price' => 'required|numeric|min:1',
            'series' => 'required|max:255',
            'type' => [
                'required',
                Rule::in(['comic book', 'graphic novel'])
            ]

        ]); 

        $data = $request->all();

        

        $comic->update($data);


        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);

        $comic->delete();

        return redirect()->route('comics.index');
    }
}
