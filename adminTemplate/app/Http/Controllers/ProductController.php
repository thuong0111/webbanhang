<?php

namespace App\Http\Controllers;

use App\Http\Services\Productt\ProducttService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $producttService;
    public function __construct(ProducttService $producttService)
    {
        $this->producttService = $producttService;
    }

    public function index($id = '', $slug = '')
    {
        $productt = $this->producttService->show($id);
        $productsMore = $this->producttService->more($id);
        return view('productts.content', [
            'title'=>$productt->name,
            'productt'=>$productt,
            'productts'=>$productsMore
        ]);
    }
}
