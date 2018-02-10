@extends('template')

@section('content')
<main class="container">
	<div class="row align-items-center mb-3">
		<div class="col-12 col-md-5 text-center mb-3 mb-md-0">
			<h1 class="mb-0 my-auto ">Tonino De Marco</h1>
			<h2 class="text-muted">Photographer</h2>
		</div>
		<div class="col-12 col-md-7">
			<a target="_blank" href="https://www.facebook.com/people/Tonino-De-Marco/100012345489234" title="Facebook Tonino De Marco">
				<img id="selfie" class="img-fluid" alt="Tonino De Marco" src="{{ asset('/img/me.min.jpg') }}">			
			</a>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-md-6">
		<p class="text-justify">
			<span class="font-weight-bold">EN :</span> Image has been Tonino De Marco’s calling, from a very young age. As a child, he was drawn to <strong>photography</strong> and moving images : movies, advertising, documentries. Long before he could afford his first camera, he was dreaming and admiring photographers such as Art Wolfe.
			When he was 21 years old, he started photography as an amateur, and became a <strong>professional</strong> in the movies industry, as a <strong>focus puller</strong>. He also worked as a teacher of cinematographic techniques in Paris.
			Today he shares his life between movies filming, and long solitary trips to Africa to photograph its incredible wildlife. His images are distributed either by <a target="_blank" class="lien-apparent" href="https://www.facebook.com/people/Tonino-De-Marco/100012345489234" title="Facebook Tonino De Marco">contacting him directly</a>, or <a target="_blank" class="lien-apparent" href="http://www.biosphoto.com/photographe.php?id=1082" title="Bios Photo Agency">through Bios Photo Agency</a>.
		</p>
		</div>
		<div class="col-12 col-md-6">
		<p class="text-justify">
			<span class="font-weight-bold">FR :</span> Tonino De Marco est attiré depuis toujours par la <strong>photographie</strong> et l’image en mouvement – film, publicité, documentaire. Bien avant de pouvoir se payer son premier appareil photo, il rêve et admire le travail de photographes comme Art Wolfe.
			A l’âge de 21 ans, il commence à la fois la photographie en amateur, et le cinéma en <strong>professionnel</strong>, en tant qu’<strong>assistant caméra</strong>. Il a enseigné également la technique de caméra et de prise de vue.
			Aujourd’hui, il partage sa vie entre les tournages, et de longs voyages en solo en Afrique pour photographier les animaux.
			Les photographies de Tonino De Marco sont distribuées en <a target="_blank" class="lien-apparent" href="https://www.facebook.com/people/Tonino-De-Marco/100012345489234" title="Facebook Tonino De Marco">le contactant directement</a>, ou <a target="_blank" class="lien-apparent" href="http://www.biosphoto.com/photographe.php?id=1082" title="Bios Photo Agency">via l’agence Bios Photo</a>.
		</p>
		</div>
	</div>

	@if (!$links->isEmpty())
		<hr class="bg-faded my-5 w-75">
		<div class="text-center">
			<h2 class="mb-4 font-weight-normal">They inspire me</h2>
			<ul class="list text-left">
				@foreach ($links as $link)
					<li><a class='text-white' target='_blank' title="Have a look at this website" href='{{ $link->link }}'>{{ $link->caption }}</a></li>
				@endforeach
			</ul>
		</div>
	@endif

</main>
@endsection