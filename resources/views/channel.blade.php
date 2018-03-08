@extends('layouts.app')

@section('content')


    <div class="card" style="margin: 10px">

        <div class="card-header discussion-header font-weight-bold text-center"> 

            Channel : {{ $channel_name }} 

        </div>
    
    </div>


    @forelse( $discussions as $discussion )

        <div class="card" style="margin: 10px">

            <div class="card-header discussion-header">
                
                <a  href="{{ route( 'discussions.show', [ 'id' => $discussion->id ] ) }}" 

                    style="text-decoration: none;" 

                    class="font-weight-bold">
                    
                    {{ str_limit( $discussion->title, 80 ) }}

                </a>

                <span class="pull-right"> 

                    <span style="vertical-align: middle;"><i class="far fa-clock"></i></span>

                    {{ $discussion->created_at->diffForHumans() }} 

                </span>

            </div>

            <div class="card-body text-center">
            
               
                <div>
                    
                    {{ str_limit( $discussion->content, 150 ) }}

                </div>

            </div>


            <div class="card-footer discussion-footer">

                <span>
                        
                    <img src="{{ $discussion->user->avatar }}" alt="{{ $discussion->user->name }}" width="30px">

                    &nbsp;<span> {{ $discussion->user->name }} </span>

                </span>
                
                <p class="pull-right"> 

                    <span style="vertical-align: middle;"><i class="far fa-comments"></i></span>

                    {{ $discussion->replies()->count() }} reply 

                </p>

            </div>

        </div>

    @empty


        <div class="card" style="margin: 10px">

            <div class="card-header font-weight-bold text-center text-danger"> 

                No Discussions Found for '{{ $channel_name }}' Channel

            </div>

        </div>

    @endforelse


    <div class="text-center">
        
        {{ $discussions->links() }}

    </div>

@endsection
