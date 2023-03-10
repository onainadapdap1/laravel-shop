<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use App\Models\Product;
use App\Models\SubCategory;
use Request;

class CollectionController extends Controller
{
    public function index() {
        $groups = Group::where('status', '0')->get();
        return view('frontend.collections.index')->with('groups', $groups);
    }

    public function groupview($group_url) {
        $group = Group::where('url', $group_url)->first();
        $group_id = $group->id;

        $category = Category::where('group_id', $group_id)->where('status', '!=', '2')->where('status', '0')->get();
        return view('frontend.collections.category')
        ->with('category', $category)
        ->with('group', $group)
        ;
    }
    public function categoryview($group_url, $cate_url) {
        $category = Category::where('url', $cate_url)->first();
        $category_id = $category->id;
        // dd($category_id);

        $subcategory = SubCategory::where('category_id', $category_id)->where('status', '!=', '2')->where('status', '0')->get();
        return view('frontend.collections.subcategory')
        ->with('category', $category)
        ->with('subcategory', $subcategory)
        ;
    }
    public function subcategoryview($group_url, $cate_url, $subcate_url) {
        $subcategory = SubCategory::where('url', $subcate_url)->first();
        $subcategory_id = $subcategory->id;

        if(Request::get('sort') == 'price_asc') {
            $products = Product::where('sub_category_id', $subcategory_id)
            ->orderBy('offer_price', 'asc')
            ->where('status', '!=', '2')
            ->where('status', '0')->get();
        } else if(Request::get('sort') == 'price_desc') {
            $products = Product::where('sub_category_id', $subcategory_id)
            ->orderBy('offer_price', 'desc')
            ->where('status', '!=', '2')
            ->where('status', '0')->get();
        } else if(Request::get('sort') == 'newest') {
            $products = Product::where('sub_category_id', $subcategory_id)
            ->orderBy('created_at', 'desc')
            ->where('status', '!=', '2')
            ->where('status', '0')->get();
        } else if(Request::get('sort') == 'popularity') {
            $products = Product::where('sub_category_id', $subcategory_id)
            ->where('status', '1')
            ->where('status', '!=', '2')
            ->where('status', '0')->get();
        } else {
            $products = Product::where('sub_category_id', $subcategory_id)->where('status', '!=', '2')->where('status', '0')->get();
        }

        return view('frontend.collections.products')
        ->with('products', $products)
        ->with('subcategory', $subcategory)
        ;
    }

    public function productview($group_url, $cate_url, $subcate_url, $prod_url) {
        $products = Product::where('url', $prod_url)->where('status', '!=', '2')->where('status', '0')->first();
        return view('frontend.collections.products-view')
        ->with('products', $products)
        ;
    }
}
