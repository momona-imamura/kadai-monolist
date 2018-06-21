<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Item;

class RankingController extends Controller
{
    public function want()
    {
        $items = \DB::table('item_user')->join('items', 'item_user.item_id', '=', 'items.id')->select('items.*', \DB::raw('COUNT(*) as count'))->where('type', 'want')->groupBy('items.id', 'items.code', 'items.name', 'items.url', 'items.image_url','items.created_at', 'items.updated_at')->orderBy('count', 'DESC')->take(10)->get();
        $name = "WANTS";
        return view('ranking.want', [
            'items' => $items,
            'name' => $name,
        ]);
    }
    
    public function have()
    {
        $items = \DB::table('item_user')->join('items', 'item_user.item_id', '=', 'items.id')->select('items.*', \DB::raw('COUNT(*) as count'))->where('type', 'have')->groupBy('items.id', 'items.code', 'items.name', 'items.url', 'items.image_url','items.created_at', 'items.updated_at')->orderBy('count', 'DESC')->take(10)->get();
        $name = "HAVES";
        return view('ranking.have', [
            'items' => $items,
            'name' => $name,
        ]);
    }
}

