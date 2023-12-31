@extends('layouts.main')
@section('content')




    @include('sections.second')

    @include('sections.posts')

    <div class="container">
      <div class="notification basic-flex">
        <div class="notification__text basic-flex">
          <h3>Хотите узнать новости первыми? подключите уведомления!
          </h3>
        </div>
        <button type="button" class="notification__button btn">
          Включит  уведомления!
        </button>
      </div>
    </div>

    <section class="news">
      <div class="container">
        <div class="news__wrapper basic-flex">
          @include('sections.news')
          @include('sections.mostpopularnews')
        </div>
      </div>
    </section>
    @include('sections.app')
  </main>

@endsection
