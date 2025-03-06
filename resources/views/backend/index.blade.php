@extends('backend.layout.master')



@section('content')
<div class="analytics-sparkle-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30">
                    <div class="analytics-content">
                        <h5>Teachers</h5>
                        <h2><span class="counter">5000</span> <span class="tuition-fees">Numbers of Teacher</span></h2>
                        <span class="text-success">20%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20%
                                    Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30">
                    <div class="analytics-content">
                        <h5>Studenst</h5>
                        <h2><span class="counter">3000</span> <span class="tuition-fees">Numbers of Student</span></h2>
                        <span class="text-danger">30%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230%
                                    Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                    <div class="analytics-content">
                        <h5>Students Feeses</h5>
                        <h2>$<span class="counter">2000</span> <span class="tuition-fees">Total Studes Feeses</span></h2>
                        <span class="text-info">60%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20%
                                    Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                    <div class="analytics-content">
                        <h5>Teachers Salaryes</h5>
                        <h2>$<span class="counter">3500</span> <span class="tuition-fees">Total Teachers Salaryes</span></h2>
                        <span class="text-inverse">80%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">230%
                                    Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection