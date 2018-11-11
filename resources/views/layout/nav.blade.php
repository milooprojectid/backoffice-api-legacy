<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li class="{{Request::is('home') ? 'active':''}}">
                <a href="{{route('home')}}">
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>
            </li>

            {{-- Source --}}
            <li class="treeview {{Request::is('source') || Request::is('source/*') ? 'active':''}}">
                <a href="">
                    <i class="fa fa-newspaper-o"></i><span>Source</span>
                </a>
            </li>

            {{-- Link --}}
            <li class="treeview {{Request::is('link') || Request::is('link/*') ? 'active':''}}">
                <a href="">
                    <i class="fa fa-link"></i><span>Link</span>
                </a>
            </li>

            {{-- Raw --}}
            <li class="treeview {{Request::is('raw') || Request::is('raw/*') ? 'active':''}}">
                <a href="">
                    <i class="fa fa-database"></i><span>Raw Data</span>
                </a>
            </li>

            {{-- Corpus --}}
            <li class="treeview {{Request::is('corpus') || Request::is('corpus/*') ? 'active':''}}">
                <a href="">
                    <i class="fa fa-book"></i><span>Corpus</span>
                </a>
            </li>

            {{--Matakuliah--}}
            {{--<li class="treeview {{Request::is('admin/matakuliah') || Request::is('admin/matakuliah/*') ? 'active':''}}">--}}
                {{--<a href="{{route('admin.matakuliah.index')}}">--}}
                    {{--<i class="fa fa-th-list"></i><span>Matakuliah</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--Dosen--}}
            {{--<li class="treeview {{Request::is('admin/dosen') || Request::is('admin/dosen/*') ? 'active':''}}">--}}
                {{--<a href="{{route('admin.dosen.index')}}">--}}
                    {{--<i class="fa fa-user-o"></i><span>Dosen</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--Mahasiswa--}}
            {{--<li class="treeview {{Request::is('admin/mahasiswa') || Request::is('admin/mahasiswa/*') ? 'active':''}}">--}}
                {{--<a href="{{route('admin.mahasiswa.index')}}">--}}
                    {{--<i class="fa fa-user"></i><span>Mahasiswa</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--Registrasi--}}
            {{--<li class="treeview {{Request::is('admin/registrasi') || Request::is('admin/registrasi/*') ? 'active':''}}">--}}
                {{--<a href="{{route('admin.registration.index')}}">--}}
                    {{--<i class="fa fa-list"></i><span>Registrasi</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--Jadwal--}}
            {{--<li class="treeview {{Request::is('admin/jadwal') || Request::is('admin/jadwal/*') ? 'active':''}}">--}}
                {{--<a href="#">--}}
                    {{--<i class="fa fa-calendar"></i> <span>Jadwal</span>--}}
                    {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                    {{--<li class="{{Request::is('admin/jadwal/kuliah') || Request::is('admin/jadwal/kuliah/*') ? 'active':''}}">--}}
                        {{--<a href="#"><i class="fa fa-university "></i> Perkuliahan--}}
                            {{--<span class="pull-right-container">--}}
                  {{--<i class="fa fa-angle-left pull-right"></i>--}}
                {{--</span>--}}
                        {{--</a>--}}
                        {{--<ul class="treeview-menu">--}}
                            {{--<li class="{{Request::is('admin/jadwal/kuliah') ? 'active':''}}"><a--}}
                                        {{--href={{route('admin.kuliah.index')}}><i--}}
                                            {{--class="fa fa-eye {{Request::is('admin/jadwal/kuliah/') || Request::is('admin/jadwal/kuliah/*') ? 'text-white':''}}"></i>--}}
                                    {{--Lihat Jadwal</a></li>--}}
                            {{--<li class="{{Request::is('admin/jadwal/kuliah/create') ? 'active':''}}"><a--}}
                                        {{--href="{{route('admin.kuliah.create')}}"><i--}}
                                            {{--class="fa fa-plus-square {{Request::is('admin/jadwal/kuliah/create') ? 'text-white':''}}"></i>--}}
                                    {{--Tambah Jadwal</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--</ul>--}}

                {{--<ul class="treeview-menu">--}}

                    {{--<li class="{{Request::is('admin/jadwal/ujian') || Request::is('admin/jadwal/ujian/*') ? 'active':''}}">--}}
                        {{--<a href="{{route('admin.ujian.index')}}">--}}
                            {{--<i class="fa fa-list-ul"></i><span>Ujian</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}

                {{--</ul>--}}

            {{--</li>--}}

            {{-- Honor --}}
            {{--<li class="treeview {{Request::is('admin/honor') || Request::is('admin/honor/*') ? 'active':''}}">--}}
                {{--<a href="{{route('admin.honor.index')}}">--}}
                    {{--<i class="fa fa-dollar"></i><span>Honor</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{-- Berita --}}
            {{--<li class="treeview {{Request::is('admin/berita') || Request::is('admin/berita/*') ? 'active':''}}">--}}
                {{--<a href="{{route('admin.berita.index')}}">--}}
                    {{--<i class="fa fa-newspaper-o"></i><span>Berita</span>--}}
                {{--</a>--}}
            {{--</li>--}}

        </ul>
    </section>

</aside>
