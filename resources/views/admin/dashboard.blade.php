@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Property Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Property Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Dashboard Stat Boxes -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalListedProperties }}</h3>
                            <p>Total Properties</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <a href="/admin/properties" class="small-box-footer">
                            View All <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $TodaytotalListedProperties }}</h3>
                            <p>Today's Listings</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-plus-square"></i>
                        </div>
                        <a href="/admin/properties" class="small-box-footer">
                            See Details <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalEnquiriesContact }}</h3>
                            <p>Contact Us Enquiries</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <a href="/admin/contact" class="small-box-footer">
                            View Enquiries <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalEnquiriesSell }}</h3>
                            <p>Total Sell Enquiries</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <a href="/admin/sell" class="small-box-footer">
                            View Enquiries <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Graphs Section -->
            <div class="row">
                <!-- Properties Added Over Time -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Properties Added (Last 30 Days)</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="propertiesChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Enquiries Over Time -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Enquiries Received (Last 30 Days)</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="enquiriesChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Graphs -->
            <div class="row">
                <!-- Enquiry Types Pie Chart -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Enquiry Types Distribution</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="enquiryTypesChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property Status -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Property Status</h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="propertyStatusChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('extraJs')
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

<script>
$(function () {
    // Properties Added Over Time (Line Chart)
    var propertiesCtx = document.getElementById('propertiesChart').getContext('2d');
    var propertiesChart = new Chart(propertiesCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($propertiesChartData['labels'] ?? []) !!},
            datasets: [{
                label: 'Properties Added',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: {!! json_encode($propertiesChartData['data'] ?? []) !!}
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Enquiries Over Time (Bar Chart)
    var enquiriesCtx = document.getElementById('enquiriesChart').getContext('2d');
    var enquiriesChart = new Chart(enquiriesCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($enquiriesChartData['labels'] ?? []) !!},
            datasets: [{
                label: 'Enquiries',
                backgroundColor: 'rgba(210, 214, 222, 1)',
                borderColor: 'rgba(210, 214, 222, 1)',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: {!! json_encode($enquiriesChartData['data'] ?? []) !!}
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Enquiry Types (Pie Chart)
    var enquiryTypesCtx = document.getElementById('enquiryTypesChart').getContext('2d');
    var enquiryTypesChart = new Chart(enquiryTypesCtx, {
        type: 'pie',
        data: {
            labels: ['Sell Enquiries', 'Contact Enquiries'],
            datasets: [{
                data: [{{ $totalEnquiriesSell }}, {{ $totalEnquiriesContact }}],
                backgroundColor: ['#f56954', '#00a65a'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });

    // Property Status (Doughnut Chart)
    var propertyStatusCtx = document.getElementById('propertyStatusChart').getContext('2d');
    var propertyStatusChart = new Chart(propertyStatusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Available', 'Sold', 'Rented', 'Under Maintenance'],
            datasets: [{
                data: [
                    {{ $propertyStatusData['available'] ?? 0 }},
                    {{ $propertyStatusData['sold'] ?? 0 }},
                    {{ $propertyStatusData['rented'] ?? 0 }},
                    {{ $propertyStatusData['maintenance'] ?? 0 }}
                ],
                backgroundColor: ['#00c0ef', '#00a65a', '#f39c12', '#dd4b39'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
});
</script>
@endsection
