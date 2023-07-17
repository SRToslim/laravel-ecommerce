@extends('backend.layouts.app')

@prepend('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endprepend

@section('content')

<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-header">
                {{-- <h1 class="mb-0 h6">{{ translate('All Branch') }}</h1> --}}
                <div class="col-md-6">
                    <h1 class="h3">{{translate('All Branch')}}</h1>
                </div>
                @can('add_outlet')
                    <div class="col-md-6 text-md-right">
                        <a href="{{ route('outlets.create') }}" class="btn btn-primary">
                            <span>{{translate('Add New Branch')}}</span>
                        </a>
                    </div>
                @endcan
            </div>
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        @foreach ($office as $d)
                        {{-- <?php $i++ ?> --}}
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ ucfirst($d->name) }}</td>
                                <td>{{ ucfirst($d->address) }}</td>
                                <td>{{ ucfirst($d->phone) }}</td>
                                <td class="text-center">
									@can('edit_outlet')
										<a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('outlets.edit', $d->id )}}" title="{{ translate('Edit') }}">
											<i class="las la-edit"></i>
										</a>
									@endcan
									@can('delete_outlet')
										<a href="{{route('outlets.destroy', $d->id)}}" title="{{ translate('Delete') }}" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete">
											<i class="las la-trash"></i>
										</a>
									@endcan
		                        </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

    <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection