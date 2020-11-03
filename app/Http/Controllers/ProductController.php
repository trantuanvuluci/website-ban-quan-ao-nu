<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\ProductType;

class ProductController extends Controller
{
    //
    public function getList()
    {
    	$product = Product::all();
    	return view('admin.product.list',['product'=>$product]);
    }

    public function getAdd()
    {
        $producttype = ProductType::all();
    	return view('admin.product.add',['producttype'=>$producttype]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'type_product_name'=>'required',
                'product_name' => 'required',
            ],
            [
                'type_product_name.required'=>'Bạn chưa chọn loại sản phẩm',
                'product_name.required'=>'Bạn chưa điền tên sản phẩm',
                'product_color.required'=>'Bạn chưa điền màu sản phẩm',
            ]);
        $product = new Product;
        $product->product_type_id = $request->type_product_name;
        $product->product_name = $request->product_name;
        $product->product_alias = changeTitle($request->product_name);
        $product->product_description = $request->product_description;
        $product->product_unit_price = $request->product_unit_price;
        $product->product_promotion_price = $request->product_promotion_price;
        $product->product_unit = $request->product_unit;
        $product->product_quantity = $request->product_quantity;
        $product->product_size = implode(",",$request->product_size);
        $product->product_color = $request->product_color;
        $product->product_new = $request->product_new;
        $product->product_import_price = !empty($request->product_import_price) ? $request->product_import_price : 0;

        if($request->hasFile('product_image'))
        {
            $file = $request->file('product_image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/product/add')->with('notify','Bạn chỉ được chọn file có đuôi là jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $product_image = str_random(4)."_". $name;
            while(file_exists("upload/product/".$product_image))
            {
                $product_image = str_random(4)."_". $name;
            }
            $file->move("upload/product",$product_image);
            $product->product_image = $product_image;
        }
        else
        {
            $product->product_image = "";
        }

        $product->save();

        return redirect('admin/product/add')->with('notify','Bạn đã thêm sản phẩm thành công');
    }

    public function getEdit($product_id)
    {
        $producttype = ProductType::all();
        $product = Product::find($product_id);
        $product_size = explode(",",$product->product_size);
    	return view('admin.product.edit',['producttype'=>$producttype,'product'=>$product, 'product_size'=>$product_size]);
    }

    public function postEdit(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        $this->validate($request,
            [
                'type_product_name'=>'required',
                'product_name' => 'required',
            ],
            [
                'type_product_name.required'=>'Bạn chưa chọn loại sản phẩm',
                'product_name.required'=>'Bạn chưa điền tên sản phẩm',
                'product_color.required'=>'Bạn chưa điền màu sản phẩm',
            ]);
        $product->product_type_id = $request->type_product_name;
        $product->product_name = $request->product_name;
        $product->product_alias = changeTitle($request->product_name);
        $product->product_description = $request->product_description;
        $product->product_unit_price = $request->product_unit_price;
        $product->product_promotion_price = $request->product_promotion_price;
        $product->product_unit = $request->product_unit;
        $product->product_quantity = $request->product_quantity;
        $product->product_size = implode(",",$request->product_size);
        $product->product_color = $request->product_color;
        $product->product_new = $request->product_new;
        $product->product_import_price = !empty($request->product_import_price) ? $request->product_import_price : 0;
        
        if($request->hasFile('product_image'))
        {
            $file = $request->file('product_image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/product/add')->with('notify','Bạn chỉ được chọn file có đuôi là jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $product_image = str_random(4)."_". $name;
            while(file_exists("upload/product/".$product_image))
            {
                $product_image = str_random(4)."_". $name;
            }
            $file->move("upload/product",$product_image);
            unlink("upload/product/".$product->product_image);
            $product->product_image = $product_image;
        }

        $product->save();

        return redirect('admin/product/edit/'.$product_id)->with('notify','Bạn đã sửa thành công');
    }

    public function getDelete($product_id)
    {
        $product = Product::find($product_id);
        $product->delete();

        return redirect('admin/product/list')->with('notify','Bạn đã xóa thành công');
    }

}
