@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-Title">
                        <div class="d-flex align-items-center">
                            <h1>{{ $question->title}}</h1>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index')}}" class="btn btn-outline-secondary">Back to All Questions</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media">  
                        <div class="d-flex flex-column vote-controls">
                            <a href="#" title="This is an important question" class="vote-up">
                               <i class="fas fa-caret-up fa-2x"></i>
                                <span class="votes-count">1234</span>
                            </a>
                           
                            <a href="#" title="This question is not important" class="votep-down off">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </a>

                            <a href="#" title="Click to Mark as Favorite" class='favorite mt-2 favorited'>
                                <i class="fas fa-star fa-lg"></i>
                                <span class="favorites-count">254</span>
                            </a>
                        </div>

                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Asked {{$question->created_date}}</span>
                                <div class="media mt-2">
                                    <a href="{{$question->user->url}}" class='pr-2'>
                                        <img src="{{$question->user->avatar}}" alt="">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{$question->user->url}}">
                                            {{$question->user->name}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    @include('answers._index',[
        'answers'=>$question->answers,
        'answersCount'=>$question->answers_count
    ])

    @include('answers._create')

</div>
@endsection
