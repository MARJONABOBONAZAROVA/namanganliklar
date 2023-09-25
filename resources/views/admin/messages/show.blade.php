@extends('admin.layouts.main')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="m-n2">

    <a href="{{ route ('admin.messages.index') }}"><button type="button" class="btn btn-primary" m-2><ion-icon style="font-size: 20px; margin-bottom 0;" name="arrow-back-outline" ></ion-icon></button></a>

</div>
               <div class="row g-4">
                 <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                      <h6 class="mb-4"> Xabarlar </h6>
                      <div class="table-responsive">
                        <table class="table">




                             <tr>
                                <th scope="row">Full name</th>
                                <th>{{ $message->full_name }}</th>
                             </tr>


                             <tr>
                                <th scope="row">Phone</th>
                                <th>{{ $message->phone }}</th>
                             </tr>

                             <tr>
                                <th scope="row">Message</th>
                                <th>{{$message->message}}</th>
                             </tr>

                             <tr>
                                <th scope="row">Date</th>
                                <th>{{$message->created_at}}</th>
                             </tr>

                      </table>
                    </div>
                </div>
            </div>
        </div>

</div>
@endsection
