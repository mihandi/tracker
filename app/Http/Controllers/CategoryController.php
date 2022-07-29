<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategories(){
        $categories = Category::all();

        return response()->json([
            'categories' => $categories
        ], 200
        );
    }
}
