<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Supcategory;
use App\Http\Requests\ItemRequest;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('admin.items.index',compact('items'), ['title' => 'item']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcats = Supcategory::all();
       return view('admin.items.create', compact('subcats'), ['title' => 'Create Item']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        try {
            Item::create([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'subcat_id' => $request->subcat_id
            ]);
            return redirect()->route('admin.items')->with(['success' => 'تم حفظ البيانات بناجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.items')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Item::find($id);
        if (!$items)
            return redirect()->route('admin.items')->with(['error' => 'هذا العنصر غير موجود ']);
        $subcats = Supcategory::all();
        return view('admin.items.edit', compact('subcats','items' ), ['title' => 'Edt Item']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $id)
    {

        try {

            Item::where('id', $id)->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'subcat_id' => $request->subcat_id
            ]);
            return redirect()->route('admin.items')->with(['success' => 'تم التحديث بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.items')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا  ']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcate = Item::find($id);
        $subcate->delete();
        return  redirect()->route('admin.items')->with(['success' => 'تم حذف القسم بنجاح']);
    }
}
