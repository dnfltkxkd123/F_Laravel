<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryData;
use App\Donate;

class DeliveryDataController extends Controller
{
    //

    public function insertData(Request $request){
    	$name = $request -> input('name');
    	$post = $request -> input('post');
    	$addr = ($request -> input('addr1')).' '.($request -> input('addr2'));
    	$phone = ($request -> input('phone1')).'-'.($request -> input('phone2')).'-'.($request -> input('phone3'));
    	$tel = ($request -> input('tel1')).'-'.($request -> input('tel2')).'-'.($request -> input('tel3'));
    	$num = $request -> input('num');
        $buyer = $request -> input('buyer');
        $seller = $request -> input('seller');
        /*
        $data = [
            'name' => $name,
            'post' => $post,
            'addr' => $addr,
            'phone' => $phone,
            'tel' => $tel,
            'num' => $num,
            'buyer' => $buyer,
            'seller' => $seller
        ];
        */
        if($name &&($request -> input('addr1')) && ($request -> input('addr2')) && ($request -> input('phone1')) && ($request -> input('phone2')) && ($request -> input('phone3'))&& ($request -> input('tel1')) && ($request -> input('tel2')) && ($request -> input('tel3'))){
            $data=[
                'sale_status'=>'sold_out',
                'buyer' => $buyer
                ];
            Donate::where('num','=',$num)->update($data);
            DeliveryData::insertData($name,$post,$addr,$phone,$tel,$num,$buyer,$seller);
            ?>
                <script type="text/javascript">
                    location.href='donateBook';
                </script>
            <?php
        }else{
            ?>
                <script type="text/javascript">
                    alert('빈칸을 모두 입력하세요!');
                    history.back();
                </script>
            <?php
        }
    	
    }

    public function getProductNum(Request $request){
        $product_num = $request -> input('num');
        $datas =DeliveryData::getProductNum($product_num);
        return $datas;
    }

    public function getInsertInvoice(Request $request){
        $datas= $this->getProductNum($request);
        $product_datas = Donate::getData($request -> input('num'));
        return view('기말과제.insertInvoiceForm')->with('datas',$datas)->with('product_datas',$product_datas);
    }

    public function insertInvoice(Request $request){
        $product_num = $request -> input('product_num');
        $code = $request -> input('code');
        $invoice_number = $request -> input('invoice_number');
        
        DeliveryData::insertInvoiceNumber($product_num,$code,$invoice_number);
    }

    public function getDeliveryData(Request $request){
        $datas= $this->getProductNum($request);
        return view('기말과제.delivery_data')->with('datas',$datas);
    }

    public function getInvoice(Request $request){
        $product_num = $request -> input('num');
        $data =DeliveryData::getProductNum($product_num);
        $invoice_number = $data[0]->invoice_number;
        $code = $data[0]->code;
        return view('기말과제.TestApi') ->with('invoice_number',$invoice_number)->with('code',$code);
    }
}
