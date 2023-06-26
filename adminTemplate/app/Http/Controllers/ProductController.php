<?php

namespace App\Http\Controllers;

use App\Http\Services\Productt\ProducttService;
use App\Models\BienThe;
use App\Models\Comment;
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
        $productRelated=$this->producttService->getRelated($id);
        $slview=$productt->view;
        $slview+=1;
        Productt::where('id',$productt->id)->update(['view'=>$slview]);
        return view('productts.content', [
            'title'=>$productt->name,
            'productt'=>$productt,
            'productts'=>$productsMore,
            'sizes'=>$productsize,
            'maus'=>$productmau,
            'related'=>$productRelated
        ]);
    }

   
    public function quickviewAPI(Request $request){
        $data = Productt::where('id',$request->data)->get();
        return response()->json($data);
    }

    public function send_comment(Request $request){
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_ct = $request->comment_ct;

        $comment = new Comment();
        
        $comment->comment_ct = $comment_ct;
        $comment->comment_name = $comment_name;
        $comment->comment_product = $product_id;
        $comment->save();
    }

    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product', $product_id)->get();
        $show='';
        foreach($comment as $comm){
            $show.= '
            <div class="row style_comment" style="background: #FFFFCC; border-radius:10px; 
                margin-bottom: 20px; border:1px;">
            <div class="col-md-2">
                <img src = "/template/images/logo02.png" alt="AVATAR" style="width: 100%;"
                class="img img-responsive img-thumbnail">
            </div>
            <div class="col-md-10">
                <p style="font-weight: bold;">'.$comm->comment_name.' ('.$comm->comment_time.')</p>
                <p>'.$comm->comment_ct.'</p>
            </div>
        </div>
            ';
        }
        echo$show;
    }

	public function findMau(Request $request){

        $data=Mau::where('size_text_id', $request->id)->get();
        return response()->json($data);
	}
  
}
