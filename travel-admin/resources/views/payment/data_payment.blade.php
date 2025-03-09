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
                            <div class="row justify-content-between align-items-center px-3">
                                <h6 class="m-0 font-weight-bold text-primary">Travel Data</h6>

                                <a href="{{ route('payments.create') }}"
                                    class="btn text-end btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Add Data</span>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">



                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                                    <thead>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Amount</th>
                                            <th>Payment Date</th>
                                            <th>Payment Status</th>
                                            <th>Payment Method</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Booking ID</th>
                                            <th>Amount</th>
                                            <th>Payment Date</th>
                                            <th>Payment Status</th>
                                            <th>Payment Method</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($payments as $payment)

                                            <tr>
                                                <td>{{ $payment->booking_id }}</td>
                                                <td>{{ $payment->amount }}</td>
                                                <td>{{ $payment->payment_date }}</td>
                                                <td>{{ $payment->payment_status }}</td>
                                                <td>{{ $payment->payment_method }}</td>

                                                <td>
                                                    <button class="btn btn-danger btn-circle btn-sm delete-btn"
                                                        data-id="{{ $payment->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                    <a href="{{ route('payments.edit', $payment->id) }}"
                                                        class="btn btn-warning btn-circle btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
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


    <script>
        $(document).ready(function () {
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Tombol yang diklik
                var id = button.data('id'); // Ambil ID

                // Set action form di dalam modal dengan ID yang diterima
                var formAction = "{{ route('payments.destroy', ':id') }}".replace(':id', id);
                $('#deleteForm').attr('action', formAction);
            });
        });


    </script>

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".delete-btn").forEach(function (button) {
                button.addEventListener("click", function () {
                    let scheduleId = this.getAttribute("data-id");

                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Data yang dihapus tidak bisa dikembalikan!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, Hapus!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch("{{ url('payments') }}/" + scheduleId, {
                                method: "POST",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    "Content-Type": "application/json"
                                },
                                body: JSON.stringify({ _method: "DELETE" })
                            }).then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            title: "Terhapus!",
                                            text: data.message,
                                            icon: "success",
                                            timer: 1000,
                                            showConfirmButton: false
                                        }).then(() => {
                                            // Refresh DataTables tanpa reload halaman
                                            // $("#dataTable").DataTable().ajax.reload();

                                            // $('#dataTable').DataTable().ajax.reload(null, false); // Reload tanpa reset pagination

                                            window.location.reload();
                                        });
                                    } else {
                                        Swal.fire("Gagal!", "Terjadi kesalahan saat menghapus.", "error");
                                    }
                                }).catch(error => {
                                    Swal.fire("Gagal!", "Terjadi kesalahan saat menghapus.", "error");
                                });
                        }
                    });
                });
            });
        });
    </script>



</body>

</html>
