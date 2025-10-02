@props(['type' => 'success','title' => 'Thong bao'])
<style>
    .alert {
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 10px;

    }

    .alert.success {
        color: #065F46;
        background: #bfb8ffff;
    }

    .alert.error {
        color: #92400E;
        background: yellow
    }

    .alert.warning {
        color: #BF2424;
        background: yellow;
    }
</style>
<div class="alert {{ $type }}">
    <strong>{{ $title }}</strong> {{ $slot }}
</div>