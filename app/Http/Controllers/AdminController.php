<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login2()
    {
        return view('admindashboard.login2');
    }

    public function loginadmin(Request $request)
    {
        $request->validate([
            'adminUsername'=>'required',
            'adminPassword'=>'required'
        ]);
        $admin = Admin::where('adminUsername', '=', $request->adminUsername)->first();
        // $adminpass = Admin::where('adminPassword', '=', $request->adminPassword);
        
        if($admin){
            if($request->adminPassword == $admin->adminPassword){
                $request->session()->put('loginIDA', $admin->adminID);  
                $request->session()->put('loginName', $admin->adminUsername); 
                
                return redirect('admindashboard.admin')->with(['adminUsername'=>$admin->adminUsername]);
            }
            else{
                return back()->with('fail', 'Incorrect password');
            }
        }else{
            return back()->with('fail', 'Incorrect username');
        }
    }

    public function logout2()
    {   
            Session::flush(); 
            return view('0905C.home');
    }

    public function admin()
    {
        if (Session::get('loginIDA')!=null){
            $admin = Admin::get();
            return view('admindashboard.admin', compact('admin'));
        /* $admin = Auth::user(); */
        }else{
            return redirect('admindashboard.login2')->with('restricted','require login first');
        }
        
    }

    public function index()
    {
        if (Session::get('loginIDA')!=null){
            $admindata = Admin::get();
            return view('admindashboard.admin.list', compact('admindata'));
        }else{
            return redirect('admindashboard.login2')->with('restricted','require login first');
        }
    }

    public function add2()
    {
        $admins = Admin::get();
        return view('admindashboard.admin.add2', compact('admins'));
    }

    public function save2(Request $request)
    {
        //dd($request->all());
        $admininfo = new Admin();
        $admininfo->adminUsername = $request->name;
        $admininfo->adminPassword = $request->password;
        $admininfo->adminEmail = $request->email;
        $admininfo->save();
        return redirect()->back()->with('success', 'Admin added successfully!');
    }

    public function edit2($id)
    {
        $admindata = Admin::where('adminID', '=', $id)->first();
        return view('admindashboard.admin.edit2', compact('admindata'));
    }

    public function update2(Request $request)
    {
        $adminID = $request->id;
        $adminUsername = $request->name;
        $adminEmail = $request->price;

        Admin::where('adminID', '=', $adminID)->update([
            'adminUsername'=>$adminUsername,
            'adminEmail'=>$adminEmail

            // 'productName'=>$request->name,
            // 'productPrice'=>$request->price,
            // 'productDetails'=>$request->detail,
            // 'productImage1'=>$request->image,
            // 'producerID'=>$request->producer
        ]);
        return redirect()->back()->with('success', 'Admin updated successfully!');
    }

    public function delete2($id)
    {
        $data = Admin::where('adminID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Admin removed successfully!');
    }
    public function test()
    {
        return view('admindashboard.login2');
    }
}


