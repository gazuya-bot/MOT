<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;

use App\Models\Member_list;


class MotController extends Controller
{
    public function inpoint()
    {
        $members = Member_list::orderby('id', 'asc')->get();
        return view('inpoint_add', compact('members'));
        // return view('inpoint', compact('members'));
    }

    public function add_js(Request $request) //売上登録（Vue.js）
    {
        // laravel.logに実行結果表示
        \Log::debug($request->toArray());
        // $sum = 0;

        // foreach($request->texts as $text) {
        //     $item = new \App\Models\Point();
        //     $sum = $sum + $text;
        // }


        $item->members_id = $request->members_id; // 会員ID
        $item->sale = $request->total_Sale; // 売上金額
        $item->pay_cash = $request->totalPay; // 支払金額
        $item->pay_point = $request->pay_point; // ポイント支払い
        $item->updated_at = null;





        $item->save(); // データベースへ書き込む

    }

    // jsなし
    // public function add(Request $request)
    // {
    //     if($request->has('clear_data')){

    //         return redirect('/inpoint');

    //     }elseif($request->has('write_data')){

    //         $request->validate([
    //             'members_id'=>'required',
    //             'sale'=>'required|integer|numeric|gt:0',
    //             'pay_point'=>'required|integer|numeric|lte:sale',
    //         ]);

    //         $members_id = $request->members_id;
    //         $sale = $request->sale;
    //         $pay_point = $request->pay_point;

    //         $data = [
    //             'members_id'=>$members_id,
    //             'sale'=>$sale,
    //             'pay_cash'=>$sale - $pay_point,
    //             'pay_point'=>$pay_point,
    //             'get_point'=>($sale - $pay_point)*0.01,
    //             'created_at'=>date('Y-m-d H:i:s')
    //         ];

    //         var_dump($data);
    //         // exit;

    //         Point::insert($data);

    //         return redirect('/inpoint')->with('flash_message', '登録が完了しました');
    //     }
    // }
}
