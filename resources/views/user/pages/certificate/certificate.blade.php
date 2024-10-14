@extends('user.pages.main')

@section('title', 'Certificate')

@push('lp-styles')
    <link rel="stylesheet" href="/user/assets/css/certificate.css">
@endpush

@section('content')
    @php
        $base64 = base64_encode(file_get_contents('user/assets/images/icons/t-primary.png'));
        $signature = base64_encode(file_get_contents('sign-founder.jpeg'));
    @endphp
    <div class="container">
        <main class="">
            <div class="certificate">
                {{-- Certificate actions ends --}}
                <div class="container">
                    <div class="wrapper">
                        <div class="cursor"></div>
                        <div class="certificate__template text-end">
                            {{-- left side decor --}}
                            <div
                                style="position: absolute; top: -200px; left: 0px; width: 150px; height: 500px; border-radius: 4px; background-color: rgb(240, 240, 240)">
                                <div style="width: 84px; overflow: hidden; position: absolute; top: 440px; left: 35px;">
                                    <img src="data:image/png;base64,{{ $base64 }}" alt="logo"
                                        style="width: 100%; object-fit: cover;">
                                </div>
                            </div>
                            <div
                                style="position: absolute; top: -200px; left: 95px; width: 20px; height: 300px; border-radius: 20px; background-color: #009641;">
                            </div>
                            <div
                                style="position: absolute; top: 85px; right: -120px; padding: 8px 20px; width: 300px; background: #009641; border-radius: 20px">
                                <p style="font-family: Nunito; font-weight: 500; font-size:12px;color:white; text-align: left">
                                    Issued on &nbsp; {{ $certificate->updated_at->format('F d, Y') }}
                                </p>
                            </div>
                            {{-- left side decor ends --}}


                            {{-- divider --}}
                            <div style="height: 50px; width: 20px;"></div>
                            {{-- divider ends --}}

                            {{-- Certificate header --}}
                            <div class="certificate__template__header" style="position: relative;">
                                {{-- Header title --}}
                                <h1 inert>
                                    <img src="data:image/png;base64,{{ $rankIcon }}" alt="logo" style="width: 64px;">
                                    <span>
                                        Certificate of Completion
                                    </span>
                                </h1>
                                {{-- Header title ends --}}

                                {{-- Course title --}}
                                <div style="padding: 1rem; border-radius: 1rem; margin-top: 2rem;">
                                    <h4 style="color: #009641; text-transform: uppercase;  font-weight: 700;" inert>
                                        {{ $course->title }}</h4>
                                </div>
                                {{-- Course title ends --}}
                            </div>
                            {{-- Certificate header ends --}}

                            {{-- Certificate body --}}
                            <div class="certificate__template__body" style="margin-bottom: 4rem;">

                                {{-- User name --}}
                                <h2 style="font-family: 'Edu AU VIC WA NT Hand', cursive; padding-top: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid #1414141a;"
                                    inert>
                                    {{ $user->name }}</h2>
                                {{-- User ends --}}
                                <div>
                                    <p style="margin-top: 3rem; font-size: 14px;line-height: normal; color: #4a4a4a;" inert>
                                        The bearer of this certificate has passed <span
                                            style="color: #009641; font-weight: 700; text-transform: uppercase;">{{ $course->title }}</span>
                                        final
                                        project task
                                    </p>
                                </div>
                            </div>
                            {{-- Certificate body ends --}}

                            {{-- Certificate footer --}}
                            <div class="certificate__template__footer">
                                <p inert>
                                    <span>ID: &emsp; {{ substr($certificate->certificate_id, 0, 12) }} </span>
                                    <br>
                                    Issued on <span style="font-weight: bold;">{{ $certificate->updated_at }}</span>
                                </p>

                                {{-- Signature --}}
                                <div class="signature" inert>
                                    {{-- Signature line/image --}}
                                    <div class="signature__line"
                                        style="width: 96px; overflow: hidden; margin-bottom: 1rem; margin: auto;">
                                        <img src="data:image/png;base64,<?php echo $signature; ?>" alt="signature"
                                            style="width: 100%; object-fit: cover;">
                                    </div>
                                    {{-- Signature line/image ends --}}

                                    <h6 style="margin: 0.5rem 0;">Prasetyo Putra Pratama</h6>
                                    <p>Founder, Dungeon</p>
                                </div>
                            </div>
                            {{-- Certificate footer ends --}}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        const cursor = document.querySelector('.cursor');
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.pageX + 'px';
            cursor.style.top = e.pageY + 'px';
        })
    </script>
@endsection
