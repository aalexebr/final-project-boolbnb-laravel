@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row my-row">
        <div class="col">
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <div class="title-main d-flex align-items-center">
              <h1>
                Inserisci il tuo bool<span class="b-blue">b</span>n<span class="b-blue">b</span>
              </h1>
              <img src="{{ Vite::asset('resources/img/icon_add_ap.png') }}" alt="" class="logo-add-create d-none d-sm-block">
          </div>
          <form action="{{route('admin.apartment.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="d-flex align-items-center">
              <div class="mb-4 col-12 col-md-6">
                <label for="exampleInputEmail1" class="form-label">Nome <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ old('name') }}" id="name" name="name" aria-describedby="emailHelp" max="64" required>
              </div>
            </div>

            <div class="d-flex flex-wrap align-items-center">
              <div class="mb-4 me-5 col-12 col-md-3">
                  <label for="exampleInputEmail1" class="form-label">Stanze <span class="text-danger">*</span></label>
                  <input type="number" class="form-control"  value="{{ old('room') }}" id="room" name="room" aria-describedby="emailHelp" min="1" max="100" required>
                </div>
                <div class="mb-4 me-5 col-12 col-md-3">
                  <label for="exampleInputEmail1" class="form-label">N. letti <span class="text-danger">*</span></label>
                  <input type="number" class="form-control"  value="{{ old('bed') }}" id="bed" name="bed" aria-describedby="emailHelp" min="1" max="100" required>
                </div>
                <div class="mb-4 me-5 col-12 col-md-3">
                  <label for="exampleInputEmail1" class="form-label">N. bagni <span class="text-danger">*</span></label>
                  <input type="number" class="form-control"  value="{{ old('bathroom') }}" id="bathroom" name="bathroom" aria-describedby="emailHelp" min="1" max="100" required>
                </div>
                <div class="form-check me-2 mb-4 me-5 col-12 col-md-3">
                  <input class="form-check-input" type="checkbox" name="shared_bathroom"  value="{{ old('shared_bathroom') }}" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Bagno condiviso
                  </label>
                </div>
            </div>
            
            <div class="d-flex flex-wrap align-items-center">
              <div id="tom" class="mb-4 col-12 col-md-3 me-5 w-100">
				          <label for="tom" class="form-label">Inserisci Indirizzo <span class="text-danger">*</span></label>
				          {{-- input di tom tom --}}
              </div>
            </div>
            
            <div class="d-flex align-items-center flex-wrap">
              <div class="mb-4 col-12 col-md-3 me-5">
                  <label for="square_meter" class="form-label">Metratura <span class="text-danger">*</span></label>
                  <input type="number" class="form-control"  value="{{ old('square_meter') }}" id="square_meter" name="square_meter" aria-describedby="emailHelp" min="1" max="9999" required>
              </div>
              <div class="form-check mb-4">
                  <input class="form-check-input" type="checkbox"  value="{{ old('visible') }}" name="visible" id="check-visible">
                  <label class="form-check-label" for="check-visible">
                    Non visibile
                  </label>
              </div>
            </div>

            <div class="d-flex align-items-center">
              <div class="mb-4">
                <div>
                  <label class="mb-2">
                    Servizi
                  </label>
                </div>
                @foreach ($service as $singleService)
                <div class="check-box-services">
                  <label for="service-{{$singleService->id}}" class="check-services">{{$singleService->name}}</label>
                  <input class="me-4 mb-2 check-box-services-input" type="checkbox" name="service[]" id="service-{{$singleService->id}}" value="{{$singleService->id}}">
                </div>  
                @endforeach
              </div>
            </div>

            <div class="mb-4 col-12 col-md-3">
              <label for="price" class="form-label">Prezzo <span class="text-danger">*</span></label>
              <input type="number" step=".01" class="form-control" id="price"  value="{{ old('price') }}" name="price" aria-describedby="emailHelp" min="1" max="9999" required>
            </div>

            <div class="mb-4 col-12 col-md-10">
              <label for="description" class="form-label">Descrizione <span class="text-danger">*</span></label>
              <input type="text" class="form-control"  value="{{ old('description') }}" id="description" name="description" aria-describedby="emailHelp" required>
            </div>

            <div class="d-flex flex-wrap align-items-center">
              <div class="col-12 col-md-5 mb-4">
                <label for="cover_img" class="form-label">Immagine di copertina</label>
                <input type="file" class="form-control" accept="image/*" id="cover_img" name="cover_img" aria-describedby="emailHelp" max="9999">
              </div>
              <div class="col-12 col-md-5 mx-0 mx-md-5 mb-4">                  
                {{-- <label for="add_imgs"> add more images</label>
                <input class="form-check-input" type="checkbox" name="xxx" value="" id="flexCheckDefault">
                <br> --}}
                <label for="extra_imgs" class="form-label">Aggiungi altre immagini </label>
                <input type="file" class="form-control" accept="image/*" id="extra_imgs" name="extra_imgs[]" aria-describedby="emailHelp" multiple>
              </div>
            </div>  
            <button type="submit" class="btn my-5 btn-create-form">
              Invia
            </button>
          </form>
        </div>
    </div>

    <script>
        var options = {
          searchOptions: {
            key: "KEiNGuhsySt5PgvkmCw7C9Sb5vGdacR6",
            language: "it-IT",
            limit: 5,
          },
          autocompleteOptions: {
            key: "KEiNGuhsySt5PgvkmCw7C9Sb5vGdacR6",
            language: "it-IT",
          },
        }
        
        let tom = document.getElementById('tom');
        var ttSearchBox = new tt.plugins.SearchBox(tt.services, options)
        var searchBoxHTML = ttSearchBox.getSearchBoxHTML()
		
        tom.append(searchBoxHTML);
		let x = document.getElementsByClassName("tt-search-box-input");
		x[0].setAttribute("name", "address");
    x[0].setAttribute("value", "{{ old('address') }}");
    </script>
@endsection