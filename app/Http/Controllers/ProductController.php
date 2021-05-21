<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $users)
    {
        $products = Product::latest()->paginate(10);

        return view('products.index', compact('products'))->with(request()->input('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);

        // create a new product in the database
        Product::create($request->all());

        // redirect and send a friendly mssg
        return redirect()->route('products.index')->with('success', 'Product created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //validate
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
        ]);

        // create a new product in the database
        $product->update($request->all());

        // redirect and send a friendly mssg
        return redirect()->route('products.index')->with('success', 'Product Updated succesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // deleting the products
        $product->delete();

        // redirect and send mssg
        return redirect()->route('products.index')->with('success', 'Product Deleted succesfully');

    }

    public function loginForm()
    {
        return view('products.login');
    }

    public function signUpForm(User $users)
    {
        $users = User::latest()->paginate(10);

        return view('products.signup', compact('users'))->with(request()->input('page'));


    }

    public function register(Request $request)
    {
        $this->validate($request,[
            "name"=>"required",
            "email"=>"required",
            "password"=>"required|min:6|max:6"
        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        if(!$user){
            return redirect()->route('products.signup')->with("invalid", "Invalid Inputs");
        }
        return redirect()->route('products.store');
    }

    public function login(Request $data)
    {
        $credentials = collect($data)->only('email','password');

        Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password']
        ]);

        if (auth()->user()) {
            return redirect()->route('products.index');
        }
        return redirect()->route('products.login')->with('invalid', 'Invalid email/password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('products.login');

    }
}
