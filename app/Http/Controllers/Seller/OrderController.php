<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Monthly;
use App\Models\Phone;
use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    public function getAllPhones(){
        $phones = Phone::all();
        return $phones;
    }
    public function postCreateOrder(Request $request){
        $requestdata =  $request->all();
        $data = Order::create($requestdata);

        $monthlySumma = $data->summa / $data->payType;

        for($i=1; $i <=$data->payType; $i++){
            Monthly::create([
                'order_id' =>$data->$i ,
                'paymentMonthly' => $i,
                'summa' => $monthlySumma,

            ]);
            return $data;
        }



    }

    public function getAllOrder(Request $request ){
        $orders = Order::all();
        return $orders;
    }

    public function getShowOrder(Order $order){
        $data = OrderResource::collection($order);
        return $data;
    }
}
