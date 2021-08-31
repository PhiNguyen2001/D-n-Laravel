@extends('layouts.master')
@section('title')
    Shop
@endsection
@section('contents')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="/home"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        @foreach ($category as $item)
                            <ul class="filter-catagories">
                                <li><a href="{{ route('cate-pro', ['id' => $item->id]) }}">{{ $item->name }}</a></li>
                            </ul>
                        @endforeach

                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="fw-brand-check">
                            <ul class="filter-catagories">
                                <li> <a href="{{ route('filter') }}?price=1">
                                        Dưới 100.000 Đ
                                    </a>
                                </li>
                            </ul>

                            <ul class="filter-catagories">
                                <li> <a href="{{ route('filter') }}?price=2">
                                        100.000 - 200.000 Đ
                                    </a>
                                </li>
                            </ul>
                            <ul class="filter-catagories">
                                <li> <a href="{{ route('filter') }}?price=3">
                                        200.000 - 400.000 Đ
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" id="cs-black">
                                <label class="cs-black" for="cs-black">Black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-violet">
                                <label class="cs-violet" for="cs-violet">Violet</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-blue">
                                <label class="cs-blue" for="cs-blue">Blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-yellow">
                                <label class="cs-yellow" for="cs-yellow">Yellow</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-red">
                                <label class="cs-red" for="cs-red">Red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-green">
                                <label class="cs-green" for="cs-green">Green</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" id="s-size">
                                <label for="s-size">s</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="m-size">
                                <label for="m-size">m</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="l-size">
                                <label for="l-size">l</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="xs-size">
                                <label for="xs-size">xs</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <a href="#">Towel</a>
                            <a href="#">Shoes</a>
                            <a href="#">Coat</a>
                            <a href="#">Dresses</a>
                            <a href="#">Trousers</a>
                            <a href="#">Men's hats</a>
                            <a href="#">Backpack</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <form method="GET" id="form_order">
                                @csrf
                                <div class="col-lg-7 col-md-7">
                                    <div class="select-option">
                                        <select class="sorting" name="sort" id="sort">
                                            <option value="{{ Request::url() }}?sort_by=none">Sắp xếp theo</option>
                                            <option value="{{ Request::url() }}?sort_by=kytu_az">Lọc tên từ A - Z</option>
                                            <option value="{{ Request::url() }}?sort_by=kytu_za">Lọc tên từ Z - A</option>
                                            <option value="{{ Request::url() }}?sort_by=tang_dan">Giá tăng dần</option>
                                            <option value="{{ Request::url() }}?sort_by=giam_dan">Giá giảm dần</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <div class="col-lg-5 col-md-10 text-right">
                                <p>Show 01- 06 Of 18 Product</p>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            @foreach ($product as $item)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="pi-pic">
                                            <img src="{{ url('uploads') }}/{{ $item->image }}" alt="">
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                            <ul>
                                                <li class="w-icon active"><a
                                                        href="{{ url('/Add-Cart/' . $item->id) }}"><i
                                                            class="icon_bag_alt"></i></a></li>
                                                <li class="quick-view"><a
                                                        href="{{ route('detail', ['id' => $item->id]) }}">+
                                                        Quick View</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="pi-text">
                                            {{-- <div class="catagory-name">Towel</div> --}}
                                            <a href="{{ route('detail', ['id' => $item->id]) }}">
                                                <h5>{{ $item->name }}</h5>
                                            </a>
                                            <div class="product-price">
                                                {{ number_format($item->price) }}đ
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-end">
                        {{ $product->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
@endsection
