{{-- Hero section Start --}}
<div class="main-banner" id="top">
    {{-- Decors --}}
    <span class="decor-1">
        <span class="inner"></span>
    </span>
    <span class="decor-2">
        <span class="inner"></span>
    </span>

    {{-- demo video player --}}
    <div id="demo-wrapper" class="none">
        <div class="close-btn">
            <i class="fa fa-times"></i>
        </div>
        <video id="my-video" controls preload="auto" class="video-js container video" data-setup="{}"
            style="border-radius: 8px; height: 90%;">
            <source src="@storageUrl('public/mockVidio.mp4')" type="video/mp4" />
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
        </video>
    </div>

    {{-- Hero Content --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel owl-banner">
                    <div class="item item-1">
                        <div class="header-text">
                            <span class="category">Our Courses</span>
                            <h2>
                                Online Learning Platform
                            </h2>
                            <p>Dungeon is an online learning platform that offers a wide range of courses to help
                                individuals enhance their skill set and achieve their career goals.
                            </p>
                            <div class="buttons">
                                <div class="main-button">
                                    <a href="#contact">Contact us</a>
                                </div>
                                <div class="icon-button" id="demo-btn">
                                    <a href="#"><i class="fa fa-play"></i> What's Dungeon?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Hero section End --}}
<script>
    const demoBtn = document.querySelectorAll('#demo-btn');
    const demoWrapper = document.getElementById('demo-wrapper');
    const closeBtn = document.querySelector('.close-btn');

    demoBtn.forEach(btn => {
        btn.addEventListener('click', () => {
            demoWrapper.classList.remove('none');
            document.body.style.overflow = 'hidden';
        });
    });

    closeBtn.addEventListener('click', () => {
        demoWrapper.classList.add('none');
        document.body.style.overflow = 'auto';
    });
    console.log(demoBtn)
</script>
