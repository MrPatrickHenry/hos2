<hr>	
<div class="row">
  <div class="col-sm-6 col-md-4">
			<span class="thumbnail" ng-repeat="x in reporting">
				<p><i class="fa fa-bullseye" aria-hidden="true"></i>
				 Event Goal Target
				<p>
				<p class="reportcardsummary">$ @{{ x.EventGoalTarget }}</p></span>
				</div>

				<div class="col-xs-6 col-md-4"> 
					<span class="thumbnail" ng-repeat="x in reporting"> 
						<p><i class="fa fa-paper-plane" aria-hidden="true"></i> Total Contracts In</p>
						<p class="reportcardsummary"> @{{ x.Contracts_In }}</p></span>
					</div>


					<div class="col-xs-6 col-md-4">
						<span class="thumbnail" ng-repeat="x in reporting">
							<div class="progress-bar-card" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
							</div>
							<br>
							<p><i class="fa fa-bullseye" aria-hidden="true"></i> Event Goal Progress </p>
							<p class="reportcardsummary">$ @{{ x.EventGoalTarget }}</p></span>


						</div>
<br>

						<div class="col-xs-6 col-md-4">
							<span class="thumbnail" ng-repeat="x in reporting">
								<div class="progress-bar-card" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
								</div><br>
								<p><i class="fa fa-ticket" aria-hidden="true"></i> Deal Maker tables</p>
								<p class="reportcardsummary">@{{ x.DealMakerTables }}</p></span>
							</div>


						<div class="col-xs-6 col-md-4">
							<span class="thumbnail" ng-repeat="x in reporting">
								<p><i class="fa fa-ticket" aria-hidden="true"></i> Wednesday Tables Sold</p>
								<p class="reportcardsummary">@{{ x.WednesdayTable }}</p> </span>
							</div>

							<div class="col-xs-6 col-md-4">
								<span class="thumbnail" ng-repeat="x in reporting">
									<p><i class="fa fa-ticket" aria-hidden="true"></i> Thursday Tables Sold</p>
									<p class="reportcardsummary">@{{ x.WednesdayTable }}</p> </span>
								</div>



							</div>


<hr>

						