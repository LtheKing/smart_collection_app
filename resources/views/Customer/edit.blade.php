@extends('layout')

@section('section_menu')
    @parent

@endsection

@section('content')
@if(session('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1 class="h1">Edit Data Customer</h1>
    <a class="btn btn-secondary mb-3 mt-3" href="{{ route('customer_index') }}"> Kembali </a>

    <form action="{{ route('customer_update', $customer->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')

        {{-- ROW 1 --}}
        <div class="row">
            
            {{-- COLUMN 1 --}}
            <div class="col">
                <div class="mb-3" id="div_NumberCard">
                    <label for="inputNumberCard" class="form-label">NumberCard</label>
                    <input type="text" class="form-control" id="inputNumberCard" name="NumberCard" value="{{ old('NumberCard', $customer->NumberCard) }}">
                </div>

                <div class="mb-3" id="div_NameCustomer">
                    <label for="inputNameCustomer" class="form-label">Name Customer</label>
                    <input type="text" class="form-control" id="inputNameCustomer" name="NameCustomer" value="{{ old('NameCustomer', $customer->NameCustomer) }}">
                </div>

                <div class="mb-3" id="div_OpenDate">
                    <label for="inputOpenDate" class="form-label">Open Date</label>
                    <input type="date" class="form-control" id="inputOpenDate" name="OpenDate" value="{{ old('OpenDate', $customer->OpenDate) }}">
                </div>

                <div class="mb-3" id="div_Limit">
                    <label for="inputLimit" class="form-label">Limit</label>
                    <input type="text" class="form-control" id="inputLimit" name="Limit" value="{{ old('Limit', $customer->Limit) }}">
                </div>

                <div class="mb-3" id="div_OSBalance">
                    <label for="inputOSBalance" class="form-label">OSBalance</label>
                    <input type="text" class="form-control" id="inputOSBalance" name="OSBalance" value="{{ old('OSBalance', $customer->OSBalance) }}">
                </div>

                <div class="mb-3" id="div_Phone1">
                    <label for="inputPhone1" class="form-label">Phone 1</label>
                    <input type="text" class="form-control" id="inputPhone1" name="Phone1" value="{{ old('Phone1', $customer->Phone1) }}">
                </div>

                <div class="mb-3" id="div_Address1">
                    <label for="inputAddress1" class="form-label">Address 1</label>
                    <textarea class="form-control" id="inputAddress1" name="Address1"> {{ old('Address1', $customer->Address1) }} </textarea>
                </div>

                <div class="mb-3" id="div_HomePhone1">
                    <label for="inputHomePhone1" class="form-label">Telepon Rumah 1</label>
                    <input type="text" class="form-control" id="inputHomePhone1" name="HomePhone1" value="{{ old('HomePhone1', $customer->HomePhone1) }}">
                </div>

                <div class="mb-3" id="div_OfficeAddress1">
                    <label for="inputOfficeAddress1" class="form-label">Office Address 1</label>
                    <textarea class="form-control" id="inputOfficeAddress1" name="OfficeAddress1"> {{ old('OfficeAddress1', $customer->OfficeAddress1) }} </textarea>
                </div>

                <div class="mb-3" id="div_ECName">
                    <label for="inputECName" class="form-label">EC Name</label>
                    <input type="text" class="form-control" id="inputECName" name="ECName" value="{{ old('ECName', $customer->ECName) }}">
                </div>

                <div class="mb-3" id="div_ECPhone1">
                    <label for="inputECPhone1" class="form-label">EC Phone 1</label>
                    <input type="text" class="form-control" id="inputECPhone1" name="ECPhone1" value="{{ old('ECPhone1', $customer->ECPhone1) }}">
                </div>

                <div class="mb-3" id="div_LastPayDate">
                    <label for="inputLastPayDate" class="form-label">LastPay Date</label>
                    <input type="date" class="form-control" id="inputLastPayDate" name="LastPayDate" value="{{ old('LastPayDate', $customer->LastPayDate) }}">
                </div>

                <div class="mb-3" id="div_LastPayment">
                    <label for="inputLastPayment" class="form-label">Last Payment</label>
                    <input type="text" class="form-control" id="inputLastPayment" name="LastPayment" value="{{ old('LastPayment', $customer->LastPayment) }}">
                </div>

                {{-- PERMANENT MESSAGE --}}
                <div class="mb-3" id="div_PermanentMessage">
                    <label for="inputPermanentMessage" class="form-label">Permanent Message</label>
                    <textarea class="form-control" id="inputPermanentMessage" name="PermanentMessage"> {{ old('PermanentMessage', $customer->PermanentMessage) }} </textarea>
                </div>
                
                <div class="mb-3" id="div_LastReport">
                    <label for="inputLastReport" class="form-label">LastReport</label>
                    <textarea class="form-control" id="inputLastReport" name="LastReport"> {{ old('LastReport', $customer->LastReport) }} </textarea>
                </div>
                
                <div class="mb-3" id="div_Report">
                    <label for="inputReport" class="form-label">Report</label>
                    <textarea class="form-control" id="inputReport" name="Report"> {{ old('Report', $customer->Report) }} </textarea>
                </div>

                <button class="btn btn-warning">More</button>
            </div>


            {{-- COLUMN 2 --}}            
            <div class="col" hidden="true">
                <div class="mb-3" id="div_Bank">
                    <label for="inputBank" class="form-label">Bank</label>
                    <select class="form-control" name="Bank" id="inputBank">
                        @foreach ($bank as $item)
                            <option value="{{ $item->Nama }}">{{ $item->Nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3" id="div_TypeCard">
                    <label for="inputTypeCard" class="form-label">Type Card</label>
                    <select name="TypeCard" id="inputTypeCard" class="form-control">
                        <option value="PLATINUM VISA EMAS">PLATINUM VISA EMAS</option>
                        <option value="GOLD VISA">GOLD VISA</option>
                        <option value="CAREFOUR BLUE VISA">CAREFOUR BLUE VISA</option>
                        <option value="PLATINUM">PLATINUM</option>
                        <option value="GOLD MASTER CARD">GOLD MASTER CARD</option>
                        <option value="CAREFOUR VISA">CAREFOUR VISA</option>
                        <option value="PLATINUM MASTER">PLATINUM MASTER</option>
                    </select>
                </div>            

                <div class="mb-3" id="div_PIC">
                    <label for="inputPIC" class="form-label">PIC</label>
                    <input type="text" class="form-control" id="inputPIC" name="PIC" value="{{ old('PIC', $customer->PIC) }}">
                </div>

                <div class="mb-3" id="div_AssignmentDate">
                    <label for="inputAssignmentDate" class="form-label">Assignment Date</label>
                    <input type="date" class="form-control" id="inputAssignmentDate" name="AssignmentDate" value="{{ old('AssignmentDate', $customer->AssignmentDate) }}">
                </div>

                <div class="mb-3" id="div_ExpireDate">
                    <label for="inputExpireDate" class="form-label">Expire Date</label>
                    <input type="date" class="form-control" id="inputExpireDate" name="ExpireDate" value="{{ old('ExpireDate', $customer->ExpireDate) }}">
                </div>

                <div class="mb-3" id="div_DateOfBirth">
                    <label for="inputDateOfBirth" class="form-label">DateOfBirth</label>
                    <input type="date" class="form-control" id="inputDateOfBirth" name="DateOfBirth" value="{{ old('DateOfBirth', $customer->DateOfBirth) }}">
                </div>                

                <div class="mb-3" id="div_WODate">
                    <label for="inputWODate" class="form-label">WO Date</label>
                    <input type="date" class="form-control" id="inputWODate" name="WODate" value="{{ old('WODate', $customer->WODate) }}">
                </div>

            </div>

            {{-- COLUMN 3 --}}
            <div class="col" hidden="true">
                <div class="mb-3" id="div_LastTransactionDate">
                    <label for="inputLastTransactionDate" class="form-label">Last Transaction Date</label>
                    <input type="date" class="form-control" id="inputLastTransactionDate" name="LastTransactionDate" value="{{ old('LastTransactionDate', $customer->LastTransactionDate) }}">
                </div>

                <div class="mb-3" id="div_LastTransactionNominal">
                    <label for="inputLastTransactionNominal" class="form-label">Last Transaction Nominal</label>
                    <input type="text" class="form-control" id="inputLastTransactionNominal" name="LastTransactionNominal" value="{{ old('LastTransactionNominal', $customer->LastTransactionNominal) }}">
                </div>

                <div class="mb-3" id="div_Principal">
                    <label for="inputPrincipal" class="form-label">Principal</label>
                    <input type="text" class="form-control" id="inputPrincipal" name="Principal" value="{{ old('Principal', $customer->Principal) }}">
                </div>

                <div class="mb-3" id="div_MinPay">
                    <label for="inputMinPay" class="form-label">MinPay</label>
                    <input type="text" class="form-control" id="inputMinPay" name="MinPay" value="{{ old('MinPay', $customer->MinPay) }}">
                </div>

                <div class="mb-3" id="div_Address2">
                    <label for="inputAddress2" class="form-label">Address 2</label>
                    <textarea class="form-control" id="inputAddress2" name="Address2"> {{ old('Address2', $customer->Address2) }} </textarea>
                </div>

                <div class="mb-3" id="div_Address3">
                    <label for="inputAddress3" class="form-label">Address 3</label>
                    <textarea class="form-control" id="inputAddress3" name="Address3"> {{ old('Address3', $customer->Address3) }} </textarea>
                </div>

                <div class="mb-3" id="div_Address4">
                    <label for="inputAddress4" class="form-label">Address 4</label>
                    <textarea class="form-control" id="inputAddress4" name="Address4"> {{ old('Address4', $customer->Address4) }} </textarea>
                </div>

                <div class="mb-3" id="div_city">
                    <label for="inputcity" class="form-label">City</label>
                    <input type="text" class="form-control" id="inputcity" name="City" value="{{ old('city', $customer->City) }}">
                </div>
            </div>

            {{-- COLUMN 4 --}}

            <div class="col" hidden="true">
                <div class="mb-3" id="div_OfficeName">
                    <label for="inputOfficeName" class="form-label">Office Name</label>
                    <input type="text" class="form-control" id="inputOfficeName" name="OfficeName" value="{{ old('OfficeName', $customer->OfficeName) }}">
                </div>

                <div class="mb-3" id="div_OfficeAddress2">
                    <label for="inputOfficeAddress2" class="form-label">Office Address 2</label>
                    <textarea class="form-control" id="inputOfficeAddress2" name="OfficeAddress2"> {{ old('OfficeAddress2', $customer->OfficeAddress2) }} </textarea>
                </div>

                <div class="mb-3" id="div_OfficeAddress3">
                    <label for="inputOfficeAddress3" class="form-label">Office Address 3</label>
                    <textarea class="form-control" id="inputOfficeAddress3" name="OfficeAddress3"> {{ old('OfficeAddress3', $customer->OfficeAddress3) }} </textarea>
                </div>

                <div class="mb-3" id="div_OfficeAddress4">
                    <label for="inputOfficeAddress4" class="form-label">Office Address 4</label>
                    <textarea class="form-control" id="inputOfficeAddress4" name="OfficeAddress4"> {{ old('OfficeAddress4', $customer->OfficeAddress4) }} </textarea>
                </div>
            </div>

            {{-- COLUMN 5 --}}
            <div class="col" hidden="true">
                <div class="mb-3" id="div_Phone2">
                    <label for="inputPhone2" class="form-label">Phone 2</label>
                    <input type="text" class="form-control" id="inputPhone2" name="Phone2" value="{{ old('Phone2', $customer->Phone2) }}">
                </div>

                <div class="mb-3" id="div_HomePhone2">
                    <label for="inputHomePhone2" class="form-label">HomePhone 2</label>
                    <input type="text" class="form-control" id="inputHomePhone2" name="HomePhone2" value="{{ old('HomePhone2', $customer->HomePhone2) }}">
                </div>

                <div class="mb-3" id="div_OfficePhone1">
                    <label for="inputOfficePhone1" class="form-label">Office Phone 1</label>
                    <input type="text" class="form-control" id="inputOfficePhone1" name="OfficePhone1" value="{{ old('OfficePhone1', $customer->OfficePhone1) }}">
                </div>

                <div class="mb-3" id="div_OfficePhone2">
                    <label for="inputOfficePhone2" class="form-label">Office Phone 2</label>
                    <input type="text" class="form-control" id="inputOfficePhone2" name="OfficePhone2" value="{{ old('OfficePhone2', $customer->OfficePhone2) }}">
                </div>

                <div class="mb-3" id="div_ECPhone2">
                    <label for="inputECPhone2" class="form-label">EC Phone 2</label>
                    <input type="text" class="form-control" id="inputECPhone2" name="ECPhone2" value="{{ old('ECPhone2', $customer->ECPhone2) }}">
                </div>

                <div class="mb-3" id="div_OtherNumber">
                    <label for="inputOtherNumber" class="form-label">Other Number</label>
                    <input type="text" class="form-control" id="inputOtherNumber" name="OtherNumber" value="{{ old('OtherNumber', $customer->OtherNumber) }}">
                </div>
            </div>
        </div>

        {{-- ROW 2 --}}

        <div class="row" hidden="true">
            {{-- COLUMN 1 --}}
            <div class="col">
                <div class="mb-3" id="div_ECName2">
                    <label for="inputECName2" class="form-label">EC Name 2</label>
                    <input type="text" class="form-control" id="inputECName2" name="ECName2" value="{{ old('ECName2', $customer->ECName2) }}">
                </div>

                <div class="mb-3" id="div_StatusEC">
                    <label for="inputStatusEC" class="form-label">Status EC</label>
                    <input type="text" class="form-control" id="inputStatusEC" name="StatusEC" value="{{ old('StatusEC', $customer->StatusEC) }}">
                </div>

                <div class="mb-3" id="div_StatusEC2">
                    <label for="inputStatusEC2" class="form-label">Status EC 2</label>
                    <input type="text" class="form-control" id="inputStatusEC2" name="StatusEC2" value="{{ old('StatusEC2', $customer->StatusEC2) }}">
                </div>

                <div class="mb-3" id="div_MotherName">
                    <label for="inputMotherName" class="form-label">Mother Name</label>
                    <input type="text" class="form-control" id="inputMotherName" name="MotherName" value="{{ old('MotherName', $customer->MotherName) }}">
                </div>

                <div class="mb-3" id="div_Sex">
                    <label for="inputSex" class="form-label">Sex</label>
                    <select name="Sex" id="inputSex" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="mb-3" id="div_Email">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail" name="Email" value="{{ old('Email', $customer->Email) }}">
                </div>
            </div>

            <div class="col">
                <div class="mb-3" id="div_VirtualAccount">
                    <label for="inputVirtualAccount" class="form-label">Virtual Account</label>
                    <input type="number" class="form-control" id="inputVirtualAccount" name="VirtualAccount" value="{{ old('VirtualAccount', $customer->VirtualAccount) }}">
                </div>

                <div class="mb-3" id="div_VirtualAccountName">
                    <label for="inputVirtualAccountName" class="form-label">Virtual Account Name</label>
                    <input type="text" class="form-control" id="inputVirtualAccountName" name="VirtualAccountName" value="{{ old('VirtualAccountName', $customer->VirtualAccountName) }}">
                </div>

                <div class="mb-3" id="div_Komoditi">
                    <label for="inputKomoditi" class="form-label">Komoditi</label>
                    <input type="text" class="form-control" id="inputKomoditi" name="Komoditi" value="{{ old('Komoditi', $customer->Komoditi) }}">
                </div>

                <div class="mb-3" id="div_KomoditiType">
                    <label for="inputKomoditiType" class="form-label">Komoditi Type</label>
                    <input type="text" class="form-control" id="inputKomoditiType" name="KomoditiType" value="{{ old('KomoditiType', $customer->KomoditiType) }}">
                </div>

                <div class="mb-3" id="div_Produsen">
                    <label for="inputProdusen" class="form-label">Produsen</label>
                    <input type="text" class="form-control" id="inputProdusen" name="Produsen" value="{{ old('Produsen', $customer->Produsen) }}">
                </div>

                <div class="mb-3" id="div_Model">
                    <label for="inputModel" class="form-label">Model</label>
                    <input type="text" class="form-control" id="inputModel" name="Model" value="{{ old('Model', $customer->Model) }}">
                </div>

                <div class="mb-3" id="div_LoanTerm">
                    <label for="inputLoanTerm" class="form-label">Loan Term</label>
                    <input type="text" class="form-control" id="inputLoanTerm" name="LoanTerm" value="{{ old('LoanTerm', $customer->LoanTerm) }}">
                </div>

                <div class="mb-3" id="div_InstallmentAlreadyPaid">
                    <label for="inputInstallmentAlreadyPaid" class="form-label">Installment Already Paid</label>
                    <input type="text" class="form-control" id="inputInstallmentAlreadyPaid" name="InstallmentAlreadyPaid" value="{{ old('InstallmentAlreadyPaid', $customer->InstallmentAlreadyPaid) }}">
                </div>

                <div class="mb-3" id="div_MonthlyPaymentNominal">
                    <label for="inputMonthlyPaymentNominal" class="form-label">Monthly Payment Nominal</label>
                    <input type="text" class="form-control" id="inputMonthlyPaymentNominal" name="MonthlyPaymentNominal" value="{{ old('MonthlyPaymentNominal', $customer->MonthlyPaymentNominal) }}">
                </div>
            </div>

            <div class="col">
                <div class="mb-3" id="div_DPD">
                    <label for="inputDPD" class="form-label">DPD</label>
                    <input type="number" class="form-control" id="inputDPD" name="DPD" value="{{ old('DPD', $customer->DPD) }}">
                </div>

                <div class="mb-3" id="div_Bucket">
                    <label for="inputBucket" class="form-label">Bucket</label>
                    <input type="text" class="form-control" id="inputBucket" name="Bucket" value="{{ old('Bucket', $customer->Bucket) }}">
                </div>

                <div class="mb-3" id="div_BillingNoPenalty">
                    <label for="inputBillingNoPenalty" class="form-label">Billing No Penalty</label>
                    <input type="text" class="form-control" id="inputBillingNoPenalty" name="BillingNoPenalty" value="{{ old('BillingNoPenalty', $customer->BillingNoPenalty) }}">
                </div>

                <div class="mb-3" id="div_DendaBelumDibayar">
                    <label for="inputDendaBelumDibayar" class="form-label">Denda Belum Dibayar</label>
                    <input type="text" class="form-control" id="inputDendaBelumDibayar" name="DendaBelumDibayar" value="{{ old('DendaBelumDibayar', $customer->DendaBelumDibayar) }}">
                </div>

                <div class="mb-3" id="div_LastVisitDate">
                    <label for="inputLastVisitDate" class="form-label">Last Visit Date</label>
                    <input type="text" class="form-control" id="inputLastVisitDate" name="LastVisitDate" value="{{ old('LastVisitDate', $customer->LastVisitDate) }}">
                </div>

                <div class="mb-3" id="div_LastVisitResult">
                    <label for="inputLastVisitResult" class="form-label">Last Visit Result</label>
                    <input type="text" class="form-control" id="inputLastVisitResult" name="LastVisitResult" value="{{ old('LastVisitResult', $customer->LastVisitResult) }}">
                </div>

                <div class="mb-3" id="div_LastVisitAddress">
                    <label for="inputLastVisitAddress" class="form-label">Last Visit Address</label>
                    <textarea class="form-control" id="inputLastVisitAddress" name="LastVisitAddress"> {{ old('LastVisitAddress', $customer->LastVisitAddress) }} </textarea>
                </div>

                <div class="mb-3" id="div_OTSOffer">
                    <label for="inputOTSOffer" class="form-label">OTS Offer</label>
                    <input type="text" class="form-control" id="inputOTSOffer" name="OTSOffer" value="{{ old('OTSOffer', $customer->OTSOffer) }}">
                </div>
            </div>

            <div class="col">
                <div class="mb-3" id="div_OtherData1">
                    <label for="inputOtherData1" class="form-label">Other Data 1</label>
                    <input type="text" class="form-control" id="inputOtherData1" name="OtherData1" value="{{ old('OtherData1', $customer->OtherData1) }}">
                </div>

                <div class="mb-3" id="div_OtherData2">
                    <label for="inputOtherData2" class="form-label">Other Data 2</label>
                    <input type="text" class="form-control" id="inputOtherData2" name="OtherData2" value="{{ old('OtherData2', $customer->OtherData2) }}">
                </div>

                <div class="mb-3" id="div_OtherData3">
                    <label for="inputOtherData3" class="form-label">Other Data 3</label>
                    <input type="text" class="form-control" id="inputOtherData3" name="OtherData3" value="{{ old('OtherData3', $customer->OtherData3) }}">
                </div>

                <div class="mb-3" id="div_OtherData4">
                    <label for="inputOtherData4" class="form-label">Other Data 4</label>
                    <input type="text" class="form-control" id="inputOtherData4" name="OtherData4" value="{{ old('OtherData4', $customer->OtherData4) }}">
                </div>

                <div class="mb-3" id="div_OtherData5">
                    <label for="inputOtherData5" class="form-label">Other Data 5</label>
                    <input type="text" class="form-control" id="inputOtherData5" name="OtherData5" value="{{ old('OtherData5', $customer->OtherData5) }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-2 mb-3">Submit</button>
    </form>
@endsection