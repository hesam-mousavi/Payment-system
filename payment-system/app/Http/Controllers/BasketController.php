<?php

namespace App\Http\Controllers;

use App\Exceptions\QuantityExeededExeption;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Support\Basket\Basket;

class BasketController extends Controller
{
    private $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    public function index()
    {
        $items = $this->basket->all();
        return view('basket', compact('items'));
    }

    public function add(Product $product)
    {
        try {
            $this->basket->add($product, 1);

            return back()->with('success', 'محصول مورد نظر با موفقیت به سبد خرید اضاف شد!');
        } catch (QuantityExeededExeption) {
            return back()->with('warning', 'تعداد درخواستی از مقدار موجودی بیشتر است.');
        }
    }

    public function update(Request $request, Product $product)
    {
        $this->basket->update($product, $request->quantity);
        return back();
    }
}
