<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all()
    {
        $products = Product::paginate(5);
        return view('user.all')->with('products', $products);
    }
}
