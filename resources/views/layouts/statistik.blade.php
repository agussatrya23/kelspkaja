<div class="col-lg-2 col-md-6 col-sm-6 col-12">
    <a href="{{ route('kk')}}" style="color: inherit" class="card">
        <div class="card-body text-center">
            <div class="avatar bg-light-warning p-50 mb-1">
                <div class="avatar-content">
                    <i data-feather="users" class="font-medium-5"></i>
                </div>
            </div>
            @php
                // $idjabatan = Auth::user()->staf->idjabatan;
                // if ($idjabatan == 3 ) {
                //     $totalkk = App\Models\Kartukeluarga::where('lingkungan', 1)->count();
                // } elseif ($idjabatan == 4) {
                //     $totalkk = App\Models\Kartukeluarga::where('lingkungan', 2)->count();
                // } elseif ($idjabatan == 5) {
                //     $totalkk = App\Models\Kartukeluarga::where('lingkungan', 3)->count();
                // } else {
                //     $totalkk = App\Models\Kartukeluarga::count();
                // }
                $totalkk = App\Models\Kartukeluarga::count();
            @endphp
            <p class="card-text mb-50">Kartu Keluarga</p>
            <h1 class="font-weight-bolder text-warning mt-25">{{ $totalkk }}</h1>
        </div>
    </a>
</div>
<div class="col-lg-2 col-md-6 col-sm-6 col-12">
    <a href="{{ route('penduduk') }}" style="color: inherit" class="card">
        <div class="card-body text-center">
            <div class="avatar bg-light-primary p-50 mb-1">
            <div class="avatar-content">
                <i data-feather="user-check" class="font-medium-5"></i>
            </div>
            </div>
            @php
                // idjabatan = Auth::user()->staf->idjabatan;
                // if ($idjabatan == 3 ) {
                //     $totalkk = App\Models\Kartukeluarga::where('lingkungan', 1)->count();
                // } elseif ($idjabatan == 4) {
                //     $totalkk = App\Models\Kartukeluarga::where('lingkungan', 2)->count();
                // } elseif ($idjabatan == 5) {
                //     $totalkk = App\Models\Kartukeluarga::where('lingkungan', 3)->count();
                // } else {
                //     $totalkk = App\Models\Kartukeluarga::count();
                // }
                $totalpenduduk = App\Models\Penduduk::count();
            @endphp
            <p class="card-text mb-50">Penduduk</p>
            <h1 class="font-weight-bolder text-primary mt-25">{{ $totalpenduduk }}</h1>
        </div>
    </a>
</div>
<div class="col-lg-8 col-12">
    <div class="card card-statistics">
        <div class="card-body statistics-body">
            <h4>Statistik Penduduk</h4>
            <div class="dropdown-divider mt-1 mb-2"></div>
            <div class="row justify-items-center">
                <div class="col-xl-4 col-md-4 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="media">
                        <div class="avatar bg-light-success mr-2">
                            <div class="avatar-content">
                                <i data-feather="align-right" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="media-body my-auto">
                            @php
                                $totalkawan = App\Models\Penduduk::where('lingkungan', 1)->count();
                            @endphp
                            <h2 class="font-weight-bolder mb-0">{{ $totalkawan }}</h2>
                            <p class="card-text font-small-3 mb-0">Ling. Besang Kawan </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-6 col-12 mb-2 mb-xl-0">
                    <div class="media">
                        <div class="avatar bg-light-danger mr-2">
                            <div class="avatar-content">
                                <i data-feather="align-center" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="media-body my-auto">
                            @php
                                $totaltengah = App\Models\Penduduk::where('lingkungan', 2)->count();
                            @endphp
                            <h2 class="font-weight-bolder mb-0">{{ $totaltengah }}</h2>
                            <p class="card-text font-small-3 mb-0">Ling. Besang Tengah</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 col-sm-6 col-12 mb-2 mb-sm-0">
                    <div class="media">
                        <div class="avatar bg-light-info mr-2">
                            <div class="avatar-content">
                                <i data-feather="align-left" class="avatar-icon"></i>
                            </div>
                        </div>
                        <div class="media-body my-auto">
                            @php
                                $totalkangin = App\Models\Penduduk::where('lingkungan', 3)->count();
                            @endphp
                            <h2 class="font-weight-bolder mb-0">{{ $totalkangin }}</h2>
                            <p class="card-text font-small-3 mb-0">Ling. Besang Kangin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-5 col-12">
    <div class="card">
      <div class="card-body">
        @php
            $jabatan = Auth::user()->staf->idjabatan;
            if ($jabatan == 3) {
                $proses = App\Models\Pengajuan::where('lingkungan', '1')->get();
            } elseif ($jabatan == 4) {
                $proses = App\Models\Pengajuan::where('lingkungan', '2')->get();
            } elseif ($jabatan == 5) {
                $proses = App\Models\Pengajuan::where('lingkungan', '3')->get();
            } else {
                $proses = App\Models\Pengajuan::get();
            }
            $periode = date('Y-m-d');
            $periode2 = date('Y-m-d', strtotime('-30 days', strtotime($periode)));
            $usaha = $proses->where('idsurat', 1)->whereBetween('tanggal', [$periode2, $periode])->count();
            $tempatusaha = $proses->where('idsurat', 2)->whereBetween('tanggal', [$periode2, $periode])->count();
            $menikah = $proses->where('idsurat', 3)->whereBetween('tanggal', [$periode2, $periode])->count();
            $kematian = $proses->where('idsurat', 4)->whereBetween('tanggal', [$periode2, $periode])->count();
            $miskin = $proses->where('idsurat', 5)->whereBetween('tanggal', [$periode2, $periode])->count();
            $tempattinggal = $proses->where('idsurat', 6)->whereBetween('tanggal', [$periode2, $periode])->count();
        @endphp
        <h4>Jumlah Pengajuan <small class="float-sm-right d-sm-inline d-block mt-25">{{ (new \App\Helper)->tanggal($periode2) }} s/d {{ (new \App\Helper)->tanggal($periode) }}</small></h4>
        <div class="dropdown-divider mt-1"></div>
        <div class="d-flex align-items-center my-1">
          <span class="col px-0">Surat Keterangan Usaha</span>
          <div class="font-weight-bolder text-danger">{{ $usaha }}</div>
        </div>
        <div class="dropdown-divider"></div>
        <div class="d-flex align-items-center my-1">
          <span class="col px-0">Surat Keterangan Tempat Usaha</span>
          <div class="font-weight-bolder text-primary">{{ $tempatusaha }}</div>
        </div>
        <div class="dropdown-divider"></div>
        <div class="d-flex align-items-center my-1">
          <span class="col px-0">Surat Keterangan Menikah</span>
          <div class="font-weight-bolder text-info">{{ $menikah }}</div>
        </div>
        <div class="dropdown-divider"></div>
        <div class="d-flex align-items-center my-1">
          <span class="col px-0">Surat Keterangan Kematian</span>
          <div class="font-weight-bolder text-success">{{ $kematian }}</div>
        </div>
        <div class="dropdown-divider"></div>
        <div class="d-flex align-items-center my-1">
          <span class="col px-0">Surat Keterangan Kurang Mampu</span>
          <div class="font-weight-bolder text-dark">{{ $miskin }}</div>
        </div>
        <div class="dropdown-divider"></div>
        <div class="d-flex align-items-center my-1">
          <span class="col px-0">Surat Keterangan Tempat Tinggal</span>
          <div class="font-weight-bolder text-warning">{{ $tempattinggal }}</div>
        </div>
      </div>
    </div>
</div>
