<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;
use App\Models\Customer;
use App\Models\Bank;
use Artisan;
use Schema;
use Excel;
use App\Exports\CustomerExport;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = DB::getSchemaBuilder()->getColumnListing('sm_customer');
        return view('Customer.index', compact('columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Artisan::call('cache:clear');
        $customer = Customer::find($id);
        return view('Customer.detail', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Artisan::call('cache:clear');
        $customer = Customer::find($id);
        $bank = Bank::all();
        return view('Customer.edit', compact('customer', 'bank'));
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
        $request->validate([
            'NumberCard' => 'required',
            'Bank' => 'required',
            'TypeCard' => 'required',
            'NameCustomer' => 'required',
            'PIC' => 'required',
            'AssignmentDate' => 'required',
            'ExpireDate' => 'required',
            'DateOfBirth' => 'required',
            'OpenDate' => 'required',
            'WODate' => 'required',
            'LastPayDate' => 'required',
            'LastPayment' => 'required',
            'LastTransactionDate' => 'required',
            'LastTransactionNominal' => 'required',
            'Limit' => 'required',
            'Principal' => 'required',
            'MinPay' => 'required',
            'OSBalance' => 'required',
            'Address1' => 'required',
            'Address2',
            'Address3',
            'Address4',
            'City' => 'required',
            'OfficeName' => 'required',
            'OfficeAddress1' => 'required',
            'OfficeAddress2',
            'OfficeAddress3',
            'OfficeAddress4',

            'Phone1' => 'required',
            'Phone2',
            'HomePhone1' => 'required',
            'HomePhone2',
            'OfficePhone1' => 'required',
            'OfficePhone2',
            'ECPhone1' => 'required',
            'ECPhone2',
            'OtherNumber',

            'ECName' => 'required',
            'ECName2',
            'StatusEC' => 'required',
            'StatusEC2',
            'MotherName' => 'required',
            'Sex' => 'required',
            'Email' => 'required',

            'VirtualAccount' => 'required',
            'VirtualAccountName' => 'required',
            'Komoditi' => 'required',
            'KomoditiType' => 'required',
            'Produsen' => 'required',
            'Model' => 'required',
            'LoanTerm' => 'required',
            'InstallmentAlreadyPaid' => 'required',
            'MonthlyPaymentNominal' => 'required', 

            'DPD' => 'required',
            'Bucket' => 'required',
            'BillingNoPenalty' => 'required',
            'DendaBelumDibayar' => 'required',
            'LastVisitDate' => 'required',
            'LastVisitResult' => 'required',
            'LastReport' => 'required',
            'LastVisitAddress' => 'required',
            'OTSOffer' => 'required',
            
            'OtherData1',
            'OtherData2',
            'OtherData3',
            'OtherData4',
            'OtherData5',
            'PermanentMessage'

        ]);

        $data = Customer::find($id);
        $data->update($request->all());
        return redirect()->route('customer_index')->with('Success', 'Data Customer Berhasil Diubah');
    }

    public function export(Request $request)
    {
        return Excel::download(new CustomerExport($request->Field,  
                                                  $request->Bank), 'Nasabah.xlsx');
    }

    //API

    public function getAll()
    {
        $customers = DB::table('sm_customer')->get();
        $data = (object)[
            'data' => $customers
        ];

        return $data;
    }

    public function api_delete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return response('Data Deleted', 200);
    }
}
