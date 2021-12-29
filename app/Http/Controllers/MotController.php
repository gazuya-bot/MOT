<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Point;
use App\Models\Member_list;


use Illuminate\Support\Facades\DB;


class MotController extends Controller
{
    // 会員情報取得
    public function inpoint()
    {
        // 顧客名
        $members = Member_list::orderby('id', 'asc')->get();
        // 保有ポイント
        $total_points = Point::orderby('id', 'asc')
            ->select(DB::raw("sum(get_point) as total_point"))
            ->groupBy('members_id')
            ->get();
        return view('inpoint_add', compact('members','total_points'));
    }

    /**
     * Vue.jsへの値送信
     */
    public function json_data()
    {
        // 保有ポイント
        $total_points = Point::orderby('created_at', 'desc')->get();
        return [
            'total_points' => $total_points
        ];
    }

    // 売上情報書き込み
    public function add_js(Request $request) //売上登録（Vue.js）
    {
        // デバッグ laravel.log
        // \Log::debug($request->toArray());
        $sum = 0;

        foreach($request->texts as $text) {
            $item = new \App\Models\Point();
            $sum = $sum + $text;
        }


    
        // 支払金額
        $pay_cash = $sum - $request->pay_point;

        // 取得ポイント
        if ( $pay_cash != 0) {
            $get_point = $pay_cash * 0.01;
        } else {
            $get_point = 0;
        }
        
        $item->members_id = intval($request->members_id); // 会員ID
        $item->sale = intval($sum); // 売上金額
        $item->pay_cash = intval($pay_cash); // 支払金額

        // 非会員の場合不要
        if ( $request->members_id != 1 ) {
            $item->pay_point = intval($request->pay_point); // ポイント支払い
            $item->get_point = intval($get_point); // 獲得ポイント
            $item->total_point = intval(( $request->total_point - $request->pay_point ) + $get_point); // 保有ポイント
        }

        $item->updated_at = null;

        // \Log::debug($item);

        $item->save(); // データベースへ書き込む

    }


}





