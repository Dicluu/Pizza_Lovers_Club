<?php

namespace App\Http\Controllers\Item;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class IndexController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(Request $request) {
        $categories = Category::all();
        $query = $request->query();
        $items = Item::all();

        if (empty($query)) {
            return view('item.preindex', compact( 'categories', 'items'));
        }
        $items = Item::Where('category_id', $query['id'])->get();
        return view('item.index', compact('items', 'categories'));
    }
}
