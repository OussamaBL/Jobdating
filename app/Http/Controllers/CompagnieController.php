<?php

namespace App\Http\Controllers;
use App\Models\Compagnie;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CompagnieRequest;

class CompagnieController extends Controller
{
    public function index()
    {
            $compagnies = Compagnie::count();
            $announcements = Announcement::count();
            $users=User::count();
            return view('Compagnies.index', compact('compagnies', 'announcements','users'));
        
    }
    public function compagnies(){
        $compagnies = Compagnie::latest()->paginate(8);
        return view('Compagnies.compagnies', compact('compagnies'));
    }

    public function store(CompagnieRequest $request)
    { 
        Compagnie::create($request->validated());
        return redirect()->route('Compagnies.index')
                        ->with('success','company created successfully.');
    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compagnie $compagnie)
    {  
        $compagnie->delete();
        return redirect()->route('Compagnies.index')->with('success','Company deleted successfully');
    }
    public function edit(Compagnie $compagnie)
    {
         return view('Compagnies.edit', compact('compagnie'));
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(CompagnieRequest $request, Compagnie $compagnie)
    {
        $compagnie->update($request->validated());
        return redirect()->route('Compagnies.index')
                        ->with('success','Company Updated successfully.');
    }

}
