@extends('master')

@section('content')

@if ($contents)
<div class="container">
    {{ Breadcrumbs::render('content', $url) }}
    @foreach ($contents as $content)
        <div class="row justify-content-center">
          <div class="col">
              {{-- <div class="col"> --}}
                <h2>{{ $content['ctitle'] }}</h2>
                {{-- {!! !!} is for ignoring html entities (not preventing xss attacks) --}}
                <p>{!! $content['article'] !!}</p>
              {{-- </div> --}}
          </div>
        </div>
    @endforeach
@else
    <div class="row">
      <div class="col">
        <h2>No content for this menu link</h2>
      </div>
    </div>
</div>
@endif
@endsection