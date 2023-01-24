<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\MK;
use App\Models\RPS;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;

class ActivitiesController extends Controller
{
    public function List()
    {
        $activities = Activity::all();
        return view('dosen.activities.list',compact('activities'));
    }

    public function Add()
    {
        $rpss = RPS::where('pengembang', auth()->user()->name)->get();
        return view('dosen.activities.add',compact('rpss'));
    }

    public function Edit($id)
    {
        $activity = Activity::findOrFail($id);
        $rpss = RPS::all();
        return view('dosen.activities.edit', compact('activity', 'rpss'));
    }

    public function Store(Request $request){
        $request->validate([
            'minggu' => ['required', 'unique:activities', 'regex:/^[0-9-]+$/'],
            'sub_cpmk' => 'required',
            'materi' => 'required',
            'id_rps' => 'required',
        ]);
        $indikator = '<ul>';
        foreach($request->indikator as $key => $ind){
            if($ind != null){
                $indikator .= ' <li>'.$ind.'</li>';
            }
        }
        $indikator .= ' </ul>';

        $activity = new Activity($request->all());
        $activity['indikator'] = $indikator;
        $activity->save();
        return redirect('/dosen/activities/list-activity')->with('success', 'New Activities successfully added!');
    }

    public function Update(Request $request, $id){
        $request->validate([
            'minggu' => ['required', 'regex:/^[0-9-]+$/'],
            'sub_cpmk' => 'required',
            'materi' => 'required',
            'id_rps' => 'required',
        ]);
        $indikator = '<ul>';
        foreach($request->indikator as $key => $ind){
            if($ind != null){
                $indikator .= ' <li>'.$ind.'</li>';
            }
        }
        $indikator .= ' </ul>';

        $activity = Activity::find($id);
        $activity->update($request->all());
        $activity['indikator'] = $indikator;
        $activity->save();
        return redirect('/dosen/activities/list-activity')->with('success', 'New Activities successfully added!');
    }

    public function Delete($id)
    {
        $activity = Activity::find($id);
        $activity->rps()->dissociate();
        $activity->save();
        $activity->delete();
        return redirect('/dosen/activities/list-activity')->with('success', 'Activity successfully deleted!');
    }
}
