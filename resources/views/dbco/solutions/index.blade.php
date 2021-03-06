@extends('dbco.layouts.main')

@section('content')
<div class="col-md-12" id="maincontent">
	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. ЗАГОЛОВОК -->
	<div class="container-fluid offer2">
		<div class="text-center mt-4">
			<h1>Все решения</h1>
		</div>
	</div>
	<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
	
	@if ($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	
	<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. category -->
	<div class="col-12 offset-md-2 col-md-8 offset-md-2 topReshenSubMenu pb-4 d-md-flex align-items-center justify-content-between text-center mt-4">
		
		@foreach ($categories as $category)
		<a href="{{ route('dbcosolution.index', ['isolutioncategory' => $category->icategoryid]) }}" class="{{ ($category->icategoryid == $isolutioncategory) ? 'active' : '' }}">{{ $category->ccategoryname }}</a>
		@endforeach
		
	</div>
	<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ. category -->
	
	
	<div>
		@if (count($solutions) > 0)
		<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
		<div class="container-fluid topReshen mt-5 mb-5">
			<div class="container" style="height:100%">
				
				
				<!-- ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->
				<div class="row">	
					
					@foreach ($solutions as $solution)
					<!-- КАРТОЧКА -->
					<div class="col-12 col-md-6 col-lg-4 col-xl-3 topReshCol pb-4">
						<div class="card p-3">
							<div class="stars text-right"><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i><i class="fas fa-star mr-1"></i></div>
							<a href="{{ route('dbcosolution.single', ['id' => $solution->isolutionid]) }}">
								<img src="{{ $solution->csolutionpicture }}" class="img-fluid d-flex m-auto" style="width:108px;" />
								<h2 class="text-center mt-4">{{ $solution->csolutionname }}</h2>
							</a>
							<p class="mt-3 mb-1">{{ $solution->csolutiontext }}</p>
							<p class="my-0"><span>Автор: </span> {{ $authors[$solution->isolutionid] }}</p>							
							<p class="my-0"><span>Дата: </span> {{ date_create($solution->dsolutiondate)->Format('Y-m-d') }}</p>
								
								
								<div class="circle">
									<div class="custom-control custom-switch">
										<input type="checkbox" solid="{{ $solution->isolutionid }}" class="custom-control-input" id="checkbox-switch-{{ $solution->isolutionid }}"
										name="checkbox-switch-{{ $solution->isolutionid }}"
										{{ ($solution->isOwned) ? 'checked' : '' }}>
										<label class="custom-control-label" for="checkbox-switch-{{ $solution->isolutionid }}"></label>
									</div>
								</div>
							</div>
						</div>
						<!-- /КАРТОЧКА -->
						@endforeach	
						
					</div>
				</div>
			</div>
			<!-- /ГОРИЗОНТАЛЬНЫЙ КОНТЕЙНЕР ВО ВСЮ ШИРИНУ -->	
			
			
			
			@else
			<div class="container-fluid topReshen mt-5 mb-5">
				<div class="container" style="height:100%">				
					<div class="row">
						<div class="alert alert-danger ml-auto mr-auto">
							<p class="">По вашему запросу решений не найдено...</p>
						</div>
					</div>
				</div>
			</div>
			@endif
		</div>
		
		
		{!! $solutions->links() !!}
		
	</div>
@endsection