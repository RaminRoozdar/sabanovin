<form action="{{route('admin.item.delete',['id' => $id])}}" method="POST">

    <a class="btn btn-primary btn-sm btn-font-size" href="{{route('admin.item.show',['id' => $id])}}">
    <i class="fa fa-eye"></i>
    </a>

    <a class="btn btn-warning btn-sm btn-font-size" href="{{route('admin.item.edit',['id' => $id])}}">
    <i class="fa fa-edit"></i>
    </a>

    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger btn-sm btn-font-size">
    <i class="fa fa-trash"></i>
    </button>
</form>
