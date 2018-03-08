@extends( 'layouts.app' )

@section( 'content' )
    

    <div class="card">
        
        <div class="card-header">
            
            All Channels 

             <span class="pull-right">
                    
                <a href="" class="btn btn-primary">

                    <i class="fas fa-plus-circle"></i> Add New
                </a>
            
            </span> 

        </div>


        <div class="card-body">
            
        
            <table class="table table-bordered">
                
                <thead>

                    <tr>
                        
                        <th>#</th>                  
                        
                        <th>Name</th>                   
                        
                        <th width="15%">Action</th>     

                    </tr>

                </thead>
                
                <tbody>
                    
                    @forelse( $channels as $index => $channel )

                        <tr>
                            
                            <td> {{ $index+1 }}  </td>

                            <td> {{ $channel->name }}  </td>

                            <td> 

                                <a  href="{{ route( 'channels.edit', [ 'id' => $channel->id ] ) }}" 
                                    class="btn btn-success btn-sm"> 

                                    <i class="fas fa-pencil-alt"></i> 

                                </a> 


                                <form   action="{{ route( 'channels.destroy', [ 'id' => $channel->id ] ) }}"
                                        style="display: inline-block;" method="post">
                                    

                                    {{ csrf_field() }}

                                    {{ method_field( 'DELETE' ) }}

                                    <button type="submit" class="btn btn-danger btn-sm"> 

                                        <i class="fas fa-times"></i> 

                                    </button>

                                </form>

                              

                            </td>


                        </tr>

                    @empty 

                        <tr> 

                            <td colspan="4" class="text-center"> No record found. </td> 

                        </tr>


                    @endforelse

                </tbody>

            </table>

        </div>

    </panel>

@stop