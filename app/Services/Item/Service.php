<?php


namespace App\Services\Item;

use App\Models\Category;
use App\Models\Item;

class Service
{

    public function index($query) {
        $categories = Category::all();
        $items = Item::all();

        if (empty($query)) {
            return view('item.preindex', compact( 'categories', 'items'));
        }
        $items = Item::Where('category_id', $query['id'])->get();
        return view('item.index', compact('items', 'categories'));
    }

}
