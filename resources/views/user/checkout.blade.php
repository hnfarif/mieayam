@extends('template.master')
@section('content')
<div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
          <div class="bg-light rounded p-3">
            <p class="mb-0">Returning customer? <a href="#" class="d-inline-block">Click here</a> to login</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
          <h2 class="h3 mb-3 text-black font-heading-serif">Billing Details</h2>
          <div class="p-3 p-lg-5 border">
            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_fname" name="c_fname">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Street address">
              </div>
            </div>

            <div class="form-group">
              <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
            </div>

            <div class="form-group row ">
              <div class="col-md-6">
                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number">
              </div>
            </div>

            <div class="form-group">
              <label for="c_order_notes" class="text-black">Order Notes</label>
              <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                placeholder="Write your notes here..."></textarea>
            </div>

          </div>
        </div>
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-12">
              <h2 class="h3 mb-3 text-black font-heading-serif">Your Order</h2>
              <div class="p-3 p-lg-5 border">
                <table class="table site-block-order-table mb-5">
                  <thead>
                    <th>Product</th>
                    <th>Total</th>
                  </thead>
                    <tbody class="daftarMie">

                    </tbody>
                    <tbody>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                      <td class="text-black subtotal">$350.00</td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                      <td class="text-black font-weight-bold ordertotal"><strong>$350.00</strong></td>
                    </tr>
                  </tbody>
                </table>

                <div class="border mb-3 p-3 rounded">
                  <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button"
                      aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                  <div class="collapse" id="collapsebank">
                    <div class="py-2 pl-0">
                      <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                        payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                    </div>
                  </div>
                </div>

                <div class="border mb-3 p-3 rounded">
                  <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button"
                      aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

                  <div class="collapse" id="collapsecheque">
                    <div class="py-2 pl-0">
                      <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                        payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                    </div>
                  </div>
                </div>

                <div class="border mb-5 p-3">
                  <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button"
                      aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                  <div class="collapse" id="collapsepaypal">
                    <div class="py-2 pl-0">
                      <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                        payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <button class="btn btn-primary btn-lg btn-block" onclick="window.location='/thank'">Place
                    Order</button>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- </form> -->
    </div>
  </div>

  @endsection
