<nav aria-label="Paginate Histories">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="{{ $histories->previousPageUrl() }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        @for($page = 1; $page <= $histories->lastPage(); $page++)
            <li class="page-item {{ $page == $histories->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $histories->url($page) }}"> {{ $page }}</a>
            </li>
        @endfor

        <li class="page-item">
            <a class="page-link" href="{{ $histories->nextPageUrl() }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
