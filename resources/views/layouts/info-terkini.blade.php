<div class="sidebar-widget sidebar-post">
    <div class="widget-title">
        <h3>Informasi Terkini</h3>
        <div class="dotted-box">
            <span class="dotted"></span>
            <span class="dotted"></span>
            <span class="dotted"></span>
        </div>
    </div>
    <div class="post-inner">
        @php
            $dataterkini = App\Models\Post::where('status', 1)
            ->whereIn('jenis', [2, 3, 4])
            ->orderBy('tanggal', 'desc')
            ->take(3)
            ->get();
        @endphp
        @foreach ($dataterkini as $item)
            <div class="post d-flex align-items-center">
                <figure class="post-thumb"><a href="{{ route('detil.berita', $item->slug) }}"><img src="{{ asset('upload/'.$item->gambar) }}" alt=""></a></figure>
                @php
                    $stritem = Str::length($item->judul);
                    if ($stritem > 40) {
                        $judul_cut = substr($item->judul, 0, 40);
                        if ($judul_cut[39] != ' ') {
                            $new_pos = strrpos($judul_cut, ' ');
                            $judul_cut = substr($item->judul, 0, $new_pos);
                            $judul_cut = $judul_cut.'...';
                        } else {
                            $judul_cut = substr($item->judul, 0, 39);
                            $judul_cut = $judul_cut.'...';
                        }
                    } else {
                        $judul_cut = $item->judul;
                    }
                @endphp
                <div class="post-desc">
                    <h5>
                        <a href="{{ route('detil.berita', $item->slug) }}">{{ $judul_cut }}</a>
                    </h5>
                    <span class="post-date"><i class="fa fa-calendar-alt"></i>{{ (new \App\Helper)->tanggal($item->tanggal) }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="sidebar-widget sidebar-support">
    <div class="widget-content">
        <ul class="content-box clearfix">
            <li>
                <i class="flaticon-call"></i>
                <div>
                    <p>Hubungi Kami :</p>
                    <h3><a href="tel:036622851">(0366) 22851</a></h3>
                </div>
            </li>
            <li>
                <i class="flaticon-email"></i>
                <div>
                    <p>Email Kami :</p>
                    <h3><a href="mailto:info@semarapurakaja.desa.id">info@semarapurakaja.desa.id
                    </a></h3>
                </div>
            </li>
        </ul>
    </div>
</div>
