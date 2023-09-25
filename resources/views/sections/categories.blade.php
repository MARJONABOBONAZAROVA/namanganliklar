@php
    $categories = DB::table('categories')->get();
@endphp

<ul class="navbar__menu basic-flex">

   @foreach ($categories as $item )
        <li class="menu__item"><a href="{{ route('pages.get_list', $item->id) }}">{{ $item->name_uz}}</a></li>

   @endforeach
  </ul>
