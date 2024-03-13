<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Bakery;
use App\User;
use App\Cakegory;
use App\Order;
use App\OrderItem;

class BakeController extends Controller
{
    
    public function detail($id){
    	$bakery = Bakery::find($id);
        $cakegory = Cakegory::where('slug', $bakery->cakegory_id)->first();
        $cakegories = Cakegory::where('hidden', 0)->get();
    	return view('detail')->with(['bakery' => $bakery, 'cakegories' => $cakegories, 'cakegory' => $cakegory]);
    }

    public function order(Request $req){
    	$item = Bakery::find($req->id);
    	$cart = ['item' => $item, 'cake_size' => $req->cake_size, 'cake_price' => $req->cake_price, 'quantity' => $req->quantity, 'candle' => $req->candle, 'remark' => $req->remark];
    	$req->session()->push('cart', $cart);
    	if($req->remark){
    		return redirect('/cart');
    	}else{
    		$session = $req->session()->get('cart');
    		return redirect()->back()->with('msg','Item successfully added to cart.');
    	}
    }

    public function checkout(Request $req){
        $cakegories = Cakegory::where('hidden', 0)->get();

        $total_items = count($req->item['id']);
        if($total_items > 0){
            $total = 0;
            $order = new Order;
            $order->total_items = $total_items;
            $order->total_amount = $total;

            $buyer_name = $req->buyer_name;
            $buyer_phone = $req->buyer_phone;
            $buyer_email = $req->buyer_email;
            if(isset($req->buyer_township)){
                $buyer_township = explode("-", $req->buyer_township)[1];
                $delivery_fee = explode("-", $req->buyer_township)[0];
            }else{
                $buyer_township = "Customer Pickup";
                $delivery_fee = 0;
            }
            
            $buyer_address = $req->buyer_address;

            $order->customer_name = $buyer_name;
            $order->customer_phone = $buyer_phone;
            $order->customer_email = $buyer_email;



            $order->customer_township = $buyer_township;
            $order->delivery_fee = $delivery_fee;
            $order->customer_address = $buyer_address;
            $order->required_date = $req->datetime;
            $order->delivery_type = $req->delivery_type;
            $order->status = 1;
            $order->save();
            
            $items = '<table style="margin-top: 20px; margin-bottom: 20px;border-collapse: collapse;"><thead><tr><td style="width:30px; padding: 3px;border-bottom: 1px solid black;"></td><td style="border-bottom: 1px solid black;width:70px; padding: 3px;">Image</td><td style="border-bottom: 1px solid black;padding: 3px;">Item Name</td><td style="border-bottom: 1px solid black;width:50px; padding: 3px;">Quantity</td></tr></thead><tbody>';

            for ($i=0; $i < $total_items; $i++) { 
                $no = $i + 1;
                $bakery = Bakery::find($req->item['id'][$i]);
                $price = $bakery->price * $req->item['quantity'][$i];
                $items .= '<tr><td style="border-bottom: 1px solid black;">'.$no.'</td><td style="border-bottom: 1px solid black;"><img src="https://thedlsshop.com/img/'.$bakery->image_filename.'" style="width:50px;"></td><td style="border-bottom: 1px solid black;"><b>'.$bakery->title.'</b></td><td style="border-bottom: 1px solid black;">'.$req->item['quantity'][$i].'</td></tr>';
                
                $total += $price;
                $orderitem = new OrderItem;
                $orderitem->order_id = $order->id;
                $orderitem->bakery_id = $bakery->id;
                $orderitem->quantity = $req->item['quantity'][$i];
                $orderitem->size = $req->item['size'][$i];
                $orderitem->candle = $req->item['candle'][$i];
                $orderitem->notes = $req->item['remark'][$i];
                $orderitem->save();
                
            }

            if($total < 100000){
                $items .= '<tr><td></td><td></td><td style="border-bottom: 1px solid black;">Total Amount</td><td style="border-bottom: 1px solid black;">'.$total.'</td></tr><tr><td></td><td></td><td style="border-bottom: 1px solid black;">Delivery Fee</td><td style="border-bottom: 1px solid black;">'.$delivery_fee.'</td></tr><tr><td></td><td></td><td style="border-bottom: 1px solid black;">Net Amount</td><td style="border-bottom: 1px solid black;">'.($total + $delivery_fee).'</td></tr></tbody></table>';
                $total = ($total + $delivery_fee);
            }else{
                $items .= '<tr><td></td><td></td><td style="border-bottom: 1px solid black;">Total Amount</td><td style="border-bottom: 1px solid black;">'.$total.' (Free Delivery)</td></tr></tbody></table>';
            }
            $order->total_amount = $total;
            $order->save();
            
            
                

            //Mail::to(User::find(2))->send(new OrderMail($order));
            // Always set content-type when sending HTML email
            $to = 'orders@thedlsshop.com';
            $message = 'Our precious customer <b style="font-size: 16px; text-decoration: underline;">'.$order->customer_name.'</b> with phone number <b style="font-size: 16px; text-decoration: underline;">'.$order->customer_phone.'</b> from <b>'.$buyer_township.' Township</b> ordered followings: <br>';
            $cus_message = 'You ordered followings at Dirty Little Secret:';

            $message .= $items;
            $cus_message .= $items;

            $message .= '<a href="https://thedlsshop.com/admin/orders/'.$order->id.'" style="width: 150px; color: white;display: block; text-decoration: none; text-align:center; padding: 3px; height: 30px;background: black; line-height: 30px; border-style: none; border-radius: 3px;">Process The Order</a>';

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <admin@thedlsshop.com>' . "\r\n";
            $headers .= 'Cc: hi.nainglu@gmail.com' . "\r\n";

            $Mail_condition = mail($to, 'New order from '.$order->customer_name.' at ' .date('Y-m-d'), $message, $headers);
            $Mail_condition = mail($order->customer_email, 'Thank you for your order', $cus_message, $headers);

            $req->session()->forget('cart');

         }
            
        return view('orderdetail')->with(['cakegories' => $cakegories, 'order' => $order]);
    }
}
