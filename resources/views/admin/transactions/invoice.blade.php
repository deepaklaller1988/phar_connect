<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites-2/disee-html/HTML/main/invoice-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Apr 2024 09:40:11 GMT -->
<head>
    <title>Pharma Connect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/invoice/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/invoice/fonts/font-awesome/css/font-awesome.min.css') }}">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/invoice/css/style.css' )}}">

</head>
<body>

<!-- Invoice 3 start -->
<div class="invoice-3 invoice-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner">
                    <div class="invoice-info" id="invoice_wrapper">
                        <div class="invoice-headar">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="invoice-name">
                                        <!-- logo started -->
                                        <div class="logo">
                                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="logo">
                                        </div>
                                        <!-- logo ended -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="invoice">
                                        <h1 class="text-end inv-header-1 mb-0">Invoice No: #{{ $transaction->order_id}}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-top">
                            <div class="row">
                                <div class="col-sm-6 mb-30">
                                    <div class="invoice-number">
                                        <h4 class="inv-title-1">Invoice To</h4>
                                        <p class="invo-addr-1 mb-0">
                                            {{ $user->name }} <br/>
                                            {{ $user->email }} <br/>
                                            {{ $user->country->country_name }}<br/>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-30">
                                    <div class="invoice-number text-end">
                                        <h4 class="inv-title-1">Bill To</h4>
                                        <p class="invo-addr-1 mb-0">
                                            Pharma Connect <br/>
                                            email@127.0.0.1:8000 <br/>
                                            location <br/>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-30">
                                    <h4 class="inv-title-1">Date</h4>
                                    <p class="inv-from-1 mb-0">Date: {{ date('Y-m-d',strtotime($transaction->created_at)) }}</p>
                                </div>
                                <div class="col-sm-6 text-end mb-30">
                                    <h4 class="inv-title-1">Payment Method</h4>
                                    <p class="inv-from-1 mb-0">{{ $transaction->mode }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-center">
                            <div class="order-summary">
                                <h4>Order summary</h4>
                                <div class="table-outer">
                                    <table class="default-table invoice-table">
                                        <thead>
                                        <tr>
                                            
                                            <th>Price</th>
                                            <th>Txn_id</th>
                                            <th>Plan Name</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                           
                                            <td>$ {{ $transaction->amount }} </td>
                                            <td>{{ $transaction->transaction_id }} </td>
                                            <td>{{ $plan->title }} </td>
                                            <td>{{ $transaction->status == 'success' ? 'success' : 'failed'}} </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-bottom">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="important-note mb-30">
                                        <h3 class="inv-title-1">Important Note</h3>
                                        <ul class="important-notes-list-1">
                                            <li>Once order done, money can't refund</li>
                                            <li>Delivery might delay due to some external dependency</li>
                                            <li>This is computer generated invoice and physical signature does not require.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-offsite">
                                    <div class="text-end payment-info mb-30">
                                        <h3 class="inv-title-1">Payment Info</h3>
                                        <p class="mb-0 text-13">This payment made by BRAC BANK master card without any problem</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invoice-btn-section clearfix d-print-none">
                        <a href="javascript:window.print()" class="btn btn-lg btn-print">
                            <i class="fa fa-print"></i> Print Invoice
                        </a>
                        <a id="invoice_download_btn" data-id="{{ $user->id }}" class="btn btn-lg btn-download btn-theme">
                            <i class="fa fa-download"></i> Download Invoice
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/invoice/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/invoice/js/jspdf.min.js ') }}"></script>
<script src="{{ asset('assets/invoice/js/html2canvas.js') }}"></script>
<script src="{{ asset('assets/invoice/js/app.js') }}"></script>
</body>

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites-2/disee-html/HTML/main/invoice-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Apr 2024 09:40:14 GMT -->
</html>
