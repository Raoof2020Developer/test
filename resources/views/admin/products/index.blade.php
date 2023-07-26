@extends('theme.default')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="content">
    <div class="mb-9">
      <div class="row g-3 mb-4">
        <div class="col-auto">
          <h2 class="mb-0">Products</h2>
        </div>
      </div>
      <div id="products">
        <div class="mb-4">
          <div class="row g-3">
            <div class="col-auto">
              <div class="search-box">
                <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                  <input class="form-control search-input search" type="search" placeholder="Search products" aria-label="Search" />
                  <span class="fas fa-search search-box-icon"></span>

                </form>
              </div>
            </div>
            <div class="col-auto scrollbar overflow-hidden-y flex-grow-1">
              <div class="btn-group position-static" role="group">
                <div class="btn-group position-static text-nowrap">
                  <button class="btn btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                    Category<span class="fas fa-angle-down ms-2"></span></button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                  </ul>
                </div>
                <div class="btn-group position-static text-nowrap">
                  <button class="btn btn-sm btn-phoenix-secondary px-7 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                    Vendor<span class="fas fa-angle-down ms-2"></span></button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li>
                      <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                  </ul>
                </div>
                <button class="btn btn-sm btn-phoenix-secondary px-7 flex-shrink-0">More filters</button>
              </div>
            </div>
            <div class="col-auto">
              <form action="{{route('products.import')}}" method="POST" class="d-inline" style="margin-right: 1.5rem !important; " enctype="multipart/form-data">
                @csrf
                <input type="file" class="" name="import_products" id="import_products" onchange="this.form.submit()" style="width: 0px; height:0px; overflow: hidden;">
                <label for="import_products" class="btn btn-link text-900 me-4 px-0" style="cursor:pointer;">
                  <i class="fa-solid fa-upload fs--1 me-2"></i>
                  Import
                </label>
              </form>
              <a role="button" href="{{route('products.export')}}" class="btn btn-link text-900 me-4 px-0"><span class="fa-solid fa-file-export fs--1 me-2"></span>Export</a>
              <a role="button" href="{{route('products.create')}}" class="btn btn-primary" id="addBtn"><span class="fas fa-plus me-2"></span>Add product</a>
            </div>
          </div>
        </div>
        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-white border-top border-bottom border-200 position-relative top-1">
          <div class="table-responsive scrollbar mx-n1 px-1">

            @if ($products->count() > 0)
            <table id="products-table" class="table fs--1 mb-0">
              <thead>

                <tr>
                  <th class="white-space-nowrap fs--1 align-middle ps-0" style="max-width:20px; width:18px;">
                    <div class="form-check mb-0 fs-0">
                      <input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"products-table-body"}' />
                    </div>
                  </th>
                  <th class="sort white-space-nowrap align-middle fs--2" scope="col" style="width:70px;">PRODUCT ID</th>
                  <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="product">PRODUCT NAME</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="price" style="width:150px;">PRICE OF BUYING 1G ($)</th>
                  <th class="sort align-middle ps-4" scope="col" data-sort="category" style="width:150px;">PRICE OF SELLING 1G ($)</th>
                  <th class="sort align-middle ps-3" scope="col" data-sort="tags" style="width:250px;">WEIGHT (G)</th>
                  <th class="sort align-middle fs-0 text-center ps-4" scope="col" style="width:125px;">QUANTITY</th>
                  <th class="sort align-middle ps-4" scope="col" data-sort="vendor" style="width:200px;">CATEGORY</th>
                  <th class="sort align-middle ps-4" scope="col" data-sort="time" style="width:50px;">MATERIAL</th>
                  <th class="sort align-middle ps-4" scope="col" data-sort="time" style="width:50px;">OPTIONS</th>
                  <th class="sort text-end align-middle pe-0 ps-4" scope="col"></th>
                </tr>
              </thead>
              <tbody class="list" id="products-table-body">
                @foreach ($products as $product)
                <tr class="position-static">
                  <td class="fs--1 align-middle">
                    <div class="form-check mb-0 fs-0">
                      <input class="form-check-input" type="checkbox" data-bulk-select-row='{"product":"Fitbit Sense Advanced Smartwatch with Tools for Heart Health, Stress Management & Skin Temperature Trends, Carbon/Graphite, One Size (S & L Bands...","productImage":"/products/1.png","price":"$39","category":"Plants","tags":["Health","Exercise","Discipline","Lifestyle","Fitness"],"star":false,"vendor":"Blue Olive Plant sellers. Inc","publishedOn":"Nov 12, 10:45 PM"}' />
                    </div>
                  </td>
                  <td class="align-middle white-space-nowrap py-0">
                    {{$product->id}}
                  </td>
                  <td class="product align-middle ps-4">
                    <img src="{{asset('storage/'. $product->image_path)}}" alt="" width="50" height="50">
                    <a class="fw-semi-bold line-clamp-3 mb-0" href="#!">{{$product->name}}</a>
                  </td>
                  <td class="price align-middle white-space-nowrap text-end fw-bold text-700 ps-4">{{$product->gram_buying_price}}</td>
                  <td class="category align-middle white-space-nowrap text-600 fs--1 ps-4 fw-semi-bold">{{$product->gram_selling_price}}</td>
                  <td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">
                    {{$product->gram_weight}}
                  </td>
                  <td class="align-middle review fs-0 text-center ps-4">
                    {{$product->quantity}}  
                  </td>
                  <td class="vendor align-middle text-start fw-semi-bold ps-4">
                    {{$product->category->name}}
                  </td>
                  <td class="time align-middle white-space-nowrap text-600 ps-4">
                    {{$product->material->name}}
                  </td>
                  <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                    <a href="{{route('products.edit', $product)}}" class="btn btn-info btn-sm">
                      <i class="fa fa-edit"></i>
                      Edit  
                  </a>
                  <form action="{{route('products.destroy', $product)}}" class="d-inline-block" method="POST">
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
            <span class="d-block text-center pt-4 pb-3">There is no products</span>
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
      $('#products-table').DataTable({
          
      })
  })
</script>
@endsection