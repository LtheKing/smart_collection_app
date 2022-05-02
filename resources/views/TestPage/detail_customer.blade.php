@extends('layout')

@section('section_menu')
    @parent
@endsection

@section('content')
<h1 class="h1">Detail Customer</h1>

<div class="container-fluid">
    <div class="row">

        <div class="col show-content">
            <table class="table">
                <tr>
                    <td width="25%">Nomor Kartu</td>
                    <td>:</td>
                    <td>{{ $customer->NumberCard }}</td>
                </tr>

                <tr>
                    <td>Tipe kartu</td>
                    <td>:</td>
                    <td>{{ $customer->TypeCard }}</td>
                </tr>

                <tr>
                    <td>Nama Customer</td>
                    <td>:</td>
                    <td>{{ $customer->NameCustomer }}</td>
                </tr>

                <tr>
                    <td>Date Of Birth</td>
                    <td>:</td>
                    <td>{{ $customer->DateOfBirth }}</td>
                </tr>

                <tr>
                    <td>Last Payment</td>
                    <td>:</td>
                    <td>{{ $customer->LastPayment }}</td>
                </tr>

                <tr>
                    <td>Last Transaction Nominal</td>
                    <td>:</td>
                    <td>{{ $customer->LastTransactionNominal }}</td>
                </tr>

                <tr>
                    <td>Limit</td>
                    <td>:</td>
                    <td>{{ $customer->Limit }}</td>
                </tr>
            </table>
        </div>

        <div class="col show-content">
            <table class="table">
                <tr>
                    <td>Phone 1</td>
                    <td>:</td>
                    <td>{{ $customer->Phone1 }}</td>
                    <td><a href="tel:{{ $customer->Phone1 }}" class="btn btn-danger">call</a></td>
                </tr>

                <tr>
                    <td>Office Phone 1</td>
                    <td>:</td>
                    <td>{{ $customer->OfficePhone1 }}</td>
                    <td><a href="tel:{{ $customer->OfficePhone1 }}" class="btn btn-danger">call</a></td>
                </tr>

                <tr>
                    <td>Address 1</td>
                    <td>:</td>
                    <td>{{ $customer->Address1 }}</td>
                </tr>

                <tr>
                    <td>Report</td>
                    <td>:</td>
                    <td>{{ $customer->Report }}</td>
                </tr>
            </table>
        </div>
    
        
    </div>
    
    <div class="row hide-content " hidden=true>
        <div class="col">
            
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr>
                            <td>Bank</td>
                            <td>:</td>
                            <td>{{ $customer->Bank }}</td>
                        </tr>

                        <tr>
                            <td>PIC</td>
                            <td>:</td>
                            <td>{{ $customer->PIC }}</td>
                        </tr>

                        <tr>
                            <td>Assignment Date</td>
                            <td>:</td>
                            <td>{{ $customer->AssignmentDate }}</td>
                        </tr>

                        <tr>
                            <td>Expire Date</td>
                            <td>:</td>
                            <td>{{ $customer->ExpireDate }}</td>
                        </tr>
                    </table>
                </div>

                <hr />

                <div class="col">
                    <table class="table">
                        <tr>
                            <td width="25%">EC Name</td>
                            <td>:</td>
                            <td>{{ $customer->ECName }}</td>
                        </tr>

                        <tr>
                            <td>EC Name 2</td>
                            <td>:</td>
                            <td>{{ $customer->ECName2 }}</td>
                        </tr>

                        <tr>
                            <td>Status EC</td>
                            <td>:</td>
                            <td>{{ $customer->StatusEC }}</td>
                        </tr>

                        <tr>
                            <td>Status EC 2</td>
                            <td>:</td>
                            <td>{{ $customer->StatusEC2 }}</td>
                        </tr>

                        <tr>
                            <td>Mother Name</td>
                            <td>:</td>
                            <td>{{ $customer->MotherName }}</td>
                        </tr>

                        <tr>
                            <td>Sex</td>
                            <td>:</td>
                            <td>{{ $customer->Sex }}</td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $customer->Email }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col">
                    <table class="table">
                        <tr>
                            <td width="25%">Open Date</td>
                            <td>:</td>
                            <td>{{ $customer->OpenDate }}</td>
                        </tr>

                        <tr>
                            <td>WO Date</td>
                            <td>:</td>
                            <td>{{ $customer->WODate }}</td>
                        </tr>

                        <tr>
                            <td>Last Pay Date</td>
                            <td>:</td>
                            <td>{{ $customer->LastPayDate }}</td>
                        </tr>

                        <tr>
                            <td>Last Payment</td>
                            <td>:</td>
                            <td>{{ $customer->LastPayment }}</td>
                        </tr>

                        <tr>
                            <td>Last Transaction Date</td>
                            <td>:</td>
                            <td>{{ $customer->LastTransactionDate }}</td>
                        </tr>

                        <tr>
                            <td>Last Principal</td>
                            <td>:</td>
                            <td>{{ $customer->Principal }}</td>
                        </tr>

                        <tr>
                            <td>Last Payment</td>
                            <td>:</td>
                            <td>{{ $customer->MinPay }}</td>
                        </tr>

                        <tr>
                            <td>Minpay</td>
                            <td>:</td>
                            <td>{{ $customer->MinPay }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col">

            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr>
                            <td>OS Balance</td>
                            <td>:</td>
                            <td>{{ $customer->OSBalance }}</td>
                        </tr>

                        <tr>
                            <td>Address 2</td>
                            <td>:</td>
                            <td>{{ $customer->Address2 }}</td>
                        </tr>

                        <tr>
                            <td>Address 3</td>
                            <td>:</td>
                            <td>{{ $customer->Address3 }}</td>
                        </tr>

                        <tr>
                            <td>Address 4</td>
                            <td>:</td>
                            <td>{{ $customer->Address4 }}</td>
                        </tr>

                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td>{{ $customer->City }}</td>
                        </tr>

                        <tr>
                            <td>Office Name</td>
                            <td>:</td>
                            <td>{{ $customer->OfficeName }}</td>
                        </tr>

                        <tr>
                            <td width="28%">Office Address 1</td>
                            <td>:</td>
                            <td>{{ $customer->OfficeAddress1 }}</td>
                        </tr>

                        <tr>
                            <td>Office Address 2</td>
                            <td>:</td>
                            <td>{{ $customer->OfficeAddress2 }}</td>
                        </tr>

                        <tr>
                            <td>Office Address 3</td>
                            <td>:</td>
                            <td>{{ $customer->OfficeAddress3 }}</td>
                        </tr>

                        <tr>
                            <td>Office Address 4</td>
                            <td>:</td>
                            <td>{{ $customer->OfficeAddress4 }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col">
                    <table class="table">
                        <tr>
                            <td>DPD</td>
                            <td>:</td>
                            <td>{{ $customer->DPD }}</td>
                        </tr>

                        <tr>
                            <td>Bucket</td>
                            <td>:</td>
                            <td>{{ $customer->Bucket }}</td>
                        </tr>

                        <tr>
                            <td>Billing No Penalty</td>
                            <td>:</td>
                            <td>{{ $customer->BillingNoPenalty }}</td>
                        </tr>

                        <tr>
                            <td>Denda Belum Dibayar</td>
                            <td>:</td>
                            <td>{{ $customer->Bucket }}</td>
                        </tr>

                        <tr>
                            <td>Last Visit Date</td>
                            <td>:</td>
                            <td>{{ $customer->LastVisitDate }}</td>
                        </tr>

                        <tr>
                            <td>Last Visit Result</td>
                            <td>:</td>
                            <td>{{ $customer->LastVisitResult }}</td>
                        </tr>

                        <tr>
                            <td>Last Visit Address</td>
                            <td>:</td>
                            <td>{{ $customer->LastVisitAddress }}</td>
                        </tr>

                        <tr>
                            <td>OTS Offer</td>
                            <td>:</td>
                            <td>{{ $customer->OTSOffer }}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>

        <div class="col">
            <div class="row">
                <div class="col">
                    <table class="table">
                        <tr>
                            <td>Phone 2</td>
                            <td>:</td>
                            <td>{{ $customer->Phone2 }}</td>
                            <td><a href="tel:{{ $customer->Phone2 }}" class="btn btn-danger">call</a></td>
                        </tr>

                        <tr>
                            <td>Home Phone 1</td>
                            <td>:</td>
                            <td>{{ $customer->HomePhone1 }}</td>
                            <td><a href="tel:{{ $customer->HomePhone1 }}" class="btn btn-danger">call</a></td>
                        </tr>

                        <tr>
                            <td>Home Phone 2</td>
                            <td>:</td>
                            <td>{{ $customer->HomePhone2 }}</td>
                            <td><a href="tel:{{ $customer->HomePhone2 }}" class="btn btn-danger">call</a></td>
                        </tr>

                        <tr>
                            <td>Office Phone 2</td>
                            <td>:</td>
                            <td>{{ $customer->OfficePhone2 }}</td>
                            <td><a href="tel:{{ $customer->OfficePhone2 }}" class="btn btn-danger">call</a></td>
                        </tr>

                        <tr>
                            <td>EC Phone 1</td>
                            <td>:</td>
                            <td>{{ $customer->ECPhone1 }}</td>
                            <td><a href="tel:{{ $customer->ECPhone1 }}" class="btn btn-danger">call</a></td>
                        </tr>

                        <tr>
                            <td>EC Phone 2</td>
                            <td>:</td>
                            <td>{{ $customer->ECPhone2 }}</td>
                            <td><a href="tel:{{ $customer->ECPhone2 }}" class="btn btn-danger">call</a></td>
                        </tr>
                    </table>
                </div>

                <div class="col">
                    <table class="table">
                        <tr>
                            <td>Virtual Account</td>
                            <td>:</td>
                            <td>{{ $customer->VirtualAccount }}</td>
                        </tr>

                        <tr>
                            <td>Virtual Account Name</td>
                            <td>:</td>
                            <td>{{ $customer->VirtualAccountName }}</td>
                        </tr>

                        <tr>
                            <td>Komoditi</td>
                            <td>:</td>
                            <td>{{ $customer->Komoditi }}</td>
                        </tr>

                        <tr>
                            <td>Komoditi Type</td>
                            <td>:</td>
                            <td>{{ $customer->KomoditiType }}</td>
                        </tr>

                        <tr>
                            <td>Produsen</td>
                            <td>:</td>
                            <td>{{ $customer->Produsen }}</td>
                        </tr>

                        <tr>
                            <td>Model</td>
                            <td>:</td>
                            <td>{{ $customer->Model }}</td>
                        </tr>

                        <tr>
                            <td>Loan Term</td>
                            <td>:</td>
                            <td>{{ $customer->LoanTerm }}</td>
                        </tr>

                        <tr>
                            <td>Installment Already Paid</td>
                            <td>:</td>
                            <td>{{ $customer->InstallmentAlreadyPaid }}</td>
                        </tr>

                        <tr>
                            <td>Monthly Payment Nominal</td>
                            <td>:</td>
                            <td>{{ $customer->MonthlyPaymentNominal }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col">
                    <table class="table">
                        <tr>
                            <td>Other Data 1</td>
                            <td>:</td>
                            <td>{{ $customer->OtherData1 }}</td>
                        </tr>

                        <tr>
                            <td>Other Data 2</td>
                            <td>:</td>
                            <td>{{ $customer->OtherData2 }}</td>
                        </tr>

                        <tr>
                            <td>Other Data 3</td>
                            <td>:</td>
                            <td>{{ $customer->OtherData3 }}</td>
                        </tr>

                        <tr>
                            <td>Other Data 4</td>
                            <td>:</td>
                            <td>{{ $customer->OtherData4 }}</td>
                        </tr>

                        <tr>
                            <td>Other Data 5</td>
                            <td>:</td>
                            <td>{{ $customer->OtherData5 }}</td>
                        </tr>

                        <tr>
                            <td>Permanent Message</td>
                            <td>:</td>
                            <td>{{ $customer->PermanentMessage }}</td>
                        </tr>

                        <tr>
                            <td>Last Report</td>
                            <td>:</td>
                            <td>{{ $customer->LastReport }}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <button type="button" class="btn btn-warning ml-3 mb-3" id="btn-more" Value="More"
        onclick="onBtnMoreClick(this, this.value)">More</button>
    </div>
</div>

<style>
    .table {}

    .hide-content {
        font-size: 12px;
    }

    .show-content {
        font-size: 16px;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

</style>

<script>
    function onBtnMoreClick(el, val) {
        let hiddenContent = document.getElementsByClassName('hide-content');
        if (val == 'More') {
            el.className = 'btn btn-secondary ml-3 mb-3';
            el.textContent = 'Less';
            el.value = 'Less';
            hiddenContent[0].hidden=false
        } else {
            el.className = 'btn btn-warning ml-3 mb-3';
            el.textContent = 'More';
            el.value = 'More';
            hiddenContent[0].hidden=true
        }
    }
</script>
@endsection
