<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Coupons;
class CouponsController extends Controller
{
    public function addCoupon(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //echo"<pre>"; print_r($data);die;
            $coupon = new Coupons;
            $coupon->coupon_code = $data['coupon_code'];
            $coupon->amount = $data['coupon_amount'];
            $coupon->amount_type = $data['amount_type'];
            $coupon->expiry_date = $data['expiry_date'];
            $coupon->save();
            return redirect('/admin/view-coupons')->with('flash_message_success','Coupon has been added Successfully');
          }
        return view('admin.coupons.add_coupon'); 
    }

//View coupon
    public function viewCoupons(){
        $coupons = Coupons::get();
        return view('admin.coupons.view_coupons')->with(compact('coupons'));
    }
//update status
    public function updateStatus(Request $request,$id=null){
        $data = $request->all();
        Coupons::where('id',$data['id'])->update(['status'=>$data['status']]);  
    }
//Coupon edit
    public function editCoupon(Request $request,$id=null){
        if($request->isMethod('post')){
          $data = $request->all();
          $coupon = Coupons::find($id);
          $coupon->coupon_code = $data['coupon_code'];
          $coupon->amount = $data['coupon_amount'];
          $coupon->amount_type = $data['amount_type'];
          $coupon->expiry_date = $data['expiry_date'];
          $coupon->save();
          return redirect('/admin/view-coupons')->with('flash_message_success','Coupon has been Updated Successfully');
        }
       $couponDetails = Coupons::find($id);
       return view('admin/coupons/edit_coupon')->with(compact('couponDetails'));
      }
//Coupon delete
      public function deleteCoupon($id=null){
        Coupons::where(['id'=>$id])->delete();
        Alert::success('Deleted', 'Success Message');
        return redirect()->back();
    }
}
