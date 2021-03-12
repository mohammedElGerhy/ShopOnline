<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;
class OffersControll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('admin.offers.index', compact('offers'), ['title' => 'offer']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        return view('admin.offers.create', compact('items'), ['title' => 'create offer']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferRequest $request)
    {
        try {
            Offer::create([
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'discount' => $request->discount,
                'conten' => $request->conten,
                'active' => $request->active,
                'item_id' => $request->item_id,
            ]);
            return redirect()->route('admin.offers')->with(['success' => 'تم حفظ البيانات بناجاح']);
        }catch (\Exception $ex){
          return redirect()->route('admin.offers')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
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
            $offer = Offer::find($id);
            $items = Item::all();
            return view('admin.offers.edit', compact('offer', 'items'), ['title' => 'Edit offer']);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferRequest $request, $id)
    {
        try {
            Offer::where('id', $id)->update([
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'discount' => $request->discount,
                'conten' => $request->conten,
                'active' => $request->active,
                'item_id' => $request->item_id,
            ]);
            return redirect()->route('admin.offers')->with(['success' => 'تم التحديث بنجاح']);
        } catch (\Exception $ex ){
          return redirect()->route('admin.offers')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا  ']);
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
        $subcate = Offer::find($id);
        $subcate->delete();
        return  redirect()->route('admin.offers')->with(['success' => 'تم حذف القسم بنجاح']);
    }
    public function status ($id){
        $offer = Offer::find($id);
        $status = $offer->active == 0 ? 1 : 0;
        $offer->update(['active' => $status]);
        return  redirect()->route('admin.offers')->with(['success' => 'تم تعديل الحالة القسم بنجاح']);
    }
}
