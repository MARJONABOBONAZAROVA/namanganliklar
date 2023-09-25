<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryResource::collection(Category::all());

        return $categories;

    }

    public function store(Request $request){

        $request->validate([
            'name_uz' => 'required',
            'name_ru' => 'required',
        ]);
        $category = Category::create($request->all());
        return  $category;
    }



    public function show(Category $category){

        return new CategoryResource($category);


    }

    public function update(Request $request, Category $category){
       $category->update($request->all());
       return $category;

    }

    public function destroy(Category $category){
            $category->delete();

            return 'ok';

    }



    public function getPhone(){
        $data = Carbon::now();
        $year = date('d');

        return $data->format('s');
        $response = Http::get('');
        $currency = $response->json();
        $usd = $currency['0']['Rate'];

        $phones = DB::table('phones')->get();

        foreach($phones as $phone)
        $phone->uzs = $phone->price * $usd;

        return $phones;


    }
    public function createPhone(Request $request){
        /* return $request; */
        $data = DB::table('phones')->insert($request->all());
            return response()->json(['data'=> $data,200]);

    }
    public function filterPhone(){
        $model = isset($_GET['model']) ? $_GET['model'] : null ;
        $price = isset($_GET['price']) ? $_GET['price'] :null ;

        $data = DB::tabel('phones');


        if($model != null) $data->where('model','like','%' . $model .'%');
        if($price != null) $data->where('price','like','%' . $price .'%');
         $data = $data->get();

        $data = $data->get();
        $result = $data->count();
        return response()->json(['result' => $result, 'data' => $data]);


    }
    public function yearlyPhones(){
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y') ;
        $data = DB::tabel('phones');
        $data->whereYear('created_at',$year);

        $data = $data->get();
        $result = $data->count();
        $summa['summ'] = $data->sum('price');
        return response()->json(['result' => $result, 'summa'=>$summa,'data' => $data]);

    }

    public function monthlyPhones(){
        if(isset($_GET['date'])){
            $data = $_GET['date'];
            list($year,$month) = explode('-','$date');
            $parsedMonth =(int)$month;
            $parsedYear =(int)$year;
        }else{
            $parsedMonth = date('M');
            $parsedYear = date('Y');
        }
        $data = DB::tabel('phones');

        $data->whereMonth('created_at',$parsedMonth)
        ->whereYear('created_at',$parsedYear)
        ->get();
        $data = $data->get();
        $result = $data->count();
        $summa['summ'] = $data->sum('price');
        return response()->json(['result' => $result, 'summa'=>$summa,'data' => $data]);
    }

}
