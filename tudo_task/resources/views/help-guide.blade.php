@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="p-1 mb-1 bg-white rounded-3">
            <div class="container-fluid py-5">
            @if (session('success'))
            <div id="flash-message" class="alert alert-success">
            {{ session('success') }}
            </div>
            @endif


                <form action="{{ route('helpguide.store') }}" method="POST" >
                @csrf
          
                    <div class="form-group">
                    <label for="exampleInputEmail1">Link</label>
                        <input type="url" name="url" id="url"  placeholder="Enter link" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') }}">
                         <!-- error message untuk title -->
                            @error('url')
                                <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                </div>
                            @enderror
                       
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" > </textarea>
                         <!-- error message untuk title -->
                         @error('description')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                    </div>

                    <input type = 'submit' class="mt-2 btn btn-success submit-form " id="create_new">
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    // Wait for the document to be ready
    $(document).ready(function () {
        // Set the duration (in milliseconds) for the flash message to be displayed
        var duration = 2000; // 2 seconds

        // Hide the flash message after the specified duration
        setTimeout(function () {
            $('#flash-message').fadeOut('slow');
        }, duration);
        
    });
</script>
<script>
    // Wait for the document to be ready
    $(document).ready(function () {
        // Set the duration (in milliseconds) for the error messages to be displayed
        var duration = 2000; // 2 seconds

        // Hide the error messages after the specified duration
        setTimeout(function () {
            $('.alert').fadeOut('slow');
        }, duration);
    });
</script>