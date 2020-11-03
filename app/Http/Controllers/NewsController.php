<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;

class NewsController extends Controller
{
    //
    public function getList()
    {
    	$news = News::all();
    	return view('admin.news.list',['news'=>$news]);
    }

    public function getAdd()
    {
    	return view('admin.news.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'news_title'=>'required',
                'news_content' => 'required'
            ],
            [
                'news_title.required'=>'Bạn chưa nhập tiêu đề',
                'news_content.required'=>'Bạn chưa nhập nội dung'
            ]);
        $news = new News;
        $news->news_title = $request->news_title;
        $news->news_alias = changeTitle($request->news_title);
        $news->news_content = $request->news_content;

        if($request->hasFile('news_image'))
        {
            $file = $request->file('news_image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/news/add')->with('notify','Bạn chỉ được chọn file có đuôi là jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $news_image = str_random(4)."_". $name;
            while(file_exists("upload/news/".$news_image))
            {
                $news_image = str_random(4)."_". $name;
            }
            $file->move("upload/news",$news_image);
            $news->news_image = $news_image;
        }
        else
        {
            $news->news_image = "";
        }

        $news->save();

        return redirect('admin/news/add')->with('notify','Thêm tin thành công');
    }

    public function getEdit($news_id)
    {
        $news = News::find($news_id);
        return view('admin.news.edit',['news'=>$news]);
    }

    public function postEdit(Request $request, $news_id)
    {
        $news = News::find($news_id);
        $this->validate($request,
            [
                'news_title'=>'required',
                'news_content' => 'required'
            ],
            [
                'news_title.required'=>'Bạn chưa nhập tiêu đề',
                'news_content.required'=>'Bạn chưa nhập nội dung'
            ]);
        $news->news_title = $request->news_title;
        $news->news_alias = changeTitle($request->news_title);
        $news->news_content = $request->news_content;

        if($request->hasFile('news_image'))
        {
            $file = $request->file('news_image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/news/add')->with('notify','Bạn chỉ được chọn file có đuôi là jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $news_image = str_random(4)."_". $name;
            while(file_exists("upload/news/".$news_image))
            {
                $news_image = str_random(4)."_". $name;
            }
            
            $file->move("upload/news",$news_image);
            unlink("upload/news/".$news->news_image);
            $news->news_image = $news_image;
        }

        $news->save();

        return redirect('admin/news/edit/'.$news_id)->with('notify','Bạn đã sửa thành công');
    }

    public function getDelete($news_id)
    {
        $news = News::find($news_id);
        $news->delete();

        return redirect('admin/news/list')->with('notify','Bạn đã xóa thành công');
    }
}
