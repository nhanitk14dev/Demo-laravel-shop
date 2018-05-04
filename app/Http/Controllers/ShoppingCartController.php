<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart; //phai them thu vien nay 
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Order;
use App\Models\OrderDetail;
use Hash;
use validator;

class ShoppingCartController extends Controller
{
	
	public function viewCart()
    {
        $carts = Cart::content();
        return view('frontend.page.cart',compact('carts'));
        
    }
    public function addItem( $id) 
    {
        $products = Products::find($id);
        Cart::add([
                        ['id'=>$id,
                        'name'=>$products->name,
                        'qty'=>1,
                        'price'=>$products->unit_price,
                        'options'=>['img'=>$products->image]]
                  ]);
        $carts = Cart::content();
    	
    	return view('frontend.page.cart',compact('carts'));
    }
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
           echo "ok";
           $id = $request->id;
           $qty = $request->qty;
           Cart::update($id,$qty);
        }

    }

    public function removeItem($id)
    {
        Cart::remove($id);
        return redirect()->route('giohang');
        
    }

    public function ShipOrder()
    {
        $cart_item = Cart::content();
        $cart_total = \Cart::subtotal();
        return view('frontend.shipping.index',compact('cart_item','cart_total'));
    }

    public function postShipOrder(Request $req)
    {
        //câp nhật
        $cart_item = \Cart::content();
        if($cart_item->isEmpty()) {
            Session::flash('error','Khong co san pham nao trong danh sach');
            return redirect('/');
        }
        $search_user = User::where('email',$req->email)->first();
        /*if(!$search_user)
        {
            //echo "them vao";
            $user = new User();
            $user->name = $req->name;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->active = 0;
            $user->save();

            $user_detail = new UserDetail();
            $user_detail->user_id = $user->id;

            $user->date_of_birth = $req->date_of_birth ?convertDatabaseTime($req->date_of_birth, PHP_DATE, DATABASE_DATE) : date(DATABASE_DATE);

            $user_detail->gender = $req->gender;
            $user_detail->address = $req->address;
            $user_detail->phone = $req->phone;
            $user_detail->about_me = $req->note;
            $user_detail->save();
            echo 'ko có email trong danh sách khách hàng !';
        }
        else
        {
            //echo 'cap nhat'; dùng sysn
            $user_detail = new UserDetail(); //find-id
            $user_detail->user_id = $search_user->id;

            $user_detail->date_of_birth = $req->date_of_birth ?convertDatabaseTime($req->date_of_birth, PHP_DATE, DATABASE_DATE) : date(DATABASE_DATE);

            $user_detail->gender = $req->gender;
            $user_detail->address = $req->address;
            $user_detail->phone = $req->phone;
            $user_detail->about_me = $req->note;
            $user_detail->save();//->update();
        }*/
    }

    public function ChecKout()
    {
        $cart_item = Cart::content();
        $cart_total = \Cart::subtotal();

        return view('frontend.page.dathang', compact('cart_item','cart_total'));
    }

    //trường hợp khách hàng ko đăng kí tài khoản
    public function postChecKout(Request $req)
    {
        
        $cart_item = \Cart::content();
        $cart_total = \Cart::subtotal();
        if($cart_item->isEmpty()) {

            //session()->flash('error','Khong co san pham nao trong danh sach');
            session()->flash('error', trans('message.error', ['attr' => trans('admin_product.product')]));

            return redirect()->back();
        }

        $search_user = User::where('email',$req->email)->first();
        if($search_user)
            {

                session()->flash('error', trans('message.error', ['attr' => trans('admin_product.product')]));
            }
            else
            {
                //echo "them vao";
                $user = new User();
                $user->name = $req->name;
                $user->email = $req->email;
                $user->password = Hash::make($req->password);
                $user->active = 0;
                $user->save();

                $user_detail = new UserDetail();
                $user_detail->user_id = $user->id;
                $user->date_of_birth = $req->date_of_birth ?convertDatabaseTime($req->date_of_birth, PHP_DATE, DATABASE_DATE) : date(DATABASE_DATE);

                $user_detail->gender = $req->gender;
                $user_detail->address = $req->address;
                $user_detail->phone = $req->phone;
                $user_detail->about_me = $req->note;
                $user_detail->save();

                $order = new Order();
                $order->user_id = $user->id;
                $order->total_amount = Cart::Subtotal();
                $order->payment_method = $req->payment_method;
                $order->note = $req->note;
                $order->fee = 0;
                $order->status = 0;
                $order->save();

                //$key là rowid
                foreach ($cart_item as $key => $value) {

                    $order_detail  = new OrderDetail();
                    $order_detail->order_id = $order->id;
                    $order_detail->products_id = $value->id;
                    $order_detail->is_gift = 0; //chưa có quà
                    $order_detail->price  = $value->price;
                    $order_detail->quantity = $value->qty;
                    $order_detail->total_price = ($value->price)*($value->qty);
                    $order_detail->save();
                }

                session()->flash('success', 'Tạo thành công !');
                

            }    

        Cart::destroy();

        //session()->flash('success', trans('admin_message.created_successful', ['attr' => trans('admin_product.product')]));

        return redirect()->back();

    }
    
}
