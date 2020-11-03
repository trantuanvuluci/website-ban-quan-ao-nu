<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests;
use App\Customer;

class CustomerController extends Controller
{
    //
    public function getList()
    {
    	$customer = Customer::all();
    	return view('admin.customer.list',['customer'=>$customer]);
    }

    public function getAdd()
    {
    	return view('admin.customer.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'customer_name'=>'required',
                'customer_email' => 'required|email',
                'customer_address' => 'required',
                'customer_phone' => 'required'
            ],
            [
                'customer_name.required'=>'Bạn chưa điền tên khách hàng',
                'customer_email.required'=>'Bạn chưa điền email',
                'customer_email.email'=>'Bạn chưa nhập đúng định dạng email',
                'customer_address.required'=>'Bạn chưa điền địa chỉ',
                'customer_phone.required'=>'Bạn chưa điền số điện thoại'
            ]);
        $customer = new Customer;
        $customer->customer_name = $request->customer_name;
        $customer->customer_gender = $request->customer_gender;
        $customer->customer_email = $request->customer_email;
        $customer->customer_address = $request->customer_address;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_note = $request->customer_note;
        $customer->save();

        return redirect('admin/customer/add')->with('notify','Bạn đã thêm thành công');
    }

    public function getEdit($customer_id)
    {
        $customer = Customer::find($customer_id);
        return view('admin.customer.edit',['customer'=>$customer]);
    }

    public function postEdit(Request $request, $customer_id)
    {
        $customer = Customer::find($customer_id);
        $this->validate($request,
            [
                'customer_name'=>'required',
                'customer_email' => 'required|email',
                'customer_address' => 'required',
                'customer_phone' => 'required'
            ],
            [
                'customer_name.required'=>'Bạn chưa điền tên khách hàng',
                'customer_email.required'=>'Bạn chưa điền email',
                'customer_email.email'=>'Bạn chưa nhập đúng định dạng email',
                'customer_address.required'=>'Bạn chưa điền địa chỉ',
                'customer_phone.required'=>'Bạn chưa điền số điện thoại'
            ]);
        $customer = Customer::find($customer_id);
        $customer->customer_name = $request->customer_name;
        $customer->customer_gender = $request->customer_gender;
        $customer->customer_email = $request->customer_email;
        $customer->customer_address = $request->customer_address;
        $customer->customer_phone = $request->customer_phone;
        $customer->customer_note = $request->customer_note;
        $customer->save();

        return redirect('admin/customer/edit/'.$customer_id)->with('notify','Bạn đã sửa thành công');
    }

    public function getDelete($customer_id)
    {
        try {
        $customer = Customer::find($customer_id);
        $customer->delete();

        return redirect('admin/customer/list')->with('notify','Bạn đã xóa khách hàng thành công');
    } catch (QueryException $e){
        return redirect('admin/customer/list')->with('notify','Xin lỗi bạn không thể xóa khách hàng này');
        $e->getMessage();
    }
    }
}
