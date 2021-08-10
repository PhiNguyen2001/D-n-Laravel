<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(){
        $ListInvoice = Invoice::latest()->paginate(10);
        $ListInvoice->load(['user']);
        return view('admin/invoices/index', ['data'=>$ListInvoice]);
    }
    public function show($id){
        $ListInvoice= Invoice::find($id);
        $ListInvoice->load('invoiceDetails');
        return view('admin/invoices/invoiceDetails', ['data'=>$ListInvoice]);
    }
    public function delete($id){
        Invoice::destroy($id);
        return redirect()->back();
    }
}