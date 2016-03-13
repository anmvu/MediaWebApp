@extends('layouts.app')

@section('content')

	<table>
		<td>
			<tr>
				<a href='room-check'> Room Check</a>
			</tr>
			<tr>
				<a href='loan'>Loan Equipment</a>
			</tr>
		</td>
		<td>
			<tr>
				<a href='issues'>View Issues</a>
			</tr>
			<tr>
				<a href='return'>What's not back yet?</a>
			</tr>
		</td>
		@if(Auth::user->isAdmin())
		<td>
			<tr>
				<a href='types'>Modify Types</a>
			</tr>
			<tr>
				<a href='assets'>Modify Assets</a>
			</tr>
		</td>
		<td>
			<tr>
				<a href='attributes'>Modify Attributes</a>
			</tr>
			<tr>
				<a href='users'>Modify Users</a>
			</tr>
		</td>
		@endif
	</table>
    
@endsection