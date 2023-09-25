<section class="posts">
    <div class="container">
      <ul class="posts__list basic-flex">
        @foreach ($posts as $item)

          <li class="posts__item">
          <a href="{{ route('pages.get_article',$item->id) }}">
            <img src="/assets/img/top1.png" alt="Image" class="posts__img">
            <h2 class="posts__title">Мирзиёев рассказал, зачем было построено
              Сардобинское водохранилище</h2>
            <span class="posts__date">05:28 / 16.05.2020</span>
          </a>
          </li>

        @endforeach


      </ul>
    </div>
  </section>
