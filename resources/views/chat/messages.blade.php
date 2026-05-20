@foreach($mensajes as $m)
    @php $isMe = $m->user_id === auth()->id(); @endphp
    <div class="message-bubble {{ $isMe ? 'message-sent' : 'message-received' }}">
        <div class="message-info">
            <span style="font-weight:700">{{ $isMe ? 'Tú' : $m->user->name }}</span>
            <span>{{ $m->created_at->format('H:i') }}</span>
        </div>
        <div class="message-content">
            {{ $m->mensaje }}
        </div>
    </div>
@endforeach
