@extends('layouts.app') <!-- or use a basic layout -->
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


@endsection
@section('content')
<div class="container py-5">
    <h1 class="mb-4">Website Analytics Dashboard</h1>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-light p-3">
                <h4>Total Visits</h4>
                <p class="h2">{{ $totalVisits }}</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-light p-3">
                <h4>Visits by Device</h4>
                <ul class="list-unstyled">
                    @foreach($visitsByDevice as $device)
                        <li>{{ ucfirst($device->device_type ?? 'unknown') }}: {{ $device->total }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-light p-3">
                <h4>Top Pages</h4>
                <ol>
                    @foreach($topPages as $page)
                        <li>{{ $page }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>

    <h4 class="mt-5">Recent Visits</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>URL</th>
                <th>IP Address</th>
                <th>Device</th>
                <th>Referrer</th>
                <th>Visited At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentVisits as $visit)
                <tr>
                    <td>{{ $visit->url }}</td>
                    <td>{{ $visit->ip_address }}</td>
                    <td>{{ $visit->device_type ?? 'N/A' }}</td>
                    <td>{{ $visit->referrer ?? 'Direct' }}</td>
                    <td>{{ $visit->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
