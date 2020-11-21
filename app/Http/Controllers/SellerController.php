<?php

namespace App\Http\Controllers;
use App\Models\Items;
use App\Models\User;
//use DB;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(){

    
    $users = \DB::select('select * from users ');
    //return($users);
    return view('sellerpage');
    }

    public function populate(){
        $user=auth()->user();
        $items=new Items;
        $items->name = request('item_name');
        $items->description = request('description');
        $items->category = request('category');
        $items->price = request('price');
        $items->sellerid = $user->id;
        $items->save();
        return view('added');
        //var_dump(request('item_name'));
       // var_dump(request('description'));
        //var_dump(request('category'));
        
            //echo "seller id".$user->id;
        //var_dump(request('price'));
        //var_dump(request('seller_id'));
    }

    public function display(){
        //$users = \DB::select('select * from users ');
        //return View::make("home")->with(array('users'=>$users));
        
        //$users=new Users;
        /*$users = Users::all();

    foreach ($users as $flight) {
        echo $flight->name;*/
            //var_dump($users);
       //return view('home', $users);

       $data= Items::all();
       //$seller= User::where('id', 1);
       return view('home', ['data'=>$data]);
    }

    public function dispitems(){
        $user=auth()->user();
       // $ite= Items::all();
        //return Items::all();
        $ite= Items::where('sellerid', $user->id)->get();
        //return $ite;
       return view('sellerpage', ['ite'=>$ite]);
    }

    public function iteminfo($id){
        //echo $id;
        //$product = Items::where('id', $id)->get();
        $product= Items::find($id);
        //$sellerinfo= User::find($id);
        $sellerinfo=User::where('id', $product['sellerid'])->get();;
        //var_dump($product['sellerid']);
       // echo $product['name'];
       //echo $product; 
       //echo $sellerinfo;
       //echo array_merge($product, $sellerinfo);
       //return view('product')->with(['product'->$product, 'sellerinfo'->$sellerinfo]);
       $product = Items::where('id', $id)->get();
       return view('product',  compact('product', 'sellerinfo'));
        //return view('front.product.product', compact('product'));

    }

    public function tester(){
        return 'hello';
    }

    public function deleteitem($id){

        $product= Items::find($id);
        
        //echo $product['name']." has been deleted";
        $product->delete();
        return view('deleted');
    }

    public function searchbar(){
        
        $items= request('item_name');
        $products=Items::where('name', $items)->get();
        return view('searchpage', ['products'=>$products]);
    }
}
