@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                       <h4>Home</h4>
                    </div>
                    <div class="card-body">
                    @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                    @endif
                    <div class="col d-flex justify-content-center">                     
                            <div class="card" style="width: 40rem; margin-left: 15px; text-align: center;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ Auth::User()->name }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Welcome!</h6>
                                    <div class="col d-flex justify-content-center mt-4">
                                        <input type="text" value="HALLOW10" id="myInput" style="text-align:center;" disabled>
                                    </div>     
                                    <div class="col d-flex justify-content-center mt-2">
                                        <button class="btn btn-primary" onclick="myFunction()">Copy text</button>
                                    </div>                                    
                                </div>
                            </div>    
                    </div>                        
                    <div class="col d-flex justify-content-center mt-3">
                        <div class="row">
                            <div class="card" style="width: 40rem; margin-left: 15px; text-align: center;">
                                <div class="card-body">
                                    <h5 class="card-title">App Store</h5>                                    
                                    <a target="_blank" href="https://itunes.apple.com/us/app/online-florist-floweradvisor/id1185232807" style="display: inline-block; overflow: hidden; border-radius: 13px; width: 250px; height: 83px;"><img src="https://tools.applemediaservices.com/api/badges/download-on-the-app-store/black/en-us?size=250x83&amp;releaseDate=1486684800&h=21e2fc7310c7469bf6aac0cfa9fe9e95" alt="Download on the App Store" style="border-radius: 13px; width: 250px; height: 83px;"></a>
                                </div>
                            </div>                            
                        </div>
                    </div>

                    <div class="col d-flex justify-content-center mt-3">
                        <div class="row">
                            <div class="card" style="width: 40rem; margin-left: 15px; text-align: center;">
                                <div class="card-body">
                                    <h5 class="card-title">Make Someone's Day</h5>                                    
                                    <a class="btn btn-danger" target="_blank" href="https://www.floweradvisor.com.ph/flowersphilippines">Make someone’s day</a>
                                </div>
                            </div>                            
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal ganti password -->
    <div class="modal fade" id="update-password">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/password/update/{{ Auth::user()->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary float-right" id="submit">Update</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection
@section('js')
    </script>
    <script type="text/javascript">
        @if (count($errors) > 0)
            $('#update-password').modal('show');
        @endif
    </script>

    <script>
        function myFunction() {
        /* Get the text field */
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);
        
        /* Alert the copied text */
        alert("Copied the text: " + copyText.value);
        }
    </script>
@endsection
