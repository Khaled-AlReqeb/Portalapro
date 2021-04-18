<?php

namespace App\Http\Controllers;
use App\Exports\ProductsExport;
use App\Order;
use Illuminate\Http\Request;
use App\Product;
use Maatwebsite\Excel\Excel;

class ProductsController extends Controller
{
    private $excel;
    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function export(){
        return $this->excel->download(new ProductsExport, 'products.xlsx');
    }
    public function index()
    {
        $products = Product::all();
        return view('store.products', compact('products'));
    }
    public function cart()
    {
        return view('store.cart');
    }

    public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "product_id" => $product->id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->photo
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_id" => $product->id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }



    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }


    public function storeOrder(Request $request)
    {


//        if (auth()->guard('user')->id() != ''){
            foreach($request->get('product_id') as $key => $product)
            {

                $order = Order::create([
                    'product_id' => $request['product_id'][$key],
                    'user_id' => 1,
//                    'user_id' => auth()->guard('user')->id(),
                    'quantity' => $request['quantity'][$key],
                    'price' => $request['price'][$key],
                ]);


            }
//            alert()->success('Your request has been successfully executed','Done');
            return back();
//        dd($order);
//        }
//        else{
//            return redirect("/login")->withSuccess('Oppes! You have entered invalid credentials');
//        }



    }
}
