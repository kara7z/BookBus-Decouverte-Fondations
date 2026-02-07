@if ($errors->any())
    <div style="margin: 10px 0; padding: 10px; border-radius: 12px; background: rgba(255,0,0,.08); border: 1px solid rgba(255,0,0,.18);">
        <ul style="margin:0; padding-left: 18px;">
            @foreach ($errors->all() as $error)
                <li style="font-weight:700;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
