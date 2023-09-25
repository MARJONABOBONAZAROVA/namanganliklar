@extends('admin.layouts.main')
@section('content')
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Postlar</h6>
                            <div class="d-flex justify-content-end m-3">
                                <a href="{{ route('admin.posts.index') }}"><button type="button" class="btn btn-primary m-2"><ion-icon style="font-size: 20px;"2 name="create-outline"></ion-icon>Orqaga</button></a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $posts->id }}</td>
                                    </tr>

                                    <tr>
                                        <td>Title uz</td>
                                        <td>{{ $posts->title_uz }}</td>
                                    </tr>

                                    <tr>
                                        <td>Title ru</td>
                                        <td>{{ $posts->title_ru }}</td>
                                    </tr>

                                    <tr>
                                        <td>Image</td>
                                        <td><img src="/files/{{ $posts->img }}" width="90px"></td>
                                    </tr>
                                    <tr>
                                        <td>Body uz</td>
                                        <td>{{ $posts->body_uz }}</td>
                                    </tr>

                                    <tr>
                                        <td>Body ru</td>
                                        <td>{{ $posts->body_ru }}</td>
                                    </tr>

                                    <tr>
                                        <td>Category :</td>
                                        <td>{{ $posts->category_id }}</td>
                                    </tr>

                                    <tr>
                                        <td>Tag :</td>
                                        <td>@foreach ($posts->tags as $item)
                                            {{$item->tag_uz}} <br>

                                        @endforeach</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
</div>
@endsection
