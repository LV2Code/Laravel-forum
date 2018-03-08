@extends( 'layouts.app' )

@section( 'content' )
    
    @include( 'includes.errors' )
   

    <div class="card">
        
        <div class="card-header">
            
            Edit A Channel

        </div>


        <div class="card-body">
            
            <form 
                    class="form-horizontal" 

                    action="{{ route('channels.update', [ 'channel' => $channel->id ]) }}" 

                    method="post">
                    
                
                {{ csrf_field() }}

                {{ method_field( 'PUT' ) }}

                <div class="form-group">
                    
                    <label class="control-label col-sm-2">Name:</label>
                    
                    <div class="col-sm-10">
                        
                        <input 
                                type="text" 
                                class="form-control" 
                                name="name" 
                                value="{{ $channel->name }}" 
                                placeholder="Enter channel name">
                    
                    </div>
                
                </div>
                
                <div class="form-group"> 
                    
                    <div class="text-center">
                    
                        <button type="submit" class="btn btn-success">Update Channel</button>
                    
                    </div>
                
                </div>

            </form>

        </div>

    </panel>

@stop