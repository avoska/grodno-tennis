<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Playground;
use Auth;

class SearchController extends Controller {

	public function index(Request $request) {
		$q = $request->input('q');
		$users = DB::table('users')->orderBy('rating', 'DESC')->paginate(10);
		$authUser = Auth::user();
		$playgrounds = DB::table('playgrounds')->get();
		if(preg_match("/[0-9a-zA-Zа-яА-Я_]/i", $q)) {
			$max_page = 30;
			//Полнотекстовый поиск с пагинацией
			$results = $this->search($q, $max_page);
			return view('all-players', [
				'include' => 'search.table',
				'searched_users' => $results,
				'users' => $users,
				'authUser' => $authUser,
				'playgrounds' => $playgrounds
			]);
		}else{
			return view('all-players', [
				'users' => $users,
				'authUser' => $authUser,
				'playgrounds' => $playgrounds
			]);
		}

	}

    public function admin_index(Request $request) {
        $q = $request->input('q');
        $users = DB::table('users')->orderBy('rating', 'DESC')->paginate(10);
        $authUser = Auth::user();
        $playgrounds = DB::table('playgrounds')->get();
        if(preg_match("/[0-9a-zA-Zа-яА-Я_]/i", $q)) {
            $max_page = 30;
            //Полнотекстовый поиск с пагинацией
            $results = $this->search($q, $max_page);
            return view('admin-all-players', [
                'include' => 'search.table',
                'searched_users' => $results,
                'users' => $users,
                'authUser' => $authUser,
                'playgrounds' => $playgrounds
            ]);
        }else{
            return view('admin-all-players', [
                'users' => $users,
                'authUser' => $authUser,
                'playgrounds' => $playgrounds
            ]);
        }

    }

    public function admin_tournament_searchSimple(Request $request) {
        $tournaments = DB::table('tournaments')->where('id', '=', $request->id)->get();
        $tournament = null;
        foreach ($tournaments as $tr) {
            $tournament = $tr;
        }
        $tournament_users = DB::table('tournament_users')->get();
        $q = $request->input('q');
        $users = DB::table('users')->orderBy('rating', 'DESC')->paginate(10);
        $authUser = Auth::user();
        $playgrounds = DB::table('playgrounds')->get();
        $request_tournament_tables = DB::table('request_tournament_tables')->get();
        if(preg_match("/[0-9a-zA-Zа-яА-Я_]/i", $q)) {
            $max_page = 30;
            //Полнотекстовый поиск с пагинацией
            $results = $this->search($q, $max_page);
            return view('admin-players-for-tournament', [
                'include' => 'search.table',
                'searched_users' => $results,
                'users' => $users,
                'authUser' => $authUser,
                'playgrounds' => $playgrounds,
                'tournament' => $tournament,
                'tournament_users' => $tournament_users,
                'request_tournament_tables' => $request_tournament_tables
            ]);
        }else{
            return view('admin-players-for-tournament', [
                'users' => $users,
                'authUser' => $authUser,
                'playgrounds' => $playgrounds,
                'tournament' => $tournament,
                'tournament_users' => $tournament_users,
                'request_tournament_tables' => $request_tournament_tables
            ]);
        }

    }

	public function search($q, $count) {
		$query = mb_strtolower($q, 'UTF-8');
		$arr = explode(" ", $query); //разбивает строку на массив по разделителю
		/*
		 * Для каждого элемента массива (или только для одного) добавляет в конце звездочку,
		 * что позволяет включить в поиск слова с любым окончанием.
		 * Длинные фразы, функция mb_substr() обрезает на 1-3 символа.
		 */
		$query = [];
		foreach($arr as $word) {
			$len = mb_strlen($word, 'UTF-8');
			switch(true) {
				case ($len <= 3):
					{
						$query[] = $word . "*";
						break;
					}
				case ($len > 3 && $len <= 6):
					{
						$query[] = mb_substr($word, 0, -1, 'UTF-8') . "*";
						break;
					}
				case ($len > 6 && $len <= 9):
					{
						$query[] = mb_substr($word, 0, -2, 'UTF-8') . "*";
						break;
					}
				case ($len > 9):
					{
						$query[] = mb_substr($word, 0, -3, 'UTF-8') . "*";
						break;
					}
				default:
					{
						break;
					}
			}
		}
		$query = array_unique($query, SORT_STRING);
		$qQeury = implode(" ", $query); //объединяет массив в строку
		// Таблица для поиска
		$results = User::whereRaw(
			"MATCH(name,surname) AGAINST(? IN BOOLEAN MODE)", // name, surname - поля, по которым нужно искать
			$qQeury)->paginate($count);
		return $results;
	}
}
