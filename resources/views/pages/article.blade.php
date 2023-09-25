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

<section class="article">
  <div class="container">
    <div class="news__wrapper basic-flex">
      <div class="article__wrapper">
       {{--  <ion-icon name="eye-outline"></ion-icon>{{ $posts->views}} --}}
        <h2 class="article__title">{{ $post['title_uz']}}
        <span class="article__date basic-flex">{{ $post['created_at']}}</span>
        <img src="/files/ {{ $post->img }} " alt="Шавкат Мирзиёев строго предупредил хокимов всех уровней
        ">
        <p class="important-text">
          {{ $post->body_uz}}


        </p>

        <div class="hashtags basic-flex">


          <a href="#">#хоким</a>
          <a href="#">#Шавкат Мирзиёев</a>
          <a href="#">#пандемия</a>
        </div>
      </div>
      <div class="popular-news">
        <div class="popular-news-wrapper">
          <h4 class="popular-news__title">Cамые популярные новости</h4>
          <ul class="popular-news__list">
            <li class="popular-news__item">
              <a href="#">
                <p class="popular-news__description">По факту прорыва Сардобинского водохранилища возбуждено уголовное дело</p>
                <span class="popular-news__date">11:31 / 15.05.2020</span>
              </a>
            </li>
            <li class="popular-news__item">
                <a href="#">
                  <p class="popular-news__description">По факту прорыва Сардобинского водохранилища возбуждено уголовное дело</p>
                  <span class="popular-news__date">11:31 / 15.05.2020</span>
                </a>
              </li>
              <li class="popular-news__item">
                <a href="#">
                  <p class="popular-news__description">По факту прорыва Сардобинского водохранилища возбуждено уголовное дело</p>
                  <span class="popular-news__date">11:31 / 15.05.2020</span>
                </a>
              </li>
              <li class="popular-news__item">
                <a href="#">
                  <p class="popular-news__description">По факту прорыва Сардобинского водохранилища возбуждено уголовное дело</p>
                  <span class="popular-news__date">11:31 / 15.05.2020</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="ads-placeholder">
            <h4>ADS PLACEHOLDER</h4>
          </div>
        </div>
        <div class="related-news">
          <h3 class="related-news__title">Новости по теме
          </h3>
          <div class="related-posts basic-flex">
            @foreach ($posts as $item)

                 <div class="posts__item">
                     <a href="{{ route('pages.get_article', $item->id) }}">
                     <img src="/assets/img/top1.png" alt="Image" class="posts__img">
                     <h2 class="posts__title">{{ $item->title_uz}}</h2>
                     <span class="posts__date">05:28 / 16.05.2020</span>
                     </a>
                  </div>

            @endforeach


          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
