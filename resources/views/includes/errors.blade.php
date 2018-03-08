
    @if( count( $errors ) )

        <div class="alert alert-danger">

            <strong>Error!</strong> Please fix following error in order to submit the form

            <ul>
                
                @foreach( $errors->all() as $error ) 

                    <li> {{ $error }} </li>

                @endForeach

            </ul>

        </div>

    @endIf