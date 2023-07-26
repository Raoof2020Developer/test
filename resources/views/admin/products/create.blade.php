@extends('theme.default')

@section('content')

<div class="content">
    <form class="mb-9" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row g-3 flex-between-end mb-5">
        <div class="col-auto">
          <h2 class="mb-2">Add a product</h2>
          <h5 class="text-700 fw-semi-bold">Orders placed across your store</h5>
        </div>
        <div class="col-auto">
          <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Publish product</button>
        </div>
      </div>
      <div class="row g-5">
        <div class="col-12 col-xl-8">
          <h4 class="mb-3">Product Name</h4>
          <input class="form-control mb-5" type="text" name="name" placeholder="Write title here..." />
          @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
          @enderror
          <h4 class="mb-3">Product Image</h4>

          <input type="file" name="image_path" class="form-control" />
          @error('image_path')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
          @enderror
          </div>
          <h4 class="mb-3">Inventory</h4>
          <div class="row g-0 border-top border-bottom border-300">
            <div class="col-sm-4">
              <div class="nav flex-sm-column border-bottom border-bottom-sm-0 border-end-sm border-300 fs--1 vertical-tab h-100 justify-content-between" role="tablist" aria-orientation="vertical"><a class="nav-link border-end border-end-sm-0 border-bottom-sm border-300 text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center active" id="pricingTab" data-bs-toggle="tab" data-bs-target="#pricingTabContent" role="tab" aria-controls="pricingTabContent" aria-selected="true"> <span class="me-sm-2 fs-4 nav-icons" data-feather="tag"></span><span class="d-none d-sm-inline">Pricing</span></a><a class="nav-link border-end border-end-sm-0 border-bottom-sm border-300 text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="restockTab" data-bs-toggle="tab" data-bs-target="#restockTabContent" role="tab" aria-controls="restockTabContent" aria-selected="false"> <span class="me-sm-2 fs-4 nav-icons" data-feather="package"></span><span class="d-none d-sm-inline">Restock</span></a><a class="nav-link border-end border-end-sm-0 border-bottom-sm border-300 text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="advancedTab" data-bs-toggle="tab" data-bs-target="#advancedTabContent" role="tab" aria-controls="advancedTabContent" aria-selected="false"> <span class="me-sm-2 fs-4 nav-icons" data-feather="truck"></span><span class="d-none d-sm-inline">Advanced</span></a></div>
            </div>
            <div class="col-sm-8">
              <div class="tab-content py-3 ps-sm-4 h-100">
                <div class="tab-pane fade show active" id="pricingTabContent" role="tabpanel">
                  <h4 class="mb-3 d-sm-none">Pricing</h4>
                  <div class="row g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-2 text-1000">Price of buying 1g</h5>
                      <input class="form-control" name="gram_buying_price" type="decimal" placeholder="$$$" />
                      @error('gram_buying_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-2 text-1000">Price of selling 1g</h5>
                      <input class="form-control" name="gram_selling_price" type="decimal" placeholder="$$$" />
                      @error('gram_selling_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-2 text-1000">Max discount</h5>
                      <input class="form-control" name="max_discount" type="decimal" placeholder="$$$" />
                      @error('max_discount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade h-100" id="restockTabContent" role="tabpanel" aria-labelledby="restockTab">
                  <div class="d-flex flex-column h-100">
                    <h5 class="mb-3 text-1000">Add to Stock</h5>
                    <div class="row g-3 flex-1 mb-4">
                      <div class="col-sm-7">
                        <input class="form-control" name="quantity" type="number" placeholder="Quantity" />
                        @error('quantity')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{$message}}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="col-sm">
                        <button class="btn btn-primary" type="button"><span class="fa-solid fa-check me-1 fs--2"></span>Confirm</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="advancedTabContent" role="tabpanel" aria-labelledby="advancedTab">
                  <h5 class="mb-3 text-1000">Advanced</h5>
                  <div class="row g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-2 text-1000">Reference</h5>
                      <input class="form-control" type="text" name="ref" placeholder="ISBN Number" />
                      @error('ref')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-2 text-1000">Designation</h5>
                      <input class="form-control" type="text" name="designation" placeholder="ISBN Number" />
                      @error('designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-2 text-1000">Weight (G)</h5>
                      <input class="form-control" type="decimal" name="gram_weight" placeholder="ISBN Number" />
                      @error('gram_weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-4">
          <div class="row g-2">
            <div class="col-12 col-xl-12">
              <div class="card mb-3">
                <div class="card-body">
                  <h4 class="card-title mb-4">Organize</h4>
                  <div class="row g-3">
                    <div class="col-12 col-sm-6 col-xl-12">
                      <div class="mb-4">
                        <div class="d-flex flex-wrap mb-2">
                          <h5 class="mb-0 text-1000 me-2">Category</h5><a class="fw-bold fs--1" href="{{route('categories.create')}}">Add new category</a>
                        </div>
                        <select class="form-select mb-3" name="category_id" aria-label="category">
                          @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 col-xl-12">
                      <div class="mb-4">
                        <div class="d-flex flex-wrap mb-2">
                          <h5 class="mb-0 text-1000 me-2">Material</h5><a class="fw-bold fs--1" href="{{route('materials.create')}}">Add new material</a>
                        </div>
                        <select class="form-select mb-3" name="material_id" aria-label="material">
                          @foreach($materials as $material)
                          <option value="{{$material->id}}">{{$material->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    {{-- <footer class="footer position-absolute">
      <div class="row g-0 justify-content-between align-items-center h-100">
        <div class="col-12 col-sm-auto text-center">
          <p class="mb-0 mt-2 mt-sm-0 text-900">Thank you for creating with Phoenix<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2023 &copy;<a class="mx-1" href="https://themewagon.com">Themewagon</a></p>
        </div>
        <div class="col-12 col-sm-auto text-center">
          <p class="mb-0 text-600">v1.12.0</p>
        </div>
      </div>
    </footer> --}}
  </div>
@endsection