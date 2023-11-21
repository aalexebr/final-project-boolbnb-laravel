@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
  <div class="row my-row ">
    <div class="col">
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>
                    {{ $error }}
                  </li>
                @endforeach
            </ul>
        </div>
      @endif
      <div class="title-main d-flex align-items-center">
        <h1>
          Modifica il tuo bool<span class="b-blue">b</span>n<span class="b-blue">b</span>
        </h1>
        <img src="{{ Vite::asset('resources/img/icon_edit.png') }}" alt="" class="logo-add-create d-none d-sm-block">
      </div>
      <form action="{{route('admin.apartment.update', ['apartment' => $apartment->id])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="d-flex align-items-center">
          <div class="mb-4 col-12 col-md-6">
            <label for="exampleInputEmail1" class="form-label">Nome <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $apartment->name) }}" aria-describedby="emailHelp" max="64" required>
          </div>
        </div>

        <div class="d-flex flex-wrap align-items-center">            
          <div class="mb-4 me-5 col-12 col-md-3">
            <label for="exampleInputEmail1" class="form-label">Stanze <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="room" name="room" value="{{ old('room', $apartment->room) }}" aria-describedby="emailHelp" min="1" max="100" required>
          </div>
          <div class="mb-4 me-5 col-12 col-md-3">
            <label for="exampleInputEmail1" class="form-label">N. letti <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="bed" name="bed" value="{{ old('bed', $apartment->bed) }}" aria-describedby="emailHelp" min="1" max="100" required>
          </div>
          <div class="mb-4 me-5 col-12 col-md-3">
            <label for="exampleInputEmail1" class="form-label">N. bagni <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="bathroom" name="bathroom" value="{{ old('room', $apartment->bathroom) }}" aria-describedby="emailHelp" min="1" max="100" required>
          </div>            
          <div class="form-check mb-4 me-5 col-12 col-md-3">
            <input class="form-check-input" type="checkbox" name="shared_bathroom" value="{{ old('shared_bathroom', $apartment->shared_bathroom) }}" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Bagno condiviso
            </label>
          </div>            
        </div>
          {{-- <div class="d-flex flex-wrap align-items-center">
          <div class="mb-4 col-12 col-md-3 me-5">
            <label for="city" class="form-label">Città</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $apartment->city) }}" aria-describedby="emailHelp">
          </div> --}}
        {{-- <div class="mb-4 col-12 col-md-8">
          <label for="address" class="form-label">Indirizzo Completo (Esempio: Via Vittorio Veneto 1, Roma) <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $apartment->address) }}" aria-describedby="emailHelp" required>
        </div> --}}

        {{-- tomtom input --}}
        <div class="d-flex flex-wrap align-items-center">
			<div id="tom" class="mb-4 col-12 col-md-3 me-5 w-100">
			  <label for="tom" class="form-label">Inserisci Indirizzo <span class="text-danger">*</span></label>
			  {{-- input di tom tom --}}
			</div>
		</div>

        <div class="d-flex align-items-center flex-wrap">
          <div class="mb-4 col-12 col-md-3 me-5">
            <label for="square_meter" class="form-label">Metratura <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="square_meter" name="square_meter" value="{{ old('square_meter', $apartment->square_meter) }}" aria-describedby="emailHelp" min="1" max="9999" required>
          </div>
          <div class="form-check mb-4">
            <input @if($apartment->visible == 0) checked @endif class="form-check-input" type="radio" name="visible"  id="check-visible" value="0">
            <label class="form-check-label" for="check-visible">
              Non visibile
            </label>
          </div>
          <div class="mx-2 form-check mb-4">
            <input @if($apartment->visible == 1) checked @endif class="form-check-input" type="radio" name="visible"  id="check-visible1" value="1">
            <label class="form-check-label" for="check-visible1">
              Visibile
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
                <label for="service-{{$singleService->id}}">{{$singleService->name}}</label>
                <input class="me-4 mb-2 check-box-services-input" type="checkbox" name="service[]" id="service-{{$singleService->id}}" value="{{$singleService->id}}"
                @foreach ($aptSrvices as $single)
                    @if ($singleService->id == $single->id)
                        checked
                    @endif
                @endforeach
                >
              </div>
            @endforeach
          </div>
        </div>
        
        <div class="mb-4 col-12 col-md-3">
          <div class="mb-4">
            <label for="price" class="form-label">Prezzo <span class="text-danger">*</span></label>
            <input type="number" step=".01" class="form-control" id="price" name="price" value="{{ old('price', $apartment->price) }}" aria-describedby="emailHelp" min="1" max="9999" required>
          </div>
        </div>
        
        <div class="mb-4 col-12 col-md-10">
          <label for="description" class="form-label">Descrizione <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $apartment->description) }}" aria-describedby="emailHelp" required>
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
            {{-- CAMPO PER LE IMMAGINA COPERTINA --}}
        <div class="mb-4">
          <label class="form-label">Immagine di copertina</label>
          <div class="img-extra d-flex my-3 flex-wrap">
            <div class="col-12 col-md-4 mb-3">
              <img src="/storage/{{ $apartment->cover_img }}" alt="" class="border rounded-4">
            </div>
          </div>
        </div>
            {{-- CAMPO PER LE IMMAGINI EXTRA --}}
        <div class="mb-4">
          @if ($extra_images)
            <label class="form-label">Immagini extra</label>
            <div class="img-extra d-flex my-3 flex-wrap">
              @foreach ($extra_images as $item)
                <div class="col-12 col-md-4 mb-3">
                  <div class="me-4">
                    {{-- input per elimiare le immagini in PIU --}}
                    <label for="delete_img_{{$item->id}}">Elimina</label>
                    <input type="checkbox" name="delete_imgs[{{$item->id}}]" id="delete_img_{{$item->id}}">
                      <div class="img-fluid object-fit-cover">
                        @if($item->path)
                          <img src="/storage/{{ $item->path }}" alt="" class=" border rounded-4">
                        @elseif($item->src) 
                          <img src="{{ $item->src }}" alt="" class="border rounded-4">
                        @endif
                      </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
        <button type="submit" class="btn my-4 btn-create-form">Aggiorna</button>
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
	x[0].setAttribute("value", "{{ old('address', $apartment->address) }}");
</script>
@endsection