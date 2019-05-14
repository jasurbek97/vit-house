<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$orders = Order::latest('id')->paginate(8);
		return view('admin.order.index',compact('orders'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{



		Order::create([
			'name' =>$request->name,
			'number'=>$request->number,
			'product_id'=> $request->id,
		]);
		$pro = (!empty($request->id))? Product::where('id',$request->id)->first() : '' ;
		$pro_name =  (!empty($pro))? $pro->name : 'не выбрано ';

		$text = "Поступил новый заказ\n"
			."🗣 Имя: "."$request->name\n"
			."📞 Телефонный Номер:"."$request->number\n"
			."📓Название продукта:"."  $pro_name\n"
			."⏰ Время заказа: ".date('d.m.Y - H:i', time());



		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,"https://garage-defend.com/telegram/bot/vithouse");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
			"str={$text}");

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_exec($ch);

		curl_close ($ch);

		return back()->with('message', 'Ваш запрос не отправлен!');



	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Order  $order
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$order = Order::findOrFail($id);
		$order->view = true;
		$order->save();
		return back();
	}


	public function noteStore(Request $request){
		$this->validate($request,[
			'note' => 'min:1',
		]);
		$o = new Order;
		$o->note = $request->note;
		$o->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Order  $order
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$order = Order::findOrFail($id);
		$order->delete();
		return back()->with('success','Order deleted');
	}


}
