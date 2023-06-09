<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="device-management"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Agregar dispositivo'></x-navbars.navs.auth>
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
                                <h6 class="mb-3">Información del dispositivo</h6>
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
                        <form method='POST' action="{{ route('device.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Dispositivo</label>
                                    <input type="text" name="device" class="form-control border border-2 p-2">
                                    @error('device')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                                
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Espacio</label>
                                    <input type="text" name="espacio" class="form-control border border-2 p-2" >
                                    @error('espacio')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                                </div>
                               
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Lugar</label>
                                    <input type="text" name="lugar" class="form-control border border-2 p-2">
                                    @error('lugar')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Dueños(Pívote)</label>
                                    <select name="user_ids[]" class="mb-3 col-md-12" multiple>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach

                                    </select>
                                 </div>

                                 <div class="mb-3 col-md-12">
                                    <label class="form-label">Productos</label>
                                    <select name="producto_id" class="mb-3 col-md-12">
                                    @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                    @endforeach

                                    </select>
                                 </div>
                                
                                 <div class="mb-3 col-md-12">
                                    @csrf
                                     <div>
                                        <label>Selecciona archivo</label>
                                        <input type="file" name="archivo" id="archivo">
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    <i class="mdi mdi-content-save-all"></i>
                                        Guardar   
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
