@extends('layouts.app')

@section('content')
  
  @include('admin.transactions.partials.style');
   
  <div class="container">
     
    <div class="col-md-12">
      <a href="{{ route('admin.orders.index') }}" class="btn btn-md btn-primary mb-3">Back To Order Listing</a>

       <div class="invoice">
          <!-- begin invoice-company -->
          <div class="invoice-company text-inverse f-w-600">
             <span class="pull-right hidden-print">
             <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
             <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
             </span>
             Silogan ni Gianne
          </div>
          <!-- end invoice-company -->
          <!-- begin invoice-header -->
          <div class="invoice-header">
             <div class="invoice-from">
                <address class="m-t-5 m-b-5">
                   <strong class="text-inverse">Twitter, Inc.</strong><br>
                   Street Address<br>
                   City, Zip Code<br>
                   Phone: (123) 456-7890<br>
                   Fax: (123) 456-7890
                </address>
             </div>
             <div class="invoice-date">
                <small>Invoice / July period</small>
                <div class="date text-inverse m-t-5">August 3,2012</div>
                <div class="invoice-detail">
                   #0000123DSS<br>
                   Services Product
                </div>
             </div>
          </div>
          <!-- end invoice-header -->
          <!-- begin invoice-content -->
          <div class="invoice-content">
             <!-- begin table-responsive -->
             <div class="table-responsive">
                <table class="table table-invoice">
                   <thead>
                      <tr>
                         <th scope="col-2"><strong>ProductID</strong></th>
                         <th scope="col-2"><strong>PRODUCT NAME</strong></th>
                         <th scope="col-2"><strong>UNIT PRICE</strong></th>
                         <th scope="col-2"><strong>QUANTITY</strong></th>
                         <th scope="col-2"><strong>LINE TOTAL</strong></th>

                      </tr>
                   </thead>
                   <tbody>
                    @foreach ($orders->products as $product)
                      <tr>
                        <td>{{ $product->id}}</td>
                        <td>{{ $product->ProdName }}</td>
                        <td>{{ $product->UnitPrice }}</td>
                        <td>{{ $product->pivot->Quantity }}</td>
                        <td>{{ $product->pivot->Quantity * $product->UnitPrice}}</td>
                      </tr>
                      
                    @endforeach
                      
                   </tbody>
                </table>
             </div>
             <!-- end table-responsive -->
             <!-- begin invoice-price -->
             <div class="invoice-price">
                <div class="invoice-price-left">
                   <div class="invoice-price-row">
                      <div class="sub-price">
                         <small>SUBTOTAL</small>
                         <span class="text-inverse">{{ $orders->Total }}</span>
                      </div>
                      <div class="sub-price">
                         <i class="fa fa-plus text-muted"></i>
                      </div>
                      <div class="sub-price">
                         <small>Discount (5.4%)</small>
                         <span class="text-inverse">{{ $orders->Total * 0.54 }} </span>
                      </div>
                   </div>
                </div>
                <div class="invoice-price-right">
                   <small>TOTAL</small> <span class="f-w-600">PHP {{ $orders->Total - ($orders->Total * 0.54) }}</span>
                </div>
             </div>
             <!-- end invoice-price -->
          </div>
          <!-- end invoice-content -->
          <!-- begin invoice-note -->
          <div class="invoice-note">
             * Make all cheques payable to [Your Company Name]<br>
             * Payment is due within 30 days<br>
             * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
          </div>
          <!-- end invoice-note -->
          <!-- begin invoice-footer -->
          <div class="invoice-footer">
             <p class="text-center m-b-5 f-w-600">
                THANK YOU FOR YOUR BUSINESS
             </p>
             <p class="text-center">
                <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>
                <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
                <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>
             </p>
          </div>
          <!-- end invoice-footer -->
       </div>
    </div>
 </div>
@endsection