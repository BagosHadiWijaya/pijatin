@extends('layouts.home')
@section('content')
  <main id="main">
    <!-- ======= Why Us Section ======= -->
    <section id="about" class="why-us section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title mb-0 pb-0">
          <h2>Alternatif</h2>
        </div>
        <div class="row mt-0">
          <div class="col-lg-12 mt-0 d-flex flex-column justify-content-center align-items-stretch order-2 order-lg-1">
            <div class="content">
              <h4>Berikut adalah list alternatif yang tersedia</h4>
            </div>

            <div class="accordion-list">
              <ul>
                @foreach ($dataAlternatif as $alternatif)
                  <li>
                    <a data-bs-toggle="collapse" class="collapse"
                      data-bs-target="#accordion-list-{{ $alternatif->id }}"><span>{{ $alternatif->id }}</span>
                      {{ $alternatif->nama }} <i class="bx bx-chevron-down icon-show"></i><i
                        class="bx bx-chevron-up icon-close"></i></a>
                    <div id="accordion-list-{{ $alternatif->id }}" class="collapse show" data-bs-parent=".accordion-list">
                      <p>
                        {{ $alternatif->deskripsi }}
                      </p>
                    </div>
                  </li>
                @endforeach
              </ul>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kriteria</h2>
          <p class="text-start">Berikut adalah kriteria yang digunakan dalam menentukan alternatif terbaik.</p>
        </div>

        <div class="row">
          @foreach ($dataKriteria as $kriteria)
            <div class="col-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="400">
              <div class="icon-box flex-grow-1">
                <div class="icon"><i class="bx bx-layer"></i></div>
                <h4><a href="">{{ $kriteria->nama }}</a></h4>
              </div>
            </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pesanan</h2>
          <p class="text-start">
            Isi form berikut untuk melakukan pemesanan pijat panggilan.
          </p>
        </div>

        <div class="row">
          <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="{{ route('store.pesanan') }}" method="POST" class="php-email-form">
              @csrf
              @if (Auth::check())
                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
              @endif
              <div class="form-group">
                <label for="nama">Nama Pesanan</label>
                <input type="text" name="nama" class="form-control" id="nama" required>
              </div>
              <div class="form-group">
                <label for="id_terapis">Terapis</label>
                <select class="form-select" id="id_terapis" name="id_terapis" required>
                  <option selected>Pilih Terapis</option>
                  @foreach ($dataTerapis as $terapis)
                    <option value="{{ $terapis->id }}">{{ $terapis->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="id_alternatif">Layanan</label>
                <select class="form-select" id="id_alternatif" name="id_alternatif" required>
                  <option selected>Pilih Layanan</option>
                  @foreach ($dataAlternatif as $alternatif)
                    <option value="{{ $alternatif->id }}">{{ $alternatif->nama }}</option>
                  @endforeach
                </select>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center">
                <button type="submit">Pesan Sekarang</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="contact">
      <div class="container" data-aos="zoom-in">

        <div class="text-center text-lg-start">
          <h3>Dapatkan Rekomendasi Layanan</h3>
        </div>
        <form action="{{ route('rekomendasi.predict') }}" method="POST" class="php-email-form">
          @csrf
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" id="harga" required>
          </div>
          <div class="form-group">
            <label for="durasi">Durasi</label>
            <input type="number" name="durasi" class="form-control" id="durasi" required>
          </div>
          <div class="text-center"><button type="submit">Dapatkan Rekomendasi</button></div>
        </form>

      </div>
    </section><!-- End Cta Section -->

    @if (Auth::check())
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Rating Pesanan</h2>
            <p class="text-start">
              Isi form berikut untuk memberikan rating pada pesanan yang telah dilakukan.
            </p>
          </div>

          <div class="row">

            <div class="col-lg-5 d-flex align-items-stretch">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>

                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>

                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55s</p>
                </div>

                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                  frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
              </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
              <form action="{{ route('store.nilai.kriteria') }}" method="POST" class="php-email-form">
                @csrf
                <div class="form-group">
                  <label for="id_alternatif_2">Layanan Dipesan</label>
                  <select class="form-select" id="id_alternatif_2" name="id_alternatif_2" required>
                    <option selected>Pilih Layanan</option>
                    @foreach ($dataAlternatifPesanan as $pesanan)
                      <option value="{{ $pesanan->alternatif->id }}">{{ $pesanan->alternatif->nama }}</option>
                    @endforeach
                  </select>
                </div>
                {{-- radio group 1-5 for rating kriteria --}}
                @foreach ($dataKriteria as $kriteria)
                  <div class="form-group">
                    <label for="nilai[{{ $kriteria->id }}]">{{ $kriteria->nama }}</label>
                    <select class="form-select" id="nilai[{{ $kriteria->id }}]" name="nilai[{{ $kriteria->id }}]"
                      required>
                      <option selected>Pilih Rating</option>
                      @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                      @endfor
                    </select>
                  </div>
                @endforeach
                <div class="text-center"><button type="submit">Kirim</button></div>
              </form>
            </div>
          </div>
        </div>
      </section><!-- End Contact Section -->
    @endif
  </main><!-- End #main -->
@endsection
