@extends('admin.layout.base')
@section('title', 'Product Categories')
@section('data-page-id', 'adminCategories')

@section('content')
    <div class="category">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-11">
                <h2>Product Categories</h2> <hr>
            </div>
        </div>
        
        @include('includes.message')
        
		<!-- Search bar -->
        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-6 cell">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="input-group-field" placeholder="Search by name">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Search">
                        </div>
                    </div>
                </form>
            </div>
			
			<!-- Create bar -->
            <div class="small-12 medium-5 end cell">
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
        
		<!-- List of categories -->
        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11 cell">
                @if(count($categories))
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                            <tr><th>Name</th><th>Slug</th><th>Date Created</th><th width="50">Action</th></tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category['name'] }}</td>
                                    <td>{{ $category['slug'] }}</td>
                                    <td>{{ $category['added'] }}</td>
                                    <td width="50" class="text-right">

                                        <span data-tooltip tabindex="1" title="Add Subcategory">
                                            <a data-open="add-subcategory-{{$category['id']}}"><i class="fa fa-plus"></i></a>
                                        </span>
                                        <span data-tooltip class="has-tip top" tabindex="1" title="Edit Category">
                                            <a data-open="item-{{$category['id']}}"><i class="fa fa-edit"></i></a>
                                        </span>
                                        <span data-tooltip class="has-tip top" tabindex="1" title="Delete Category" style="display: inline-block">
                                            <form method="POST" action="/admin/product/categories/{{$category['id']}}/delete" 
                                                class="delete-item">
                                                <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                                                <button type="submit"><i class="fa fa-times delete"></i></button>
                                            </form>
                                        </span>
                                        
                                        <!-- Edit Categories Model -->
                                        <div class="reveal" id="item-{{$category['id']}}"
                                             data-reveal data-close-on-click="false" data-close-on-esc="false"
                                             data-animation-in="scale-in-up">
                                             <div class="notification callout primary"></div>
                                            <h2>Edit Category</h2>
                                            <form>
                                                <div class="input-group" style="display:block;">
                                                    <input type="text" name="name" id="item-name-{{$category['id']}}" value="{{ $category['name'] }}">
                                                    
                                                    <div>
                                                        <input type="submit" class="button update-category" id="{{$category['id']}}"
                                                               data-token="{{ \App\Classes\CSRFToken::_token() }}"
                                                               value="Update">
                                                    </div>
                                                </div>
                                            </form>
                                            <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                        <!-- End Edit Categories Model -->

                                        <!-- Add Subcategories Model -->
                                        <div class="reveal" id="add-subcategory-{{$category['id']}}"
                                             data-reveal data-close-on-click="false" data-close-on-esc="false"
                                             data-animation-in="scale-in-up">
                                             <div class="notification callout primary"></div>
                                            <h2>Add Subcategory</h2>
                                            <form>
                                                <div class="input-group" style="display:block;">
                                                    <input type="text" name="name" id="subcategory-name-{{$category['id']}}">
                                                    
                                                    <div>
                                                        <input type="submit" class="button add-subcategory" id="{{$category['id']}}"
                                                               data-token="{{ \App\Classes\CSRFToken::_token() }}"
                                                               value="Create">
                                                    </div>
                                                </div>
                                            </form>
                                            <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                        <!-- End Add Subcategories Model -->

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {!! $links !!}
                @else
                    <h2>You have not created any category</h2>
                @endif
            </div>
        </div>
    </div>

    <div class="subcategory">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-11">
                <h2>Subcategories</h2> <hr>
            </div>
        </div>
        
		<!-- List of categories -->
        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11 cell">
                @if(count($subcategories))
                    <table class="hover unstriped" data-form="deleteForm">
                        <thead>
                            <tr><th>Name</th><th>Slug</th><th>Date Created</th><th width="50">Action</th></tr>
                        </thead>
                        <tbody>
                            @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>{{ $subcategory['name'] }}</td>
                                    <td>{{ $subcategory['slug'] }}</td>
                                    <td>{{ $subcategory['added'] }}</td>
                                    <td width="50" class="text-right">
                                        <span data-tooltip class="has-tip top" tabindex="1" title="Edit Subcategory">
                                            <a data-open="item-subcategory-{{$subcategory['id']}}"><i class="fa fa-edit"></i></a>
                                        </span>
                                        <span data-tooltip class="has-tip top" tabindex="1" title="Delete Subcategory" style="display: inline-block">
                                            <form method="POST" action="/admin/product/subcategory/{{$subcategory['id']}}/delete" 
                                                class="delete-item">
                                                <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                                                <button type="submit"><i class="fa fa-times delete"></i></button>
                                            </form>
                                        </span>
                                        
                                        <!-- Edit Subcategories Model -->
                                        <div class="reveal" id="item-subcategory-{{$subcategory['id']}}"
                                             data-reveal data-close-on-click="false" data-close-on-esc="false"
                                             data-animation-in="scale-in-up">
                                             <div class="notification callout primary"></div>
                                            <h2>Edit Subcategory</h2>
                                            <form>
                                                <div class="input-group" style="display:block;">
                                                    <input type="text" name="name" id="item-subcategory-name-{{$subcategory['id']}}" 
                                                        value="{{ $subcategory['name'] }}">                                                    

                                                    <label>Change Category
                                                        <select id="item-category-{{ $subcategory['category_id'] }}">
                                                            @foreach(\App\Models\Category::all() as $category) 
                                                                @if($category->id == $subcategory['category_id'])
                                                                <option selected="selected" value="{{ $category->id }}">
                                                                    {{ $category->name }}</option>
                                                                @endif
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                    
                                                    <div>
                                                        <input type="submit" class="button update-subcategory" 
                                                            id="{{$subcategory['id']}}"
                                                            data-category-id="{{$subcategory['category_id']}}"
                                                            data-token="{{ \App\Classes\CSRFToken::_token() }}" 
                                                            value="Update">
                                                    </div>
                                                </div>
                                            </form>
                                            <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                        <!-- End Edit Categories Model -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    {!! $subcategories_links !!}
                @else
                    <h2>You have not created any subcategories</h2>
                @endif
            </div>
        </div>
    </div>

    @include('includes.delete-model')
@endsection