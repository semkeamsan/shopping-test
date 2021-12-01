@foreach ($images as $key => $image)
    <div class="avatar rounded position-relative mr-1 w-100px h-100px border bg-white" id="oldimage-{{ $key }}"
        onmouseover=";$(this).find(`#del`).removeClass('d-none')" onmouseout="$(this).find(`#del`).addClass('d-none')">
        <i id="del" class="fa-times fal font-weight-bolder position-absolute right-1 top-1 d-none"
            style="-webkit-text-stroke: 1px var(--danger);cursor: pointer;"
            onclick="$(`#oldimage-{{ $key }}`).remove()"></i>
        <input type="hidden" class="form-control" name="images[]" value="{{ $image }}">
        <img src="{{ $image }}">
    </div>
@endforeach
