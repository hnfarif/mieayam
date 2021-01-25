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
                      <td class="text-black font-weight-bold"><strong>Harga Total</strong></td>
                      <td class="text-black subtotal"></td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Cashback</strong></td>
                      <td class="text-black font-weight-bold ordertotal"><strong></strong></td>
                    </tr>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Harga Bayar</strong></td>
                      <td class="text-black font-weight-bold ordertotal"><strong></strong></td>
                    </tr>
                  </tbody>
                </table>

                <div class="dropdown pb-5">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Metode Pembayaran
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <button class="dropdown-item" type="button">Tunai</button>
    <button class="dropdown-item" type="button">Transfer Bank</button>
    <button class="dropdown-item" type="button">OVO</button>
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
