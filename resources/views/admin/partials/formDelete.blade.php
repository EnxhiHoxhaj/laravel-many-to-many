<form action="{{ $route }}" method="POST" onsubmit="return confirm('{{ $message }}')">
    @csrf
    @method('DELETE')
    <button class="bot" type="submit">
        <i class="fa-solid fa-trash"></i>
    </button>
</form>
