<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
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
        $product->user_id = auth()->id();
        

        // 画像アップロードの処理
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image = $path;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', '商品を登録しました。');
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

        // 購入履歴を保存する処理
        Purchase::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $request->input('quantity', 1),
        ]);
        
        return redirect()->route('products.index')->with('success', '商品を購入しました！');
    }

    // 購入商品をマイページに反映
    public function mypage()
    {
        $user = Auth::user();

        $purchases= Purchase::where('user_id', $user->id)->orderBy('created_at' , 'asc')->get();
        return view('profile.mypage' , compact('user', 'purchases'));
    }

    // 商品の削除処理
    public function destroy(Product $product)
    {
        $product->delete();

        // 削除後はマイページ（または商品一覧）へリダイレクト
        return redirect()->route('profile.show')->with('success', '商品を削除しました。');
    }

    public function ownerShow(Product $product)
    {
        // ユーザー用出品商品詳細ビュー
        return view('products.owner_show', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $productInputs =$request->validate([
            'name' => 'required|string|max:225',
            'price' => 'required|integer',
            'description' => 'nullable|string',
            'stock' => 'nullable|integer',
            'image' => 'nullable|image|max:5120',
        ]);

        if (!$request->hasFile('image')) {
            unset($productInputs['image']);
        }

        Product::updateProductData($id, $productInputs, $request->file('image'));
        return redirect()->route('products.show', $id)->with('success', '商品を更新しました。');
    }

    public function edit($id)
    {
        $product = Product::getProductById($id);

        return view('products.edit', compact('product'));
    }

    // 一般ユーザー用の商品詳細画面を表示
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // お問い合わせフォームを表示
    public function inquiry()
    {
        return view('contact.inquiry');
    }

    // お問い合わせの送信処理
    public function inquiryStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        return redirect()->route('products.index')->with('success', 'お問い合わせを送信しました。');
    }

}
    
    
