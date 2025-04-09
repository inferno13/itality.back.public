<?php

namespace App\Http\Controllers\ConfigAssembling;

use App\Http\Controllers\Controller;
use App\Models\Base;
use App\Models\ButtonCategory;
use App\Models\ConfigAssembling;
use App\Models\Grouping;
use App\Models\Product;
use App\Models\ProductComposition;
use Illuminate\Http\Request;

class ConfigAssemblingController extends Controller {

    public function index(Request $request) {
        $bases = Base::all();
        $config_id = $request["config_id"];
        $result = [];

        foreach ($bases as $base) {
            $grouping = Grouping::find($base->grouping_id);
            $category = ButtonCategory::find($base->button_category_id);
            $assembling = ConfigAssembling::query()->where([
                ['base_id', $base->id],
                ['config_id', $config_id]
            ])->first();
            $compositions = ProductComposition::query()->where('button_id', $base->id)->get();
            $price = 0;

            foreach ($compositions as $composition) {
                $product = Product::query()->where('id', $composition->product_id)->first();

                if (!$product) {
                    continue;
                }
                $price += $product->cash * $composition->count;
            }

            $data = [
                "pos" => $base->pos,
                "group" =>  isset($grouping) ? $grouping->title : "",
                "title" => $base->title,
                "cash" => $price,
                "base_id" => $base->id
            ];

            if (!isset($result[$category->title])) {
                $result[$category->title] = [["data" => $data, "assembling" => $assembling]];
            } else {
                $result[$category->title][] = ["data" => $data, "assembling" => $assembling];
            } 
        }

        return $result;
    }
}