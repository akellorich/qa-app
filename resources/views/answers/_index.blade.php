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

                            <a href="#" title="Mark as Best answer" class='favorite mt-2 {{$answer->status}}'>
                                <i class="fas fa-check fa-lg"></i>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div class="row">
                                <div class="col-md-8">
                                    
                                    @can("update",$answer)
                                        <a href="{{ route('questions.answers.edit',[$question->id,$answer->id])}}" class="btn btn-sm btn-outline-info">Edit</a>
                                    @endcan
                                    
                                    @can("delete",$answer)
                                        <form class="form-delete" action="{{ route('questions.answers.destroy',[$question->id,$answer->id])}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')")>Delete</button>
                                        </form>
                                    @endcan
 
                                </div>
                                <div class="col-md-4">
                                    <span class="text-muted">Answered {{$answer->created_date}}</span>
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
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>