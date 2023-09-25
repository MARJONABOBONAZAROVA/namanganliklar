@extends('admin.layouts.main')
@section('content')
<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
    <div class="m-n2">
        <a href="{{ route('admin.tags.index') }}"><button type="button" class="btn btn-primary m-2"><ion-icon style="font-size: 20px; margin-bottom: 0;" name="arrow-back-outline"></ion-icon>Orqaga</button></a>
    </div>
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6 form-control">
            <div class="bg-light rounded h-100 p-4 form-control">
                <h6 class="mb-4">Kategoriya yangilash</h6>
                <form method="POST" action="{{ route('admin.tags.update', $tag->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Name uz</label>
                        <input type="text" name="tag_uz" value="{{ $tag->tag_uz }}" class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name ru</label>
                        <input type="text" name="tag_ru" value="{{ $tag->tag_ru }}" class="form-control" aria-describedby="emailHelp">
                    </div>
                        <button type="submit" class="btn btn-primary">Yangilash</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Form End -->

@endsection
