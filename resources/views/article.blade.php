@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <!-- ARTICLE -->
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Article</h4>
                    </div>
                    <div class="card-body">
                        @if (Auth::user()->membership > 1)
                            <div class="row">
                                <?php $pic = 1; ?>
                                @foreach ($articles as $article)
                                    <div class="card col-md-4 mt-2 mb-2">
                                        <img src="https://picsum.photos/200?random={{ $pic }}"
                                            class="card-img-top">
                                        <div class="card-body">
                                            <h5 class="card-title"><b>{{ $article->title }}</b></h5>
                                            <p class="card-text">{{ substr($article->body, 0, 100) }}</p>
                                            <a href="#" class="btn btn-primary">Read More</a>
                                        </div>
                                    </div>
                                    <?php $pic = $pic + 1; ?>
                                @endforeach
                            </div>
                            @if ($articles->links()->paginator->hasPages())
                                <div class="d-flex justify-content-center">
                                    {!! $articles->appends(['articles' => $articles->currentPage()])->links() !!}
                                </div>
                            @endif
                        @else
                            <h5 style="text-align: center;">Please register new membership to see the content.</h5>
                        @endif
                    </div>
                </div>

            </div>
            <!-- END ARTICLE -->
        </div>
    </div>
@endsection
@section('js')
@endsection
