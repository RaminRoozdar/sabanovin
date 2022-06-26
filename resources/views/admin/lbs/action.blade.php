
  @if($status != 'done')
  <a class="btn btn-danger btn-sm btn-font-size" href="{{route('admin.lbs.show',['id' => $id])}}">
    <i class="fa fa-download"></i>
    دانلود اکسل
    </a>

  <form method="get" action="{{ route('admin.lbs.status',['id' => $id]) }}" style="display:inline;">
    @csrf
    @method('get')
    <button onclick="return confirm('آیا از عملیات اطمینان دارید؟')" class="btn btn-dark btn-sm btn-font-size"><i class="fa fa-edit"></i>  تغییر به انجام شده</button>
</form>
  @endif
