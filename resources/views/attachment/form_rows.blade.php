@foreach($items as $key => $item)
    <tr id="{{ $item->id }}">
        <td>{{ ++$key }}</td>
        <td>{{ $item->documentNumber }}</td>
        <td>{{ $item->version }}</td>
        <td>{{ $item->date }}</td>
        <td>{{ $item->title }}</td>
        <td>{{ $item->description }}</td>
        <td>{{ $item->category }}</td>
        <td>{{ $item->subCategory }}</td>
        <td>
            @foreach($item->attachmentItems as $attachment)
                <a target="_blank" href="{{ asset('images/attachment/'.$attachment->fileName) }}">{{ $attachment->fileName }}</a>
                <br>
            @endforeach
        </td>
        <td>

            @include('components.edit_delete_button')
            <i class="fas fa-clipboard" onclick="copyToClipboard(this)"></i>
        </td>
    </tr>
@endforeach
<script>
function copyToClipboard(){
    var copyText = document.getElementById("attachment_view").getAttribute('view_url');

    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);
}
</script>
