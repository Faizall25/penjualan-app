@extends('user.pages.main')

@section('title', 'Course Detail')

@section('content')
    <div>
        {{-- Membership --}}
        <div class="membership-plan">
            <div class="container">
                <header class="membership-header">
                    <div class="circle">
                        <div class="inner"></div>
                    </div>
                    <div class="category">Plans</div>
                    <h2>
                        Choose Any Plan That Suits You
                    </h2>
                </header>
                <div class="plans-wrapper">
                    <ul class="plans">
                        <li class="plan plan-1">
                            <div class="plan-header">
                                <h3>
                                    {{ $datas[0]['name'] }}
                                </h3>
                                <br>
                            </div>
                            <div class="plan-body">
                                <ul>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <p>
                                            1 Month access to all courses
                                        </p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <p>
                                            Certificate of completion
                                        </p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <p>
                                            Stream on any devices
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="plan-footer">
                                <div class="flex">
                                    <strike>Rp{{ number_format($datas[0]['price_cross_out']) }}</strike>
                                    <strong>
                                        Rp{{ number_format($datas[0]['price']) }}
                                    </strong>
                                </div>
                                <a href="">
                                    <strong>Join now</strong>
                                </a>
                            </div>
                        </li>
                        <li class="plan active">
                            <div class="plan-header">
                                <h3 class="text-light">
                                    {{ $datas[1]['name'] }} ⚡
                                </h3>
                                <br>
                            </div>
                            <div class="plan-body">
                                <ul>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <p>
                                            3 Months access to all courses
                                        </p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <p>
                                            Certificate of completion
                                        </p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <p>
                                            Stream on any devices
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="plan-footer">
                                <div class="flex">
                                    <strike>Rp{{ number_format($datas[1]['price_cross_out']) }}</strike>
                                    <strong>
                                        Rp{{ number_format($datas[1]['price']) }}
                                    </strong>
                                </div>
                                <a href="">
                                    <strong>Join now</strong>
                                </a>
                            </div>
                        </li>
                        <li class="plan plan-2">
                            <div class="plan-header">
                                <h3>
                                    {{ $datas[2]['name'] }}
                                </h3>
                                <br>
                            </div>
                            <div class="plan-body">
                                <ul>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <p>
                                            6 Month access to all courses
                                        </p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <p>
                                            Certificate of completion
                                        </p>
                                    </li>
                                    <li>
                                        <i class="fa fa-check"></i>
                                        <p>
                                            Stream on any devices
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="plan-footer">
                                <div class="flex">
                                    <strike>Rp{{ number_format($datas[2]['price_cross_out']) }}</strike>
                                    <strong>
                                        Rp{{ number_format($datas[2]['price']) }}
                                    </strong>
                                </div>
                                <a href="">
                                    <strong>Join now</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- contact us --}}
        @include('user.pages.landing.contactus')
    </div>
@endsection
