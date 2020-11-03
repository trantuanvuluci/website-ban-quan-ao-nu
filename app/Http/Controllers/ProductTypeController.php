<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests;
use App\ProductType;

class ProductTypeController extends Controller
{
    //
    public function getList()
    {
    	$producttype = ProductType::all();
    	return view('admin.producttype.list',['producttype'=>$producttype]);
    }

    public function getAdd()
    {
    	return view('admin.producttype.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'type_product_name'=>'required'
            ],
            [
                'type_product_name.required'=>'Bạn chưa nhập tên loại sản phẩm'
            ]);
        $producttype = new ProductType;
        $producttype->type_product_name = $request->type_product_name;
        $producttype->type_product_alias = changeTitle($request->type_product_name);
        $producttype->type_product_description = $request->type_product_description;

        if($request->hasFile('type_product_image'))
        {
            $file = $request->file('type_product_image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/producttype/add')->with('notify','Bạn chỉ được chọn file có đuôi là jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $type_product_image = str_random(4)."_". $name;
            while(file_exists("upload/product/".$type_product_image))
            {
                $type_product_image = str_random(4)."_". $name;
            }
            $file->move("upload/product",$type_product_image);
            $producttype->type_product_image = $type_product_image;
        }
        else
        {
            $producttype->type_product_image = "";
        }

        $producttype->save();

        return redirect('admin/producttype/add')->with('notify','Thêm tin thành công');
    }

    public function getEdit($type_product_id)
    {
        $producttype = ProductType::find($type_product_id);
    	return view('admin.producttype.edit',['producttype'=>$producttype]);
    }

    public function postEdit(Request $request, $type_product_id)
    {
        $producttype = ProductType::find($type_product_id);
        $this->validate($request,
            [
                'type_product_name'=>'required'
            ],
            [
                'type_product_name.required'=>'Bạn chưa nhập tên loại sản phẩm'
            ]);
        $producttype->type_product_name = $request->type_product_name;
        $producttype->type_product_alias = changeTitle($request->type_product_name);
        $producttype->type_product_description = $request->type_product_description;

        if($request->hasFile('type_product_image'))
        {
            $file = $request->file('type_product_image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/producttype/add')->with('notify','Bạn chỉ được chọn file có đuôi là jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $type_product_image = str_random(4)."_". $name;
            while(file_exists("upload/product/".$type_product_image))
            {
                $type_product_image = str_random(4)."_". $name;
            }
            $file->move("upload/product",$type_product_image);
            unlink("upload/product/".$producttype->type_product_image);
            $producttype->type_product_image = $type_product_image;
        }

        $producttype->save();

        return redirect('admin/producttype/edit/'.$type_product_id)->with('notify','Bạn đã sửa thành công');
    }

    public function getDelete($type_product_id)
    {
         try {
            $producttype = ProductType::find($type_product_id);
            $producttype->delete();

            return redirect('admin/producttype/list')->with('notify','Bạn đã xóa thành công');
        } catch(QueryException $e) {
            return redirect('admin/producttype/list')->with('notify','Xin lỗi bạn không thể xóa loại sản phẩm này');
            $e->getMessage();
        }
    }
}
