@extends('layouts.main')
@section('content')
<div class="container">
      <div class="covid-block basic-flex ">
      	<div class="covid-block__title basic-flex">
      	  <div class="covid-title__img"></div>
      	  <a href="#" class="covid-title__text">Коронавирус COVID-19
      	    в Узбекистане</a>
      	</div>
      	<div class="covid-block__stats basic-flex">
      	  <div class="stats__item basic-flex">
      	    <div class="stats__img"></div>
      	    <div class="stats-text-box">
      	      <h4>Инфицированы</h4>
      	      <p>3000</p>
      	    </div>
      	  </div>
      	  <div class="stats__item basic-flex">
      	    <div class="stats__img"></div>
      	    <div class="stats-text-box">
      	      <h4>Выздоровели</h4>
      	      <p>2438</p>
      	    </div>
      	  </div>
      	  <div class="stats__item basic-flex">
      	    <div class="stats__img"></div>
      	    <div class="stats-text-box">
      	      <h4>Умерли</h4>
      	      <p>12</p>
      	    </div>
      	  </div>
      	</div>
      </div>
    </div>

    <section class="news">
      <div class="container">
        <div class="news__wrapper basic-flex">

            <section class="news">
                <div class="container">
                  <div class="news__wrapper basic-flex">
                    <div class="column-news">
                      <h2 class="news__title">Последние новости</h2>

                        @foreach ( $posts as $item)
                            <li class="news__item">
                               <a href="{{ route('pages.get_article', $item->id) }}" class="basic-flex news__link">
                               <div class="news-image-wrapper"><img src="/files/{{ $item->img }}" alt="Bottom Img"></div>
                               <div class="news-box basic-flex">
                                   <h4 class="news__title">{{ $item->title_uz }}</h4>
                                   <p class="news__description">{{ $item->body_uz }}
                                   </p>
                                   <span class="news__date basic-flex">{{ $item->created_at }}</span>
                             </div>
                             </a>
                        </li>
                        @endforeach
                        <ul>
                            <button type="button" class="btn load-more-btn">Больше новостей</button>
                        </div>



          @include('sections.mostpopularnews')
        </ul>

        </div>
      </div>
    </div>
  </section>
@endsection
