<nav>
  <ul class="flex justify-center mt-6 border-solid">
    <li class="mr-6">
      <button><a href="{{ route('rents.index') }}">Kölcsönzések</a></button>
    </li>
    <li class="mr-6">
      <button><a href="{{ route('renthistories.index') }}">Kölcsönzés előzmény</a></button>
    </li>
    <li class="mr-6">
      <button><a href="{{ route('books.index') }}">Könyvek</a></button>
    </li>
    <li class="mr-6">
      <button><a href="{{ route('isbns.index') }}">ISBN számok</a></button>
    </li>
    <li class="mr-6">
      <button><a href="{{ route('people.index') }}">Tagok</a></button>
    </li>
    <li class="mr-6">
      <form action="{{route('logout')}}" method="post" class="logout">
        @csrf
        @method('POST')
        <input type="submit" value="Kijelentkezés">
      </form>
    </li>
  </ul>
</nav>
<!-- <h1 class="text-center">Üdvözöllek, {{Auth::user()->name}}!</h1> -->