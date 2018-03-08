@extends( 'layouts.app' )

@section( 'content' )
    
    
    {{-- @include( 'admin.includes.errors' ) --}}
    

    <div class="card">
        
        <div class="card-header">
            
            Create New Channel

        </div>


        <div class="card-body">
            
            <form class="form-horizontal" action="{{ route('channels.store') }}" method="post">
                
                {{ csrf_field() }}

                <div class="form-group">
                    
                    <label class="control-label col-sm-2" for="email">Name:</label>
                    
                    <div class="col-sm-10">
                        
                        <input type="text" class="form-control" name="name" placeholder="Enter channel name">
                    
                    </div>
                
                </div>
                
                <div class="form-group"> 
                    
                    <div class="text-center">
                    
                        <button type="submit" class="btn btn-success">Submit Channel</button>
                    
                    </div>
                
                </div>

            </form>

        </div>

    </panel>

@stop