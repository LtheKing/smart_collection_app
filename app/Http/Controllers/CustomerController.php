<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use DB;
use App\Models\Customer;
use App\Models\Bank;
use App\Models\User;
use Artisan;
use Schema;
use Excel;
use App\Exports\CustomerExport;
use App\Imports\CustomerImport;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session = Session::all();
        // dd($session);
        $columns = DB::getSchemaBuilder()->getColumnListing('sm_customer');
        return view('Customer.index', compact('columns'));
    }

    public function index_spv()
    {
        $session = Session::all();
        // dd($session);
        $columns = DB::getSchemaBuilder()->getColumnListing('sm_customer');
        return view('Customer.user_spv.index', compact('columns'));
    }

    public function index_adm()
    {
        $session = Session::all();
        // dd($session);
        $columns = DB::getSchemaBuilder()->getColumnListing('sm_customer');
        return view('Customer.spadm_adm.index', compact('columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
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
        // $request->validate([
        //     'NumberCard' => 'required',
        //     'Bank' => 'required',
        //     'TypeCard' => 'required',
        //     'NameCustomer' => 'required',
        //     'PIC' => 'required',
        //     'AssignmentDate' => 'required',
        //     'ExpireDate' => 'required',
        //     'DateOfBirth' => 'required',
        //     'OpenDate' => 'required',
        //     'WODate' => 'required',
        //     'LastPayDate' => 'required',
        //     'LastPayment' => 'required',
        //     'LastTransactionDate' => 'required',
        //     'LastTransactionNominal' => 'required',
        //     'Limit' => 'required',
        //     'Principal' => 'required',
        //     'MinPay' => 'required',
        //     'OSBalance' => 'required',
        //     'Address1' => 'required',
        //     'Address2',
        //     'Address3',
        //     'Address4',
        //     'City' => 'required',
        //     'OfficeName' => 'required',
        //     'OfficeAddress1' => 'required',
        //     'OfficeAddress2',
        //     'OfficeAddress3',
        //     'OfficeAddress4',

        //     'Phone1' => 'required',
        //     'Phone2',
        //     'HomePhone1' => 'required',
        //     'HomePhone2',
        //     'OfficePhone1' => 'required',
        //     'OfficePhone2',
        //     'ECPhone1' => 'required',
        //     'ECPhone2',
        //     'OtherNumber',

        //     'ECName' => 'required',
        //     'ECName2',
        //     'StatusEC' => 'required',
        //     'StatusEC2',
        //     'MotherName' => 'required',
        //     'Sex' => 'required',
        //     'Email' => 'required',

        //     'VirtualAccount' => 'required',
        //     'VirtualAccountName' => 'required',
        //     'Komoditi' => 'required',
        //     'KomoditiType' => 'required',
        //     'Produsen' => 'required',
        //     'Model' => 'required',
        //     'LoanTerm' => 'required',
        //     'InstallmentAlreadyPaid' => 'required',
        //     'MonthlyPaymentNominal' => 'required', 

        //     'DPD' => 'required',
        //     'Bucket' => 'required',
        //     'BillingNoPenalty' => 'required',
        //     'DendaBelumDibayar' => 'required',
        //     'LastVisitDate' => 'required',
        //     'LastVisitResult' => 'required',
        //     'LastReport' => 'required',
        //     'LastVisitAddress' => 'required',
        //     'OTSOffer' => 'required',

        //     'OtherData1',
        //     'OtherData2',
        //     'OtherData3',
        //     'OtherData4',
        //     'OtherData5',
        //     'PermanentMessage'

        // ]);

        $request->validate([
            'NumberCard' => 'required',
            'NameCustomer' => 'required',
            'NameCustomer' => 'required',
            'Limit' => 'required',
            'OSBalance' => 'required',
            'Phone1' => 'required',
            'Address1' => 'required',
            'HomePhone1' => 'required',
            'OfficeAddress1' => 'required',
            'ECName' => 'required',
            'ECPhone1' => 'required',
            'LastPayDate' => 'required',
            'LastPayment' => 'required',
            'PermanentMessage' => 'required',
            'LastReport' => 'required',
            'Report' => 'required',
        ]);

        $data = Customer::find($id);
        $data->update($request->all());
        return redirect()->route('customer_index')->with('Success', 'Data Customer Berhasil Diubah');
    }

    public function export(Request $request)
    {
        return Excel::download(new CustomerExport(
            $request->Field,
            $request->Bank
        ), 'Nasabah.xlsx');
    }

    public function import(Request $request)
    {
        if (empty($request->file('file'))) {
            return back()->with('error', 'custom message');
        } else {
            $session = Session::all();
            $role = $session['role'];
            $username = $session['username'];
            $reqFile = $request->file('file');
            $fileName = $username . '_' . now()->toDateString() . '.' . $reqFile->getClientOriginalExtension();

            // Storage::put('public/files/'. $fileName, $reqFile, 'public');
            $pathToFile = $reqFile->store('public/files/' . $fileName);

            $import = new CustomerImport;
            // $res = Excel::import($import, $request->file('file'));
            $import->import($pathToFile); // we are using the trait importable in the xxxImport which allow us to handle it from the controller directly

            // dd($import->errors());
            // if($import->failures()->isNotEmpty()){
            //     $failures = $import->failures();
            //     dd($failures);
            //     return back()->with('error', $failures);
            // }

            // try {
            //     $import->import($pathToFile);
            // } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            //     $failures = $e->failures();
            //     $val;
            //     // $desk_id = '';
            //     foreach ($failures as $failure) {
            //         $failure->row(); // row that went wrong
            //         $failure->attribute(); // either heading key (if using heading row concern) or column index
            //         $failure->errors(); // Actual error messages from Laravel validator
            //         $val = $failure->values(); // The values of the row that has failed.
            //         // $desk_id .= $val['deskcoll_id'] . ', ';
            //         // dd($val['deskcoll_id']);
            //     }

            //     return back()->with('error', 'PIC dengan id : ' . $val['deskcoll_id'] . ' tidak ditemukan');
            // }  

            return back();
        }
    }

    public function bulkDeletePage() {
        return view('Customer.bulk_delete');
    }

    //API

    public function getAll()
    {
        $session = Session::all();
        $role = $session['role'];
        $username = $session['username'];

        // $role = 'Admin';
        // $username = 'admin';

        // $customers;
        // $data;

        $user = DB::table('users')
            ->where('role', $role)
            ->where('username', $username)
            ->get();

        switch ($role) {
            case 'Super Admin':
                $customers = DB::table('sm_customer')->whereNotNull('Deskcoll_id')->get();

                foreach ($customers as $cu) {
                    $pic = User::where('id', $cu->Deskcoll_id)->get();
                    if (count($pic) > 0) {
                        $picName = $pic[0]->name;
                        $spv = User::where('id', $pic[0]->id)->get();
                        $cu->PIC = $picName;
                        $cu->Supervisor = $spv[0]->name;
                    }
                }
                break;

            case 'Admin':
                $customers = DB::table('sm_customer')->where('IsDeletedByAdmin', '')
                    ->whereNotNull('Deskcoll_id')
                    ->get();

                foreach ($customers as $cu) {
                    $pic = User::where('id', $cu->Deskcoll_id)->get();
                    if (count($pic) > 0) {
                        $picName = $pic[0]->name;
                        $spv = User::where('id', $pic[0]->id)->get();
                        $cu->PIC = $picName;
                        $cu->Supervisor = $spv[0]->name;
                    }
                }

                break;

            case 'Supervisor':
                //JANGAN  LUPA PAKE KONDISI KALO NULL
                $deskcoll = DB::table('users')
                    ->where('supervisor_id', $user[0]->id)
                    ->get();

                if (count($deskcoll) == 0) {
                    return $deskcoll;
                }

                $customers = DB::table('sm_customer')
                    ->where('Deskcoll_id', $deskcoll[0]->id)
                    ->get();
                break;

            case 'User':
                $customers = DB::table('sm_customer')
                    ->where('Deskcoll_id', $user[0]->id)
                    ->get();
                break;
            default:
                $customers = DB::table('sm_customer')->get();
                break;
        }

        $data = (object)[
            'data' => $customers
        ];

        return $data;
    }

    public function api_delete($id)
    {
        $session = Session::all();
        $role = $session['role'];

        if ($role == 'Admin') {
            Customer::where('id', $id)->update([
                'IsDeletedByAdmin' => 1
            ]);

            return response('Data Deleted', 200);
        }

        $customer = Customer::find($id);
        $customer->delete();
        return response('Data Deleted', 200);
    }

    public function select_by_role($role, $username)
    {
        $customers = DB::table('users')
            ->where('role', $role)
            ->where('username', $username)
            ->get();

        $data = (object)[
            'data' => $customers
        ];

        return $customers[0]->id;
    }

    public function getDataPlusSupervisor()
    {
    }

    //testing
    public function test_detail_customer($id)
    {
        Artisan::call('cache:clear');
        $customer = Customer::find($id);
        return view('TestPage.detail_customer', compact('customer'));
    }

    public function getPICNameById($id)
    {
        Artisan::call('cache:clear');
        $user = User::where('id', $id)->get();

        if (count($user) > 0) {
            return response($user[0]->name, 200);
        } else {
            return response('ga ada', 200);
        }
    }

    public function customResponseImport(Request $request)
    {
        $res = Excel::import(new CustomerImport, $request->file('file'));
        dd($res);
        return response($res, 200);
    }

    public function testCustomData()
    {
        $cust = DB::table('sm_customer')->whereNotNull('Deskcoll_id')->get();

        foreach ($cust as $cu) {
            $pic = User::where('id', $cu->Deskcoll_id)->get();
            if (count($pic) > 0) {
                $picName = $pic[0]->name;
                $spv = User::where('id', $pic[0]->id)->get();
                $cu->PIC = $picName;
                $cu->Supervisor = $spv[0]->name;
            }
        }

        return response($cust, 200);
    }
}
