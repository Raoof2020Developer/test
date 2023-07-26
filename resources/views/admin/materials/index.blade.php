@extends('theme.default')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')
<div class="content">
    <div class="mb-9">
      <div class="row g-3 mb-4">
        <div class="col-auto">
          <h2 class="mb-0">Materials</h2>
        </div>
      </div>
      <div id="products" data-list='{"valueNames":["product","price","material","tags","vendor","time"],"page":10,"pagination":true}'>
        <div class="mb-4">
          <div class="row g-3">
            <div class="col-auto scrollbar overflow-hidden-y flex-grow-1">
              <div class="btn-group position-static" role="group">
              </div>
            </div>
            <div class="col-auto">
              <a role="button" href="{{route('materials.create')}}" class="btn btn-primary" id="addBtn"><span class="fas fa-plus me-2"></span>Add Material</a>
            </div>
          </div>
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
          <div class="table-responsive scrollbar mx-n1 px-1">
            @if ($materials->count() > 0)
            <table id="materials-table" class="table fs--1 mb-0 table-striped">
              <thead>
                <tr>
                  <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                    <div class="form-check mb-0 fs-0">
                      <input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"products-table-body"}' />
                    </div>
                  </th>
                  <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:250px;" data-sort="product">MATERIAL ID</th>

                  <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:250px;" data-sort="product">MATERIAL NAME</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:150px;">OPTIONS</th>

                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:150px;"></th>
                </tr>
              </thead>
              <tbody class="list" id="products-table-body">
                @foreach ($materials as $material)
                <tr class="position-static">
                  <td class="fs--1 align-middle">
                    <div class="form-check mb-0 fs-0">
                      <input class="form-check-input" type="checkbox" data-bulk-select-row='{"product":"Fitbit Sense Advanced Smartwatch with Tools for Heart Health, Stress Management & Skin Temperature Trends, Carbon/Graphite, One Size (S & L Bands...","productImage":"/products/1.png","price":"$39","material":"Plants","tags":["Health","Exercise","Discipline","Lifestyle","Fitness"],"star":false,"vendor":"Blue Olive Plant sellers. Inc","publishedOn":"Nov 12, 10:45 PM"}' />
                    </div>
                  </td>
                  <td class="align-middle white-space-nowrap py-0">{{$material->id}}</td>
                  <td class="product align-middle ps-4"><a class="fw-semi-bold line-clamp-3 mb-0" href="#!">{{$material->name}}</a></td>
                  <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4">
                    <a href="{{route('materials.edit', $material)}}" class="btn btn-info btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit  
                  </a>
                  <form action="{{route('materials.destroy', $material)}}" class="d-inline-block" method="POST">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                          <i class="fa fa-trash"></i>
                          Remove
                      </button>
                  </form>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            <span class="d-block text-center pt-4 pb-3">There is no materials</span>
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
      $('#materials-table').DataTable({
          
      })
  })
</script>
@endsection