<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\Supcategory;
use Illuminate\Http\Request;
use App\Http\Requests\SubcategoryRequest;
class SupcategoryControll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcats = Supcategory::all();
        return view('admin.supcategorys.index',compact('subcats'), ['title' => 'Sup Category']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = MainCategory::all();
        return view('admin.supcategorys.create',compact('categorys'), ['title' => 'Sup Category']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request)
    {
        try {
            Supcategory::create([
                'name_ar' =>  $request->name_ar,
                'name_en' =>  $request->name_en,
                'active' =>  $request->active,
                'maincategory_id' =>  $request->maincategory_id
            ]);

            return redirect()->route('admin.supcategorys')->with(['success' => 'تم حفظ البيانات بناجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.supcategorys')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
        $subcat = Supcategory::find($id);
        $categorys = MainCategory::all();
        return view('admin.supcategorys.edit', compact('subcat', 'categorys'), ['title' => 'Edit Sub Category']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryRequest $request, $id)
    {
        try {


        $main = Supcategory::find($id);
        if (!$main)
            return redirect()->route('admin.supcategorys')->with(['error' => 'هذا القسم غير موجود او ربما يكون محذوفا ']);
        Supcategory::where('id', $id)->update([
            'name_ar' =>  $request->name_ar,
            'name_en' =>  $request->name_en,
            'active' =>  $request->active,
            'maincategory_id' =>  $request->maincategory_id
        ]);
        return redirect()->route('admin.supcategorys')->with(['success' => 'تم التحديث بنجاح']);
        } catch (\Exception $ex){
            return redirect()->route('admin.supcategorys')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا  ']);
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
        $subcate = Supcategory::find($id);
        $subcate->delete();
      return  redirect()->route('admin.supcategorys')->with(['success' => 'تم حذف القسم بنجاح']);
    }
    public function status($id)
    {
        $subcat = Supcategory::find($id);
        $status = $subcat->active == 0 ? 1 : 0;
        $subcat->update(['active' => $status]);
        return  redirect()->route('admin.supcategorys')->with(['success' => 'تم تعديل الحالة القسم بنجاح']);
    }
}
