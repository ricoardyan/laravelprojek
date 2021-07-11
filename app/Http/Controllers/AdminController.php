<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        if (!Auth::user()) {
            return redirect('login');
        }
    	return view('pages/admin/index');
    }

    public function produk()
    {
        if (!Auth::user()) {
            return redirect('login');
        }
    	$produk=DB::table('produk')->get();
    	return view('pages/admin/produk',['produk'=>$produk]);
    }
    public function addproduk(Request $request)
    {
    	if ($request->hasFile('gambar')) {
    		$ambil=$request->file('gambar');
    		$name=$ambil->getClientOriginalName();
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $name;
    		$ambil->move(\base_path()."/public/gambar_produk", $namaFileBaru);
    		$save=DB::table('produk')->insert([
    			'nama_produk'=>$request->nama_produk,
    			'tipe_produk'=>$request->tipe_produk,
    			'stok'=>$request->stok,
    			'harga'=>$request->harga,
    			'status_produk'=>'Tersedia',
    			'gambar'=>$namaFileBaru,    		
    		]);
    		return redirect()->back();
    	}
    }
    public function editproduk(Request $request)
    {
    	if ($request->hasFile('gambar')) {
    		$ambil=$request->file('gambar');
    		$name=$ambil->getClientOriginalName();
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $name;
    		$ambil->move(\base_path()."/public/gambar_produk", $namaFileBaru);
    		$save=DB::table('produk')->where('id_produk', $request->id_produk)->update([
    			'nama_produk'=>$request->nama_produk,
    			'tipe_produk'=>$request->tipe_produk,
    			'stok'=>$request->stok,
    			'harga'=>$request->harga,
    			'status_produk'=>$request->status_produk,
    			'gambar'=>$namaFileBaru,    		
    		]);
    		return redirect()->back();
    	}DB::table('produk')->where('id_produk', $request->id_produk)->update([
    			'nama_produk'=>$request->nama_produk,
    			'tipe_produk'=>$request->tipe_produk,
    			'stok'=>$request->stok,
    			'harga'=>$request->harga,
    			'status_produk'=>$request->status_produk,
    		]);
    		return redirect()->back();
    }

    public function payment()
    {
        if (!Auth::user()) {
            return redirect('login');
        }
    	$payment=DB::table('payment')->get();
    	return view('pages/admin/payment',['payment'=>$payment]);
    }
    public function addpayment(Request $request)
    {
    	DB::table('payment')->insert([
    		'payment'=>$request->payment,
    		'keterangan'=>$request->keterangan,
    	]);
    	return redirect()->back();
    }
    public function editpay(Request $request)
    {
    	DB::table('payment')->where('id_payment', $request->id_payment)->update([
    		'payment'=>$request->payment,
    		'keterangan'=>$request->keterangan,
    	]);
    	return redirect()->back();
    }

    public function tb_checkout()
    {
        if (!Auth::user()) {
            return redirect('login');
        }
    	$cart=DB::table('cart')->join('produk','cart.id_produk','=','produk.id_produk')->join('tb_transaksi','tb_transaksi.id_pembeli','=','cart.id_pembeli')->join('payment','payment.id_payment','=','cart.id_payment')->where('cart.status_c','Tercheckout')->get();
        return view('pages/admin/tb_checkout',['cart'=>$cart]);
    }
    public function confirm(Request $request)
    {
        $min=DB::table('produk')->where('id_produk', $request->id_produk)->first();
        if ($min) {
            DB::table('produk')->where('id_produk', $request->id_produk)->update([
                'stok'=>$min->stok-$request->qty,
            ]);
            DB::table('cart')->where('id_cart', $request->id_cart)->update([
            'status_b'=>$request->status_b,
        ]);
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('pages/admin/register');
    }

    public function adminreg(Request $request)
    {
        if (DB::table('users')->where('email', $request->email)->first()) {
            return redirect('pages/register')->with('sama','Email Telah di Gunakan');
        }DB::table('users')->insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'level'=>$request->level,
            'password'=>Hash::make($request->password),
        ]);                             
        return redirect('login/');
    }
    // public function image_home()
    // {
    //     $home=DB::table('image_home')->get();
    //     return view('pages/admin/homeimage',['home'=>$home]);
    // }
    // public function addimageh(Request $request)
    // {
    //     if ($request->hasFile('gambar')) {
    //         $ambil=$request->file('gambar');
    //         $name=$ambil->getClientOriginalName();
    //         $namaFileBaru = uniqid();
    //         $namaFileBaru .= '.';
    //         $namaFileBaru .= $name;
    //         $ambil->move(\base_path()."/public/gambar_produk", $namaFileBaru);
    //         $save=DB::table('image_home')->insert([
    //             'gambar_image'=>$namaFileBaru,            
    //         ]);
    //         return redirect()->back();
    //     }
    // }
    // public function edima(Request $request)
    // {
    //     if ($request->hasFile('gambar')) {
    //         $ambil=$request->file('gambar');
    //         $name=$ambil->getClientOriginalName();
    //         $namaFileBaru = uniqid();
    //         $namaFileBaru .= '.';
    //         $namaFileBaru .= $name;
    //         $ambil->move(\base_path()."/public/gambar_produk", $namaFileBaru);
    //         $save=DB::table('image_home')->where('id_image', $request->id_image)->update([
    //             'gambar_image'=>$namaFileBaru,            
    //         ]);
    //         return redirect()->back();
    //     }
    // }
}
