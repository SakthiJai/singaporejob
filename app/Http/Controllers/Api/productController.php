<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use App\Models\product;
use App\Models\Category;
use App\Models\Items;
use App\Models\Warehouse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
     public function __construct()
    {

    }

     public function getproductList(Request $request)
    {
        $sql="SELECT id, image,name,FORMAT(price,2 )as price,FORMAT(qty,2) as qty,status,selling_price
      from products
	  where status !=3
	  ORDER BY added_at desc";
	  $productList = DB::select($sql);
        return response()->json($productList);
		
    }
	 public function getcolorList(Request $request)
    {
            $sql="SELECT attributes.name,attributes.id,attribute_value.value,attribute_value.id
              from attributes
               LEFT join attribute_value on attribute_value.attribute_parent_id = attributes.id
                WHERE attributes.name = 'color' and attribute_value.active=1";
	  $colorList = DB::select($sql);
        return response()->json($colorList);
    }
	
	 public function getsizeList(Request $request)
    {
            $sql="SELECT attributes.name,attributes.id,attribute_value.value,attribute_value.id as size_id
              from attributes
               LEFT join attribute_value on attribute_value.attribute_parent_id = attributes.id
                WHERE attributes.name = 'size' and attribute_value.active=1";
	  $sizeList = DB::select($sql);
        return response()->json($sizeList);
    }
	 public function getcategories(Request $request)
    {
        //$categoryList = Category::all();
				$sql="SELECT *
					from categories
					where active=1
					ORDER BY added_at desc";
	  $categoryList = DB::select($sql);
        return response()->json($categoryList);
    }
	 public function getitems(Request $request)
    {
        //$itemsList = Items::all();
		$sql="SELECT *
					from brands
					where active=1
					ORDER BY added_at desc";
	  $itemsList = DB::select($sql);
        return response()->json($itemsList);
    }
	 public function getwarehouse(Request $request)
    {
        //$warehouseList = Warehouse::all();
		$sql="SELECT *
					from stores
					where active=1
					ORDER BY added_at desc";
	  $warehouseList = DB::select($sql);
        return response()->json($warehouseList);
    }
	
	
	 public function addproduct(Request $request){
		 //print_r($request);exit();
		     $path1 ="";
  if($request->file('house_picture')!=null && $request->file('house_picture')!=""){
              $path = $request->file('house_picture')->store('public/images/upload');
                 $path1 = env('APP_URL').'/storage/app/'.$path;
        }			
			$data=array(
					'image'=> $path1,
					'name' =>$request->productname,
					'price' =>$request->price,
					'selling_price' =>$request->selling_price,
					'qty' =>$request->quantity,
					'attribute_value_id' =>$request->color,
					'size_id' =>$request->size,
					'brand_id' =>$request->items,
					'category_id' =>$request->Category,
					'store_id' =>$request->warehouse,
					'availability' =>$request->availbility,
					'description' =>$request->message
            );
			 if($request->message !=""){
                    $data['description']=  $request->message;
	            }
			$insert=  product::insert($data);
        if($insert){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
	
	 public function updateproductList(Request $request){
         $path1 ="";
         $id=$request->id;	
         $data=array(
			//'image'=> $path1,
            'name' =>$request->productname,
			'price' =>$request->price,
			'selling_price' =>$request->selling_price,
			'qty' =>$request->quantity,
			'attribute_value_id' =>$request->color,
			'size_id' =>$request->size,
			'brand_id' =>$request->items,
            'category_id' =>$request->Category,
			'store_id' =>$request->warehouse,
			'availability' =>$request->availbility,
			'description' =>$request->message
         );
			if($request->file('house_picture')){
              $path1 = $request->file('house_picture')->store('public/images/upload');
                 $path2 = env('APP_URL').'/storage/app/'.$path1;
                  $data['image']= $path2;
            }
        $update=product::where('id',$id)->update($data);
        if($update){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
	
	public function editproductList(Request $request)
    {
        $productList =product::where('id',$request->id)->first();
        return response()->json($productList);
    }
	
	 public function deleteproduct(Request $request){
         
         $id=$request->id;
		$data=array(
            'status' =>3
         );
        $delete= product::where('id',$id)->update($data);
        if($delete){
            
               return response()->json('Success');
        }else{
               
              return response()->json('failed');
        }
    }
	
	  //public function updateaddproductList(Request $request){
         
        // $id=$request->id;
         //$data=array(
            //'cssv' => $request->file
         //);

        //$update=  product::where('id',$id)->update($data);
        //if($update){
            
              // return response()->json(['result' =>'Success']);
        //}else{
               
              //return response()->json(['result'=>'failed']);
       // }
   // }  
	
	    public function importproduct (Request $request){
			
			$path1='';
			//$file='';
       if($request->file('productcsv')){
		   $extension = $request->file('productcsv')->getClientOriginalExtension();
            //$path = $request->file('productcsv')->store('assets/images/upload');
			$request->file('productcsv')->storeAs('public/productcsv', $request->file('productcsv')->getClientOriginalName());
			 		//$request-> file::get(storage_path('app/public/productcsv'));
       }
				$handle = fopen($_FILES['productcsv']['tmp_name'], "r");
				$headers = fgetcsv($handle, 1000, ",");
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
				{
					//print_r($data[0]);exit;
					if($insert =product::create([
							'name' =>$data[1],
							'sku' =>$data[2],
							'price' =>$data[3],
							'qty' =>$data[4],
							'image' =>$data[5],
							'description' =>$data[6],
							'attribute_value_id' =>$data[7],
							'brand_id' =>$data[8],
							'category_id' =>$data[9],
							'store_id' =>$data[10],
							'availability' =>$data[11],
							'barcode' =>$data[12],
							'weight ' =>$data[13],
							'stock' =>$data[14]
								])){
									//echo '121';
								}
								else{
									print_r(error_get_last()			);
									break;
									
								}
				}
				fclose($handle);
        if($insert){
            
              return response()->json(['result' =>'Success']);
        }else{
               
             return response()->json(['result'=>'failed']);
        }
 }
 public function productstatus(Request $request){
         
         $id=$request->id;
         $status=$request->status;
        
         if($status==1){
            $active=2;
         }elseif($status==2){
             $active=1;
         }
         $data=array(
            'status' =>($request->status==1?2:1)
         );
        $update=product::where('id',$id)->update($data);
        if($update){
           
               return response()->json(['result' =>'true']);
        }else{
               
              return response()->json(['result'=>'false']);
        }
    }
	public function getcountProduct(Request $request)
    {
        $product_lenght = product::where('status','=','1')->count();
        return response()->json($product_lenght);
    }
	
}
