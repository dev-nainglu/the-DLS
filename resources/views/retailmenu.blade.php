
@extends('layouts.app')

@section('content')

<div class="slideshow" style="background-image: url({{asset('img/retail.jpg')}})">
    <h1 class="page-title">Retail Menu</h1>
</div>
<div id="retail-menu" class="dls-block">
	<div class="container" id="retail-menu-table">
		<table class="retail-menu-table sig-cake">
			<tr>
				<th><h1>SIGNATURE CAKES</h1></th>
				<th></th>
			</tr>
			<tr>
				<td>
					<h4>UNFAITHFUL</h4>
					<p>
						SIGNATURE CHOCOLATE CAKE WITH CREAM CHEESE FROSTING AND CHOCOLATE GANACHE DRIZZLE
					</p>
				</td>
				<td>
					<h4>SLICED CAKES</h4>
					<p>
						Full Slice - 8,500 ks 
					</p>
					<p>
						Half Slice - 4,500 ks
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<h4>MONKEY BUSINESS</h4>
					<p>
						BANANA CAKE WITH CREAM CHEESE FROSTING AND CARAMEL DRIZZLE
					</p>
				</td>
				<td>

				</td>
			</tr>
			<tr>
				<td>
					<h4>SCARLET FEVER</h4>
					<p>
						CLASSIC RED VELVET CAKE WITH CREAM CHEESE FROSTING
					</p>
				</td>
				<td>
					<h4>CUP CAKES</h4>
					<p>4,500 KS</p>
				</td>
			</tr>
			<tr>
				<td>
					<h4>STRAWBERRY BOMBSHELL (SEASONAL)</h4>
					<p>
						MOIST STRAWBERRY CAKE COVERED WITH SWISS MERINGUE CREAM CHEESE FROSTING AND FRESH STRAWBERRIES
					</p>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<h4>50 SHADES DARKER</h4>
					<p>
						SIGNATURE CHOCOLATE CAKE WITH A RICH NUTELLA CHOCOLATE GANACHE FROSTING
					</p>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<h4>NUTS ABOUT YOU</h4>
					<p>
						SIGNATURE CHOCOLATE CAKE WITH PEANUT BUTTER FROSTING
					</p>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<h4>THE ROGER RABBIT</h4>
					<p>
						ONE OF A KIND WALNUT CARROT WITH CREAM CHEESE FROSTING
					</p>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<h4>50 SHADES OF GREY</h4>
					<p>
						EARL GREY CAKE WITH CREAM CHEESE FROSTING AND EARL GREY ACCENTS
					</p>
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					<h4>THE SOI COWBOY</h4>
					<p>
						THAI MILK TEA CAKE WITH TEA INFUSED CREAM CHEESE FROSTING AND CONDENSED MILK TEA DRIZZLE
					</p>
				</td>
				<td></td>
			</tr>
		</table>
		<table class="retail-menu-table sig-cake">
			<tr>
				<th><h1>PIES (SEASONAL)</h1></th>
				<th></th>
			</tr>
			<tr>
				<td>
					<p>
						LEMON MERINGUE PIE
					</p>
				</td>
				<td>
					<h4>
						11,000 KS PER SLICE
					</h4>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						BLUEBERRY PIE
					</p>
				</td>
				<td>
					
				</td>
			</tr>
			<tr>
				<td>
					<p>
						STRAWBERRY PIE
					</p>
				</td>
				<td>
					<h4>14,000 KS PER SLICE</h4>
				</td>
			</tr>
			<tr>
				<td>
					<p>
						PECAN PIE
					</p>
				</td>
				<td>
					<p>WITH VANILLA ICE-CREAM</p>
				</td>
			</tr>
		</table>
	</div>
</div>

@stop
