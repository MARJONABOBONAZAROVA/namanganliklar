<?php
namespace App\Repositories;
use App\Models\Category;


use App\Repositories\Interfaces\CategoryInterface;
use Illuminate\Support\Facades\Request;

class CategoryRepository implements CategoryInterface{

    public function getAllCategory(){

        return Category::paginate(2);

    }
    public function createCategory($request){;

         return Category::create($request->all());


    }
}

?>
