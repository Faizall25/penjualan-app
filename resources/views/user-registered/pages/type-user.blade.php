<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dungeon | Type</title>
    <!-- Bootstrap CSS -->
    <link href="/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    {{-- icon tab --}}
    <link rel="icon" href="/user/assets/images/profiles/dGn.png" type="image/png">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <style>
        @import url('/user/assets/css/variables.css');

        p {
            font-family: "Nunito", "Poppins", sans-serif;
            font-size: 14px;
            line-height: normal;
            color: #5f5f5f;
            text-align: justify;
        }
        li {
            font-family: "Nunito", "Poppins", sans-serif;
            font-size: 14px;
            line-height: normal;
            color: #5f5f5f;
            text-align: justify;
        }

        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Nunito', 'Verdana', sans-serif;

            &:hover .cursor {
                transform: scale(3);
                background: var(--secondary-10);
            }

            .cursor {
                position: fixed;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                transition: 0.1s;
                transform: translate(-50%, -50%);
                pointer-events: none;
                mix-blend-mode: normal ;
                z-index: 999;
            }


            .form-container {
                text-align: center;


                form {
                    .types__container {
                        display: flex;
                        justify-content: center;
                        flex-wrap: wrap;
                        gap: 20px;

                        input {
                            display: none;

                            &:checked+.click__area {
                                box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
                                color: var(--primary-color);
                                border: 1px solid var(--primary-color);
                            }
                        }

                        .click__area {
                            border: 1px solid var(--secondary-10);
                            cursor: pointer;
                            transition: all 0.3s;
                            padding: 1rem;
                            border-radius: 16px;
                            margin: 1rem;
                            width: 300px;
                            display: flex;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            text-align: center;
                            font-size: 1.2rem;
                            font-weight: 600;
                            background-color: white;
                            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.014);
                            transition: all 0.3s ease;

                            &:hover {
                                transform: translateY(-30px);
                                box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
                            }

                            &:focus {
                                transform: translateY(-30px);
                                box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
                            }

                            &:active {
                                transform: translateY(-30px);
                                box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
                            }
                        }
                    }
                }
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="cursor"></div>
        <div class="form-container">
            {{-- Form --}}
            <form action="{{ route('user.set-type') }}" method="post">
                @csrf
                <div class="form-group">
                    {{-- Header text --}}
                    <label style="text-primary">
                        <h4 class="fw-bold">Who are you?</h4>
                    </label>
                    {{-- Header text ends --}}

                    <br>
                    <br>
                    <br>

                    {{-- Types Container --}}
                    <div class="types__container">
                        {{-- Survivor type --}}
                        <div class="form-check">
                            {{-- Input  --}}
                            <input class="form-check-input" type="radio" name="type" id="survivor"
                                value="survivor">
                            {{-- Input ends --}}

                            <label class="form-check-label click__area" for="survivor">
                                <h5 class="fw-bold">
                                    Survivor
                                </h5>
                                <br>

                                {{-- Penjelasan --}}
                                <p>
                                    <b>Pemeran utama</b>, ya itu adalah sebutan bagi para survivor. berani melangkah tanpa mengeluh.
                                </p>
                                <ul>
                                    <li class="mb-3">Mendapatkan point setelah menyelesaikan ujian</li>
                                    <li>Namun harus mengikuti <b>peraturan</b> dari setiap course yang ada</li>
                                </ul>
                                <p>
                                    <b>Point</b> di gunakan untuk mengikuti event-event yang akan datang dan merupakan syarat untuk masuk dalam <b>top</b> leaderboard Dungeon.
                                </p>
                                {{-- Penjelasan ends --}}
                            </label>
                        </div>
                        {{-- Survivor type ends --}}

                        {{-- Victim type --}}
                        <div class="form-check">
                            {{-- Input  --}}
                            <input class="form-check-input" type="radio" name="type" id="victim" value="victim">
                            {{-- Input ends --}}

                            <label class="form-check-label click__area" for="victim">
                                <h5 class="fw-bold">
                                    Victim
                                </h5>
                                <br>

                                {{-- Penjelasan --}}
                                <p>
                                    Bukan type yang buruk, melainkan mempunyai <b>tujuan</b> tersendiri dan tak berniat mendapatkan hadiah lebih.
                                </p>
                                <ul>
                                    <li class="mb-3">Tidak <b>terikat</b> dengan peraturan yang ada pada setiap course</li>
                                    <li>Namun tidak akan mendapatkan point ketika menyelessaikan <b>ujian</b></li>
                                </ul>
                                <p>
                                    Jika anda merasa tidak membutuhkan <b>hadiah</b> dan tak berniat berkompetisi, mungkin victim cocok untuk anda
                                </p>
                                {{-- Penjelasan ends --}}
                            </label>
                        </div>
                        {{-- Victim type ends --}}
                    </div>
                </div>
                {{-- Types Container ends --}}

                <div class="text-center">
                    <p class="text-center">*Type yang dipilih bersifat permanen, artinya untuk selamanya dengan type pilihan</p>
                </div>

                {{-- Set type button --}}
                <button type="submit" class="btn btn-primary mt-3">Choose</button>
                {{-- Set type button ends --}}
            </form>
            {{-- Form ends --}}
        </div>
    </div>

    <script>
        const cursor = document.querySelector('.cursor');
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.pageX + 'px';
            cursor.style.top = e.pageY + 'px';
        })
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
