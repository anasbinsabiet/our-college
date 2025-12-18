@extends('backend.layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="page-sub-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                <a class="breadcrumb active">Fees Details</a>
                <a href="{{ route('collection.index') }}">Collection List</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="invoice-box">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h4>Fees Invoice</h4>
                        </div>
                        <div class="col-sm-6 text-end">
                            <strong>Date:</strong> {{ optional($collection)->paid_date ?? now()->format('d-m-Y') }}<br>
                            <strong>Invoice ID:</strong> #{{ optional($collection)->id ?? 'N/A' }}
                        </div>
                    </div>

                    {{-- Student Info --}}
                    <div class="row mb-4">
                        {{-- <div class="col-sm-6">
                            <h5>Student Details</h5>
                            <p>
                                <strong>Name:</strong> {{ optional($student)->name ?? '' }}<br>
                                <strong>Phone:</strong> {{ optional($student)->phone ?? '' }}<br>
                                <strong>Email:</strong> {{ optional($student)->email ?? '' }}
                            </p>
                        </div> --}}
                        <div class="col-sm-12 text-end">
                            <h5>Fees Details</h5>
                            <p>
                                {{-- <strong>Fees Type:</strong> {{ optional($collection)->fees_type ?? '' }}<br> --}}
                                <strong>Bank:</strong> {{ optional($collection)->bank->name ?? 'N/A' }}<br>
                                {{-- <strong>Amount:</strong> {{ optional($collection)->fees_amount ?? '0.00' }} BDT<br> --}}
                                <strong>Paid Date:</strong> {{ optional($collection)->paid_date ?? now()->format('d-m-Y') }}
                            </p>
                        </div>
                    </div>

                    {{-- File Attachment --}}
                    @if(optional($collection)->file)
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <strong>Attached File:</strong>
                            <a href="{{ asset('uploads/collections/' . $collection->file) }}" download class="text-primary">
                                {{ $collection->file }}
                            </a>
                        </div>
                    </div>
                    @endif

                    {{-- Invoice Footer / Notes --}}
                    <div class="row mt-4">
                        <div class="col-sm-12 text-center">
                            <p>Thank you for your payment.</p>
                        </div>
                    </div>
                </div> {{-- /.invoice-box --}}
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
.invoice-box {
    max-width: 900px;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    font-size: 16px;
    line-height: 24px;
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color: #555;
}

.invoice-box h4, .invoice-box h5 {
    margin-bottom: 10px;
    font-weight: 700;
}

.invoice-box p {
    margin-bottom: 5px;
}

.invoice-box .text-end {
    text-align: right;
}

.invoice-box a {
    color: #1d3557;
    text-decoration: underline;
}

.invoice-box a:hover {
    color: #457b9d;
}
</style>
@endpush