@extends('layouts.app')

@section('content')


    @include( 'includes.errors' )


    <div class="card">
        
        <div class="card-header text-center">Create New Discussion</div>


        <div class="card-body">
            
            <form class="form-horizontal" action="{{ route('discussions.store') }}" method="post">
                
                {{ csrf_field() }}


                <div class="form-group">
                    
                    <label class="control-label col-sm-4" for="email">Select Channel:</label>
                    
                    <div class="col-sm-12">
                        
                        <select name="channel_id" class="form-control">
                            
                            @foreach( $channels as $channel )

                                <option value="{{ $channel->id }}"> {{ $channel->name }} </option>

                            @endforeach

                        </select>
                    
                    </div>
                
                </div>


                <div class="form-group">
                    
                    <label class="control-label col-sm-4" for="email">Ask A Question:</label>
                    
                    <div class="col-sm-12">
                        
                        <input class="form-control" name="title" placeholder="Write your question in brief."></input>

                    </div>
                
                </div>
                

                <div class="form-group">
                    
                    <label class="control-label col-sm-4" for="email">Details:</label>
                    
                    <div class="col-sm-12">
                        
                        <textarea 
                                    class="form-control" 
                                    cols="5" 
                                    rows="5" 
                                    name="content"
                                    placeholder="Describe your question in detail."></textarea>
                    
                    </div>
                
                </div>
                
                <div class="form-group"> 
                    
                    <div class="text-center">
                    
                        <button type="submit" class="btn btn-success">
                        
                            <i class="fas fa-paper-plane"></i>&nbsp; Start Discussion
                        
                        </button>
                    
                    </div>
                
                </div>

            </form>

        </div>

    </div>
    
@endsection
