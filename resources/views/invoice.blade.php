@include('layouts.header')

 <div class="content-wrap">

<div class="bg-primary">



    <div class="unix-invoice">

        <div class="container">

            <div class="row">



                <div class="col-lg-12">



                    <div id="invoice" class="effect2 m-t-120">

                        <div id="invoice-top">

                            <div class="invoice-logo"></div>

                            <div class="invoice-info">

                                <h2>{{$details->name}}</h2>

                                <p>{{$details->email}}<br> {{$details->mobile}}

                                </p>

                            </div>

                            <!--End Info-->

                            <div class="title">

                                <h4>Invoice #{{$order_detail->order_no}}</h4>

                                <p>Transction ID: {{$order_detail->transction_id}} <br> Payment time: {{$order_detail->created_at}}

                                </p>

                            </div>

                            <!--End Title-->

                        </div>

                        <!--End InvoiceTop-->







                        <div id="invoice-mid">



                            <div class="clientlogo"></div>

                            <div class="invoice-info">

                                <h2>Address</h2>

                                <p>{{$details->address}}<br>{{$details->city}} {{$details->state}}

                                    <br>

                            </div>



                        </div>

                        <!--End Invoice Mid-->



                        <div id="invoice-bot">



                            <div id="invoice-table">

                                <div class="table-responsive">

                                    <table class="table">

                                        <tr class="tabletitle">

                                            <td class="table-item">

                                                <h2>Item Description</h2>

                                            </td>

                                            <td class="Hours">

                                                <h2>Quantity</h2>

                                            </td>

                                            <td class="Rate">

                                                <h2>Price</h2>

                                            </td>

                                            <td class="subtotal">

                                                <h2>Sub-total</h2>

                                            </td>

                                        </tr>



                                        <tr class="service">

                                            <td class="tableitem">

                                                <p class="itemtext">{{$details->pro_name}}</p>

                                            </td>

                                            <td class="tableitem">

                                                <p class="itemtext">{{$details->quantity}}</p>

                                            </td>

                                            <td class="tableitem">

                                                <p class="itemtext">{{$details->price}}</p>

                                            </td>

                                            <td class="tableitem">

                                                <p class="itemtext">{{$details->price}}</p>

                                            </td>

                                        </tr>



                                       



                                    </table>

                                </div>

                            </div>

                            <!--End Table-->





                        </div>

                        <!--End InvoiceBot-->

                    </div>

                    <!--End Invoice-->

                </div>

            </div>

        </div>

    </div>



</div>

</div>

@include('layouts.footer')