@extends('layouts.mainLayout')
@section('content')
    <div class="container mt-5 pb-3">
        @if(session('message'))
            <h4>{{ session('message') }}</h4>
        @endif
        @foreach ($comics as $com)
            <div class="h-25 d-flex flex-row rounded-4 overflow-hidden mt-2">
                <div class="card bg-dark d-flex flex-row rounded-end-0">
                    <img
                    src="{{ asset('storage/' . $com->image) }}"
                    class="card-img-left"
                    style="object-fit:cover; min-width: 150px; max-height: 200px;">
                    <div class="row m-2">
                        <div class="col-3 d-flex flex-column justify-content-between text-center">
                            <h3>{{ $com->title }}</h3>
                            <h5>{{ $com->type_comics }}</h5>
                        </div>
                        <div class="col-9">{{ $com->description }} </div>
                    </div>
                     <a href="{{ route('comics.show', $com) }}" class="stretched-link"></a>
                </div>
                <form class="d-grid" action="{{ route('comics.destroy', $com) }}" method="post">
                    @csrf
                    @method('delete')
                    <a class="btn btn-primary d-flex align-items-center rounded-0" href="{{ route('comics.edit', $com) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0,0,256,256">
                            <g fill="#f4f1f1" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.33333,5.33333)"><path d="M36,5.00977c-1.7947,0 -3.58921,0.68037 -4.94922,2.04102l-22.13477,22.13281c-0.41998,0.41998 -0.72756,0.94226 -0.89062,1.51563l-2.9668,10.38867c-0.14899,0.52347 -0.00278,1.08658 0.38208,1.47144c0.38485,0.38485 0.94796,0.53107 1.47144,0.38208l10.39062,-2.9668c0.00065,-0.00065 0.0013,-0.0013 0.00195,-0.00195c0.56952,-0.16372 1.09052,-0.46748 1.51172,-0.88867l22.13281,-22.13476c2.72113,-2.72112 2.72113,-7.17731 0,-9.89844c-1.36001,-1.36064 -3.15452,-2.04102 -4.94922,-2.04102zM36,7.99219c1.0208,0 2.04018,0.39333 2.82617,1.17969c0.00065,0 0.0013,0 0.00195,0c1.57487,1.57488 1.57487,4.08137 0,5.65625l-1.93945,1.93945l-5.65625,-5.65625l1.93945,-1.93945c0.78599,-0.78636 1.80732,-1.17969 2.82813,-1.17969zM29.11133,13.23242l5.65625,5.65625l-18.07422,18.07422c-0.05863,0.05823 -0.13289,0.10283 -0.2168,0.12695l-7.79297,2.22656l2.22656,-7.79492c0,-0.00065 0,-0.0013 0,-0.00195c0.02293,-0.08063 0.06493,-0.15282 0.12695,-0.21484z"></path></g></g>
                        </svg>
                    </a>
                    <button class="btn btn-danger rounded-0" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                    </button>
                </form>
            </div>
        @endforeach
        <div class="mt-3">
            <div class="d-flex flex-row justify-content-center">
                {{ $comics->links() }}
                <div class="ms-3">
                    <form class="d-flex flex-row align-items-start" method="get" action="{{ route('comics.index') }}">
                        <select class="form-control w-25" name="perpage">
                            <option value="2" @if($comics->perPage() == 2) selected @endif>2</option>
                            <option value="3" @if($comics->perPage() == 3) selected @endif>3</option>
                            <option value="4" @if($comics->perPage() == 4) selected @endif>4</option>
                        </select>
                        <button class="btn btn-secondary btn-sm" type="submit">Изменить кол-во комиксов</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
