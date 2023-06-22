@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">

<div class="col-md-12">
    <div class="row">

    
@foreach($helpGuides as $helpGuide)
    <div class="col-md-8 mt-2 ">
    <div class="card shadow-sm p-0 mb-0 bg-body rounded">
        <div class="card-header bg-white">
        {{ $helpGuide->name }}
        </div>
        <div class="card-body bg-white">
            <h5 class="card-title">{{ $helpGuide->description }}</h5>
            <a href="" class="card-text">{{ $helpGuide->link }}</a>
              
        </div>
    </div>
    </div>
    @endforeach
    <div class="col-md-4 mt-2 position-absolute  end-0 ">
    <div class="card bg-white" >
        <div class="card-header bg-white">
        Contributors
        </div>
        <div class="card-body bg-white">
            
@foreach($users as $user)
        <span class="d-block p-2  text-black"><b>{{ $user->name }}</b></span>
    @endforeach

        </div>
    </div>
    </div>
    </div>
</div>
</div>
</div>
@endsection

