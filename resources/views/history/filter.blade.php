<form action="{{ route('history.filter') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="col">
            <input type="text" id="filter" name="filter"  class="form-control" placeholder="Consultar" value="{{ old('filter') }}" required>
        </div>

        <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Filtrar</button>
        </div>
    </div>
</form>
