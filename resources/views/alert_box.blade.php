@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{  session()->pull('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{  session()->pull('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{  session()->pull('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session()->has('now'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{  session()->pull('now') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
