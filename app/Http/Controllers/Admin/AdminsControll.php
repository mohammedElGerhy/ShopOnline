<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\AdminRequest;
use DB;
use Illuminate\Support\Str;
class AdminsControll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admins.index',compact('admins'), ['title' => 'Admin']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.admins.create', ['title' => 'create Admin']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        try {
            $filePath = "";
            if($request->has('photo')){
                $filePath = uploadImage("administer", $request->photo );
            }
            Admin::create([
                'name' =>  $request->name,
                'email' =>  $request->email,
                'password' =>  $request->password,
                'photo' => $filePath,
            ]);
            return redirect()->route('admin.admins')->with(['success' => 'تم حفظ البيانات بناجاح']);
        } catch (\Exception $ex){
            return $ex;
            return redirect()->route('admin.admins')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
        $admin = Admin::find($id);
        return view("admin.admins.edit", compact('admin'), ["title" => "edit admin"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, AdminRequest $request )
    {
        try {
            $admin = Admin::find($id);
            if (!$admin)
                return redirect()->route('admin.admins')->with(['error' => 'هذا المتجر غير موجود او ربما يكون محذوفا ']);
            DB::beginTransaction();
            //photo
            if ($request->has('photo') ) {
                $filePath = uploadImage('administer', $request->photo);
                Admin::where('id', $id)
                    ->update([
                        'photo' => $filePath,
                    ]);
            }
            $data = $request->except('_token', 'id', 'photo', 'password');


            if ($request->has('password') && !is_null($request->  password)) {

                $data['password'] = $request->password;
            }

            Admin::where('id', $id)
                ->update(
                    $data
                );

            DB::commit();
           return redirect()->route('admin.admins')->with(['success' => 'تم التحديث بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.admins')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا  ']);
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
            $admin = Admin::find($id);
            if (!$admin)
                return redirect()->route('admin.admins')->with(['error' => 'هذا المساول غير موجود او ربما يكون محذوفا ']);
            $image = Str::after($admin->photo, 'assets/' );
            $image = base_path('assets/' .  $image);
            unlink($image);
            $admin->delete();
            return redirect()->route('admin.admins')->with(['success' => 'تم حذف المساول بنجاح']);
        }catch (\Exception $ex){
            return redirect()->route('admin.admins')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
    }
    }
}
