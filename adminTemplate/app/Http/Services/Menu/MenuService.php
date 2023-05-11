<?php
namespace App\Http\Services\Menu;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class MenuService
{
    public function getParent(){
        return Menu::where('parent_id', 0)->get();
    }

    public function show()
    {
        return Menu::select('name', 'id')
            ->where('parent_id', 0)
            ->orderbyDesc('id')
            ->get();
    }

    public function getAll(){
        return Menu::orderbyDesc('id')->paginate(10);
    }

    public function create($request)
    {
        try {
            Menu::create([
                'name'=>(string) $request->input('name'),
                'parent_id'=>(int) $request->input('parent_id'),
                'description'=>(string) $request->input('description'),
                'content'=>(string) $request->input('content'),
                'active'=>(string) $request->input('active'),
                'slug'=>Str::slug($request->input('name'),'-')
            ]);

            Session::flash('success', 'Add category success.');

        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function update($request, $menu) : bool
    {
        // nếu id khác menu id thì mới được update
        if($request->input('parent_id')!= $menu->id)
        {
            $menu->parent_id= (int) $request->input('parent_id');
        }

        $menu->name= (string) $request->input('name');
        $menu->description= (string) $request->input('description');
        $menu->content= (string) $request->input('content');
        $menu->active= (string) $request->input('active');
        $menu->save();

        Session::flash('success', 'Update succsess.');
        return true;
    }

    public function destroy($request)
    {
        $id=(int) $request->input('id');

        $menu = Menu::where('id', $request->$id);
        if($menu){
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }
    public function getId($id)
    {
        return Menu::where('id', $id)->where('active',1)->firstOrFail();
    }

    public function getProduct($menu, $request)
    {
        $query = $menu->productts()
        ->select('id', 'name', 'price', 'price_sale', 'thumb')
        ->where('active', 1);

        if($request->input('price')){
            $query->orderBy('price', $request->input('price'));
        }
        return $query->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();
    }
}
