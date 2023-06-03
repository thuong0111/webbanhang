<?php

namespace App\Http\Controllers;

use App\Http\Services\Productt\ProducttService;
use App\Models\Mau;
use App\Models\Productt;
use App\Models\Size;

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
        $productsize=$this->producttService->getSize($id);
        $productmau=$this->producttService->getMau($id);
       
        return view('productts.content', [
            'title'=>$productt->name,
            'productt'=>$productt,
            'productts'=>$productsMore,
            'sizes'=>$productsize,
            'maus'=>$productmau
        ]);
    }

    public function quickviewAPI(Request $request){
        $data = Productt::where('id',$request->data)->get();
        return response()->json($data);
    }

   

	public function findMau(Request $request){

        $data=Mau::where('size_text_id', $request->id)->get();
        return response()->json($data);
	}
  
}
