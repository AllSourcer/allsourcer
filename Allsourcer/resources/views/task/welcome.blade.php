@extends('layouts.master')

@section('content')


		<main class="mdl-layout__content">
			<div class="container-fluid">

				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--8-col mdl-cell--12-col-tablet">
						<div class="row"><h6>Recent Task</h6></div>

						<div class="row">
							<div id="starter" class="mdl-grid">

	                			@foreach ($tasks as $task )
	                				
									<div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet">
										<div class="mdl-card mdl-shadow--4dp">
											<div class="mdl-card__title">
												<h2 class="mdl-card__title-text">{{$task->title}}</h2>
											</div>
											<div class="mdl-card__supporting-text">{{$task->description}}
											</div>
											<div class="mdl-card__actions">
												<form action="/taskView" method="post">
													<input type="hidden" name = "taskId" value = {{$task->id}} > </input>
												<button type ="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
												  	View Task
												</button>
												</form>
											</div>

										
										  	<div class="mdl-card__menu">
										    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
										      <i class="material-icons">share</i>
										    </button>
											</div>
										</div>
									</div>
							@endforeach

							</div>
						</div>
					</div>


					<div class="mdl-cell mdl-cell--4-col mdl-cell--12-col-tablet">
						<div class="row"><h6>Top Unclaimed Task</h6></div>
							<div class="row">
								<div style="" class="mdl-grid">
									
									 @for($i=0;$i<2;$i++)
										<div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet">
											<div class="mdl-card mdl-shadow--4dp">
												<div class="mdl-card__title">
													<h2 class="mdl-card__title-text">Type of Task</h2>
												</div>
												<div class="mdl-card__supporting-text">
													A short but well detailed introduction into what this task actually is all about.
												</div>
												<div class="mdl-card__actions">
													<button onclick="viewtask()" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
													  	View Task
													</button>
												</div>

												<!-- coming soon -->
											  	<!--<div class="mdl-card__menu">
											    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
											      <i class="material-icons">share</i>
											    </button>
												</div> -->
											</div>
										</div>
									@endfor

								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</main>

	<script>

		function viewtask() {
			window.location.replace("pages/index.html");
		} 
		
	</script>
@endsection