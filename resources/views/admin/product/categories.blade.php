@extends('admin.layout.base')
@section('title', 'Products Categories')
@section('data-page-id', 'adminDashboard')

@section('content')
    <div class="category">
        <div class="grid-x grid-padding-x">
            <h2>Products Categories</h2>
        </div>

        @include('includes.message')

        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-6 column">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="input-group-field" placeholder="Search by name">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Search">
                        </div>
                    </div>
                </form>
            </div>

            <div class="small-12 medium-5 end column">
                <form action="/admin/product/categories" method="post">
                    <div class="input-group">
                        <input type="text" class="input-group-field" name="name" placeholder="Category Name">
                        <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11 column">
                @if(count($categories)) 
                    <table class="hover">
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category['name'] }}</td>
                                    <td>{{ $category['slug'] }}</td>
                                    <td>{{ $category['added'] }}</td>
                                    <td width="100" class="text-right">
                                        <a href="#"><i class="fa fa-edit"></i></a>
                                        <a href="#"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {!! $links !!}
                @else
                    <h3>You have not created any categories</h3>
                @endif
            </div>
        </div>
    </div>
@endsection