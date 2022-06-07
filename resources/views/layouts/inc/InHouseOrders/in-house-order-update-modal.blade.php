<div class="modal fade" id="in_house_order_modal_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px!important;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Order Code : <span id="inHouse_order_span_id"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5">
                {{-- ...........Form start............... --}}
                <form id="form" class="form-horizontal" action="{{ url('update-in-house-order') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="in-house-order-id" id="in-house-order-id">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Order Id</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inHouse_order_id" id="inHouse_order_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="advancePayment" class="col-sm-4 col-form-label">Advance Payment</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inHouse_advance_payment" id="inHouse_advance_payment">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Seller Coupon Discount</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inHouse_seller_coupon_discount"
                                id="inHouse_seller_coupon_discount">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Order Note</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inHouse_order_note" id="inHouse_order_note">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Circle Remarks</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inHouse_circle_remarks"
                                id="inHouse_circle_remarks">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="position" class="col-sm-4 control-label">Courier </label>
                        <div class="col-sm-8">
                            <select class="form-control" name="inHouse_courier" id="inHouse_courier">
                                <option value="inhouse-sale">In House Sale</option>
                                @foreach ($couriers as $courier)
                                    <option value="{{ $courier->value }}">{{ $courier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Customer Delivery Charge</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inHouse_customer_delivery_charge"
                                id="inHouse_customer_delivery_charge">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Circle Delivery Charge</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inHouse_circle_delivery_charge"
                                id="inHouse_circle_delivery_charge">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Delivery Man</label>
                        <div class="col-sm-8">
                                <select class="form-control" name="inHouse_delivery_man" id="inHouse_delivery_man">
                                    <option value="inhouse-sale" id="delivery_man_val" selected="">In House Sale</option>
                                    <option value="Steadfast">Steadfast</option>
                                    <option value="GoGo Bangla.com">GoGo Bangla.com</option>
                                    <option value="Paperfly">Paperfly</option>
                                    <option value="Redx">Redx</option>
                                    <option value="Good2Go">Good2Go</option>
                                    <option value="sundorbon">sundorbon</option>
                                    <option value="Pathao">Pathao</option>
                                    <option value="jononi">jononi</option>
                                    <option value="korotoa">korotoa</option>
                                    <option value="Durbinx">Durbinx</option>
                                    <option value="SA Paribahan">SA Paribahan</option>
                                    <option value="CDS">CDS</option>
                                    <option value="Digital Ride">Digital Ride</option>
                                    <option value="Md.Nazmul Hossain">Md. Nazmul Hossain</option> 
                                </select>
                            </div>
                        </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Delivery Date</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inHouse_delivery_date"
                                id="inHouse_delivery_date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edit_delivery" class="col-sm-4 control-label">Delivery Status</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="inHouse_delivery_status" id="inHouse_delivery_status">
                                <option value="pending" selected="" id="">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="ready for deliver">Ready For packaging</option>
                                <option value="ready to deliver">Ready to Deliver</option>
                                <option value="on hold">On Hold</option>
                                <option value="under review">Under Review</option>
                                <option value="exchange">Exchange</option>
                                <option value="delivered">Delivered</option>
                                <option value="returning">Returning</option>
                                <option value="in transit">In Transit</option>
                                <option value="cancelled">Cancelled</option>
                                <option value="returned">Returned</option>
                            </select>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Collected Amount</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inHouse_collected_amount"
                                id="inHouse_collected_amount">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">Reasons</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="inHouse_reasons" id="inHouse_reasons">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edit_payment" class="col-sm-4 control-label">Payment Status</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="inHouse_payment_status" id="inHouse_payment_status">
                                <option selected="" value="unpaid">Unpaid</option>
                                <option value="paid">Paid</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update Order</button>
                    </div>
                </form>
