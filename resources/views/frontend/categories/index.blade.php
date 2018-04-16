@extends('frontend.frontendtemp')

@section('content')

<div class="container single-page blog-page">
    <div class="row">
        <div class="col-12">
            <div class="content-wrap">

                <h1 class="entry-title">Categories</h1>
                <table class='table entry-content'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoriesView as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <td> <a href='{{ route('frontend.cat.show', $category->id) }}'> {{ $category->name }} </a></td>		
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection