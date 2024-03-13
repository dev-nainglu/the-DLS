<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cakegory;
use App\Bakery;
use App\Post;

class MainController extends Controller
{
    public function home(Request $req){
        $posts = Post::where('deleted', 0)->get();
        $home_posts = [];
        foreach (config('constant.page_positions') as $key => $value) {
            $home_posts[$key] = [];
            foreach ($posts as $post) {
                if($post->position == $key){
                    array_push($home_posts[$key], $post);
                }
            }
        }
        $cakegories = Cakegory::where('hidden', 0)->get();
        $items = Bakery::where('featured',1)->get();
    	return view('home')->with(['items' => $items, 'cakegories' => $cakegories, 'home_posts' => $home_posts]);
    }

    public function retail_menu(){
        $cakegories = Cakegory::where('hidden', 0)->get();
    	return view('retailmenu')->with(['cakegories' => $cakegories]);
    }

    public function order_online($cakegory){
        $items = Bakery::where('cakegory_id', $cakegory)->where('hidden', 0)->get();
        $cakegories = Cakegory::where('hidden', 0)->get();
        $cakegory = Cakegory::where('slug', $cakegory)->first();
    	return view('orderonline')->with(['items' => $items, 'cakegories' => $cakegories, 'cakegory' => $cakegory]);
    }

    public function cart(Request $req){
        $cart = $req->session()->get('cart');
        $cakegories = Cakegory::where('hidden', 0)->get();
        return view('cart')->with(['cart' => $cart, 'cakegories' => $cakegories]);
    }

    public function remove_from_cart(Request $request, $key){
        $cart = $request->session()->get('cart');
        array_splice($cart, ($key - 1), 1);
        $request->session()->forget('cart');
        for ($i=0; $i < count($cart); $i++) { 
            $request->session()->push('cart', $cart[$i]);
        }
        $session = $request->session()->get('cart');
        return $session;
    }

    public function contact(){
        $cakegories = Cakegory::where('hidden', 0)->get();

        return view('contact')->with('cakegories', $cakegories);
    }
}
