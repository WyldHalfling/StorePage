<div class="grid-x grid-padding-x expanded cell">
    @if(isset($errors) && count((array)$errors))
        <div class="callout alert" data-closable>
            @foreach($errors as $error_array)
                @foreach($error_array as $error_item)
                    {{ $error_item }} <br>
                @endforeach
            @endforeach

            <button class="close-button" aria-label="Dismiss Message" type="button" data-close>
                <span arial-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if((isset($success) && count((array)$success)) || (\App\Classes\Session::has('success')))
        <div class="callout success" data-closable>
            @if(isset($success))
                {{ $success }}
            @elseif(\App\Classes\Session::has('success'))
                {{ \App\Classes\Session::flash('success') }}
            @endif
            <button class="close-button" aria-label="Dismiss Message" type="button" data-close>
                <span arial-hidden="true">&times;</span>
            </button>
        </div>
    @endif

</div>