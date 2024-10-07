@php
// Ambil nama route saat ini
$currentRouteName = Route::currentRouteName();
// Pisahkan nama route menjadi bagian-bagian
$routeParts = explode('.', $currentRouteName);
// Route bagian pertama selalu ada (misal: admin)
$baseRoute = array_shift($routeParts);
@endphp

<ul class="flex space-x-2 rtl:space-x-reverse">
  <li>
    <a href="{{ route($baseRoute . '.dashboard') }}" class="text-primary hover:underline">Dashboard</a>
  </li>

  @foreach ($routeParts as $index => $part)
  <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
    <span>{{ ucwords(str_replace('-', ' ', $part)) }}</span>
  </li>
  @endforeach
</ul>
