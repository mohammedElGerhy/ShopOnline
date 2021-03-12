<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainCategory;
use App\Http\Requests\MainRequest;
class MainCategoryControll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mains = MainCategory::all();
        return view('admin.maincategorys.index', compact('mains'), ['title' => 'MainCategory']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maincategorys.create', ['title' => 'MainCategory create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainRequest $request)
    {
        try {
            MainCategory::create([
                'name_ar' =>  $request->name_ar,
                'name_en' =>  $request->name_en,
                'active' =>  $request->active
            ]);
            return redirect()->route('admin.maincategorys')->with(['success' => 'تم حفظ البيانات بناجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.maincategorys')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
        $maincat = MainCategory::find($id);
        return view('admin.maincategorys.edit', compact('maincat'), ['title' => 'MainCategory Edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MainRequest $request, $id)
    {
        try {
            $main = MainCategory::find($id);
            if (!$main)
                return redirect()->route('admin.maincategorys')->with(['error' => 'هذا المتجر غير موجود او ربما يكون محذوفا ']);
            MainCategory::where('id', $id)->update([

                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'active' => $request->active,
            ]);
            return redirect()->route('admin.maincategorys')->with(['success' => 'تم التحديث بنجاح']);
        }catch (\Exception $ex){
        return redirect()->route('admin.maincategorys')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا  ']);
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
        try {
            $main = MainCategory::find($id);
            $main->delete();
            return redirect()->route('admin.maincategorys')->with(['success' => 'تم حذف المساول بنجاح']);
        } catch (\Exception $ex){
            return redirect()->route('admin.maincategorys')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    public function status ($id){
        try {
            $main = MainCategory::find($id);
            $status = $main->active == 0 ? 1 : 0 ;
            $main -> update(['active' => $status]);
            return redirect()->route('admin.maincategorys')->with(['success' => 'تم تعديل الحالة المساول بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.maincategorys')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
