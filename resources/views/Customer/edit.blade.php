@extends('layout')

@section('section_menu')
    @parent
@endsection

@section('content')
    @if (session('error'))
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

    @if (session()->get('role') == 'Supervisor' || session()->get('role') == 'User')
        <a class="btn btn-secondary mb-3 mt-3" href="{{ route('customer_index_spv') }}"> Kembali </a>
    @endif

    @if (session()->get('role') == 'Super Admin' || session()->get('role') == 'Admin')
        <a class="btn btn-secondary mb-3 mt-3" href="{{ route('customer_index_adm') }}"> Kembali </a>
    @endif

    <form action="{{ route('customer_update', $customer->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- ROW 1 --}}
        <div class="row">

            {{-- COLUMN 1.1 --}}
            <div class="col">

                {{-- ROW 1.1.1 --}}
                <div class="row">

                    {{-- COLUMN 1.1.1.1 --}}
                    <div class="col">
                        <div class="mb-3" id="div_NumberCard">
                            <label for="inputNumberCard" class="form-label">NumberCard</label>
                            <input type="text" class="form-control" id="inputNumberCard" name="NumberCard"
                                value="{{ old('NumberCard', $customer->NumberCard) }}">
                        </div>

                        <div class="mb-3" id="div_NameCustomer">
                            <label for="inputNameCustomer" class="form-label">Name Customer</label>
                            <input type="text" class="form-control" id="inputNameCustomer" name="NameCustomer"
                                value="{{ old('NameCustomer', $customer->NameCustomer) }}">
                        </div>

                        <div class="mb-3" id="div_OpenDate">
                            <label for="inputOpenDate" class="form-label">Open Date</label>
                            <input type="date" class="form-control" id="inputOpenDate" name="OpenDate"
                                value="{{ old('OpenDate', $customer->OpenDate) }}">
                        </div>

                        <div class="mb-3" id="div_Limit">
                            <label for="inputLimit" class="form-label">Limit</label>
                            <input type="text" class="form-control" id="inputLimit" name="Limit"
                                value="{{ old('Limit', $customer->Limit) }}">
                        </div>

                        <div class="mb-3" id="div_OSBalance">
                            <label for="inputOSBalance" class="form-label">OSBalance</label>
                            <input type="text" class="form-control" id="inputOSBalance" name="OSBalance"
                                value="{{ old('OSBalance', $customer->OSBalance) }}">
                        </div>

                        <div class="input-group mb-3" id="div_Phone1">
                            <label for="inputPhone1" class="form-label" style="margin: auto;">Phone 1</label>
                            <input type="text" class="form-control" id="inputPhone1" name="Phone1" style="margin-left: 0.5cm;"
                                value="{{ old('Phone1', $customer->Phone1) }}">

                            <div class="input-group-append">
                                <a href="tel:{{ $customer->Phone1 }}" class="btn btn-danger">call</a>
                            </div>
                        </div>

                        <div class="mb-3" id="div_PTPDate">
                            <label for="inputPTPDate" class="form-label">PTP Date</label>
                            <input type="date" class="form-control" id="inputPTPDate" name="PTPDate"
                                value="{{ old('PTPDate', $customer->PTPDate) }}">
                        </div>

                        <div class="mb-3" id="div_PTPAmount">
                            <label for="inputPTPAmount" class="form-label">PTP Amount</label>
                            <input type="number" class="form-control" id="inputPTPAmount" name="PTPAmount"
                                value="{{ old('PTPAmount', $customer->PTPAmount) }}">
                        </div>
                    </div>

                    {{-- COLUMN 1.1.1.2 --}}
                    <div class="col">
                        <div class="mb-3" id="div_Address1">
                            <label for="inputAddress1" class="form-label">Address 1</label>
                            <textarea class="form-control" id="inputAddress1" name="Address1"> {{ old('Address1', $customer->Address1) }} </textarea>
                        </div>

                        <div class="input-group mb-3" id="div_HomePhone1">
                            <label for="inputHomePhone1" class="form-label" style="margin: auto;">Telepon Rumah 1</label>
                            <input type="text" class="form-control" id="inputHomePhone1" name="HomePhone1"
                                value="{{ old('HomePhone1', $customer->HomePhone1) }}" style="margin-left: 0.5cm;">
                        
                            <div class="input-group-append">
                                <a href="tel:{{ $customer->HomePhone1 }}" class="btn btn-danger">call</a>
                            </div>
                        </div>

                        <div class="mb-3" id="div_OfficeAddress1">
                            <label for="inputOfficeAddress1" class="form-label">Office Address 1</label>
                            <textarea class="form-control" id="inputOfficeAddress1" name="OfficeAddress1"> {{ old('OfficeAddress1', $customer->OfficeAddress1) }} </textarea>
                        </div>

                        <div class="mb-3" id="div_ECName">
                            <label for="inputECName" class="form-label">EC Name</label>
                            <input type="text" class="form-control" id="inputECName" name="ECName"
                                value="{{ old('ECName', $customer->ECName) }}">
                        </div>

                        <div class="input-group mb-3" id="div_ECPhone1">
                            <label for="inputECPhone1" class="form-label" style="margin: auto;">EC Phone 1</label>
                            <input type="text" class="form-control" id="inputECPhone1" name="ECPhone1"
                                value="{{ old('ECPhone1', $customer->ECPhone1) }}" style="margin-left: 0.5cm;">
                            
                            <div class="input-group-append">
                                <a href="tel:{{ $customer->ECPhone1 }}" class="btn btn-danger">call</a>
                            </div>
                        </div>

                        <div class="mb-3" id="div_ReportDate">
                            <label for="inputReportDate" class="form-label">Report Date</label>
                            <input type="date" class="form-control" id="inputReportDate" name="ReportDate"
                                value="{{ old('ReportDate', $customer->ReportDate) }}">
                        </div>

                        <div class="mb-3" id="div_PaidDate">
                            <label for="inputPaidDate" class="form-label">Paid Date</label>
                            <input type="date" class="form-control" id="inputPaidDate" name="PaidDate"
                                value="{{ old('PaidDate', $customer->PaidDate) }}">
                        </div>

                        <div class="mb-3" id="div_PaidAmount">
                            <label for="inputPaidAmount" class="form-label">Paid Amount</label>
                            <input type="Amount" class="form-control" id="inputPaidAmount" name="PaidAmount"
                                value="{{ old('PaidAmount', $customer->PaidAmount) }}">
                        </div>
                    </div>

                    {{-- COLUMN 1.1.1.3 --}}
                    <div class="col">
                        <div class="mb-3" id="div_LastPayDate">
                            <label for="inputLastPayDate" class="form-label">LastPay Date</label>
                            <input type="date" class="form-control" id="inputLastPayDate" name="LastPayDate"
                                value="{{ old('LastPayDate', $customer->LastPayDate) }}">
                        </div>

                        <div class="mb-3" id="div_LastPayment">
                            <label for="inputLastPayment" class="form-label">Last Payment</label>
                            <input type="text" class="form-control" id="inputLastPayment" name="LastPayment"
                                value="{{ old('LastPayment', $customer->LastPayment) }}">
                        </div>

                        <div class="mb-3" id="div_PermanentMessage">
                            <label for="inputPermanentMessage" class="form-label">Permanent Message</label>
                            <textarea class="form-control" id="inputPermanentMessage" name="PermanentMessage"> {{ old('PermanentMessage', $customer->PermanentMessage) }} </textarea>
                        </div>

                        <div class="mb-3" id="div_LastReport">
                            <label for="inputLastReport" class="form-label">Last Report</label>
                            <textarea class="form-control" id="inputLastReport" name="LastReport"> {{ old('LastReport', $customer->LastReport) }} </textarea>
                        </div>

                        <div class="mb-3" id="div_Report">
                            <label for="inputReport" class="form-label">Report</label>
                            <textarea class="form-control" id="inputReport" name="Report"> {{ old('Report', $customer->Report) }} </textarea>
                        </div>

                        <div class="mb-3" id="div_Action">
                            <label for="inputAction" class="form-label">Action</label>
                            <select name="Action" id="inputAction" class="form-control">
                                <?php
                                    $val = ['VALID', 'PROSPEK', 'PTP', 'RUTIN', 'BP', 'INVESTIGASI', 'NOANS', 'LUNAS', 'SKIP', 'HOLD'];
                                ?>

                                @foreach ($val as $item)
                                    <option value="{{ $item }}"
                                        {{ $customer->Action == $item ? 'selected' : '' }}>{{ $item }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <hr class="hr" hidden="true" />
        {{-- ROW 2 --}}
        <div class="row" id="row-2" hidden="true">

            {{-- COLUMN 2.1 --}}
            <div class="col" id="column-2">

                {{-- ROW 2.1.1 --}}
                <div class="row">

                    {{-- COLUMN 2.1.1.1 --}}
                    <div class="col">
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
                    </div>

                    {{-- COLUMN 2.1.1.2 --}}
                    <div class="col">
                        <div class="mb-3" id="div_PIC">
                            <label for="inputPIC" class="form-label">PIC</label>
                            <input type="text" class="form-control" id="inputPIC" name="PIC"
                                value="{{ old('PIC', $customer->PIC) }}">
                        </div>

                        <div class="mb-3" id="div_AssignmentDate">
                            <label for="inputAssignmentDate" class="form-label">Assignment Date</label>
                            <input type="date" class="form-control" id="inputAssignmentDate" name="AssignmentDate"
                                value="{{ old('AssignmentDate', $customer->AssignmentDate) }}">
                        </div>
                    </div>

                    {{-- COLUMN 2.1.1.3 --}}
                    <div class="col">
                        <div class="mb-3" id="div_ExpireDate">
                            <label for="inputExpireDate" class="form-label">Expire Date</label>
                            <input type="date" class="form-control" id="inputExpireDate" name="ExpireDate"
                                value="{{ old('ExpireDate', $customer->ExpireDate) }}">
                        </div>

                        <div class="mb-3" id="div_DateOfBirth">
                            <label for="inputDateOfBirth" class="form-label">DateOfBirth</label>
                            <input type="date" class="form-control" id="inputDateOfBirth" name="DateOfBirth"
                                value="{{ old('DateOfBirth', $customer->DateOfBirth) }}">
                        </div>

                        <div class="mb-3" id="div_WODate">
                            <label for="inputWODate" class="form-label">WO Date</label>
                            <input type="date" class="form-control" id="inputWODate" name="WODate"
                                value="{{ old('WODate', $customer->WODate) }}">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <hr class="hr" hidden="true" />
        {{-- ROW 3 --}}
        <div class="row" id="row-3" hidden="true">
            <div class="col" id="column-3">
                <div class="row">
                    <div class="col">
                        <div class="mb-3" id="div_LastTransactionDate">
                            <label for="inputLastTransactionDate" class="form-label">Last Transaction Date</label>
                            <input type="date" class="form-control" id="inputLastTransactionDate"
                                name="LastTransactionDate"
                                value="{{ old('LastTransactionDate', $customer->LastTransactionDate) }}">
                        </div>

                        <div class="mb-3" id="div_MinPay">
                            <label for="inputMinPay" class="form-label">MinPay</label>
                            <input type="text" class="form-control" id="inputMinPay" name="MinPay"
                                value="{{ old('MinPay', $customer->MinPay) }}">
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-3" id="div_Address2">
                            <label for="inputAddress2" class="form-label">Address 2</label>
                            <textarea class="form-control" id="inputAddress2" name="Address2"> {{ old('Address2', $customer->Address2) }} </textarea>
                        </div>

                        <div class="mb-3" id="div_Address3">
                            <label for="inputAddress3" class="form-label">Address 3</label>
                            <textarea class="form-control" id="inputAddress3" name="Address3"> {{ old('Address3', $customer->Address3) }} </textarea>
                        </div>
                    </div>

                    <div class="col">
                        <div class="mb-3" id="div_Address4">
                            <label for="inputAddress4" class="form-label">Address 4</label>
                            <textarea class="form-control" id="inputAddress4" name="Address4"> {{ old('Address4', $customer->Address4) }} </textarea>
                        </div>

                        <div class="mb-3" id="div_city">
                            <label for="inputcity" class="form-label">City</label>
                            <input type="text" class="form-control" id="inputcity" name="City"
                                value="{{ old('city', $customer->City) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="hr" hidden="true" />
        {{-- ROW 4 --}}
        <div class="row" id="row-4" hidden="true">

            {{-- COL 4.1 --}}
            <div class="col" id="column-4">

                {{-- ROW 4.1.1 --}}
                <div class="row">

                    {{-- COL 4.1.1.1 --}}
                    <div class="col">
                        <div class="mb-3" id="div_LastTransactionNominal">
                            <label for="inputLastTransactionNominal" class="form-label">Last Transaction
                                Nominal</label>
                            <input type="text" class="form-control" id="inputLastTransactionNominal"
                                name="LastTransactionNominal"
                                value="{{ old('LastTransactionNominal', $customer->LastTransactionNominal) }}">
                        </div>

                        <div class="mb-3" id="div_Principal">
                            <label for="inputPrincipal" class="form-label">Principal</label>
                            <input type="text" class="form-control" id="inputPrincipal" name="Principal"
                                value="{{ old('Principal', $customer->Principal) }}">
                        </div>
                    </div>

                    {{-- COL 4.1.1.2 --}}
                    <div class="col">
                        <div class="mb-3" id="div_OfficeName">
                            <label for="inputOfficeName" class="form-label">Office Name</label>
                            <input type="text" class="form-control" id="inputOfficeName" name="OfficeName"
                                value="{{ old('OfficeName', $customer->OfficeName) }}">
                        </div>

                        <div class="mb-3" id="div_OfficeAddress2">
                            <label for="inputOfficeAddress2" class="form-label">Office Address 2</label>
                            <textarea class="form-control" id="inputOfficeAddress2" name="OfficeAddress2"> {{ old('OfficeAddress2', $customer->OfficeAddress2) }} </textarea>
                        </div>
                    </div>

                    {{-- COL 4.1.1.3 --}}
                    <div class="col">
                        <div class="mb-3" id="div_OfficeAddress3">
                            <label for="inputOfficeAddress3" class="form-label">Office Address 3</label>
                            <textarea class="form-control" id="inputOfficeAddress3" name="OfficeAddress3"> {{ old('OfficeAddress3', $customer->OfficeAddress3) }} </textarea>
                        </div>

                        <div class="mb-3" id="div_OfficeAddress4">
                            <label for="inputOfficeAddress4" class="form-label">Office Address 4</label>
                            <textarea class="form-control" id="inputOfficeAddress4" name="OfficeAddress4"> {{ old('OfficeAddress4', $customer->OfficeAddress4) }} </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="hr" hidden="true" />
        {{-- ROW 5 --}}
        <div class="row" id="row-5" hidden="true">

            {{-- COL 5.1 --}}
            <div class="col" id="column-5">

                {{-- ROW 5.1.1 --}}
                <div class="row">

                    {{-- COL 5.1.1.1 --}}
                    <div class="col">
                        <div class="input-group mb-3" id="div_Phone2">
                            <label for="inputPhone2" class="form-label" style="margin: auto;">Phone 2</label>
                            <input type="text" class="form-control" id="inputPhone2" name="Phone2"
                                value="{{ old('Phone2', $customer->Phone2) }}" style="margin-left: 0.5cm;">
                            <div class="input-group-append">
                                <a href="tel:{{ $customer->Phone2 }}" class="btn btn-danger">call</a>
                            </div>
                        </div>

                        <div class="input-group mb-3" id="div_HomePhone2">
                            <label for="inputHomePhone2" class="form-label" style="margin: auto;">HomePhone 2</label>
                            <input type="text" class="form-control" id="inputHomePhone2" name="HomePhone2"
                                value="{{ old('HomePhone2', $customer->HomePhone2) }}" style="margin-left: 0.5cm;">
                            
                            <div class="input-group-append">
                                <a href="tel:{{ $customer->HomePhone2 }}" class="btn btn-danger">call</a>
                            </div>
                        </div>
                    </div>

                    {{-- COL 5.1.1.1 --}}
                    <div class="col">
                        <div class="input-group mb-3" id="div_OfficePhone1">
                            <label for="inputOfficePhone1" class="form-label" style="margin: auto;">Office Phone 1</label>
                            <input type="text" class="form-control" id="inputOfficePhone1" name="OfficePhone1"
                                value="{{ old('OfficePhone1', $customer->OfficePhone1) }}" style="margin-left: 0.5cm;">
                            <div class="input-group-append">
                                <a href="tel:{{ $customer->OfficePhone1 }}" class="btn btn-danger">call</a>
                            </div>
                        </div>

                        <div class="input-group mb-3" id="div_OfficePhone2">
                            <label for="inputOfficePhone2" class="form-label" style="margin: auto;">Office Phone 2</label>
                            <input type="text" class="form-control" id="inputOfficePhone2" name="OfficePhone2"
                                value="{{ old('OfficePhone2', $customer->OfficePhone2) }}" style="margin-left: 0.5cm;">
                            <div class="input-group-append">
                                <a href="tel:{{ $customer->OfficePhone2 }}" class="btn btn-danger">call</a>
                            </div>
                        </div>
                    </div>

                    {{-- COL 5.1.1.1 --}}
                    <div class="col">
                        <div class="input-group mb-3" id="div_ECPhone2">
                            <label for="inputECPhone2" class="form-label" style="margin: auto;">EC Phone 2</label>
                            <input type="text" class="form-control" id="inputECPhone2" name="ECPhone2"
                                value="{{ old('ECPhone2', $customer->ECPhone2) }}" style="margin-left: 0.5cm;">
                            
                            <div class="input-group-append">
                                <a href="tel:{{ $customer->ECPhone2 }}" class="btn btn-danger">call</a>
                            </div>
                        </div>

                        <div class="input-group mb-3" id="div_OtherNumber">
                            <label for="inputOtherNumber" class="form-label" style="margin: auto;">Other Number</label>
                            <input type="text" class="form-control" id="inputOtherNumber" name="OtherNumber"
                                value="{{ old('OtherNumber', $customer->OtherNumber) }}" style="margin-left: 0.5cm;">
                            
                            <div class="input-group-append">
                                <a href="tel:{{ $customer->OtherNumber }}" class="btn btn-danger">call</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="hr" hidden="true" />
        {{-- ROW 6 --}}
        <div class="row" id="row-6" hidden="true">

            {{-- COLUMN 6.1 --}}
            <div class="col">

                {{-- ROW 6.1.1 --}}
                <div class="row">

                    {{-- COL 6.1.1.1 --}}
                    <div class="col">
                        <div class="mb-3" id="div_ECName2">
                            <label for="inputECName2" class="form-label">EC Name 2</label>
                            <input type="text" class="form-control" id="inputECName2" name="ECName2"
                                value="{{ old('ECName2', $customer->ECName2) }}">
                        </div>

                        <div class="mb-3" id="div_StatusEC">
                            <label for="inputStatusEC" class="form-label">Status EC</label>
                            <input type="text" class="form-control" id="inputStatusEC" name="StatusEC"
                                value="{{ old('StatusEC', $customer->StatusEC) }}">
                        </div>
                    </div>

                    {{-- COL 6.1.1.2 --}}
                    <div class="col">
                        <div class="mb-3" id="div_StatusEC2">
                            <label for="inputStatusEC2" class="form-label">Status EC 2</label>
                            <input type="text" class="form-control" id="inputStatusEC2" name="StatusEC2"
                                value="{{ old('StatusEC2', $customer->StatusEC2) }}">
                        </div>

                        <div class="mb-3" id="div_MotherName">
                            <label for="inputMotherName" class="form-label">Mother Name</label>
                            <input type="text" class="form-control" id="inputMotherName" name="MotherName"
                                value="{{ old('MotherName', $customer->MotherName) }}">
                        </div>
                    </div>

                    {{-- COL 6.1.1.3 --}}
                    <div class="col">
                        <div class="mb-3" id="div_Sex">
                            <label for="inputSex" class="form-label">Sex</label>
                            <select name="Sex" id="inputSex" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="mb-3" id="div_Email">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="Email"
                                value="{{ old('Email', $customer->Email) }}">
                        </div>

                        <div class="mb-3" id="div_DPD">
                            <label for="inputDPD" class="form-label">DPD</label>
                            <input type="number" class="form-control" id="inputDPD" name="DPD"
                                value="{{ old('DPD', $customer->DPD) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="hr" hidden="true" />
        {{-- ROW 7 --}}
        <div class="row" id="row-7" hidden="true">

            {{-- COL 7.1 --}}
            <div class="col">

                {{-- ROW 7.1.1 --}}
                <div class="row">

                    {{-- COL 7.1.1.1 --}}
                    <div class="col">
                        <div class="mb-3" id="div_VirtualAccount">
                            <label for="inputVirtualAccount" class="form-label">Virtual Account</label>
                            <input type="number" class="form-control" id="inputVirtualAccount" name="VirtualAccount"
                                value="{{ old('VirtualAccount', $customer->VirtualAccount) }}">
                        </div>

                        <div class="mb-3" id="div_VirtualAccountName">
                            <label for="inputVirtualAccountName" class="form-label">Virtual Account Name</label>
                            <input type="text" class="form-control" id="inputVirtualAccountName"
                                name="VirtualAccountName"
                                value="{{ old('VirtualAccountName', $customer->VirtualAccountName) }}">
                        </div>
                    </div>

                    {{-- COL 7.1.1.2 --}}
                    <div class="col">
                        <div class="mb-3" id="div_Komoditi">
                            <label for="inputKomoditi" class="form-label">Komoditi</label>
                            <input type="text" class="form-control" id="inputKomoditi" name="Komoditi"
                                value="{{ old('Komoditi', $customer->Komoditi) }}">
                        </div>

                        <div class="mb-3" id="div_KomoditiType">
                            <label for="inputKomoditiType" class="form-label">Komoditi Type</label>
                            <input type="text" class="form-control" id="inputKomoditiType" name="KomoditiType"
                                value="{{ old('KomoditiType', $customer->KomoditiType) }}">
                        </div>
                    </div>

                    {{-- COL 7.1.1.3 --}}
                    <div class="col">
                        <div class="mb-3" id="div_Produsen">
                            <label for="inputProdusen" class="form-label">Produsen</label>
                            <input type="text" class="form-control" id="inputProdusen" name="Produsen"
                                value="{{ old('Produsen', $customer->Produsen) }}">
                        </div>

                        <div class="mb-3" id="div_Model">
                            <label for="inputModel" class="form-label">Model</label>
                            <input type="text" class="form-control" id="inputModel" name="Model"
                                value="{{ old('Model', $customer->Model) }}">
                        </div>

                        <div class="mb-3" id="div_LoanTerm">
                            <label for="inputLoanTerm" class="form-label">Loan Term</label>
                            <input type="text" class="form-control" id="inputLoanTerm" name="LoanTerm"
                                value="{{ old('LoanTerm', $customer->LoanTerm) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="hr" hidden="true" />
        {{-- ROW 8 --}}
        <div class="row" id="row-8" hidden="true">

            {{-- COL 8.1 --}}
            <div class="col">

                {{-- COL 8.1.1 --}}
                <div class="row">

                    {{-- COL 8.1.1.1 --}}
                    <div class="col">
                        <div class="mb-3" id="div_Bucket">
                            <label for="inputBucket" class="form-label">Bucket</label>
                            <input type="text" class="form-control" id="inputBucket" name="Bucket"
                                value="{{ old('Bucket', $customer->Bucket) }}">
                        </div>

                        <div class="mb-3" id="div_BillingNoPenalty">
                            <label for="inputBillingNoPenalty" class="form-label">Billing No Penalty</label>
                            <input type="text" class="form-control" id="inputBillingNoPenalty"
                                name="BillingNoPenalty"
                                value="{{ old('BillingNoPenalty', $customer->BillingNoPenalty) }}">
                        </div>
                    </div>

                    {{-- COL 8.1.1.2 --}}
                    <div class="col">
                        <div class="mb-3" id="div_DendaBelumDibayar">
                            <label for="inputDendaBelumDibayar" class="form-label">Denda Belum Dibayar</label>
                            <input type="text" class="form-control" id="inputDendaBelumDibayar"
                                name="DendaBelumDibayar"
                                value="{{ old('DendaBelumDibayar', $customer->DendaBelumDibayar) }}">
                        </div>

                        <div class="mb-3" id="div_LastVisitDate">
                            <label for="inputLastVisitDate" class="form-label">Last Visit Date</label>
                            <input type="text" class="form-control" id="inputLastVisitDate" name="LastVisitDate"
                                value="{{ old('LastVisitDate', $customer->LastVisitDate) }}">
                        </div>
                    </div>

                    {{-- COL 8.1.1.3 --}}
                    <div class="col">
                        <div class="mb-3" id="div_LastVisitResult">
                            <label for="inputLastVisitResult" class="form-label">Last Visit Result</label>
                            <input type="text" class="form-control" id="inputLastVisitResult" name="LastVisitResult"
                                value="{{ old('LastVisitResult', $customer->LastVisitResult) }}">
                        </div>

                        <div class="mb-3" id="div_LastVisitAddress">
                            <label for="inputLastVisitAddress" class="form-label">Last Visit Address</label>
                            <textarea class="form-control" id="inputLastVisitAddress" name="LastVisitAddress"> {{ old('LastVisitAddress', $customer->LastVisitAddress) }} </textarea>
                        </div>

                        <div class="mb-3" id="div_OTSOffer">
                            <label for="inputOTSOffer" class="form-label">OTS Offer</label>
                            <input type="text" class="form-control" id="inputOTSOffer" name="OTSOffer"
                                value="{{ old('OTSOffer', $customer->OTSOffer) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="hr" hidden="true" />
        {{-- ROW 9 --}}
        <div class="row" id="row-9" hidden="true">

            {{-- COL 9.1 --}}
            <div class="col">

                {{-- ROW 9.1.1 --}}
                <div class="row">

                    {{-- COL 9.1.1.1 --}}
                    <div class="col">
                        <div class="mb-3" id="div_InstallmentAlreadyPaid">
                            <label for="inputInstallmentAlreadyPaid" class="form-label">Installment Already
                                Paid</label>
                            <input type="text" class="form-control" id="inputInstallmentAlreadyPaid"
                                name="InstallmentAlreadyPaid"
                                value="{{ old('InstallmentAlreadyPaid', $customer->InstallmentAlreadyPaid) }}">
                        </div>

                        <div class="mb-3" id="div_MonthlyPaymentNominal">
                            <label for="inputMonthlyPaymentNominal" class="form-label">Monthly Payment Nominal</label>
                            <input type="text" class="form-control" id="inputMonthlyPaymentNominal"
                                name="MonthlyPaymentNominal"
                                value="{{ old('MonthlyPaymentNominal', $customer->MonthlyPaymentNominal) }}">
                        </div>
                    </div>

                    {{-- COL 9.1.1.2 --}}
                    <div class="col">
                        <div class="mb-3" id="div_OtherData1">
                            <label for="inputOtherData1" class="form-label">Other Data 1</label>
                            <input type="text" class="form-control" id="inputOtherData1" name="OtherData1"
                                value="{{ old('OtherData1', $customer->OtherData1) }}">
                        </div>

                        <div class="mb-3" id="div_OtherData2">
                            <label for="inputOtherData2" class="form-label">Other Data 2</label>
                            <input type="text" class="form-control" id="inputOtherData2" name="OtherData2"
                                value="{{ old('OtherData2', $customer->OtherData2) }}">
                        </div>
                    </div>

                    {{-- COL 9.1.1.3 --}}
                    <div class="col">
                        <div class="mb-3" id="div_OtherData3">
                            <label for="inputOtherData3" class="form-label">Other Data 3</label>
                            <input type="text" class="form-control" id="inputOtherData3" name="OtherData3"
                                value="{{ old('OtherData3', $customer->OtherData3) }}">
                        </div>

                        <div class="mb-3" id="div_OtherData4">
                            <label for="inputOtherData4" class="form-label">Other Data 4</label>
                            <input type="text" class="form-control" id="inputOtherData4" name="OtherData4"
                                value="{{ old('OtherData4', $customer->OtherData4) }}">
                        </div>

                        <div class="mb-3" id="div_OtherData5">
                            <label for="inputOtherData5" class="form-label">Other Data 5</label>
                            <input type="text" class="form-control" id="inputOtherData5" name="OtherData5"
                                value="{{ old('OtherData5', $customer->OtherData5) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-warning mt-2 mb-3" id="btn-more" Value="More"
            onclick="onBtnMoreClick(this, this.value)">More</button>
        <button type="submit" class="btn btn-primary mt-2 mb-3">Submit</button>
    </form>

    <script>
        function onBtnMoreClick(el, val) {
            let row2 = document.getElementById('row-2');
            let row3 = document.getElementById('row-3');
            let row4 = document.getElementById('row-4');
            let row5 = document.getElementById('row-5');
            let row6 = document.getElementById('row-6');
            let row7 = document.getElementById('row-7');
            let row8 = document.getElementById('row-8');
            let row9 = document.getElementById('row-9');
            let garis = document.getElementsByClassName('hr');

            if (val == 'More') {
                row2.hidden = false;
                row3.hidden = false;
                row4.hidden = false;
                row5.hidden = false;
                row6.hidden = false;
                row7.hidden = false;
                row8.hidden = false;
                row9.hidden = false;

                for (var i = 0; i < garis.length; i++) {
                    garis[i].hidden = false;
                }

                el.className = 'btn btn-secondary mt-2 mb-3';
                el.textContent = 'Less';
                el.value = 'Less';
            } else {
                row2.hidden = true;
                row3.hidden = true;
                row4.hidden = true;
                row5.hidden = true;
                row6.hidden = true;
                row7.hidden = true;
                row8.hidden = true;
                row9.hidden = true;

                for (var i = 0; i < garis.length; i++) {
                    garis[i].hidden = true;
                }

                el.className = 'btn btn-warning mt-2 mb-3';
                el.textContent = 'More';
                el.value = 'More';
            }

        }
    </script>

    <style>

    </style>
@endsection
