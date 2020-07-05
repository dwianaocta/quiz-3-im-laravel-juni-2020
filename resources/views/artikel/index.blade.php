@extends('layouts.master')

@section('content')
<div class="pt-3 pl-2">
    <a class="btn btn-primary" href="/artikel/create" role="button">Buat Artikel</a>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Judul</th>
        <th scope="col">Isi</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Update</th>
        <th scope="col"> </th>
        <th scope="col"> </th>
        <th scope="col"> </th>
    </tr>
    </thead>
    <tbody>
        
    @foreach ($artikel as $key => $item)
        <tr>
        <th scope="row"> {{ $key + 1}} </th>
        <td> {{$item->judul}} </td>
        <td> {{$item->isi}} </td>
        <td> {{$item->tanggal_dibuat}} </td>
        <td> {{$item->tanggal_diperbarui}} </td>
        <td> <a class="btn btn-primary" href="/artikel/{{$item->id}}" role="button">Detail</a> </td>
        <td> <a class="btn btn-warning" href="/artikel/{{$item->id}}/edit" role="button">Edit</a> </td>
        <td>  
            <form action="/artikel/{{$item->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </td>
        </tr>                                
    @endforeach

    </tbody>
</table>
@endsection





@push('scripts')

<script>
    Swal.fire({
        title: 'Berhasil!',
        text: 'Memasangkan script sweet alert',
        icon: 'success',
        confirmButtonText: 'Cool'
    });
</script>

@endpush