@extends('admin.layouts.main')
@section('content')

<!-- Table Start -->
         <div class="container-fluid pt-4 px-4">
            @if($message = Session::get('success'))
               <div class="alert alert-primary" role="alert">
                  {{ $message }}
               </div>
    @endif
            <div class="row g-4">
              <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                  <h6 class="mb-4">Kategoriyalar</h6>
                  <div class="d-flex justify-content-end m-3">
                    @can('create category')
                    <a href="{{ route('admin.categories.create') }}"><button type="button" class="btn btn-primary m-2"><ion-icon style="font-size: 20px;"2 name="create-outline"></ion-icon>Yaratish</button></a>
                    @endcan
                 </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nomi uz</th>
                                <th scope="col">Nomi ru</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item )

                            <tr>
                                <th scope="row">{{ ++$loop->index}}</th>
                                <td>{{ $item->name_uz}}</td>
                                <td>{{ $item->name_ru}}</td>
                                <td>
                                    <form method="POST" action="{{route('admin.categories.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')

                                        <a class="btn btn-primary" href="{{ route('admin.categories.show', $item->id) }}"><ion-icon name="eye-outline"></ion-icon></a>

                                        @can('edit category')
                                        <a class="btn btn-primary" href="{{ route('admin.categories.edit', $item->id) }}"><ion-icon name="create-outline"></ion-icon></a>
                                        @endcan


                                        @can('delete category')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Haqiqatdan ham ôchirmoqchimisiz ?')"><ion-icon name="trash-outline"></ion-icon></button>
                                         @endcan

                                    </form>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End --
@endsection
