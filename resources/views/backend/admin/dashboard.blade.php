@extends('backend.layout.master')



@section('content')
<div class="analytics-sparkle-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30">
                    <div class="analytics-content">
                        <h5>Teachers</h5>
                        <h2><span class="counter">{{ $teacherCount }}</span> <span class="tuition-fees">Numbers of Teacher</span></h2>
                        <span class="text-success">{{ number_format(($teacherCount/15)*100,2)}}%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100" style="width:{{ number_format(($teacherCount/15)*100,2)}}%;"> <span class="sr-only">20%
                                    Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30">
                    <div class="analytics-content">
                        <h5>Studenst</h5>
                        <h2><span class="counter">{{ $studentCount }}</span> <span class="tuition-fees">Numbers of Student</span></h2>
                        <span class="text-danger">{{ number_format(($studentCount/1000)*100,2)}}%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100" style="width:{{ number_format(($studentCount/1000)*100,2)}}%;"> <span class="sr-only">230%
                                    Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                    <div class="analytics-content">
                        <h5>Total Collected Fees</h5>
                        <h2>$<span class="counter">{{ $totalFeesCollected }}</span> <span class="tuition-fees">Total Fees Collected</span></h2>
                        <span class="text-info">{{ number_format($feesProgress,2)}}%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100" style="width:{{ number_format($feesProgress,2)}}%;"> <span class="sr-only">20%
                                    Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                    <div class="analytics-content">
                        <h5>Teachers Total Salaryes</h5>
                        <h2>$<span class="counter">{{ $totalSalariesPaid }}</span> <span class="tuition-fees">Total Salaries Paid</span></h2>
                        <span class="text-inverse">{{ number_format($salariesProgress,2)}}%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100" style="width:{{ number_format($salariesProgress,2)}}%;"> <span class="sr-only">230%
                                    Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection