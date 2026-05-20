@extends('layouts.app')
@section('title', 'Soporte Técnico')
@section('topbar-title', 'COMMUNICATIONS // LIVE CHAT')

@section('content')
<style>
    .chat-container {
        height: calc(100vh - 180px);
        display: flex;
        flex-direction: column;
        background: var(--card-bg);
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
    }
    .chat-header {
        padding: 16px 20px;
        border-bottom: 1px solid var(--border);
        display: flex;
        align-items: center;
        gap: 12px;
        background: rgba(255,255,255,0.02);
    }
    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        background-image: 
            radial-gradient(var(--border) 1px, transparent 1px);
        background-size: 30px 30px;
    }
    .chat-input-area {
        padding: 16px 20px;
        border-top: 1px solid var(--border);
        background: rgba(255,255,255,0.02);
    }
    .message-bubble {
        max-width: 70%;
        padding: 10px 14px;
        border-radius: 12px;
        font-size: 14px;
        line-height: 1.5;
        position: relative;
    }
    .message-received {
        background: var(--card-bg-light);
        align-self: flex-start;
        border-bottom-left-radius: 2px;
        border: 1px solid var(--border);
    }
    .message-sent {
        background: var(--teal);
        color: #0c1a16;
        align-self: flex-end;
        border-bottom-right-radius: 2px;
        font-weight: 500;
    }
    .message-info {
        font-size: 10px;
        margin-bottom: 4px;
        display: flex;
        gap: 8px;
    }
    .message-received .message-info { color: var(--text-muted); }
    .message-sent .message-info { color: rgba(12,26,22,0.6); }

    .chat-input-group {
        display: flex;
        gap: 10px;
    }
    .chat-input {
        flex: 1;
        background: var(--input-bg);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 10px 14px;
        color: var(--text-primary);
        outline: none;
        transition: border-color 0.2s;
    }
    .chat-input:focus {
        border-color: var(--teal);
    }
    .btn-send {
        background: var(--teal);
        color: #0c1a16;
        border: none;
        padding: 0 20px;
        border-radius: 8px;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: opacity 0.2s;
    }
    .btn-send:hover { opacity: 0.9; }
</style>

<div class="vt-page-header d-flex align-items-center justify-content-between mb-3">
    <div>
        <h1>Centro de Soporte Técnico</h1>
        <p>Canal de comunicación directa entre el personal operativo</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <span class="vt-badge badge-success" style="padding: 6px 12px">
            <span style="display:inline-block;width:6px;height:6px;border-radius:50%;background:#fff;margin-right:6px"></span>
            Chat Online
        </span>
    </div>
</div>

<div class="chat-container">
    <div class="chat-header">
        <div style="width:10px;height:10px;border-radius:50%;background:var(--teal);box-shadow:0 0 10px var(--teal)"></div>
        <span style="font-weight:600;font-size:14px;letter-spacing:1px;text-transform:uppercase">Canal General de Soporte</span>
    </div>

    <div class="chat-messages" id="message-container">
        @include('chat.messages', ['mensajes' => $mensajes])
    </div>

    <div class="chat-input-area">
        <form id="chat-form" class="chat-input-group">
            @csrf
            <input type="text" name="mensaje" id="chat-input" class="chat-input" placeholder="Escribe un mensaje para el equipo técnico..." autocomplete="off">
            <button type="submit" class="btn-send">
                <span>ENVIAR</span>
                <i class="bi bi-send-fill"></i>
            </button>
        </form>
    </div>
</div>

<script>
    const container = document.getElementById('message-container');
    const form = document.getElementById('chat-form');
    const input = document.getElementById('chat-input');

    // Scroll to bottom helper
    const scrollToBottom = () => {
        container.scrollTop = container.scrollHeight;
    }

    // Scroll on load
    scrollToBottom();

    // Handle send
    form.onsubmit = async (e) => {
        e.preventDefault();
        const msg = input.value.trim();
        if(!msg) return;

        const formData = new FormData(form);
        input.value = '';

        try {
            await fetch('{{ route('chat.store') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            refreshMessages();
        } catch (err) {
            console.error('Error sending message:', err);
        }
    }

    // Refresh messages
    const refreshMessages = async () => {
        try {
            const resp = await fetch('{{ route('chat.messages') }}');
            const html = await resp.text();
            
            // Only update if content changed or we are near bottom
            const isNearBottom = container.scrollHeight - container.scrollTop <= container.clientHeight + 100;
            
            container.innerHTML = html;
            
            if(isNearBottom) {
                scrollToBottom();
            }
        } catch (err) {
            console.error('Error refreshing messages:', err);
        }
    }

    // Polling every 3 seconds
    setInterval(refreshMessages, 3000);
</script>
@endsection
