<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $entries = Auth::user()->entries;
        return view('entries.index', ['entries' => $entries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreEntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $entry = new Entry($request->all());
        $entry->save();
        return redirect('entries')->with('status', 'Entry saved!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entry  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry)
    {
        if($entry->user_id == Auth::user()->id){
            return view('entries.edit', ['entry' => $entry]);
        }
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entry  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        if($entry->user_id == Auth::user()->id){
            return view('entries.edit', ['entry' => $entry]);
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreEntryRequest  $request
     * @param  \App\Models\Entry  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
        if($entry->user_id == Auth::user()->id){
            $entry->update($request->all());
            return back()->with('status', 'Contact updated!');
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        if($entry->user_id == Auth::user()->id){
            $entry->delete();
            return response(['msg' => 'Success'], 200) ->header('Content-Type', 'application/json');
        }
        abort(403);
    }
}
