<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests;
use App\Bill;
use App\BillDetail;
use App\Customer;

class BillController extends Controller
{
    //
    public function getList()
    {
    	$bill = Bill::all();
    	return view('admin.bill.list',['bill'=>$bill]);
    }

    public function getAdd()
    {
        $customer = Customer::all();
    	return view('admin.bill.add',['customer'=>$customer]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'customer_name'=>'required',
                'bill_date_order' => 'required',
                'bill_total' => 'required',
                'bill_payment' => 'required'
            ],
            [
                'customer_name.required'=>'Bạn chưa chọn khách hàng',
                'bill_date_order.required'=>'Bạn chưa điền thông tin ngày đặt hàng',
                'bill_total.required'=>'Bạn chưa điền tổng hóa đơn',
                'bill_payment.required'=>'Bạn chưa điền số tiền đơn hàng'
            ]);
        $bill = new Bill;
        $bill->bill_customer_id = $request->customer_name;
        $bill->bill_date_order = $request->bill_date_order;
        $bill->bill_total = $request->bill_total;
        $bill->bill_payment = $request->bill_payment;
        $bill->bill_note = $request->bill_note;
        $bill->save();

        return redirect('admin/bill/add')->with('notify','Bạn đã thêm thành công');
    }

    public function getEdit($bill_id)
    {
        $customer = Customer::all();
        $bill = Bill::find($bill_id);
        return view('admin.bill.edit',['bill'=>$bill,'customer'=>$customer]);
    }

    public function postEdit(Request $request, $bill_id)
    {
        //dd($bill_id);
        $bill = Bill::find($bill_id);
        $this->validate($request,
            [
                'customer_name'=>'required',
                'bill_date_order' => 'required',
                'bill_total' => 'required',
                'bill_payment' => 'required'
            ],
            [
                'customer_name.required'=>'Bạn chưa chọn khách hàng',
                'bill_date_order.required'=>'Bạn chưa điền thông tin ngày đặt hàng',
                'bill_total.required'=>'Bạn chưa điền tổng hóa đơn',
                'bill_payment.required'=>'Bạn chưa điền số tiền đơn hàng'
            ]);
        $bill = Bill::find($bill_id);
        $bill->bill_customer_id = $request->customer_name;
        $bill->bill_date_order = $request->bill_date_order;
        $bill->bill_total = $request->bill_total;
        $bill->bill_payment = $request->bill_payment;
        $bill->bill_note = $request->bill_note;
        $bill->save();

        return redirect('admin/bill/edit/'.$bill_id)->with('notify','Bạn đã sửa thành công');
    }

    public function getDelete($bill_id)
    {
        try {
                $bill = Bill::find($bill_id);
                $bill->delete();

                return redirect('admin/bill/list')->with('notify','Bạn đã xóa hóa đơn thành công');
        } catch(QueryException $e) {
            return redirect('admin/bill/list')->with('notify','Xin lỗi bạn không thể xóa hóa đơn này');
            $e->getMessage();
        }
    }
}
