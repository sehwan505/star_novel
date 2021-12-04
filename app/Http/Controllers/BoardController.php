<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
include 'Star.php';

class BoardController extends Controller
{
    public function index(){
        $boards = Board::all();
        return response()->json($boards, 200);
    }

    public function create(){
        
        return view('boards.create');
    }

    public function store(Request $request){

        /* $board = Board::create(request(['title','stroy])) >>>>
            이렇게 사용할시에는 function store() 이렇게 사용가능
            괄호 안에 Request $request 필요 없음*/
        info('=== 로그 찍기 ===');
        $area = mt_rand(0, 6);
        $star_info = make_star_location(0, $area, 0, 0, 0);
        $board = Board::create([
            'title'=>$request->input('title'),
            'story'=>$request->input('story'),
            'x'=>$star_info[0],
            'y'=>$star_info[1], 
            'area'=>$area,
            'shape'=>$star_info[2]
        ]);
        return response()->json("success", 200);
    }

    public function link_star(Request $request){
        $old_board = Board::find($request->input('starId'));
        $star_info = make_star_location($old_board->star_index + 1, $old_board->area, $old_board->x, $old_board->y, $old_board->shape);
        $board = Board::create([
            'title'=>$request->input('title'),
            'story'=>$request->input('story'),
            'x'=>$star_info[0],
            'y'=>$star_info[1],
            'area'=>$old_board->area,
            'shape'=>$old_board->shape,
            'star_index'=>$old_board->star_index + 1,
        ]);
        if ($old_board->links){
            $links = json_decode($old_board->links);
            array_push($links, $board->id);
            $old_board->update($param = [
                'links'=>json_encode($links)
            ]);
        }
        else{
            $old_board->update($param = [
                'links'=>json_encode(array($board->id))
            ]);
        }
        return response()->json("success", 200);
    }

    public function show(Board $board){
        $links = json_decode($board->links);
        $links = Board::find($links);
        return response()->json([$board, $links], 200);
    }

    public function destroy(Board $board){

        $board->delete();

        return redirect('/boards');
    }
}