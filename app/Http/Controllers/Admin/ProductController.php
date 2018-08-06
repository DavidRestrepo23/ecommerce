<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Category;
use App\Supplier;
use App\Feature;
use App\GroupUser;
use App\ProductImage;
use App\PriceSpecific;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsStoreRequest;
use App\Http\Requests\ProductsUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class ProductController extends Controller
{   

    public function __construct(){
        $this->middleware('dashboard');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = Product::with('images')->orderBy('id', 'DESC')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $product = null;
        $categories = Category::where('status', 1)->get();
        $suppliers = Supplier::pluck('companyName', 'id');
        $group_user = GroupUser::pluck('name', 'id');
        $features =  Feature::all();
        return view('admin.products.create', compact('categories', 'suppliers', 'features', 'group_user', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsStoreRequest $request)
    {      

        if($request->ajax()){
            $product = null;

        try{
            DB::beginTransaction();
            $tax = $request->rate;
            $price_tax = $request->price * $tax;
            $visible = $request->status;
            if($visible == null){
                $status = '0';
            }else{
                $status = '1';
            }
        
                $product = Product::create([
                    'title' => $request->title,
                    'slug' => str_slug($request->title),
                    'reference' => $request->reference,
                    'price' => $request->price,
                    'price_tax' => $price_tax,
                    'summary' => $request->summary,
                    'description' => $request->description,
                    'status' => $status,
                    'stock' => $request->stock,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                    'category_id' => $request->category_id,
                    'supplier_id' => $request->supplier_id,
                ]);
        
            if($request->file('images')){
                $images = $request->file('images');
                $path = 'images/products';
                foreach($images as $image){
                    $filename = uniqid().$image->getClientOriginalName();
                    $upload_success = $image->move($path,$filename);
                    ProductImage::create([
                        'name' => $request->title,
                        'url' => $filename,
                        'product_id' => $product->id
                    ]);
                }
            }
        
        if($request->subcategory_id){
            $product->sub_categories()->attach($request->get('subcategory_id'));
        }
        
        if($request->feature_detail_id){
            $product->feature_details()->attach($request->get('feature_detail_id'));
        }
            
            
        $success = true;       
                 
        }catch(\Exception $ex){
            DB::rollBack();
            $success = $ex->getMessage();
            
        }

        if($success === true){
            DB::commit();
            return response()->json([
                'response' => 'Producto creado con éxito',
                'product_id' => $product->id
            ]); 
        }

        }

        abort(401);

    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $product = Product::with('category', 'images', 'sub_categories', 'price_specifics', 'feature_details')->find($id);
        $categories = Category::where('status', 1)->get();
        $suppliers = Supplier::pluck('companyName', 'id');
        $group_user = GroupUser::all();
        $features =  Feature::all();
        if(!$product)
            abort(404);
        return view('admin.products.edit', compact('product', 'categories', 'suppliers', 'group_user', 'features'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsUpdateRequest $request, $id)
    {   
    
        if($request->ajax()){

            try{
                DB::beginTransaction();

                $product = Product::find($id);
                
                if($request->rate != null){
                    $tax = $request->rate;
                    $price_tax = $request->price * $tax;
                }else{
                    $price_tax = $request->price_tax;
                }
              
                if($request->status == null){
                    $status = '0';
                }else{
                    $status = '1';
                }   
                
                $product->fill([
                    'title' => $request->title,
                    'slug' => str_slug($request->title),
                    'reference' => $request->reference,
                    'price' => $request->price,
                    'price_tax' => $price_tax,
                    'summary' => $request->summary,
                    'description' => $request->description,
                    'status' => $status,
                    'stock' => $request->stock,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                    'category_id' => $request->category_id,
                    'supplier_id' => $request->supplier_id,
                ])->save();
                
                if($request->file('images')){
                    $images = $request->file('images');
                    $path = 'images/products';
                    foreach($images as $image){
                        $filename = uniqid().$image->getClientOriginalName();
                        $upload_success = $image->move($path,$filename);
                        ProductImage::create([
                            'name' => $request->title,
                            'url' => $filename,
                            'product_id' => $product->id
                        ]);
                    }
                }

                if($request->subcategory_id)
                    $product->sub_categories()->sync($request->get('subcategory_id'));
                
                
                if($request->feature_detail_id)
                    $product->feature_details()->sync($request->get('feature_detail_id'));
                
                    $success = true;       
                
            }catch(\Exception $ex){
                DB::rollBack();
                $success = $ex->getMessage();
                return response()->json([
                    'error' => $success,
                ]);
            }


            if($success === true){
                DB::commit();
                return response()->json([
                    'response' => 'Producto editado con éxito',
                    'product_id' => $product->id
                ]); 
            }


        }

        abort(401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


