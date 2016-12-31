<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;

class OrdersController extends Controller
{
    private $orderModel;

    public function __construct(Order $orderModel) {
        $this->orderModel = $orderModel;
    }

    public function index()
    {
        $orders = $this->orderModel->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function update(Requests\OrderRequest $request, $id)
    {
        //dd($request);
        $this->orderModel->find($id)->update($request->all());
        //DB::connection()->enableQueryLog();
        //$queries = DB::getQueryLog();
        //print_r ($queries);

        return redirect()->route('admin.orders.index');
    }
}
