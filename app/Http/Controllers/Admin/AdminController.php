<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\RequestTournamentTable;
use App\TournamentUser;
use App\Tournament;

class AdminController extends Controller
{
    public function show()
    {

        return view('admin-index');
    }

    public function table_tournaments()
    {
        $tournaments = DB::table('tournaments')->
        leftJoin('playgrounds', 'tournaments.playground_id', '=', 'playgrounds.id')->
        select('tournaments.*', 'playgrounds.address')->
        orderBy('date_of_start', 'ASC')->paginate(10);
        $tournament_users = DB::table('tournament_users')->get();
        $request_tournament_tables = DB::table('request_tournament_tables')->get();

        return view('admin-table-tournaments', ['tournaments' => $tournaments, 'tournament_users' => $tournament_users, 'request_tournament_tables' => $request_tournament_tables]);
    }

    public function send_tournament_invite(Request $request)
    {

        $requst_tournament_table = new RequestTournamentTable();
        $requst_tournament_table->user_responser_id = $request->uid;
        $requst_tournament_table->tournament_id = $request->id;
        $requst_tournament_table->save();

        $address = 'players-for-tournament/' . $request->id . '?';
        return redirect($address);
    }

    public function players_for_tournament(Request $request)
    {
        $id = $request->id;
        $tournament_users = TournamentUser::all();
        $this_tournament_users = [];
        foreach ($tournament_users as $user) {
            if ($user['tournament_id'] == $id) {
                array_push($this_tournament_users, $user);
            }
        }
        $tournament = Tournament::where('id', '=', $id)->get();
        if (count($this_tournament_users) >= $tournament[0]['max_players']) {
            $error_message = '21';
        } else {
            $error_message = '1';
        }

        $tournament_users = TournamentUser::all();
        $this_tournament_users = [];

        foreach ($tournament_users as $user) {
            if ($user['tournament_id'] == $id) {
                array_push($this_tournament_users, $user);
            }
        }

        $tournaments = Tournament::where('id', '=', $id)->get(); //use this syntax to access to DB table
        $request_tournament_tables = DB::table('request_tournament_tables')->get();
        $tournament = null;
        foreach ($tournaments as $tr) {
            $tournament = $tr;
        }
        $users = DB::table('users')->orderBy('rating', 'DESC')->paginate(10);
        // do it like this is more understandable and clear
        return view('admin-players-for-tournament', [
            'users' => $users,
            'tournament' => $tournament,
            'tournament_users' => $tournament_users,
            'request_tournament_tables' => $request_tournament_tables,
            'this_tournament_users_count' => count($tournament_users),
            'error_message' => $error_message,
        ]);
    }

    public
    function admin_tournaments_for_delete()
    {
        $tournaments = DB::table('tournaments')->leftJoin('playgrounds', 'tournaments.playground_id', '=', 'playgrounds.id')->
        select('tournaments.*', 'playgrounds.address')->orderBy('date_of_start', 'ASC')->paginate(10);

        return view('admin-delete-tournament', ['tournaments' => $tournaments]);
    }

    public
    function delete_tournament(Request $request)
    {

        DB::table('tournaments')->where('id', '=', $request->id)->delete();

        return redirect('admin-tournaments-for-delete');
    }

    public
    function tournament_requests(Request $request)
    {
        //$tournaments = DB::table('tournaments')->where
        $user_requests = DB::table('users')->join('request_tournament_tables', 'request_tournament_tables.user_requester_id', '=', 'users.id')
            ->where('request_tournament_tables.tournament_id', '=', $request->id)
            ->select('users.surname', 'users.name', 'users.sname', 'users.age', 'users.matches', 'users.wins', 'users.rating',
                'request_tournament_tables.id', 'request_tournament_tables.user_requester_id')
            ->orderBy('users.rating', 'DESC')->paginate(10);

        return view('admin-tournament-requests', ['user_requests' => $user_requests, 'tournament_id' => $request->id]);
    }

    public
    function admin_accept_request(Request $request)
    {

        $tournament_user = new TournamentUser();
        $tournament_user->user_id = $request->u_id;
        $tournament_user->tournament_id = $request->t_id;
        $tournament_user->save();
        DB::table('request_tournament_tables')->where('id', '=', $request->id)->delete();

        $address = 'tournament-requests/' . $request->t_id . '?';
        return redirect($address);
    }

    public
    function admin_delete_request(Request $request)
    {

        DB::table('request_tournament_tables')->where('id', '=', $request->id)->delete();

        $address = 'tournament-requests/' . $request->t_id . '?';
        return redirect($address);
    }

    public
    function tournament_players(Request $request)
    {

        $users = DB::table('users')->join('tournament_users', 'tournament_users.user_id', '=', 'users.id')
            ->where('tournament_users.tournament_id', '=', $request->id)->select('users.surname', 'users.name', 'users.sname', 'users.age', 'users.matches', 'users.wins', 'users.rating',
                'users.avatar', 'tournament_users.id')
            ->orderBy('users.rating', 'DESC')->paginate(10);

        return view('admin-tournament-players', ['users' => $users, 'tournament_id' => $request->id]);
    }

    public
    function delete_tournament_player(Request $request)
    {

        DB::table('tournament_users')->where('tournament_users.id', '=', $request->id)->delete();

        $address = 'tournament-players/' . $request->t_id . '?';
        return redirect($address);
    }
}
