<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Stmt\Catch_;

class ProductController extends Controller
{
    
    public function index()
    {
        $products=Product::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       $categories= Category::all();
       return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'category_id'=>'required',
            'name'=>'required',
            'price'=>'numeric|required',
            'oldprice'=>'numeric|nullable',
            'stock'=>'numeric|required',
            'description'=>'required',
            'photopath'=>'required'
        ]);

    
        if($request->hasFile('photopath')){
            $image=$request->file('photopath');
            $name=time().'_'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images/products');
            $image->move($destinationPath,$name);
            $data['photopath']=$name;
        }
        Product::create($data);
        return redirect(route('product.index'))->with('success','Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
     public function show($id)
     {
         $product = Product::findOrFail($id);
 
         return view('product.show', compact('product'));
     }
    

    public function decreaseStock(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Assuming you have a 'quantity' field in the request sent when a product is purchased.
        $quantityPurchased = $request->input('quantity');

        if ($product->stock >= $quantityPurchased) {
            $product->stock-= $quantityPurchased;
            $product->save();

            return redirect()->route('product.show', $id)->with('success', 'Stock updated successfully.');
        } else {
            return redirect()->route('product.show', $id)->with('error', 'Insufficient stock.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        
        $product=Product::find($id);
        $categories=Category::all();
        return view('product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $data = $request->validate([
            'category_id'=>'required',
            'name'=>'required',
            'price'=>'numeric|required',
            'oldprice'=>'numeric|nullable',
            'stock'=>'numeric|required',
            'description'=>'required',
            'photopath'=>'nullable'
        ]);

        if($request->hasFile('photopath')){
            $image=$request->file('photopath');
            $name=time().'_'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images/products');
            $image->move($destinationPath,$name);
       File::delete(public_path('/images/products/'.$product->photopath));

            $data['photopath']=$name;


        }
$product->update($data);

return redirect(route('product.index'))->with('success','Product Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product=Product::find($request->dataid);
        $product->delete();
        return redirect(route('product.index'))->with('success','Product deleted successfully');
    }
}
