@extends('theme.default')

@section('content')
    
<div class="content">
    <h2 class="mb-4">EDIT MATERIAL</h2>
    <div class="row">
      <div class="col-xl-9">
        <form class="row g-3 mb-6" action="{{route('materials.update', $material)}}" method="POST">
            @method('PATCH')
            @csrf
          <div class="col-sm-6 col-md-8">
            <div class="form-floating">
              <input class="form-control" id="floatingInputGrid" type="text" name="name" id="name" placeholder="Project title" value="{{$material->name}}"/>
              <label for="floatingInputGrid">MATERIAL NAME</label>
            </div>
          </div>
          <div class="col-12 gy-6">
            <div class="row g-3 justify-content-end">
              <div class="col-auto">
                <button class="btn btn-phoenix-primary px-5">Cancel</button>
              </div>
              <div class="col-auto">
                <button class="btn btn-primary px-5 px-sm-15" type="submit">EDIT MATERIAL</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection