<?php

namespace App\Http\Controllers;
use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use App\Models\Compagnie;
use App\Models\User;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function announcements(){
        $announcements = Announcement::latest()->paginate(8);
        return view('Announcements.announcements', compact('announcements'));
    }
    public function destroy(Announcement $announcement)
    {  
        $announcement->delete();
        return redirect()->route('Compagnies.index')->with('success','Announcement deleted successfully');
    }
    public function edit(Announcement $announcement)
    {
        $compagnies = Compagnie::all();
        $users = User::all();
         return view('Announcements.edit', compact('announcement','users','compagnies'));
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(AnnouncementRequest $request, Announcement $announcement)
    {
        $announcement->update($request->validated());
        return redirect()->route('Compagnies.index')
                        ->with('success','Announcement Updated successfully.');
    }

    public function store(AnnouncementRequest $request)
    { 
        Announcement::create($request->validated());
        return redirect()->route('Compagnies.index')
                        ->with('success','Announcement created successfully.');
    }
    public function add()
    {
        
        $compagnies = Compagnie::all();
        $users = User::all();
        
     
        return view('Announcements.formAnnouncement', compact('compagnies', 'users'));
    }

}
