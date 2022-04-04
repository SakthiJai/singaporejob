<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChatMessages as Message;
use App\Models\User;
use App\Models\Orders;
use App\Models\product;
use App\Models\Ordersitems;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;
use PDF;
 use Storage;

class OrdersControllers extends Controller
{
     public function __construct()
    {

    }

    
    public function addOrdersItems(Request $request){
		$rateList = Company::all();
		$product 		= array();
		$qty    		= array();
		$rate_value  	= array();
		$amount_value 	= array();
		$bill_no = 'BILPR-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4));
		$data=array(
			'bill_no' => $bill_no,
            'customer_name' =>$request->customer_name,
			'customer_address' =>$request->customer_address,
			'customer_phone' =>$request->customer_phone,
			'gross_amount' =>$request->gross_amount_value,
			'date_time' =>now(),
			'service_charge_rate' =>$rateList[0]->service_charge_value,
			'vat_charge_rate' =>$rateList[0]->vat_charge_value,
			'service_charge' =>$request->service_charge_value,
			'vat_charge' =>$request->vat_charge_value,
			'net_amount' =>$request->net_amount_value,
            'paid_status'=>'2'
         );
		if($request->discount !=""){
            $data['discount']=  $request->discount;
	    }
        $insert=  Orders::insert([$data]);
		$orderid = DB::getPdo()->lastInsertId();
		if($request->product!=""){
			foreach($request->product as $key=>$productvalue):
			$product[$key] = $productvalue;			
			endforeach;
		}	
		if($request->qty!=""){
			foreach($request->qty as $key=>$quantity):
			$qty[$key] = $quantity;			
			endforeach;
		}
		if($request->rate_value!=""){
			foreach($request->rate_value as $key=>$ratevalue):
			$rate_value[$key] = $ratevalue;
			endforeach;
		}
		if($request->amount_value!=""){
			foreach($request->amount_value as $key=>$amountvalue):
			$amount_value = $qty[$key]*$rate_value[$key];
			$this->addproductItems($orderid,$qty[$key],$rate_value[$key],$amountvalue,$product[$key]);
			endforeach;
		}
        if($insert){
			$invoiceNumber = "IMS".date('ymdhis');
            $pdf = PDF::loadView('invoicepdf', array('invoice'=>$invoiceNumber))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
			Storage::put('public/pdf/'.$invoiceNumber.'.pdf', $pdf->output());
			$path ='public/pdf/'.$invoiceNumber.'.pdf';
			Orders::where('id',$orderid)->update(array('invoice'=>$invoiceNumber,'invoice_path'=>$path));
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
     public function getordersList(Request $request)
    {
        //$ordersList = Orders::all();
		$sql = "select A.id,A.bill_no,A.customer_name,A.customer_phone,date_format(A.date_time,'%d-%m-%Y') as date_time,
		A.gross_amount,A.vat_charge,FORMAT(A.net_amount,2) as net_amount,invoice,invoice_path

				from orders A
				where A.delete_status = 1
				order by A.added_at desc";
				$ordersList = DB::select($sql);
        return response()->json($ordersList);
    }
	public function getproductname(Request $request)
    {
        $sql = "select *
				from products A
				where A.status !=3";
				$ordersList = DB::select($sql);
        return response()->json($ordersList);
    }
	public function getProductValueById(Request $request)
    {
        $ordersList = product::where('id',$request->product_id)->first();
        return response()->json($ordersList);
    }
    public function editordersList(Request $request)
    {
		$ordersList = Orders::where('id',$request->id)->first();
        return response()->json($ordersList);
    }
    public function updateOrdersList(Request $request){
         $rateList = Company::all();
         $orders_id=$request->orders_id;
		 $delete= Ordersitems::where('order_id',$orders_id)->delete();
		 $items_id=$request->product_items_id;
		 $pro_id=$request->product_id;
         $data=array(
            'customer_name' =>$request->customer_name,
			'customer_address' =>$request->customer_address,
			'customer_phone' =>$request->customer_phone,
			'service_charge_rate' =>$rateList[0]->service_charge_value,
			'vat_charge_rate' =>$rateList[0]->vat_charge_value
			/*'gross_amount' =>$request->gross_amount_value,
			'date_time' =>now(),
			'discount' =>$request->discount,
			'service_charge' =>$request->service_charge_value,
			'vat_charge' =>$request->vat_charge_value,
			'net_amount' =>$request->net_amount_value,
            'paid_status'=>'2'*/
         );
		 if($request->gross_amount_value !="" || $request->gross_amount_value !=null){
				$data['gross_amount']=  $request->gross_amount_value;
			}
		if($request->discount !="" || $request->discount !=null){
				$data['discount']=  $request->discount;
			}
		if($request->vat_charge_value !="" || $request->vat_charge_value !=null){
				$data['vat_charge']=  $request->vat_charge_value;
			}
		if($request->service_charge_value !="" || $request->service_charge_value !=null){
				$data['service_charge']=  $request->service_charge_value;
			}
		if($request->net_amount_value !="" || $request->net_amount_value !=null){
				$data['net_amount']=  $request->net_amount_value;
			}
					if($request->product!=""){
						foreach($request->product as $key=>$productvalue):
						$product[$key] = $productvalue;			
						endforeach;
					}	
					if($request->qty!=""){
						foreach($request->qty as $key=>$quantity):
						$qty[$key] = $quantity;			
						endforeach;
					}
					if($request->rate!=""){
						foreach($request->rate as $key=>$ratevalue):
						$rate_value[$key] = $ratevalue;
						endforeach;
					}
					if($request->amount!=""){
						foreach($request->amount as $key=>$amountvalue):
						$amount_value = $qty[$key]*$rate_value[$key];
						$this->addproductItems($orders_id,$qty[$key],$rate_value[$key],$amountvalue,$product[$key]);
						endforeach;
					}	
        $update=  Orders::where('id',$orders_id)->update($data);
        if($update){
            
               return response()->json(['result' =>'Success']);
        }else{
               
              return response()->json(['result'=>'failed']);
        }
    }
    public function deleteOrders(Request $request)
{
        $id=$request->id;
		$data=array(
            'delete_status'=>2
         );
		$update=  Orders::where('id',$id)->update($data);
        if($update){
            
               return response()->json('Success');
        }else{
               
              return response()->json('failed');
        }
}
	public function getroleslist(Request $request)
    {
        $rolesList = Permission::where('active','=','1')->get();
        return response()->json($rolesList);
    }
public function addproductItems($orderid,$qty,$rate_value,$amount_value,$product )
    {
        $insert=Ordersitems::create([
            'product_id' =>$product,
            'qty' =>$qty,
			'order_id' =>$orderid,
            'rate' =>$rate_value,
			'amount' =>$amount_value
			]);
          if($insert!=""){
               //return response()->json(array('status'=>true,'message'=>'Promocode Added Successfully','data'=>$insert));  
          }
          else{
              //return response()->json(array('status'=>false,'message'=>'Issue While Adding Promocode','data'=>[])); 
          }
    }
public function getitemsdetails(Request $request)
    {
		 $sql = "SELECT A.id,B.name,A.order_id,A.product_id,A.qty,A.rate,A.amount
				FROM orders_item A
				inner JOIN products B ON  B.id = A.product_id
				where A.order_id = '".$request->orders_id."'";
				$ordersList = DB::select($sql);
        return response()->json($ordersList);
    }
public function defaulproductlist(Request $request)
    {
        $productList = product::all();
        return response()->json($productList);
    }	
public function updateproductItems($orders_id,$product,$qty,$rate_value,$amount_value,$items_id,$pro_id)
    {
		if($orders_id!=null || $orders_id!=""){
		$delete= Ordersitems::where('order_id',$orders_id)->delete();
		$insert=Ordersitems::create([
            'product_id' =>$product,
            'qty' =>$qty,
			'order_id' =>$orders_id,
            'rate' =>$rate_value,
			'amount' =>$amount_value
			]);
		}
    }
	public function getProductPrice(Request $request)
    {
        $ordersList = product::where('id',$request->product_id)->first();
        return response()->json($ordersList);
    }
	public function getratevalue(Request $request)
    {
        $rateList = Company::all();
        return response()->json($rateList[0]);
    }
	public function deleteproductlist(Request $request){
		$rateList = Company::all();
        $rolesList = Ordersitems::where('id','=',$request->id)->get();
		$ordersid_lenght = Ordersitems::where('order_id','=',$rolesList[0]->order_id)->count();
		//print_r($ordersid_lenght);exit();
		$ordersList = Orders::where('id','=',$rolesList[0]->order_id)->get();
		
	if($ordersid_lenght>1){
		$gross_amount = $ordersList[0]->gross_amount - $rolesList[0]->amount;
		$count1 = $gross_amount/100;
		$service_charge = $count1* $rateList[0]->service_charge_value;
		$count11 = $gross_amount/100;
		$vat_charge = $count11 * $rateList[0]->vat_charge_value;
		$net_amount = $gross_amount + $vat_charge + $service_charge;
		$data=array(
            'gross_amount' => $gross_amount,
			'service_charge' => $service_charge,
			'vat_charge' => $vat_charge,
			'net_amount' => $net_amount,
			'service_charge_rate' => $rateList[0]->service_charge_value,
			'vat_charge_rate' => $rateList[0]->vat_charge_value
        );
        $update=  Orders::where('id',$rolesList[0]->order_id)->update($data);
	}	
        $delete= Ordersitems::where('id',$request->id)->delete();
        if($delete){
            
               return response()->json('Success');
        }else{
               
              return response()->json('failed');
        }
    }
	public function getcountOrders(Request $request)
    {
        $ordersid_lenght = Orders::where('delete_status','=','1')->count();
        return response()->json($ordersid_lenght);
    }
}
