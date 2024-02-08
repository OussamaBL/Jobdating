<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index(){
        $skills = Skill::paginate(9);
        return view('skills.list',compact('skills'));
    }
    public function add(){
        $skills = Skill::all();
        return view('skills.add',compact('skills'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|unique:skills', 
        ]);
    
        $skill = Skill::where('name', $request->name)->first();
    
        if (!$skill) {
            Skill::create(['name' => $request->name]);
    
            return redirect()->route('skill.index')
                            ->with('success', 'Skill created successfully.');
        } else {
            return redirect()->route('skill.index')
                            ->with('error', 'Skill already exists.');
        }
    }
    public function edit(Skill $skill){
        return view('skills.edit',compact('skill'));
    }
    public function update(Request $request,Skill $skill){

        $request->validate([
        'name' => 'required|string|unique:skills,name,' . $skill->id,
        ]);

        $newSkill = Skill::where('name', $request->name)->where('id', '!=', $skill->id)->first();

        if (!$newSkill) {
            $skill->update(['name' => $request->name]);

            return redirect()->route('skill.index')
                            ->with('success', 'Skill updated successfully.');
        } else {
            return redirect()->route('skill.index')
                            ->with('error', 'Skill with the new name already exists.');
        }
    }
    public function destroy(Skill $skill){
        $skill->delete();
        return redirect()->route('skill.index')->with('success','skill deleted successfully');
    }
}
