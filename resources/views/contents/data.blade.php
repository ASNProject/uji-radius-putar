@extends('layouts.app', ['title' => 'Data'])

@section('content')
<main>
  <div class="container mt-4">
    <h2 class="mb-4">Data</h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ url('/delete-radius') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete all data?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                Delete All Data
            </button>
        </form>
        <a href="{{ url('/export-radius') }}" class="btn btn-success">
            Download CSV
        </a>
    </div> 
    {{-- Table to Display Data --}}
    <table class="table table-striped bg-white" style="width: 100%; overflow-x: auto; table-layout: fixed;">
        <thead>
            <tr>
                <th scope="col">Mode</th>
                <th scope="col">Mode Perhitungan</th>
                <th scope="col">Radius</th>
                <th scope="col">Hasil</th>
                <th scope="col">Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $datas)
                <tr>
                    <td>{{ $datas->mode }}</td>
                    <td>{{ $datas->calcMode}}</td>
                    <td>{{ $datas->radius}}</td>
                    <td>{{ $datas->result}}</td>
                    <td>{{ $datas->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
        {{-- Pagination --}}

        <div class="d-flex justify-content-center">
            {{ $data->links() }}
        </div>
  </div>
</main>
@endsection
