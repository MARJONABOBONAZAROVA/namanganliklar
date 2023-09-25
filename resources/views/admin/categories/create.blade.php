@extends('admin.layouts.main')
@section('content')
<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="m-n2">
        <a href="{{ route('admin.categories.index') }}"><button type="button" class="btn btn-primary m-2"><ion-icon style="font-size: 20px; margin-bottom: 0;" name="arrow-back-outline"></ion-icon>Orqaga</button></a>
    </div>

    <div class="row g-4">
        <div class="col-sm-12 col-xl-6 form-control">
            <div class="bg-light rounded h-100 p-4 form-control">
                <h6 class="mb-4">Kategoriya qôshish</h6>
                <form method="Post" action="{{ route('admin.categories.store')}}">
                    @csrf
                    <div class="mb-3">
                        <label  class="form-label">nomi uz</label>
                        <input type="text" name="name_uz" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">nomi ru</label>
                        <input type="text" name="name_ru" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>

                    <button type="submit" class="btn btn-primary">Qôshish</button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- Form End -->
@endsection
