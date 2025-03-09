<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="{{asset('startbootstrap/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('startbootstrap/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('startbootstrap/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('partial.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('partial.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3 ">

                            <h6 class="m-0 font-weight-bold text-primary">Travel Data</h6>


                        </div>

                        <div class="card-body">
                            <form class="user" action="{{ route('bookings.update', $booking->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3">
                                        <label for="user_id" class="form-label font-weight-bold">
                                            <i class="fas fa-user"></i> Passenger's name
                                        </label>
                                        <select class="custom-select rounded-pill shadow-sm" id="user_id" name="user_id"
                                            style="height: 50px; font-size: 16px; padding: 10px;" data-live-search="true" required>
                                            <option selected value={{ $booking->user_id }}>{{ old('name', $booking->user->name)}}</option>
                                            @foreach ($users as $user)
                                                <option value={{ $user->id }}>{{ $user->name }}</option>
                                            @endforeach
                                            {{-- <option value="{{ $schedule->id }}" {{ request('schedule_id') == $schedule->id ? 'selected' : '' }}> --}}
                                        </select>
                                    </div>


                                    <div class="col-sm-6 mb-3">
                                        <label for="schedule_id" class="form-label font-weight-bold">
                                            <i class="fas fa-car"></i> Travel's name
                                        </label>
                                        <select class="custom-select rounded-pill shadow-sm" id="schedule_id" name="schedule_id"
                                            style="height: 50px; font-size: 16px; padding: 10px;" data-live-search="true">
                                            <option selected value={{ $booking->schedule_id }}>{{ old('name', $booking->schedule->name)}}</option>
                                            @foreach ($schedules as $schedule)
                                                <option value={{ $schedule->id }}>{{ $schedule->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-3">
                                        <label for="booking_date" class="form-label font-weight-bold">
                                            <i class="fas fa-calendar"></i> Booking date
                                        </label>
                                        <input type="date" class="form-control form-control-user rounded-pill shadow-sm" id="booking_date"
                                            name="booking_date" placeholder="Enter booking_date"  value="{{ old('name', $booking->booking_date) }}">
                                    </div>



                                    <div class="col-sm-6 mb-3 mb-sm-3 ">
                                        <label for="total_price" class="form-label font-weight-bold">
                                            <i class="fas fa-dollar-sign"></i> Total price
                                        </label>
                                        <input type="number" class="form-control form-control-user rounded-pill shadow-sm" id="total_price"
                                            name="total_price" placeholder="Enter Total Price" value="{{ old('name', $booking->total_price) }}">
                                    </div>

                                </div>


                                <div class="dropdown mb-5 ">
                                    <label for="description" class="form-label font-weight-bold">
                                        <i class="fas fa-info"></i> Status
                                    </label>

                                    <select class="custom-select rounded-pill shadow-sm" id="status" name="status"
                                        style="height: 50px; font-size: 16px; padding: 10px;">
                                        <option selected>Choose...</option>
                                        <option value="pending">Pending</option>
                                        <option value="confirmed">Confirmed</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success btn-block mb-4">Save</button>
                                <a href="{{ route('bookings.index') }}" class="btn btn-danger btn-block">Cancel</a>
                            </form>

                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>



        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('startbootstrap/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('startbootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{asset('startbootstrap/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset('startbootstrap/js/sb-admin-2.min.js')}}"></script>

        <!-- Page level plugins -->
        <script src="{{asset('startbootstrap/vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('startbootstrap/vendor/datatables/jquery.dataTables.min.js')}}x"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('startbootstrap/js/demo/datatables-demo.js')}}"></script>

</body>

</html>
