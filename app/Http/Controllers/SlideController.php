<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slide;

class SlideController extends Controller
{
    //
    public function getList()
    {
    	$slide = Slide::all();
    	return view('admin.slide.list',['slide'=>$slide]);
    }

    public function getAdd()
    {
    	return view('admin.slide.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'slide_name' => 'required'
            ],
            [
                'slide_name.required'=>'Bạn chưa nhập tên slide'
            ]);
        $slide = new Slide;
        $slide->slide_name = $request->slide_name;
        $slide->slide_link = $request->slide_link;

        if($request->hasFile('slide_image'))
        {
            $file = $request->file('slide_image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/slide/add')->with('notify','Bạn chỉ được chọn file có đuôi là jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $slide_image = str_random(4)."_". $name;
            while(file_exists("upload/slide/".$slide_image))
            {
                $slide_image = str_random(4)."_". $name;
            }
            $file->move("upload/slide",$slide_image);
            $slide->slide_image = $slide_image;
        }
        else
        {
            $slide->slide_image = "";
        }

        $slide->save();

        return redirect('admin/slide/add')->with('notify','Thêm tin thành công');
    }

    public function getEdit($slide_id)
    {
        $slide = Slide::find($slide_id);
    	return view('admin.slide.edit',['slide'=>$slide]);
    }

    public function postEdit(Request $request, $slide_id)
    {
        $slide = Slide::find($slide_id);
        $this->validate($request,
            [
                'slide_name' => 'required'
            ],
            [
                'slide_name.required'=>'Bạn chưa nhập tên slide'
            ]);
        $slide->slide_name = $request->slide_name;
        $slide->slide_link = $request->slide_link;

        if($request->hasFile('slide_image'))
        {
            $file = $request->file('slide_image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/slide/add')->with('notify','Bạn chỉ được chọn file có đuôi là jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $slide_image = str_random(4)."_". $name;
            while(file_exists("upload/slide/".$slide_image))
            {
                $slide_image = str_random(4)."_". $name;
            }
            $file->move("upload/slide",$slide_image);
            unlink("upload/slide/".$slide->slide_image);
            $slide->slide_image = $slide_image;
        }

        $slide->save();

        return redirect('admin/slide/edit/'.$slide_id)->with('notify','Bạn đã sửa thành công');
    }

    public function getDelete($slide_id)
    {
        $slide = Slide::find($slide_id);
        $slide->delete();

        return redirect('admin/slide/list')->with('notify','Bạn đã xóa thành công');
    }

}
