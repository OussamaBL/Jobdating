<?php

namespace App\Http\Controllers;
use App\Http\Requests\AnnouncementRequest;
use App\Models\Announcement;
use App\Models\Announcement_Skill;
use App\Models\Compagnie;
use App\Models\User;
use App\Models\Skill;
use App\Models\Postuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $skills = Skill::all();
        $compagnies = Compagnie::all();
         return view('Announcements.edit', compact('announcement','compagnies','skills'));
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(AnnouncementRequest $request, Announcement $announcement)
    {
        $announcement->update($request->validated());
        $announcement->skills()->detach();
        if(count($request->skills)>0){
            foreach($request->skills as $skill){
                Announcement_Skill::create([
                    'announcement_id' => $announcement->id,
                    'skill_id' => $skill,

                ]);
            }
        }
        return redirect()->route('Compagnies.index')
                        ->with('success','Announcement Updated successfully.');
    }

    public function store(AnnouncementRequest $request)
    { 
        $image=$request->file('image');
        $new_name=rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $announcement=Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $new_name,
            'compagnie_id' => $request->compagnie_id,
        ]);
        if(count($request->skills)>0){
            foreach($request->skills as $skill){
                Announcement_Skill::create([
                    'announcement_id' => $announcement->id,
                    'skill_id' => $skill,

                ]);
            }
        }

        return redirect()->route('Compagnies.index')
                        ->with('success','Announcement created successfully.');
    }
    public function add()
    {
        
        $compagnies = Compagnie::all();
        $skills = Skill::all();
        
     
        return view('Announcements.formAnnouncement', compact('compagnies','skills'));
    }
    public function details($id){
        $announcement=Announcement::find($id);
        return view('Announcements.details',compact('announcement'));
    }
    public function postuler($id){
        Postuler::create([
            "announcement_id" => $id,
            "user_id" => Auth::id(),
        ]);
        return redirect()->route('users.profile')
                        ->with('success','Postulated successfully.');
    }

}
