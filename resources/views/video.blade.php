@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <!-- VIDEO -->
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Video</h4>
                    </div>
                    <div class="card-body">
                        @if (Auth::user()->membership > 1)
                            <div class="row">
                                @foreach ($videos as $video)
                                    <div class="card col-md-6 mt-2 mb-2">
                                        <iframe src="{{ $video->url }}" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                        <div class="card-body">
                                            <h5 class="card-title"><b>{{ $video->title }}</b></h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if ($videos->links()->paginator->hasPages())
                                <div class="d-flex justify-content-center">
                                    {!! $videos->appends(['videos' => $videos->currentPage()])->links() !!}
                                </div>
                            @endif
                        @else
                            <h5 style="text-align: center;">Please register new membership to see the content.</h5>
                        @endif
                    </div>
                </div>
            </div>
            <!-- END VIDEO -->
        </div>
    </div>
@endsection
