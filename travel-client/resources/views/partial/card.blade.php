@foreach ($schedules as $schedule)
    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="service-item">
            <div class="img">
                <img src="assets/img/services-3.jpg" class="img-fluid" alt="">
            </div>
            <div class="details position-relative">
                <div class="icon">
                    <i class="bi bi-activity"></i>
                </div>
                <a href="{{ route('schedule.detail', $schedule->id) }}" class="stretched-link">
                    <h3>{{ $schedule->destination }}</h3>
                </a>
                <p>Departure Time:</p>
                <h5>{{ $schedule->departure_time }}</h5>
                <br>
                <p>Price:</p>
                <h5>$ {{ $schedule->price }}</h5>
            </div>
        </div>
    </div><!-- End Service Item -->
@endforeach
