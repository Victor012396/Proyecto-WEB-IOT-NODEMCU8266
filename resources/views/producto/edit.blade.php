<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="producto-management"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Editar producto'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://img.freepik.com/premium-photo/smart-city-with-checkpoints-communication-network_28943-371.jpg?w=740');">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Información del producto</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10"
                                    data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('demo'))
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('demo') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                        @endif
                        <form method='POST' action="{{ route('producto.update',$producto) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Marca</label>
                                    <input type="text" name="marca" value="{{old('marca',$producto->marca)}}" class="form-control border border-2 p-2">
                                    @error('marca')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Tipo</label>
                                    <input type="text" name="tipo" value="{{old('tipo',$producto->tipo)}}" class="form-control border border-2 p-2" >
                                    @error('tipo')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                               
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" name="nombre" value="{{old('nombre',$producto->nombre)}}" class="form-control border border-2 p-2">
                                    @error('nombre')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Costo</label>
                                    <input type="number" name="costo" value="{{old('costo',$producto->costo)}}" class="form-control border border-2 p-2">
                                    @error('costo')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Guardar</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
