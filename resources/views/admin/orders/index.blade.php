@extends('theme.default')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')
<div class="content">
    <div class="mb-9">
      <div class="row g-3 mb-4">
        <div class="col-auto">
          <h2 class="mb-0">Orders</h2>
        </div>
      </div>
      <div id="orderTable" data-list='{"valueNames":["order","total","customer","payment_status","fulfilment_status","delivery_type","date"],"page":10,"pagination":true}'>
        <div class="mb-4">
          <div class="row g-3">
            <div class="col-auto">
              <div class="search-box">
                <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                  <input class="form-control search-input search" type="search" placeholder="Search orders" aria-label="Search" />
                  <span class="fas fa-search search-box-icon"></span>

                </form>
              </div>
            </div>
            <div class="col-auto scrollbar overflow-hidden-y flex-grow-1">
              <div class="btn-group position-static" role="group">
                <div class="btn-group position-static text-nowrap" role="group">
                  <button class="btn btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                    Payment status<span class="fas fa-angle-down ms-2"></span></button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                  </ul>
                </div>
                <div class="btn-group position-static text-nowrap" role="group">
                  <button class="btn btn-sm btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                    Fulfilment status<span class="fas fa-angle-down ms-2"></span></button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                  </ul>
                </div>
                <button class="btn btn-sm btn-phoenix-secondary px-7 flex-shrink-0">More filters </button>
              </div>
            </div>
            <div class="col-auto">
              <button class="btn btn-link text-900 me-4 px-0"><span class="fa-solid fa-file-export fs--1 me-2"></span>Export</button>
              <button class="btn btn-primary"><span class="fas fa-plus me-2"></span>Add order</button>
            </div>
          </div>
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
          <div class="table-responsive scrollbar mx-n1 px-1">
            <table id="orders-table" class="table table-sm fs--1 mb-0">
              <thead>
                <tr>
                  <th class="white-space-nowrap fs--1 align-middle ps-0" style="width:26px;">
                    <div class="form-check mb-0 fs-0">
                      <input class="form-check-input" id="checkbox-bulk-order-select" type="checkbox" data-bulk-select='{"body":"order-table-body"}' />
                    </div>
                  </th>
                  <th class="sort white-space-nowrap align-middle pe-3" scope="col" data-sort="order" style="width:5%;">ORDER</th>
                  <th class="sort align-middle text-end" scope="col" data-sort="total" style="width:6%;">TOTAL</th>
                  <th class="sort align-middle ps-8" scope="col" data-sort="customer" style="width:28%; min-width: 250px;">CUSTOMER</th>
                  <th class="sort align-middle text-start" scope="col" data-sort="delivery_type" style="width:30%;">DELIVERY TYPE</th>
                  <th class="sort align-middle text-start pe-0" scope="col" data-sort="date">DATE</th>
                  <th class="sort align-middle text-start pe-3" scope="col" data-sort="fulfilment_status" style="width:12%; min-width: 200px;">FULFILMENT STATUS</th>
                </tr>
              </thead>
              <tbody class="list" id="order-table-body">
                
                @foreach($orders as $order)
                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                  <td class="fs--1 align-middle px-0 py-3">
                    <div class="form-check mb-0 fs-0">
                      <input class="form-check-input" type="checkbox" data-bulk-select-row='{"order":2447,"total":953,"customer":{"avatar":"","name":"Roy Anderson"},"payment_status":{"label":"Pending","type":"badge-phoenix-warning","icon":"clock"},"fulfilment_status":{"label":"Fulfiled","type":"badge-phoenix-success","icon":"check"},"delivery_type":"Cash on delivery","date":"Nov 18, 5:43 PM"}' />
                    </div>
                  </td>
                  <td class="order align-middle white-space-nowrap py-0"><a class="fw-semi-bold" href="#!">#2447</a></td>
                  <td class="total align-middle text-end fw-semi-bold text-1000">$953</td>
                  <td class="customer align-middle white-space-nowrap ps-8"><a class="d-flex align-items-center" href="#!">
                      <div class="avatar avatar-m">
                        <div class="avatar-name rounded-circle"><span>R</span></div>
                      </div>
                      <h6 class="mb-0 ms-3 text-900">Roy Anderson</h6>
                    </a></td>
                 
                  
                  <td class="delivery_type align-middle white-space-nowrap text-900 fs--1 text-start">Cash on delivery</td>
                  <td class="date align-middle white-space-nowrap text-700 fs--1 ps-4 text-end">Nov 18, 5:43 PM</td>
                  <td class="fulfilment_status align-middle white-space-nowrap text-start fw-bold text-700"><span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">Fulfiled</span><span class="ms-1" data-feather="check" style="height:12.8px;width:12.8px;"></span></span></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer position-absolute">
      <div class="row g-0 justify-content-between align-items-center h-100">
        <div class="col-12 col-sm-auto text-center">
          <p class="mb-0 mt-2 mt-sm-0 text-900">Thank you for creating with Phoenix<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2023 &copy;<a class="mx-1" href="https://themewagon.com">Themewagon</a></p>
        </div>
        <div class="col-12 col-sm-auto text-center">
          <p class="mb-0 text-600">v1.12.0</p>
        </div>
      </div>
    </footer>
  </div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js" integrity="sha512-OQlawZneA7zzfI6B1n1tjUuo3C5mtYuAWpQdg+iI9mkDoo7iFzTqnQHf+K5ThOWNJ9AbXL4+ZDwH7ykySPQc+A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $(document).ready(() => {
      $('#orders-table').DataTable({
          
      })
  })
</script>
@endsection