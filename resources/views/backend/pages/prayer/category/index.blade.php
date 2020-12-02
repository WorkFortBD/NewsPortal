@extends('backend.layouts.master')

@section('title')
    @include('backend.pages.sliders.partials.title')
@endsection

@section('admin-content')
    @include('backend.pages.sliders.partials.header-breadcrumbs')
    <div class="container-fluid">
        @include('backend.layouts.partials.messages')
        <div class="create-page">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <h3 class="mt-2">District List</h3>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <p class="mt-2 mr-4 float-right"><a href="{{ route('admin.createDistrict') }}">Create New Category <i class="fa fa-plus" aria-hidden="true"></i> </a></p>
                </div>
                
            </div>
            <table class="table table-hover">
               <thead>
                    <tr>
                        <th>#</th>
                        <th>District Name</th>
                        <th>District Name BN</th>
                        <th>Division</th>
                        <th>Action</th>
                    </tr>
               </thead>
               <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach($districts as $district)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $district->district_name }}</td>
                    <td>{{ $district->district_name_bn }}</td>
                    <td>{{ $district->division }}</td>
                    <td><a href="{{ route('admin.editDistrict',$district->id) }}"><i class="fas fa-edit"></i></a></td>
                </tr>
                @php
                    $i++;
                @endphp
                @endforeach
                </tbody>
            </table>

            {{-- <table class="table table-hover px-2">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table> --}}
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    
    </script>
@endsection