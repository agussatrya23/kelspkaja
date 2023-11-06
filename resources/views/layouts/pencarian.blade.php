<div class="sidebar-widget sidebar-search">
    <form action="{{ route('berita') }}" method="GET" class="search-form">
        <div class="form-group">
            <input type="hidden" name="kategori" value="{{ request()->input('kategori','semua') }}">
            <input type="search" name="pencarian" value="{{ request()->input('pencarian') }}" placeholder="Cari Informasi">
            <button type="submit"><i class="flaticon-search-1"></i></button>
        </div>
    </form>
</div>
