<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class AdminUpdatePostController extends Controller
{

    public function show_update_tournament()
    {
        $tournaments = DB::table('tournaments')->leftJoin('playgrounds','tournaments.playground_id','=','playgrounds.id')->select('tournaments.*','playgrounds.address')->paginate(10);
        return view('admin-update-tournament', ['tournaments' => $tournaments]);
    }

    public function show_searched_tournament(Request $request)
    {
        $tournaments = DB::table('tournaments')->where('id', '=', $request->id)->get();
        $tournament = null;
        foreach ($tournaments as $tr) {
            $tournament = $tr;
        }
        $pls = DB::table('playgrounds')->where('id', '=', $tournament->playground_id)->get();
        $pl = null;
        foreach ($pls as $playground) {
            $pl = $playground;
        }
        $playgrounds = DB::table('playgrounds')->get();
        return view('admin-searched-tournament', ['playgrounds' => $playgrounds, 'tournament' => $tournament, 'pl' => $pl]);
    }

    public function update_tournament(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'date_of_start' => 'required|date',
            'date_of_finish' => 'required|date|after:date_of_start',
            'time' => 'required',
            'playground_id' => 'required|integer',
            'max_players' => 'required|integer'
        ]);

        DB::table('tournaments')->where('id', $request->id)->update(['name' => $request->input('name')]);
        DB::table('tournaments')->where('id', $request->id)->update(['date_of_start' => $request->input('date_of_start')]);
        DB::table('tournaments')->where('id', $request->id)->update(['date_of_finish' => $request->input('date_of_finish')]);
        DB::table('tournaments')->where('id', $request->id)->update(['time' => $request->input('time')]);
        DB::table('tournaments')->where('id', $request->id)->update(['playground_id' => $request->input('playground_id')]);
        DB::table('tournaments')->where('id', $request->id)->update(['max_players' => $request->input('max_players')]);

        return redirect('/update-tournament');
    }

    public function show_update_playground()
    {
        $playgrounds = DB::table('playgrounds')->paginate(10);
        return view('admin-update-playground', ['playgrounds' => $playgrounds]);
    }

    public function show_searched_playground(Request $request)
    {
        $playgrounds = DB::table('playgrounds')->where('id', '=', $request->id)->get();
        $playground = null;
        foreach ($playgrounds as $pg) {
            $playground = $pg;
        }
        return view('admin-searched-playground', ['playground' => $playground]);
    }

    public function update_playground(Request $request)
    {
        $this->validate($request, [
            'address' => 'required|string',
            'worktime' => 'required|string',
            'surface' => 'required',
            'type' => 'required',
        ]);

        DB::table('playgrounds')->where('id', $request->id)->update(['address' => $request->input('address')]);
        DB::table('playgrounds')->where('id', $request->id)->update(['worktime' => $request->input('worktime')]);
        DB::table('playgrounds')->where('id', $request->id)->update(['surface' => $request->input('surface')]);
        DB::table('playgrounds')->where('id', $request->id)->update(['type' => $request->input('type')]);

        return redirect('/update-playground');
    }

    public function show_all_players()
    {
        $users = DB::table('users')->orderBy('rating', 'DESC')->paginate(10);
        $authUser = Auth::user();
        $playgrounds = DB::table('playgrounds')->get();
        return view('admin-all-players', ['users' => $users, 'authUser' => $authUser, 'playgrounds' => $playgrounds]);
    }

    public function show_searched_player(Request $request)
    {
        $users = DB::table('users')->where('id', '=', $request->id)->get();
        $user = null;
        foreach ($users as $us) {
            $user = $us;
        }
        $authUser = Auth::user();
        $playgrounds = DB::table('playgrounds')->get();
        return view('admin-searched-player', ['user' => $user, 'authUser' => $authUser, 'playgrounds' => $playgrounds]);
    }

    public function update_players(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'sname' => 'required',
            'age' => 'required',
        ]);

        DB::table('users')->where('id', $request->id)->update(['name' => $request->input('name')]);
        DB::table('users')->where('id', $request->id)->update(['surname' => $request->input('surname')]);
        DB::table('users')->where('id', $request->id)->update(['sname' => $request->input('sname')]);
        DB::table('users')->where('id', $request->id)->update(['email' => $request->input('email')]);
        DB::table('users')->where('id', $request->id)->update(['age' => $request->input('age')]);
        DB::table('users')->where('id', $request->id)->update(['phone' => $request->input('phone')]);
        DB::table('users')->where('id', $request->id)->update(['matches' => $request->input('matches')]);
        DB::table('users')->where('id', $request->id)->update(['wins' => $request->input('wins')]);
        DB::table('users')->where('id', $request->id)->update(['rating' => $request->input('rating')]);
        DB::table('users')->where('id', $request->id)->update(['password' => bcrypt($request->input('password'))]);

        return redirect('/admin-all-players');
    }

    public function delete_player(Request $request)
    {
        DB::table('users')->where('id', '=', $request->id)->delete();
        return redirect('admin-all-players');
    }
}
