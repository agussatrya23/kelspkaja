@extends('layouts.app')

@section('menu')
<li class="{{ request()->is('home*') ? 'active' : '' }} nav-item"><a class="d-flex align-items-center" href="{{route('home')}}"><i data-feather="home"></i><span class="menu-title text-truncate">Dashboard</span></a>
</li>
<li class="{{ request()->is('kependudukan*') ? 'active open' : '' }} nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="users"></i><span class="menu-title text-truncate">Kependudukan</span></a>
    <ul class="menu-content">
        <li class="{{ request()->is('kependudukan/kartu-keluarga*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('kk') }}"><i data-feather="{{request()->is('kependudukan/kartu-keluarga*') ? 'disc' : 'circle'}}"></i><span class="menu-title text-truncate">Kartu Keluarga</span></a>
        </li>
        <li class="{{ request()->is('kependudukan/penduduk*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('penduduk') }}"><i data-feather="{{request()->is('kependudukan/penduduk*') ? 'disc' : 'circle'}}"></i><span class="menu-title text-truncate">Data Penduduk</span></a>
        </li>
    </ul>
</li>
<li class="{{ request()->is('pengajuan*') ? 'active open' : '' }} nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate">Pengajuan</span></a>
    <ul class="menu-content">
        <li class="{{ request()->is('pengajuan/surat-keterangan*') ? 'active' : '' }}"><a class="d-flex align-items-center" href="{{ route('index.pengajuan') }}"><i data-feather="{{request()->is('pengajuan/surat-keterangan*') ? 'disc' : 'circle'}}"></i><span class="menu-item text-truncate">Surat Keterangan</span></a>
        </li>
    </ul>
</li>
@can('admin')
<li class="{{request()->is('post*') ? 'active open' : ''}} nav-item nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="layout"></i><span class="menu-title text-truncate">Konten Web</span></a>
    <ul class="menu-content">
        <li class="{{request()->is('post/informasi*') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{ route('informasi') }}"><i data-feather="{{request()->is('post/informasi*') ? 'disc' : 'circle'}}"></i><span class="menu-item text-truncate">Informasi</span></a>
        </li>
        <li class="{{request()->is('post/galeri*') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{ route('galeri') }}"><i data-feather="{{request()->is('post/galeri*') ? 'disc' : 'circle'}}"></i><span class="menu-item text-truncate">Galeri</span></a>
        </li>
    </ul>
</li>
@endcan

<li class="{{request()->is('staf*') ? 'active' : ''}} "><a class="d-flex align-items-center" href="{{route('staf')}}"><i data-feather="user"></i><span class="menu-title text-truncate">Aparatur</span></a>
</li>

<li class="nav-item"><a class="d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="power"></i><span class="menu-title text-truncate">Logout</span></a></li>
{{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  {{ csrf_field() }}
</form> --}}
@endsection
