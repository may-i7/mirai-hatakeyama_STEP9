<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::orderBy('id', 'asc');
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
        if ($request->filled('min_price')) {
           $query->where('price', '>=', $request->input('min_price'));
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        $products = $query->get();
        return view('products.index', compact('products'));
        }

        // 商品新規登録画面を表示する
    public function create()
    {
        return view('products.create');
    }

       // 新規商品をデータベースに保存する
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        

        // 画像アップロードの処理
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect()->route('products.index'); 
    }

    // 商品詳細画面を表示する
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // 商品購入画面を表示する
    public function purchase(Product $product)
    {
        return view('products.purchase', compact('product'));
    }

    // 商品購入処理を行う
    public function buy(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:' . $product->stock],
        ]);
        
        if ($product->stock <= 0 || $product->stock < $request->input('quantity')) {
            return back()->with('error', '在庫が不足しているため購入できません。');
        }

        $product->stock -= $request->input('quantity');
        $product->save();
        
        return redirect()->route('products.index')->with('success', '商品を購入しました！');
    }

    // 商品の削除処理
    public function destroy(Product $product)
    {
        $product->delete();

        // 削除後はマイページ（または商品一覧）へリダイレクト
        return redirect()->route('mupage')->with('success', '商品を削除しました。');
    }
}
    
    
