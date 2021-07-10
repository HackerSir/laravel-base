@php
$routes = [
    'dashboard' => route('dashboard'),
    'logout'    => route('logout')
];
$user = Auth::user();
$csrfToken = csrf_token();
$currentRoute = request()->route()->getName();
@endphp

<navigation :routes='@json($routes)' :user='@json($user)' :csrf-token="'{{ $csrfToken }}'" :current-route="'{{ $currentRoute }}'"></navigation>
