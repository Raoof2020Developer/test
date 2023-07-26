@extends('theme.default')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')
<div class="content">
    <div class="mb-9">
      <div class="row g-2 mb-4">
        <div class="col-auto">
          <h2 class="mb-0">Users</h2>
        </div>
      </div>
      <div id="products" data-list='{"valueNames":["customer","email","total-orders","total-spent","city","last-seen","last-order"],"page":10,"pagination":true}'>
        
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
          <div class="table-responsive scrollbar-overlay mx-n1 px-1">
            @if ($users->count() > 0)
            <table id="users-table" class="table table-sm fs--1 mb-0">
              <thead>
                <tr>
                  <th class="white-space-nowrap fs--1 align-middle ps-0">
                    <div class="form-check mb-0 fs-0">
                      <input class="form-check-input" id="checkbox-bulk-customers-select" type="checkbox" data-bulk-select='{"body":"customers-table-body"}' />
                    </div>
                  </th>
                  <th class="sort align-middle pe-5" scope="col" data-sort="customer" style="width:10%;">USER</th>
                  <th class="sort align-middle pe-5" scope="col" data-sort="email" style="width:20%;">EMAIL</th>
                  <th class="sort align-middle text-end" scope="col" data-sort="total-orders" style="width:10%">ORDERS</th>
                  <th class="sort align-middle text-end ps-3" scope="col" data-sort="total-spent" style="width:10%">TOTAL SPENT</th>
                  <th class="sort align-middle ps-7" scope="col" data-sort="city" style="width:25%;">User Type</th>
                  <th class="sort align-middle text-end" scope="col" data-sort="last-seen" style="width:15%;">LAST SEEN</th>
                  <th class="sort align-middle text-end pe-0" scope="col" data-sort="last-order" style="width:10%;min-width: 150px;">LAST ORDER</th>
                </tr>
              </thead>
              <tbody class="list" id="customers-table-body">
                  @foreach($users as $user)
                  <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                    <td class="fs--1 align-middle ps-0 py-3">
                      <div class="form-check mb-0 fs-0">
                        <input class="form-check-input" type="checkbox" data-bulk-select-row='{"customer":{"avatar":"/team/32.webp","name":"Carry Anna"},"email":"annac34@gmail.com","city":"Budapest","totalOrders":89,"totalSpent":23987,"lastSeen":"34 min ago","lastOrder":"Dec 12, 12:56 PM"}' />
                      </div>
                    </td>
                    <td class="customer align-middle white-space-nowrap pe-5"><a class="d-flex align-items-center" href="#!">
                        <div class="avatar avatar-m"><img class="rounded-circle" src="../../../assets/img/team/32.webp" alt="" />
                        </div>
                        <p class="mb-0 ms-3 text-1100 fw-bold">{{$user->name}}</p>
                      </a></td>
                    <td class="email align-middle white-space-nowrap pe-5"><a class="fw-semi-bold" href="mailto:annac34@gmail.com">{{$user->email}}</a></td>
                    <td class="total-orders align-middle white-space-nowrap fw-semi-bold text-end text-1000">89</td>
                    <td class="total-spent align-middle white-space-nowrap fw-bold text-end ps-3 text-1100">$ 23987</td>
                    <td class="city align-middle white-space-nowrap text-1000 ps-7">
                      @if (auth()->user()->user_type === 'admin' && $user->id !== auth()->id())
                      <form action="{{route('update-user-type')}}" method="post">
                        @csrf
                        <select name="user_type" id="" class="form-select" onchange="this.form.submit()">
                          <option value="admin" {{$user->user_type === 'admin' ? 'selected' : ''}}>admin</option>
                          <option value="operator" {{$user->user_type === 'operator' ? 'selected' : ''}}>operator</option>
                        </select>
                        <input type="hidden" name="user_id" id="" value="{{$user->id}}">
                      </form>
                      @else
                      {{$user->user_type}}
                      @endif
                    </td>
                    <td class="last-seen align-middle white-space-nowrap text-700 text-end">34 min ago</td>
                    <td class="last-order align-middle white-space-nowrap text-700 text-end">Dec 12, 12:56 PM</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              @else 
              <span class="d-block pt-3 pb-2 text-center">There is no users</span>
              <hr>
              @endif
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
      $('#users-table').DataTable({
          
      })
  })
</script>
@endsection