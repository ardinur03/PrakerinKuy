<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>S11Prakerin | SMK Negeri 11 Bandung</title>

    {{-- <!-- Fonts --> --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- <!-- css font-awesome --> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    {{-- <!-- Bootstrap CSS --> --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    {{-- font API google --}}
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,700;1,400;1,700&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600&family=Viga&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    {{-- <!-- css custom --> --}}
    <link rel="stylesheet" href="{{asset('bootstrap/css/custom.css')}}">

    {{-- <!-- SCRIPT TYPED ANIMATION --> --}}
    <script src="{{asset('bootstrap/js/typed.js')}}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

</head>

<body  id="home" data-spy="scroll" data-target="#navbarNav">
    <header id="head-section">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-primary animate__animated animate__slideInDown"
            id="nav-scroll">
            <div class="container">
                <a class="navbar-brand judul" href="#home">S11PrakerinKuy</a>
                <button class="navbar-toggler collapsed btn-border-light" type="button" data-toggle="collapse"
                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="#home" class="nav-link">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link about" href="#about">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#jurusan">JURUSAN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact-menu">CONTACT</a>
                        </li>

                        <?php // $role = Auth::user()->roles ?>

                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="btn btn-primary rounded-pill px-4 ml-3">Login</a>
                            @endif

                        @else 
                        <?php $role = Auth::user()->roles ?>
                            <a href="@if ($role == 1)
                                    {{ '/admin/dashboard' }}
                                @elseif($role == 2)
                                    {{ '/hubin/dashboard' }}
                                @elseif($role == 3)
                                    {{ '/dashboard' }}    
                                @endif" class="btn btn-primary rounded-pill px-4 ml-3">{{ Auth::user()->username }}</a>
                        @endguest

                            {{-- <a href="" class="btn btn-primary rounded-pill px-4 ml-3">{{ $auth->username }}</a> --}}
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div data-spy="scroll" data-target="nav-scroll" data-offset="0">

        <main class="content">
            <section id="hero-section">
                <div class="container mt-3  animate__animated animate__rubberBand">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-6 text-center text-md-left mb-5">
                            <h1 class="display-4 font-weight-bold"><span id="typed"></span></h1>
                            <p class="judul-hero lead lead text-secondary">Sekolah Menengah Kejuruan Negeri 11 Kota
                                Bandung.</p>
                            {{-- <!-- logika if button sesudah & sebelum login dinamis --> --}}
                            <a href="/login" class="btn btn-primary rounded-pill px-4 mt-2" role="button">LOGIN</a>

                        </div>
                        <div class="col-md-6">
                            <img src="{{asset('image/svg/building.svg')}}" class="img-hero">
                        </div>
                    </div>
                </div>
                <div class="ombak animate__animated animate__fadeInUp">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="#3384FE" fill-opacity="1"
                            d="M0,128L48,149.3C96,171,192,213,288,213.3C384,213,480,171,576,176C672,181,768,235,864,261.3C960,288,1056,288,1152,245.3C1248,203,1344,117,1392,74.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                        </path>
                    </svg>
                </div>
            </section>

            <section id="about-section">
                <div class="container" id="about">
                    <h2 class="section-title judul-about">About</h2>
                    <span class="section-line"></span>
                    <div class="row justify-content-between align-items-center my-5 text-center text-md-left">
                        <div class="col-md-6 c}}g-5">
                            <div class="feature-img">
                                <img src="{{asset('image/bg/bg-body.png')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="feature-detail mt-3">
                                <p class="h3 font-weight-bold">S11Prakerin Kuy</p>
                                <span class="feature-line"></span>
                                <p class="text-secondary text-justify">
                                    Adalah sebuah website mengenai Prakerin atau Praktek Kerja Industri, yang dapat membantu guru dalam pemetaan siswa Prakerin
                                </p>
                                <button  data-target="#exampleModal" data-toggle="modal" class="btn btn-outline-primary px-4 py-2 font-weight-bold rounded-pill">Lihat kelebihan</button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">S11Prakerin Skuy</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-auto">
                                                    <img src="{{ asset('image/logo/logo-prakerin.png') }}" alt="logo aplikasi">
                                                </div>
                                                <div class="col-md-7 mt-3 text-justify">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit rerum eligendi dicta, quo ut inventore tempore officia temporibus officiis veritatis cum odio sapiente fugit praesentium? Aut porro non doloribus, culpa quis debitis laborum laudantium inventore nihil quos saepe qui voluptatibus.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Kembali</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row justify-content-between align-items-center my-5 flex-md-row-reverse text-center text-md-left">
                        <div class="col-md-6 col-lg-5">
                            <div class="feature-img">
                                <img src="{{asset('image/bg/bg-drone1.jpg')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="feature-detail mt-3">
                                <p class="h3 font-weight-bold">Kelebihan aplikasi S11Prakerin Kuy</p>
                                <span class="feature-line"></span>
                                <p class="text-secondary text-justify">
                                    <ul>
                                        <li>Menghemat waktu dalam pendataan siswa prakerin</li>
                                        <li>Memudahkan guru dalam pendataan</li>
                                        <li>Memudahkan siswa dalam mendapatkan info prakerin</li>
                                    </ul>
                                </p>
                                <a href="#" class="btn btn-outline-primary px-4 py-2 font-weight-bold rounded-pill">Lihat </a> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- <!-- opening learn start --> --}}
            <section id="opening-learn">
                <div id="jurusan" class="container">
                    <h1 class="text-center judul-jurusan">Jurusan</h1>
                    <span class="section-line"></span>
                    
                    <hr>
                    
                    {{-- ON JURUSAN START--}}
                    <div class="row">

                        {{-- RPL --}}
                        <div class="col-md-3">
                            <div class="card box-learn">
                                <img src="{{ asset('image/logo/jurusan/RPL.png') }}" class="" draggable="false" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title">RPL</h3>
                                    <p class="card-text">Rekayasa Perangkat Lunak</p>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRPL">Detail</button>
                                </div>
                            </div>

                            <div class="modal fade" id="modalRPL" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Rekayasa Perangkat Lunak</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <h6 class="modal-body">(RPL, atau dalam bahasa Inggris: Software Engineering atau SE) adalah satu bidang profesi yang mendalami cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak dan manajemen kualitas.</h6>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- MM --}}
                        <div class="col-md-3">
                            <div class="card box-learn  box-warna">
                                <img src="{{asset('image/logo/jurusan/MM.png')}}" class="" draggable="false" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title">MM</h3>
                                    <p class="card-text">MultiMedia</p>
                                </div>
                                <div class="card-footer footer-warna">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalMM">Detail</button>
                                </div>
                            </div>

                            <div class="modal fade" id="exampleModalMM" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabelMM">MultiMedia</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <h6 class="modal-body" id="exampleModalLabelMM">MULTIMEDIA ini berasal dari
                                            2 kata yaitu MULTI dan MEDIA. Multi berarti banyak. Media berarti
                                            perantara. Pengertian multimedia secara utuh berarti Kombinasi atau
                                            penggabungan dari beberapa media seperti teks, audio, video, animasi,
                                            gambar yang disajikan dalam penggunaan komputer dengan bantuan tool dan
                                            link sehingga menghasilkan presentasi yang menarik.</h6>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- TKJ --}}
                        <div class="col-md-3">
                            <div class="card box-learn  box-warna">
                                <img src="{{asset('image/logo/jurusan/TKJ.png')}}" class="" draggable="false" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title">TKJ</h3>
                                    <p class="card-text">Teknik Komputer Dan Jaringan</p>
                                </div>
                                <div class="card-footer footer-warna">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalTKJ">Detail</button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModalTKJ" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabelTKJ">Teknik Komputer Dan
                                                Jaringan</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <h6 class="modal-body" id="exampleModalLabelTKJ">Merupakan ilmu berbasis
                                            Teknologi Informasi dan Komunikasi terkait kemampuan algoritma, dan
                                            pemrograman komputer, perakitan komputer, perakitan jaringan komputer,
                                            dan pengoperasian perangkat lunak, dan internet. Teknik komputer, dan
                                            jaringan juga membutuhkan pemahaman di bidang teknik listrik, dan ilmu
                                            komputer sehingga mampu mengembangkan, dan mengintegrasikan perangkat
                                            lunak, dan perangkat keras.</h6>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- OTKP --}}
                        <div class="col-md-3">
                            <div class="card box-learn">
                                <img src="{{asset('image/logo/jurusan/OTKP.png')}}" class="" draggable="false" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title">OTKP</h3>
                                    <p class="card-text">Otomatisasi dan Tata kelola Perkantoran</p>
                                </div>
                                <div class="card-footer footer-warna">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalOTKP">Detail</button>
                                </div>
                            </div>
                            
                            <div class="modal fade" id="exampleModalOTKP" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabelotkp">Otomatisasi dan Tata
                                            kelola Perkantoran</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <h6 class="modal-body" id="exampleModalLabelotkp">Bidang keahlian Bisnis dan
                                        Manajemen mempelajari tentang Pengetikan naskah atau dokumen, Penanganan
                                        telepon, Penataan dan pengelolaan surat atau dokumen, Penataan dan
                                        pengelolaan arsip, Penanganan perjalanan bisnis, Penanganan dana kas kecil,
                                        Penyiapan pertemuan atau rapat, Penanganan aplikasi, dan Penanganan
                                        informasi melalui internet.</h6>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- ON jJURUSAN END --}}

                    {{-- UNDER JURUSAN START --}}
                    <div class="row mt-2 justify-content-center">

                        {{-- BDP --}}
                        <div class="col-md-3">
                            <div class="card box-learn box-warna">
                                <img src="{{asset('image/logo/jurusan/BDP.png')}}" class="" draggable="false" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title">BDP</h3>
                                    <p class="card-text">Bisnis Daring Dan Pemasaran</p>
                                </div>
                                <div class="card-footer footer-warna">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalBDP">Detail</button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModalBDP" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabelBDP">Bisnis Daring Dan
                                                Pemasaran</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <h6 class="modal-body" id="exampleModalLabelBDP">Sebuah kompetensi keahlian
                                            (jurusan) yang mempelajari dasar - dasar kemampuan dan keilmuan menjadi
                                            seorang marketing baik marketing secara konvensional maupun melalui
                                            media daring (online/internet). Di Kompetensi Keahlian Bisnis Daring dan
                                            Pemasaran siswa akan mempelajari strategi pasar, kewirausahaan dan
                                            membaca peluang di dunia bisnis.</h6>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- MLOG --}}
                        <div class="col-md-3">
                            <div class="card box-learn">
                                <img src="{{asset('image/logo/jurusan/M-LOG.png')}}" class="" draggable="false" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title">MLOG</h3>
                                    <p class="card-text">Management Logistik</p>
                                </div>
                                <div class="card-footer footer-warna">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalMLOG">Detail</button>
                                </div>
                            </div>

                            <div class="modal fade" id="exampleModalMLOG" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabelMLOG">Management Logistik</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <h6 class="modal-body" id="exampleModalLabelMLOG">Mempelajari tentang bagaimana
                                        melakukan perencanaan, pengelolaan, pengendalian, dan pengawasan terhadap
                                        aliran uang, barang, energi, dan informasi, dan sumberdaya lainnya agar
                                        berjalan efisien dari asal hingga ke tujuan, mulai dari kegiatan pengadaan,
                                        penyimpanan, penyediaan, pengangkutan, hingga pengemasan barang-barang atau
                                        bahan baku tersebut. Di program studi ini akan di pelajari bagaimana tata
                                        letak gudang yang baik, sehingga dapat memaksimalkan kapasitas lahan dan
                                        meminimalisir kerusakan barang atau bahan baku yang tersimpan. Disini juga
                                        akan dipelajari bagaimana menghitung ongkos logistik, sistem bisnis
                                        logistik, dan sistem informasi logistik.</h6>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- AKL --}}
                        <div class="col-md-3">
                            <div class="card box-learn box-warna">
                                <img src="{{asset('image/logo/jurusan/AKL.png')}}" class="" draggable="false" alt="...">
                                <div class="card-body">
                                    <h3 class="card-title">AKL</h3>
                                    <p class="card-text">Akuntansi Dan Lembaga Keuangan</p>
                                </div>
                                <div class="card-footer footer-warna">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalAKL">Detail</button>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModalAKL" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabelAKL">Akuntansi Dan Lembaga
                                                Keuangan</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <h6 class="modal-body" id="exampleModalLabelAKL">Kompetensi dalam mengelola
                                            transaksi keuangan akan selalu dibutuhkan dalam berbagai bisnis. Mulai
                                            dari pencatatan, mengklasifikasi jenis transaksi, meringkasnya, mengolah
                                            dan menjadikan sebuah data, tujuannya adalah untuk menjadikan sebuah
                                            laporan keuangan yang akurat</h6>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- UNDER JURUSAN END --}}

                    


                </div>
            </section>
            {{-- <!-- opening learn end --> --}}

            {{-- <!--contact section start--> --}}
            <section id="contact-menu">
                <h2 class="text-center judul-kontak mt-5 text-white">Contact</h2>
                <div class="contact-section">
                    <div class="contact-info">
                        <div><i class="fas fa-map-marker-alt"></i> Jl. Budhi Cilember, Bandung, Jawa Barat, Indonesia
                        </div>
                        <div><i class="fas fa-envelope"></i> smkn11bdg@gmail.com</div>
                        <div><i class="fas fa-phone"></i>022-6652442 (telp)
                            022-6613508 (faks)</div>
                    </div>
                    <!-- <div class="contact-form"> -->
                    <!-- <--<form class="contact" action="" method="post">
                    <input type="text" name="name" class="text-box" placeholder="Your Name" required>
                    <input type="email" name="email" class="text-box" placeholder="Your Email" required>
                    <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                    <input type="submit" name="submit" class="send-btn" value="Send">
                    </form> -->
                </div>
            </section>
            {{-- <!--contact section end--> --}}
        </main>
    </div>

    <!-- start section footer -->
    <footer id="footer" class="text-center">
        <div class="container">
            <div class="socials-media text-center">
                <ul class="list-unstyled">
                    <li><a href="https://web.facebook.com/ardinurinsan03" target="_blank" data-toggle="tooltip"
                            data-placement="top" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i
                                class="fab fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Instagram"><i
                                class="fab fa-instagram"></i></a></li>
                    <li><a href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="YouTube"><i
                                class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
            <p>&copy; Copyright <script>
                    document.write(new Date().getFullYear());

                </script> <i class="fas fa-heart"></i></p>
            <div class="credits" style="color: white;">
                Designed by <a href="" target="_blank"></a>
            </div>
        </div>
    </footer>


    <script src="{{ asset('bootstrap/js/jquery-3.5.1.slim.min.js') }}" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <!-- sweet alert -->
    <script src="{{ asset('vendor/sweetalert/sweetalert2.all.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('bootstrap/js/custom.js') }}"></script>

    <script>
        new Typed('#typed', {
            strings: ['Hello !!!', 'Selamat datang di website S11Prakerin Kuy',
                'Kamu punya referensi tempat untuk Prakerin?',
                'Ayo ajukan tempat Prakerin pilihan mu !!!', 'Login dan ajukan !!!'
            ],
            typeSpeed: 100,
            delaySpeed: 600,
            loop: true
        });
    </script>
</body>

</html>
