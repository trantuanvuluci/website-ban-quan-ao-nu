<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slide;
use App\Product;
use App\ProductType;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\News;
use Hash;
use Auth;
use Cart;
use Mail;

class PageController extends Controller
{
    //
    function __construct()
    {
        if(Auth::check())
        {
            view()->share('user',Auth::user());
        }
    }

    public function getIndex()
    {
    	$slide = Slide::all();
    	$new_product = Product::where('product_new',1)->paginate(4);
    	$product_sale = Product::where('product_promotion_price','<>',0)->paginate(8);
    	return view('page.trangchu',compact('slide','new_product','product_sale'));
    }

    public function getTypeProduct($type)
    {
        $type_of_product = Product::where('product_type_id',$type)->get();
        $product_other = Product::where('product_type_id','<>',$type)->paginate(3);
        $producttype = ProductType::all();
        $type_pd = ProductType::where('type_product_id',$type)->first();
    	return view('page.type_product',compact('type_of_product','product_other','producttype','type_pd'));
    }

    public function getDetail(Request $req)
    {
        $product = Product::where('product_id',$req->product_id)->first();
        $product_same = Product::where('product_type_id',$product->product_type_id)->paginate(6);
        $new_product = Product::where('product_new',1)->paginate(4);
        $product_sale = Product::where('product_promotion_price','<>',0)->paginate(4);
    	return view('page.detail_product',compact('product','product_same','product_sale','new_product'));
    }

    public function getContact()
    {
    	return view('page.contact');
    }

    public function getAbout()
    {
    	return view('page.about');
    }
    
    public function getAddtoCart($product_id, Request $request)
    {

        $product = Product::find($product_id);

        if($product->product_promotion_price != 0)
        {
            $dataCart = [
                'id' => $product_id,
                'name' => $product->product_name,
                'qty' => isset($request->qty) ? $request->qty : 1,
                'totalQty' => $product->product_quantity,
                'price' => $product->product_promotion_price,
                'options' => [
                    'img' => $product->product_image,
                    'size' => $request->size,
                    'color' => $request->color,
                ]
            ];

            Cart::add($dataCart);
        }
        else{
            $dataCart = [
                'id' => $product_id,
                'name' => $product->product_name,
                'qty' => isset($request->qty) ? $request->qty : 1,
                'price' => $product->product_unit_price,
                'options' => [
                    'img' => $product->product_image,
                    'size' => $request->size,
                    'color' => $request->color,
                ]
            ];


            Cart::add($dataCart);
        }

        return \response([
            'code'      => 1,
        ]);
    }
    
    public function getCheckout()
    {
        $data['total'] = Cart::total();
        $data['items'] = Cart::content();
        //dd($data);
        return view('page.order',$data);
    }
     public function getDelItemCart($id)
     {
        Cart::remove($id);
        return back();
     }

    public function getUpdateCart(Request $req)
    {
        if(isset($req->qty)) {
            Cart::update($req->rowId,$req->qty);
        } else {
            Cart::update($req->rowId,['options' => ['img'=>$req->img,'size' => $req->size, 'color' => $req->color]]);
        }

    }

