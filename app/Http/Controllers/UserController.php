<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    //
    public function getList()
    {
    	$user = User::all();
    	return view('admin.user.list',['user'=>$user]);
    }

    public function getAdd()
    {
    	return view('admin.user.add');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'full_name'=>'required|min:3',
                'email'=>'required|email',
                'password'=>'required|min:3|max:32',
                'password_again'=>'required|same:password'
            ],
            [
                'full_name.required'=>'Bạn chưa nhập tên người dùng',
                'full_name.min'=>'Tên người dùng phải có ít nhất 3 ký tự',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng email',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
                'password.max'=>'Mật khẩu chỉ được tối đa 32 ký tự',
                'password_again.required'=>'Bạn chưa nhập lại mật khẩu',
                'password_again.same'=>'Mật khẩu nhập lại chưa chính xác'
            ]);
        $user = new User;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->permissions = $request->permissions;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/user/add')->with('notify','Bạn chỉ được chọn file có đuôi là jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while(file_exists("upload/user/".$image))
            {
                $image = str_random(4)."_". $name;
            }
            $file->move("upload/user",$image);
            $user->image = $image;
        }
        else
        {
            $user->image = "";
        }

        $user->save();

        return redirect('admin/user/add')->with('notify','Bạn đã thêm người dùng thành công');
    }

    public function getEdit($id)
    {
        $user = User::find($id);
    	return view('admin.user.edit',['user'=>$user]);
    }

    public function postEdit(Request $request, $id)
    {
        $this->validate($request,
            [
                'full_name'=>'required|min:3'
            ],
            [
                'full_name.required'=>'Bạn chưa nhập tên người dùng',
                'full_name.min'=>'Tên người dùng phải có ít nhất 3 ký tự'
            ]);
        $user = User::find($id);
        $user->full_name = $request->full_name;
        $user->permissions = $request->permissions;

        if($request->changePassword == "on")
        {
            $this->validate($request,
            [
                'password'=>'required|min:3|max:32',
                'password_again'=>'required|same:password'
            ],
            [
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải có ít nhất 3 ký tự',
                'password.max'=>'Mật khẩu chỉ được tối đa 32 ký tự',
                'password_again.required'=>'Bạn chưa nhập lại mật khẩu',
                'password_again.same'=>'Mật khẩu nhập lại chưa chính xác',
            ]);
            $user->password = bcrypt($request->password);
        }

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/user/add')->with('notify','Bạn chỉ được chọn file có đuôi là jpg,png,jpeg');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while(file_exists("upload/user/".$image))
            {
                $image = str_random(4)."_". $name;
            }
            $file->move("upload/user",$image);
            unlink("upload/user/".$user->image);
            $user->image = $image;
        }

        $user->save();

        return redirect('admin/user/edit/'.$id)->with('notify','Bạn đã sửa thông tin người dùng thành công');
    }

    public function getDelete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/user/list')->with('notify','Bạn đã xóa thành công');
    }

    public function getLoginAdmin()
    {
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {
        
        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required|min:3|max:32'
            ],
            [
                'email.required'=>'Bạn chưa nhập email',
                'password.required'=>'Bạn chưa nhập Password',
                'password.min'=>'Password không được nhỏ hơn 3 ký tự',
                'password.max'=>'Password không được lớn hơn 32 ký tự'
            ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
            {
                return redirect('admin/product/list/');
            }
        else
            {
                return redirect('admin/login')->with('notify','Đăng nhập không thành công');
            }
    }

    public function getLogoutAdmin()
    {
        Auth::logout();
        return redirect('admin/login');
    }

}
