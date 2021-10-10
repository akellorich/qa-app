<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{$answersCount. " ". str_plural('Answer', $answersCount)}}</h2>
                </div>
                <hr>
                @include('layouts._messages')
                @foreach($answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a href="#" title="This is an important answer" class="vote-up">
                               <i class="fas fa-caret-up fa-2x"></i>
                                <span class="votes-count">1234</span>
                            </a>
                           
                            <a href="#" title="This answer is not important" class="votep-down off">
                                <i class="fas fa-caret-down fa-2x"></i>
                            </a>

                            <a href="#" title="Mark as Best answer" class='favorite mt-2 vote-accepted'>
                                <i class="fas fa-check fa-lg"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Answered {{$question->created_date}}</span>
                                <div class="media mt-2">
                                    <a href="{{$answer->user->url}}" class='pr-2'>
                                        <img src="{{$answer->user->avatar}}" alt="">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{$answer->user->url}}">
                                            {{$answer->user->name}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>