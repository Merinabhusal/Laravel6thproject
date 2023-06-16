@extends('layouts.app')
@section('content')


<h2 class="font-bold text-4x1 text-blue-700">ProductItem</h2>
<hr class="h-1 bg-blue-200">

<div class="my-4 text-right px-10">
    <a href ="{{route('product.create')}}" class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow -amber-300">Add product</a>

</div>
<table id="mytable" class="display">

    <thead>
        <th>SN</th>
        <th>Product Image</th>
        <th>Product Name</th>
        <th> Description</th>
        <th> Old Price</th>
       
        <th>Price</th>
        <th>Category </th>
        <th>Stock</th>
        <th>Action</th>
    </thead>
    <tbody>
@foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>

            <td><img class="w-36 object-cover " src="{{asset('images/products/'.$product->photopath)}}" alt=""></td>
            <td>{{$product->name}}</td>
             <td>{{$product->description}}</td>
             <td>{{$product->oldprice}}</td>
             <td>{{$product->price}}</td>
             <td>{{$product->category->name}}</td>
             <td>{{$product->stock}}</td>
            <td>
                <a href="{{route('product.edit',$product->id)}}" class="bg-blue-500 text-white px-2 py-1 rounded hover:shadow-blue-400">Edit</a>
              
                {{--<a onclick=" return confirm('Are you sure to delete?')" href="{{route ('product.destroy',$product->id)}}"class="bg-red-600 text-white px-2 py-1 rounded hover:shadow_red-400">Delete</a> --}}
                <a onclick="showDelete({{$product->id}})" class="bg-red-600 text-white px-2 py-1 rounded hover:shadow_red-400">Delete</a>
                

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- backdrop-filter:blur(15px);--}}
<div id="deleteModal"class="fixed left-0 top-0 right-0 bottom-0 bg-opacity-50 backdrop-blur-sm bg-blue-400" style="display:none">
    <div class="flex h-full justify-center items-center">
        <div class="bg-white p-4 rounded-lg">
            <form action="{{route('product.destroy')}}"method="post">
                @csrf
                <p class="font-bold text-2xl">Are you Sure to Delete?</p>
                <input type="hidden"name="dataid"id="dataid" value="">
                <div class="flex justify-center">
                    <input type="submit"value="Yes"class="bg-blue-600 text-white px-4 py-2 mx-1 rounded-lg cursor-pointer">
                    <a onclick="hideDelete()"class="bg-red-600 text-white px-4 py-2 mx-1 rounded-lg cursor-pointer">No</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let table=new DataTable('#mytable');
</script>
<script>
    function showDelete(x)
    {
        //$('#dataid').val(x);
       
        document.getElementById('dataid').value=x;
        document.getElementById('deleteModal').style.display='block';
    }
    function hideDelete()
    {
        document.getElementById('deleteModal').style.display='none';
    }
   
</script>
@endsection