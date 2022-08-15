<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function Termwind\ask;

class CustomerController extends Controller
{
    public function login()
    {
        return view('0905C.login');
    }
    public function register()
    {
        return view('0905C.register');
    }
    public function registerUser(Request $request)
    {
        $temp = Customer::where('customerUsername', 'like', $request->customerUsername)->first();
        if($temp != null){
            return back()->with('duplicate', 'Duplicate username is not accepted');
        }
        $request->validate([
            'customerUsername'=>'required',
            'customerPhone'=>'required',
            'customerPassword'=>'required'
        ]);
        $customer = new Customer();
        $customer->customerUsername = $request->customerUsername;
        $customer->customerPhone = $request->customerPhone;
        $customer->customerPassword = Hash::make($request->customerPassword);
        $res = $customer->save();
        if($res){
            return back()->with('success', 'You have registered successfully');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'customerUsername'=>'required',
            'customerPassword'=>'required'
        ]);
        $customer = Customer::where('customerUsername', '=', $request->customerUsername)->first();
        if($customer){
            if(Hash::check($request->customerPassword, $customer->customerPassword)){
                $request->session()->put('loginID', $customer->customerID); 
                $request->session()->put('loginName', $customer->customerUsername); 
                return redirect('products');
            }else{
                return back()->with('fail', 'Incorrect password');
            }
        }else{
            return back()->with('fail', 'Incorrect username');
        }
    }
    public function logout()
    {
        Session::flush();        
        return redirect('products');
    }
    public function profile()
    {
        $userdata = Customer::where('customerID', '=', Session::get('loginID'))->first();
        return view('0905C.profile', compact('userdata'));
    }

    public function edit3($id)
    {
        $userdata = Customer::where('customerID', '=', $id)->first();
        return view ('0905C.profileedit', compact('userdata'));
    }

    public function update3(Request $request)
    {
        $customerID = $request->id;
        $customerUsername = $request->name;
        $customerPhone = $request->phone;

        Customer::where('customerID', '=', $customerID)->update([
            'customerUsername'=>$customerUsername,
            'customerPhone'=>$customerPhone
        ]);
        return redirect()->back()->with('success', 'Customer updated successfully!');
        // return view ('0905C.profileedit', compact('request'));
    }
    public function confirmDelete($id)
    {
        $deleteCart = new CartController();
        if($deleteCart->searchForCart($id) == null){
            $data = Customer::where('customerID', '=', $id)->delete();
            Session::flush();
            return redirect('products');
        }else{
            $deleteCart->deleteCart($id);
            $data = Customer::where('customerID', '=', $id)->delete();
            Session::flush();
            return redirect('products');
        }
        
    }
}

?>