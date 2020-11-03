<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests;
use App\BillDetail;
use App\Bill;
use App\Product;

class BillDetailController extends Controller
{
    //
    public function getList()
    {
    	$billdetail = BillDetail::all();
    	return view('admin.billdetail.list',['billdetail'=>$billdetail]);
    }

    public function getAdd()
    {
        $product = Product::all();
        $bill = Bill::all();
    	return view('admin.billdetail.add',['product'=>$product , 'bill'=>$bill]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'bill_id'=>'required',
                'product_name'=>'required',
                'bill_detail_quantity' => 'required',
                'bill_detail_unit_price' => 'required'
            ],
            [
                'bill_id.required'=>'Bạn chưa chọn mã hóa đơn',
                'product_name.required'=>'Bạn chưa chọn sản phẩm',
                'bill_detail_quantity.required'=>'Bạn chưa điền số lượng sản phẩm',
                'bill_detail_unit_price.required'=>'Bạn chưa điền giá cả hóa đơn'
            ]);
        $billdetail = new BillDetail;
        $billdetail->bill_detail_bill_id = $request->bill_id;
        $billdetail->bill_detail_product_id = $request->product_name;
        $billdetail->bill_detail_quantity = $request->bill_detail_quantity;
        $billdetail->bill_detail_unit_price = $request->bill_detail_unit_price;
        $billdetail->save();

        return redirect('admin/billdetail/add')->with('notify','Bạn đã thêm thành công');
    }

    public function getEdit($bill_detail_id)
    {
        $product = Product::all();
        $bill = Bill::all();
        $billdetail = BillDetail::find($bill_detail_id);
        return view('admin.billdetail.edit',['bill'=>$bill,'product'=>$product,'billdetail'=>$billdetail]);
    }

    public function postEdit(Request $request, $bill_detail_id)
    {
        $billdetail = BillDetail::find($bill_detail_id);
        $this->validate($request,
            [
                'bill_id'=>'required',
                'product_name'=>'required',
                'bill_detail_quantity' => 'required',
                'bill_detail_unit_price' => 'required'
            ],
            [
                'bill_id.required'=>'Bạn chưa chọn mã hóa đơn',
                'product_name.required'=>'Bạn chưa chọn sản phẩm',
                'bill_detail_quantity.required'=>'Bạn chưa điền số lượng sản phẩm',
                'bill_detail_unit_price.required'=>'Bạn chưa điền giá cả hóa đơn'
            ]);
        $billdetail = BillDetail::find($bill_detail_id);
        $billdetail->bill_detail_bill_id = $request->bill_id;
        $billdetail->bill_detail_product_id = $request->product_name;
        $billdetail->bill_detail_quantity = $request->bill_detail_quantity;
        $billdetail->bill_detail_unit_price = $request->bill_detail_unit_price;
        $billdetail->save();

        return redirect('admin/billdetail/edit/'.$bill_detail_id)->with('notify','Bạn đã sửa thành công');
    }

    public function getDelete($bill_detail_id)
    {
        try {
            $billdetail = BillDetail::find($bill_detail_id);
            $billdetail->delete();

            return redirect('admin/billdetail/list')->with('notify','Bạn đã xóa chi tiết hóa đơn thành công');
        } catch (QueryException $e) {
            return redirect('admin/billdetail/list')->with('notify','Xin lỗi bạn không thể xóa chi tiết hóa đơn này');
            $e->getMessage();
        }
    }
}
