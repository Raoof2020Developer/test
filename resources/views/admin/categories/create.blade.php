@extends('theme.default')

@section('content')
    
<div class="content">
    <h2 class="mb-4">ADD NEW CATEGORY</h2>
    <div class="row">
      <div class="col-xl-9">
        <form class="row g-3 mb-6" action="{{route('categories.store')}}" method="POST">
            @csrf
          <div class="col-sm-6 col-md-8">
            <div class="form-floating">
              <input class="form-control" id="floatingInputGrid" type="text" name="name" id="name" placeholder="Project title" />
              <label for="floatingInputGrid">CATEGORY NAME</label>
            </div>
          </div>
          <div class="col-12 gy-6">
            <div class="row g-3 justify-content-end">
              <div class="col-auto">
                <button class="btn btn-phoenix-primary px-5">Cancel</button>
              </div>
              <div class="col-auto">
                <button class="btn btn-primary px-5 px-sm-15" type="submit">ADD CATEGORY</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection