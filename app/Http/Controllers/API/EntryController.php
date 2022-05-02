<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\EntryResource;
use App\Http\Resources\EntriesResource;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // start with the users entries
        $query = Auth::user()->entries();

        // if sorting, add the sort criteria with ->orderBy()
        if($request->input('sort')){
            $columns = explode(',', $request->input('sort'));
            foreach($columns as $column){
                if(substr($column, 0, 1) == '-'){
                   $query = $query->orderBy(ltrim($column, '-'), 'desc'); 
                } else {
                    $query = $query->orderBy($column, 'asc');
                }
            }
        }

        // if paging, add with ->paginate()
        if($request->input('page')){
            return new EntriesResource($query->paginate(10));
        }

        // filtering by date
        if($request->upload_date){
            $query -> where('upload_date',$request->upload_date);
        }

        // if not, go ahead and return results
        return new EntriesResource($query->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $request['user_id'] = Auth::user()->id;

        // make entry object
        $entry = new Entry($request->all());
        $entry->save();

        // nested nutrient objects
        foreach ($request['foodNutrients'] as $obj) {
            $nutrient = $entry->nutrient->create($obj);
            $nutrient->save();
        }

        // return resource
        return response()->json([
            "message" => "Entry Created"
        ], 201); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        if($entry->user_id == Auth::user()->id){
            return new EntryResource($entry);
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
        if($entry->user_id == Auth::user()->id){
            $entry->update($request->all());
            return response()->json([
                "message" => "Entry Updated"
            ], 200); 
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        if($entry->user_id == Auth::user()->id){
            $entry->delete();
            return response()->json([
                "message" => "Entry Deleted"
            ], 202); 
        }
        abort(403);
    }
}
