@extends('layouts.app')

@section('content')


    <link  rel="stylesheet" 
           href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.1.0/font-awesome-animation.min.css" />

    <div class="card" style="margin: 10px">

        <div class="card-header discussion-header">
            
            <span class="font-weight-bold" style="color: #007bff">
                
                {{ $discussion->title  }}

            </span>

            <span class="pull-right"> 

                <span style="vertical-align: middle;"><i class="far fa-clock"></i></span>

                {{ $discussion->created_at->diffForHumans() }}  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;

       
                @if( $discussion->is_being_watched_by_current_user( $discussion->id ) )

                    <a  href="{{ route( 'discussion.unwatch', [ 'id' => $discussion->id ] ) }}" 

                        title="Unfollow The Discussion" 

                        style="color: #e74c3c; cursor: pointer;"> 

                        <i class="fas fa-lg fa-bell-slash"></i>

                    </a>

                @else

                    <a  href="{{ route( 'discussion.watch', [ 'id' => $discussion->id ] ) }}" 

                        title="Follow The Discussion" 

                        style="color: #f1c40f; cursor: pointer;"> 

                        <i class="fa fa-bell fa-lg faa-slow faa-ring animated" ></i> 

                    </a>

                @endif


            </span>

        </div>


        <div class="card-body text-center">
        
            <div>

                {!! Markdown::convertToHtml( $discussion->content ) !!}


                @if( $correct_answer )

                    <hr>

                    <div class="text-center font-weight-bold text-uppercase" 
                         style="margin: 30px 10px 20px 10px; color: rgb(40, 167, 69) !important">

                        <u> <h5>correct answer</h5> </u>

                    </div>

                    <div class="card correct_answer_card">
                        
                        <div class="ribbon"><span>Answered</span></div>

                        <div class="card-header discussion-header"

                            style="border-bottom: 1px solid rgb(40, 167, 69) !important;" >
                            
                            <span class="pull-left">

                                <img    src="{{ $correct_answer->user->avatar }}" 
                                        alt="{{ $correct_answer->user->name }}" 
                                        width="30px">

                                &nbsp;<span> {{ $correct_answer->user->name }} </span>

                            </span>                

                            <span class="pull-right" style="margin-right: 30px"> {{ $discussion->created_at->diffForHumans() }} </span>

                        </div>

                        <div class="card-body">
                        
                            <div>
                                
                                {{ $correct_answer->content }}

                            </div>

                        </div>

                    </div>

                @endif

            </div>

        </div>


        <div class="card-footer discussion-footer">

            <span>
                    
                <img src="{{ $discussion->user->avatar }}" alt="{{ $discussion->user->name }}" width="30px">

                &nbsp;<span> {{ $discussion->user->name }} </span>

            </span>

            
            <p class="pull-right"> 

                <span style="vertical-align: middle;"><i class="far fa-comments"></i></span>

                {{ $discussion->replies()->count() }} replies 

            </p>

        </div>

    </div>


    <div    style="margin: 40px 10px 10px 10px; color: #FFF" 

            class="bg-primary text-center font-weight-bold text-uppercase"> 

        <u> Replies to the post </u>

    </div>


    @forelse( $discussion->replies as $reply )

        <div class="card" style="margin: 40px 10px 10px 10px">

            <div class="card-header discussion-header">
                
                <span>

                    <img src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}" width="30px">

                    &nbsp;<span> {{ $reply->user->name }} </span>

                </span>                


                {{-- <span class="font-weight-bold">
                    
                    {{ $reply->content }}

                </span> --}}

                &nbsp;&nbsp;<span class="pull-right"> {{ $discussion->created_at->diffForHumans() }} </span>

            </div>

            <div class="card-body">
            
                <div>
                    
                    {{ $reply->content }}

                </div>

            </div>


            <div class="card-footer ">


                @if( $correct_answer && $correct_answer->id == $reply->id )

                    <a class="font-weight-bold" style="cursor: pointer; color: rgb(40, 167, 69) !important;">

                        <i class="fas fa-lg fa-check-circle"></i> 

                        &nbsp; <u>Correct Answer</u>
                        
                    </a>

                @else

                    @if( Auth::id() == $discussion->user->id )

                        <a  href="{{ route( 'correct.answer', [ 'id' => $reply->id ] ) }}" 

                            class="font-weight-bold" style="color: GREEN; text-decoration: none;"> 

                            Mark As Correct Answer 

                        </a>

                    @endif

                @endif


                
                @if( $reply->is_liked_by_current_user( $reply->id ) )
                    
                    <a  href="{{ route( 'reply.unlike', [ 'id' => $reply->id ] ) }}" 
                        class="btn btn-warning btn-sm pull-right" 
                        style="cursor: pointer;">

                        <i class="fas fa-lg fa-thumbs-down" style="color: #FFF"></i> UnLike
                        
                    </a>

                @else

                    <a  href="{{ route( 'reply.like', [ 'id' => $reply->id ] ) }}" 
                        class="btn btn-success btn-sm pull-right" 
                        style="cursor: pointer;">

                        <i class="fas fa-lg fa-thumbs-up"></i> Like
                        
                        <span class="badge" style="background-color: #FFF; color: #000;">
                            {{ $reply->likes->count() }}
                        </span>                        
                    </a>


                @endif

               
            </div>

        </div>

    @empty

    @endforelse



    @if( !$correct_answer )

        @if( Auth::check() )

            <div class="card" style="margin: 40px 10px 10px 10px">
                
                <div class="card-body">
                    
                    <form   class="form-horizontal" 
                            action="{{ route('discussions.reply', [ 'id' => $discussion->id ]) }}" 
                            method="post">
                        
                        {{ csrf_field() }}


                        <div class="form-group">
                            
                            <label class="control-label col-sm-4" for="reply">Leave Your Reply:</label>
                            
                            <div class="col-sm-12">
                                
                                <textarea 
                                            class="form-control" 
                                            cols="8" 
                                            rows="6" 
                                            id="reply" 
                                            name="reply"></textarea>
                            
                            </div>
                        
                        </div>
                        
                        <div class="form-group"> 
                            
                            <div class="text-center">
                            
                                <button type="submit" class="btn btn-success">
                                
                                    <i class="fas fa-paper-plane"></i>&nbsp; Submit Reply
                                
                                </button>
                            
                            </div>
                        
                        </div>

                    </form>

                </div>

            </div>

        @else
        
            <div class="card">
                
                <a  href="{{ route( 'login' ) }}"  

                    style="color: #212529; text-decoration: none;" 

                    class="card-header discussion-header text-center">
                    
                    <h3> Sign in to leave a reply </h3>

                </a>

            </div>

        @endif

    @endif

@endsection
