@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.create')}}" class="btn btn-outline-secondary">Ask a Question</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('layouts._messages')
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column counters">

                                <div class="votes">
                                    <strong>{{ $question->votes}}</strong> {{str_plural('Vote',$question->votes)}}
                                </div>

                                <div class="answers {{$question->status}}">
                                    <strong>{{ $question->answers}} </strong>{{str_plural('Answer',$question->answers)}}
                                </div>
                                    
                                <div class="views">
                                    {{ $question->views." ". str_plural('View',$question->answers)}}
                                </div>

                            </div>
                            <div class="mediabody">
                                <h3 class="mt-0">
                                        <a href="{{$question->url}}">
                                            {{ $question->title }}
                                        </a>
                                        <p class="lead">
                                            Asked by
                                            <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                            <small class="text-muted">{{$question->created_date}}</small>
                                        </p>
                                </h3>
                                {{ str_limit($question->body,250) }}
                            </div>
                        </div>
                        <hr/>
                    @endforeach
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
