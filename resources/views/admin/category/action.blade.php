<td>
    <form action="{{route('admin.category.delete',['id' => $id])}}" method="POST">
        @if ($category_id == 0)
            <a class="btn btn-dark btn-sm btn-font-size" href="{{route('admin.category.createId',['id' => $id])}}">ایجاد زیر گروه</a>
        @endif
        <a class="btn btn-primary btn-sm btn-font-size" href="{{route('admin.category.edit',['id' => $id])}}"><i class="fa fa-edit"></i></a>

        @csrf
        @method('DELETE')

        {{--  <button type="submit" class="btn btn-danger">حذف</button>  --}}
    </form>
</td>
