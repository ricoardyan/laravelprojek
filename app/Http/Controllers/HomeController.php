<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('LogReg/index');
    }
    public function ceklogin(Request $request)
    {
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            if (Auth::user()->level=="Pembeli") {
                return redirect('products/');
            }else{
                return redirect('pages/admin');
            }
        }
        return redirect()->back()->with('salah','Email dan Password Salah!');
    }
    public function register()
    {
        return view('LogReg/register');
    }
    public function addreg(Request $request)
    {
        if (DB::table('users')->where('email', $request->email)->first()) {
            return redirect()->back()->with('sama','Email Telah di Gunakan');
        }else{
            DB::table('users')->insert([
                'name'=>'Pelanggan',
                'email'=>$request->email,
                'password'=>hash::make($request->password),
                'level'=>'Pembeli',
            ]);
            return redirect('login')->with('success','Register Berhasil Silahkan Login!');
        }
    }

    public function products()
    {
        $produk=DB::table('produk')->get();
        return view('products',['produk'=>$produk]);
    }

    public function cart()
    {
        if (!Auth::user()) {
            return redirect('login');
        }
        $cart=DB::table('cart')->join('produk','cart.id_produk','=','produk.id_produk')->where('cart.id_pembeli', Auth::user()->id)->where('cart.status_c','Keranjang')->get();
        return view('cart',['cart'=>$cart]);
    }
    public function addcart(Request $request)
    {   
        $cek=DB::table('cart')->where('id_produk', $request->id_produk)->where('id_pembeli', Auth::user()->id)->where('status_c','Keranjang')->first();
        if ($cek) {
            DB::table('cart')->where('id_produk', $request->id_produk)->where('id_pembeli', Auth::user()->id)->update([
                'qty'=>$cek->qty+$request->qty,
            ]);
            return redirect()->back();
        }
        else{
            DB::table('cart')->insert([
                'id_produk'=>$request->id_produk,
                'qty'=>$request->qty,
                'harga_c'=>$request->harga,
                'id_pembeli'=>Auth::user()->id,
                'status_c'=>'Keranjang',
            ]);
            return redirect()->back();
        }
    }
    public function editcart(Request $request)
    {
        $cek=DB::table('cart')->where('id_produk', $request->id_produk)->where('id_pembeli', Auth::user()->id)->first();
        if ($cek) {
             DB::table('cart')->where('id_produk', $request->id_produk)->where('id_pembeli', Auth::user()->id)->update([
                'qty'=>$request->qty,
            ]);
            return redirect()->back();
        }
    }
    public function delete_cart($id_cart)
    {
        DB::table('cart')->where('id_cart', $id_cart)->delete();
        return redirect()->back();
    }

    public function checkout()
    {
        if (!Auth::user()) {
            return redirect('login');
        }
        $cart=DB::table('cart')->join('produk','cart.id_produk','=','produk.id_produk')->where('cart.id_pembeli', Auth::user()->id)->where('cart.status_c','Keranjang')->get();
        $pembayaran=DB::table('payment')->get();
        return view('checkout',['pembayaran'=>$pembayaran,'cart'=>$cart]);
    }
    public function transaksi(Request $request)
    {
        if (DB::table('tb_transaksi')->where('id_pembeli', Auth::user()->id)->first()) {
            DB::table('tb_transaksi')->where('id_pembeli', Auth::user()->id)->update([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
            'email'=>$request->email,
            // 'id_payment'=>$request->id_payment,
            'kode_pos'=>$request->kode_pos,
        ]);
        DB::table('cart')->where('id_pembeli', Auth::user()->id)->where('status_c','Keranjang')->update([
            'status_c'=>'Tercheckout',
            'id_payment'=>$request->id_payment,
        ]);
        return redirect('detail_checkout');
        }
        DB::table('tb_transaksi')->insert([
            'id_pembeli'=>Auth::user()->id,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
            'email'=>$request->email,
            // 'id_payment'=>$request->id_payment,
            'kode_pos'=>$request->kode_pos,
        ]);
        DB::table('cart')->where('id_pembeli', Auth::user()->id)->where('status_c','Keranjang')->update([
            'status_c'=>'Tercheckout',
            'id_payment'=>$request->id_payment,
        ]);
        return redirect('detail_checkout')->with('success_checkout','Barang Anda akan segera di Kirim');
    }

    public function detail_checkout()
    {
         $cart=DB::table('cart')->join('produk','cart.id_produk','=','produk.id_produk')->join('tb_transaksi','tb_transaksi.id_pembeli','=','cart.id_pembeli')->join('payment','payment.id_payment','=','cart.id_payment')->where('tb_transaksi.id_pembeli', Auth::user()->id)->where('cart.status_c','Tercheckout')->get();
        return view('detail_checkout',['cart'=>$cart]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login/');
    }
}
