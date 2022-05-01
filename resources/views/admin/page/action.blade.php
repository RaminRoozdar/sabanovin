<a href="{{ route('admin.page.edit',['id' => $id]) }}" class="btn btn-sm btn-dark"><i class="fa fa-edit"></i> </a>
<form method="post" action="{{ route('admin.page.delete',['id' => $id]) }}" style="display:inline;">
    @csrf
    @method('delete')
    <button onclick="return confirm('آیا از عملیات حذف اطمینان دارید؟')" class="btn btn-danger btn-sm "><i class="fa fa-trash"></i> </button>
</form>

@isset($link)
<a href="{{ $link }}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> </a>

@else
<a href="{{ route('page',['id'=>$id , 'slug'=>$slug]) }}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> </a>

@endisset
