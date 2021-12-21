@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                {{-- Tarjeta Uusarios --}}
                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-blue order-card">
                                        @php
                                            use App\Models\User;
                                            $cant_usuarios = User::count();
                                        @endphp
                                        @can('ver-usuario')
                                            <div class="card-block">
                                                <h5>Usuarios</h5>

                                                <h2 class="text-right">
                                                    <i class="fa fa-users f-left"></i><span>{{ $cant_usuarios }}</span>
                                                </h2>
                                                <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver
                                                        más</a></p>
                                            </div>
                                        @endcan
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-green order-card">
                                        @php
                                            use Spatie\Permission\Models\Role;
                                            $cant_roles = Role::count();
                                        @endphp
                                        @can('ver-rol')
                                            <div class="card-block">
                                                <h5>Roles</h5>

                                                <h2 class="text-right"><i
                                                        class="fa fa-user-lock f-left"></i><span>{{ $cant_roles }}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a>
                                                </p>
                                            </div>
                                        @endcan
                                    </div>
                                </div>

                                <div class="col-md-4 col-xl-4">
                                    <div class="card bg-c-pink order-card">
                                        @php
                                            use App\Models\Blog;
                                            $cant_blogs = Blog::count();
                                        @endphp
                                        @can('ver-blog')
                                            <div class="card-block">
                                                <h5>Blogs</h5>
                                                <h2 class="text-right"><i
                                                        class="fa fa-blog f-left"></i><span>{{ $cant_blogs }}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/blogs" class="text-white">Ver más</a>
                                                </p>
                                            </div>
                                        @endcan
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
