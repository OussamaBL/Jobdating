<?php

namespace App\Http\Controllers;
use App\Models\Compagnie;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CompagnieRequest;
use Illuminate\Support\Facades\Auth;


class CompagnieController extends Controller
{
    public function home()
    {
        if(Auth::check()){
            $user = Auth::user();
        
            $postulatedAnnouncementIds = $user->announcements()->pluck('announcements.id')->toArray();
    
            $userSkillIds = $user->skills->pluck('id')->toArray();
        
             $announcements = Announcement::whereNotIn('id', $postulatedAnnouncementIds)
            ->latest()
            ->get();
        
            $filteredAnnouncements = [];
        
            foreach ($announcements as $announcement) {
                $announcementSkillIds = $announcement->skills->pluck('id')->toArray();
        
                $commonSkillsCount = count(array_intersect($userSkillIds, $announcementSkillIds));
        
                $halfAnnouncementSkillsCount = count($announcementSkillIds) / 2;
        
                if ($commonSkillsCount >= $halfAnnouncementSkillsCount) {
                    $filteredAnnouncements[] = $announcement;
                }
            }
        }
        else{
            $filteredAnnouncements=Announcement::all();
        }
        
    
        // $perPage = 8;
        // $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage();
        // $announcements = \Illuminate\Pagination\Paginator::make(array_slice($filteredAnnouncements, ($currentPage - 1) * $perPage, $perPage), count($filteredAnnouncements), $perPage);
    
        return view('index', compact('filteredAnnouncements'));
    }

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
    // public function archive(){
    //     $compagnies=Compagnie::onlyTrashed()->get();
    //     return view('Compagnies.archive', compact('compagnies'));
    // }
    // public function allCompagnies(){
    //     $compagnies=Compagnie::withTrashed()->get();
    //     return view('Compagnies.allCompagnies', compact('compagnies'));
    // }
    

}