    public function postCheckout(Request $req)
    {
        $cartInfo = Cart::content();
        try{
            $customer = new Customer;
            $customer->customer_name = $req->customer_name;
            $customer->customer_gender = $req->customer_gender;
            $customer->customer_email = $req->customer_email;
            $customer->customer_address = $req->customer_address;
            $customer->customer_phone = $req->customer_phone;
            $customer->customer_note = $req->customer_note;
            $customer->save();

            $bill = new Bill;
            $bill->bill_customer_id = $customer->customer_id;
            $bill->bill_date_order = date('Y-m-d');
            $bill->bill_total = str_replace(',','', Cart::total());
            $bill->bill_payment = $req->payment_method;
            $bill->bill_note = $req->customer_note;
            $bill->save();

             if (count($cartInfo) >0) {
                foreach ($cartInfo as $key => $item) {
                    $product = Product::find($item->id);
                    $total = intval($product->product_quantity) - intval($item->qty);
                    $totalBuyed = intval($product->product_buyed) + intval($item->qty);
                    Product::where('product_id', $item->id)->update(['product_quantity' => $total, 'product_buyed' => $totalBuyed]);

                    $bill_detail = new BillDetail;
                    $bill_detail->bill_detail_bill_id = $bill->bill_id;
                    $bill_detail->bill_detail_product_id = $item->id;
                    $bill_detail->bill_detail_quantity = $item->qty;
                    $bill_detail->bill_detail_unit_price = $item->price;
                    $bill_detail->bill_detail_size	 = $item->options['size'];
                    $bill_detail->bill_detail_color = $item->options['color'];
                    $bill_detail->save();
                }
            }

            $data['info'] = $req->all();
            $email = $req->customer_email;
            $data['total'] = Cart::total();
            $data['cart'] = Cart::content();
            Mail::send('page.email', $data, function ($message) use ($email) {
                $message->from('mysunshine2504@gmail.com', 'sunshine my');

                $message->to($email, $email);

                $message->cc('tuyetmai1965.nguyen@gmail.com', 'mai nguyen');

                $message->subject('Xác nhận hóa đơn mua hàng...');
            });
            Cart::destroy();
            return redirect('complete');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function getComplete()
    {
        return view('page.complete');
    }

    public function getLogin()
    {
        return view('page.login');
    }

    public function getRegister()
    {
        return view('page.register');
    }

    public function postRegister(Request $req)
    {
        $this->validate($req,
            [
                'email'=>'required|email|unique:tbl_users,email',
                'password'=>'required|min:6|max:32',
                'full_name'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Bạn vui lòng nhập email',
                'email.email'=>'Bạn nhập chưa đúng định dạng email',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=>'Bạn vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu không được nhỏ hơn 6 ký tự',
                'password.max'=>'Mật khẩu không được lớn hơn 32 ký tự',
                're_password.same'=>'Mật khẩu nhập lại chưa chính xác',
                're_password.required'=>'Vui lòng nhập lại mật khẩu'
            ]);
        $user = new User();
        $user->full_name = $req->full_name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->permissions = 0;

        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('notify','Bạn chỉ được chọn file có đuôi là jpg,png,jpeg');
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
        return redirect()->back()->with('notify','Chúc mừng bạn đã đăng ký tài khoản thành công');
    }

    public function postLogin(Request $req)
    {
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:32'
            ],
            [
                'email.required'=>'Bạn vui lòng nhập email',
                'email.email'=>'Bạn nhập chưa đúng định dạng email',
                'password.required'=>'Bạn vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu không được nhỏ hơn 6 ký tự',
                'password.max'=>'Mật khẩu không được lớn hơn 32 ký tự'
            ]);
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials))
            {
                return redirect()->route('trang-chu');
            }
        else{
            return redirect()->back()->with('notify','Đăng nhập không thành công');
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function getUser()
    {
        $user = Auth::user();
        return view('page.user',compact('user'));
    }

    public function postUser(Request $req)
    {
        $this->validate($req,
            [
                'full_name'=>'required|min:3'
            ],
            [
                'full_name.required'=>'Bạn chưa nhập tên người dùng',
                'full_name.min'=>'Tên người dùng phải có ít nhất 3 ký tự'
            ]);
        $user = Auth::user();
        $user->full_name = $req->full_name;

        if($req->changePassword == "on")
        {
            $this->validate($req,
            [
                'password'=>'required|min:6|max:32',
                'passwordAgain'=>'required|same:password'
            ],
            [
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải có ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu chỉ được tối đa 32 ký tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Mật khẩu nhập lại chưa chính xác',
            ]);
            $user->password = bcrypt($req->password);
        }

        if($req->hasFile('image'))
        {
            $file = $req->file('image');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect()->back()->with('notify','Bạn chỉ được chọn file có đuôi là jpg,png,jpeg');
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

        return redirect()->back()->with('notify','Bạn đã sửa thông tin người dùng thành công');
    }

    public function getNews()
    {
        $news = News::all();
        return view('page.news',compact('news'));
    }

    public function getSearch(Request $req)
    {
        $product = Product::where('product_name','like','%'.$req->key.'%')
                            ->orWhere('product_unit_price',$req->key)
                            //->orWhere('product_promotion_price',$req->key)
                            ->get();
        return view('page.search',compact('product'));
    }
}
