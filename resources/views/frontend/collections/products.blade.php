@extends('layouts.frontend')
@section('title')
    Collection - Category - Subcategory - Products 
@endsection

@section('content')
    <div class="card mb-5 card py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <label for="">Collection / {{ $subcategory->category->group->name }} /
                        {{ $subcategory->category->name }} / {{ $subcategory->name }}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <span class="font-weight-bold sort-font">Sort by:</span>
                <a href="{{ URL::current() }}" class="sort-font">All</a>
                <a href="{{ URL::current()."?sort=price_asc" }}" class="sort-font">Price - Low to high</a>
                <a href="{{ URL::current()."?sort=price_desc" }}" class="sort-font">Price - High to low</a>
                <a href="{{ URL::current()."?sort=newest" }}" class="sort-font">Newest</a>
                <a href="{{ URL::current()."?sort=popularity" }}" class="sort-font">Popularity</a>
            </div>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($products as $prod_item)
                        <div class="col-md-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="">
                                                <img src="{{ asset('uploads/products/' . $prod_item->image) }}"
                                                    alt="" class="w-100">
                                            </div>
                                        </div>
                                        <div class="col-md-7 border-right border-left">
                                            <a href="{{ url('collection/' . $prod_item->subcategory->category->group->url . '/' . $prod_item->subcategory->category->group->url . '/' . $prod_item->subcategory->url . '/' . $prod_item->url) }}">
                                                <h5 class="mb-2">{{ $prod_item->name }}</h5>
                                            </a>
                                            <div class="">
                                                <h6 class="text-dark mb-0">{!! $prod_item->p_highlights !!}</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="text-right">
                                                <h6 class="font-italic text-dark badge badge-warning px-3 py-1">
                                                    {{ $prod_item->sale_tag }}</h6>
                                                <h6 class="font-italic"><s>Rp:
                                                        {{ number_format($prod_item->original_price) }}</s></h6>
                                                <h5 class="font-italic font-weight-bold">Rp:
                                                    {{ number_format($prod_item->offer_price) }}</h5>
                                            </div>
                                            <div class="text-right">
                                                <div>
                                                    <a href="{{ url('collection/' . $prod_item->subcategory->category->group->url . '/' . $prod_item->subcategory->category->group->url . '/' . $prod_item->subcategory->url . '/' . $prod_item->url) }}"
                                                        class="text-center btn btn-sm btn-outline-primary">
                                                        View Details
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
