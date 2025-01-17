<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>App Penjualan</title>

  {{-- icon tab --}}
  <link rel="icon" href="/user/assets/images/profiles/dGn.png" type="image/png">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" media="screen" href="/admin/assets/css/perfect-scrollbar.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="/admin/assets/css/style.css">
  <link defer="" rel="stylesheet" type="text/css" media="screen" href="/admin/assets/css/animate.css">
  <script src="/admin/assets/js/perfect-scrollbar.min.js"></script>
  <script defer="" src="/admin/assets/js/popper.min.js"></script>
  <script defer="" src="/admin/assets/js/tippy-bundle.umd.min.js"></script>
  <script defer="" src="/admin/assets/js/sweetalert.min.js"></script>

  {{-- import jquery --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  {{-- import sweetalert --}}

  <!-- Meta tags dan lainnya -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

  @yield('head')
</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">
  <!-- sidebar menu overlay -->
  <div x-cloak="" class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}" @click="$store.app.toggleSidebar()"></div>

  <!-- screen loader -->
  <div class="screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
    <svg width="64" height="64" viewbox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#4361ee">
      <path d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z">
        <animatetransform attributename="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s" repeatcount="indefinite"></animatetransform>
      </path>
      <path d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z">
        <animatetransform attributename="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s" repeatcount="indefinite"></animatetransform>
      </path>
    </svg>
  </div>

  <!-- scroll to top button -->
  <div class="fixed bottom-6 z-50 ltr:right-6 rtl:left-6" x-data="scrollToTop">
    <template x-if="showTopButton">
      <button type="button" class="btn btn-outline-primary animate-pulse rounded-full bg-[#fafafa] p-2 dark:bg-[#060818] dark:hover:bg-primary" @click="goToTop">
        <svg width="24" height="24" class="h-4 w-4" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z" fill="currentColor"></path>
          <path d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z" fill="currentColor"></path>
        </svg>
      </button>
    </template>
  </div>

  <!-- start theme customizer section -->
  @include('admin.partials.configurator.index')
  <!-- end theme customizer section -->

  <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
    <!-- start sidebar section -->
    @include('admin.partials.sidebar.index')
    <!-- end sidebar section -->

    <div class="main-content flex min-h-screen flex-col">
      <!-- start header section -->
      @include('admin.partials.navbar.index')
      <!-- end header section -->

      <div class="animate__animated p-6" :class="[$store.app.animation]">
        @include('admin.components.head-route')

        <div class="mt-3 mb-3">
          @include('admin.components.alert')
        </div>
        <!-- start main content section -->
        @yield('content')
        <!-- end main content section -->
      </div>

      <!-- start footer section -->
      @include('admin.partials.footer.index')
      <!-- end footer section -->
    </div>
  </div>

  <script src="/admin/assets/js/alpine-collaspe.min.js"></script>
  <script src="/admin/assets/js/alpine-persist.min.js"></script>
  <script defer="" src="/admin/assets/js/alpine-ui.min.js"></script>
  <script defer="" src="/admin/assets/js/alpine-focus.min.js"></script>
  <script defer="" src="/admin/assets/js/alpine.min.js"></script>
  <script src="/admin/assets/js/custom.js"></script>
  <script defer="" src="/admin/assets/js/apexcharts.js"></script>

  @yield('body')

  <!-- Scripts -->
  <script>
    document.addEventListener('alpine:init', () => {
      // main section
      Alpine.data('scrollToTop', () => ({
        showTopButton: false,
        init() {
          window.onscroll = () => {
            this.scrollFunction();
          };
        },

        scrollFunction() {
          if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            this.showTopButton = true;
          } else {
            this.showTopButton = false;
          }
        },

        goToTop() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        },
      }));

      // theme customization
      Alpine.data('customizer', () => ({
        showCustomizer: false,
      }));

      // sidebar section
      Alpine.data('sidebar', () => ({
        init() {
          const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
          if (selector) {
            selector.classList.add('active');
            const ul = selector.closest('ul.sub-menu');
            if (ul) {
              let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
              if (ele) {
                ele = ele[0];
                setTimeout(() => {
                  ele.click();
                });
              }
            }
          }
        },
      }));

      // header section
      Alpine.data('header', () => ({
        init() {
          const selector = document.querySelector('ul.horizontal-menu a[href="' + window.location.pathname + '"]');
          if (selector) {
            selector.classList.add('active');
            const ul = selector.closest('ul.sub-menu');
            if (ul) {
              let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
              if (ele) {
                ele = ele[0];
                setTimeout(() => {
                  ele.classList.add('active');
                });
              }
            }
          }
        },

        notifications: [{
          id: 1,
          profile: 'user-profile.jpeg',
          message: '<strong class="text-sm mr-1">StarCode Kh</strong>invite you to <strong>Prototyping</strong>',
          time: '45 min ago',
        }, {
          id: 2,
          profile: 'profile-34.jpeg',
          message: '<strong class="text-sm mr-1">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong>',
          time: '9h Ago',
        }, {
          id: 3,
          profile: 'profile-16.jpeg',
          message: '<strong class="text-sm mr-1">Anna Morgan</strong>Upload a file',
          time: '9h Ago',
        }, ],

        messages: [{
          id: 1,
          image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
          title: 'Congratulations!',
          message: 'Your OS has been updated.',
          time: '1hr',
        }, {
          id: 2,
          image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
          title: 'Did you know?',
          message: 'You can switch between artboards.',
          time: '2hr',
        }, {
          id: 3,
          image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
          title: 'Something went wrong!',
          message: 'Send Reposrt',
          time: '2days',
        }, {
          id: 4,
          image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
          title: 'Warning',
          message: 'Your password strength is low.',
          time: '5days',
        }, ],

        languages: [{
          id: 1,
          key: 'Khmer',
          value: 'kh',
        }, {
          id: 2,
          key: 'Danish',
          value: 'da',
        }, {
          id: 3,
          key: 'English',
          value: 'en',
        }, {
          id: 4,
          key: 'French',
          value: 'fr',
        }, {
          id: 5,
          key: 'German',
          value: 'de',
        }, {
          id: 6,
          key: 'Greek',
          value: 'el',
        }, {
          id: 7,
          key: 'Hungarian',
          value: 'hu',
        }, {
          id: 8,
          key: 'Italian',
          value: 'it',
        }, {
          id: 9,
          key: 'Japanese',
          value: 'ja',
        }, {
          id: 10,
          key: 'Polish',
          value: 'pl',
        }, {
          id: 11,
          key: 'Portuguese',
          value: 'pt',
        }, {
          id: 12,
          key: 'Russian',
          value: 'ru',
        }, {
          id: 13,
          key: 'Spanish',
          value: 'es',
        }, {
          id: 14,
          key: 'Swedish',
          value: 'sv',
        }, {
          id: 15,
          key: 'Turkish',
          value: 'tr',
        }, {
          id: 16,
          key: 'Arabic',
          value: 'ae',
        }, ],

        removeNotification(value) {
          this.notifications = this.notifications.filter((d) => d.id !== value);
        },

        removeMessage(value) {
          this.messages = this.messages.filter((d) => d.id !== value);
        },
      }));
    });
  </script>

  {{-- alert setting --}}
  <script>
    // Optional: Tambahkan script untuk menghapus alert setelah beberapa detik
    document.addEventListener('DOMContentLoaded', function() {
      setTimeout(function() {
        let alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => alert.style.display = 'none');
      }, 5000); // 5000 ms = 5 detik
    });
  </script>

  {{-- for delete confirmation --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.showConfirm').forEach(button => {
        button.addEventListener('click', function() {
          new window.Swal({
            icon: 'warning',
            title: 'Are you sure?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            padding: '2em',
          }).then((result) => {
            if (result.value) {
              button.closest('form').submit();
            }
          });
        });
      });
    });
  </script>
</body>

</html>