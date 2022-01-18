@extends('themes.website.layouts.home')
@section('content')

<!-- about section -->
<section id="about" class="py-4">
    <div class="container">
        <div class="title-wrap">
            <span class="sm-title">Overview</span>
        </div>

        <div class="about-row">
            <div class="about-left my-2">
                <img src="{{ asset('themes/images/srilanka/shutterstock_1496315567.jpg') }}" alt="about img">
            </div>
            <div class="about-right">
                <h2>Sri Lanka</h2>
                <p class="text">Sri Lanka is a small island in the Indian Ocean with a land area of 25,000 square miles and a population of 18.3 million. Topographically the island consists of a south central mountainous region which rises to an elevation of 2,502m and is surrounded by broad lowland plains at an elevation of 0-75 m above sea level. From the mountainous regions nine major rivers and 94 other rivers flow across the lowlands into the Indian Ocean.</p>
                <p class="text">Sri Lanka, or Ceylon, and officially the Democratic Socialist Republic of Sri Lanka, is an island country in South Asia. It lies in the Indian Ocean, southwest of the Bay of Bengal, and southeast of the Arabian Sea; it is separated from the Indian subcontinent by the Gulf of Mannar and the Palk Strait.!</p>
            </div>
        </div>
    </div>
</section>
<!-- end of about section -->

<!-- timeline section -->

<section>
    <h1 style="	color:#333;font-weight:700;margin-top:125px;text-align:center;
            text-transform:uppercase;letter-spacing:4px;line-height:23px;">Dates</h1>
    <br>
    <div class="process-wrapper">
        <div id="progress-bar-container">
            <ul>
                <li class="step step01 active">
                    <div class="step-inner">Day 01</div>
                </li>
                <li class="step step02">
                    <div class="step-inner">Day 02</div>
                </li>
                <li class="step step03">
                    <div class="step-inner">Day 03</div>
                </li>
                <li class="step step04">
                    <div class="step-inner">Day 04</div>
                </li>
                <li class="step step05">
                    <div class="step-inner">Day 05</div>
                </li>
            </ul>

            <div id="line">
                <div id="line-progress"></div>
            </div>
        </div>

        <div id="progress-content-section">
            <div class="section-content discovery active">
                <h2>Arrival/ sigiriya</h2>
                <p>You will get your first taste of warm Sri Lankan hospitality. You will meet on arrival by Ceysaid
                    Representative and proceed to Sigiriya. Check into hotel and rest of the day at leisure Evening visit
                    Dambulla Cave temples. Morning visit Dambulla Cave Temples. Dambulla is a popular tourist
                    destination in Sri Lanka. The popular cave temple complex in Dambulla dated to the 2nd
                    century BC is declared as a world heritage site by UNESCO. There are over 80 caves in Dambulla,
                    some of which are used for meditation by monks. The Famous Rock temple has five separate
                    caves containing 153 magnificent Buddha statues, 3 statues of Sri Lankan monarchs and 4 Hindu
                    deities.</p>
            </div>

            <div class="section-content strategy">
                <h2>sigiriya/minneriya/sigiriya</h2>
                <p>Breakfast at hotel Morning transfer to Sigiriya.
                    Sigiriya is situated in the Central Province of Sri Lanka close to Dambulla. It is a fortress complex of
                    a ruined palace and one of the World Heritage sites declared by UNESCO.
                    Kandy is an example of Buddhism’s influence in Sri Lanka today.
                    Temple’s shrines and monasteries keeping alive Buddhist traditions are everywhere. Kandy, which is a
                    world heritage site. Many of the legends, traditions and folklore are still lovingly kept alive. Drive around
                    the Kandy Lake built by the last Sinhala king Sri Wickrama Rajasinghe in 1806.
                    TEMPLE OF THE TOOTH RELIC - ever since 4th Century A.D, when the

                    Buddha’s Tooth was brought to Sri Lanka hidden from sacrilegious hands in an Orissan princess’ hair,
                    the Relic has grown in repute and holiness in Sri Lanka and throughout the Buddhist world. It is
                    considered Sri Lanka’s most prized possession Dinner & Overnight in Kandy</p>
            </div>

            <div class="section-content creative">
                <h2>sigiriya/kandy</h2>
                <p>Breakfast at the Hotel.
                    Morning check out and proceed to
                    Kandy via Matale. Visit spice and
                    herbal garden. Evening visit Temple
                    of Tooth Relic. KANDY - the hill
                    capital. Venue of the annual
                    Perahara. The last stronghold of the
                    Sinhala Kings was finally ceded to the
                    British in 1815.Thereafter visit Pinnawala Elephant
                    orphanage. Pinnawela is situated in
                    the Sabaragamuwa province of Sri
                    Lanka close to Kegalle town. An
                    orphanage, nursery and captive
                    breeding ground for wild Asian
                    elephants is located at this village
                    remarkably known as 'Pinnawela
                    Elephant Orphanage'. The orphanage
                    has the largest herd of captive
                    elephants in the world and visited
                    daily by many local and foreign
                    tourists. The main attraction is clearly
                    to observe the elephants bathing and
                    feeding which is quite an experience.
                    The orphanage was launched to
                    provide a lifeline to the orphaned
                    baby elephants and adult elephants
                    lost in the wilderness
                    On completion proceed to Bentota
                    and check into hotel. Rest of the day
                    at leisure Dinner & Overnight stay in
                    Bentota</p>
            </div>

            <div class="section-content production">
                <h2>BENTOTA-BALAPITIYA-KOSGODA-BENTOTA</h2>
                <p>Breakfast at hotel Morning visit
                    Turtle Hatchery in Kosgoda.
                    TURTLE HATCHERY - Where you
                    can see five species of turtles-Green
                    Turtles(Chelonia mydas), Hawksbill
                    Turtle(Eretmochelysimbricata),
                    LoggerheadTurtle (Caretta caretta),
                    LeatherbackTurtle (Dermochelys
                    coriacea) and Olive Ridley Turtle
                    (Lepidochelys olivacea). The eggs
                    collected by the Villagers and
                    Fishermen are purchased by the
                    Kosgoda Hatchery and kept in
                    sandy pens until they are hatched.
                    The newly hatched ones are kept in
                    seawater tanks and released to the
                    sea in the night.
                    Breakfast at hotel Morning visit
                    Turtle Hatchery in Kosgoda.
                    TURTLE HATCHERY - Where you
                    can see five species of turtles-Green
                    Turtles(Chelonia mydas), Hawksbill
                    Turtle(Eretmochelysimbricata),
                    LoggerheadTurtle (Caretta caretta),
                    LeatherbackTurtle (Dermochelys
                    coriacea) and Olive Ridley Turtle
                    (Lepidochelys olivacea). The eggs
                    collected by the Villagers and
                    Fishermen are purchased by the
                    Kosgoda Hatchery and kept in
                    sandy pens until they are hatched.
                    The newly hatched ones are kept in
                    seawater tanks and released to the
                    sea in the night.</p>
            </div>

            <div class="section-content analysis">
                <h2>bentota/colombo</h2>
                <p>Breakfast at hotel
                    Morning check out and proceed to
                    Colombo. Do Colombo city and
                    shopping tour. Colombo - The
                    busiest place in Sri Lanka is
                    Colombo, the commercial capital of
                    the country
                    Colombo is a beautiful city with
                    modern high-rise buildings amidst
                    old colonial ones making it a
                    picturesque place
                    . Colombo offers a lot for the
                    tourists including the National
                    Museum and the Zoological
                    Gardens in Dehiwala which are
                    worth a visit</p>
            </div>
        </div>
    </div>
</section>
<!-- end of time line section -->

<!-- services section -->
<section id="services" class="py-4">
    <div class="container">
        <div class="title-wrap">
            <span class="sm-title">know about services that we offer</span>
            <h2 class="lg-title">Inclutions</h2>
        </div>

        <div class="services-row">
            <div class="services-item">
                <span class="services-icon">
                    <i class="fas fa-hotel"></i>
                </span>
                <h3>Luxurious Hotel</h3>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem quo, totam repellat velit, dignissimos sequi error a minima architecto fugit nisi dolorum repellendus?</p>
                <!-- <a href = "#" class = "btn">Read more</a> -->
            </div>

            <div class="services-item">
                <span class="services-icon">
                    <i class="fas fa-map-marked-alt"></i>
                </span>
                <h3>Trave Guide</h3>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem quo, totam repellat velit, dignissimos sequi error a minima architecto fugit nisi dolorum repellendus?</p>
                <!-- <a href = "#" class = "btn">Read more</a> -->
            </div>

            <div class="services-item">
                <span class="services-icon">
                    <i class="fas fa-money-bill"></i>
                </span>
                <h3>Suitable Price</h3>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem quo, totam repellat velit, dignissimos sequi error a minima architecto fugit nisi dolorum repellendus?</p>
                <!-- <a href = "#" class = "btn">Read more</a> -->
            </div>
        </div>
    </div>
</section>
<!-- end of services section -->
@push('js')
<script>
    $(".step").click(function() {
        $(this).addClass("active").prevAll().addClass("active");
        $(this).nextAll().removeClass("active");
    });

    $(".step01").click(function() {
        $("#line-progress").css("width", "3%");
        $(".discovery").addClass("active").siblings().removeClass("active");
    });

    $(".step02").click(function() {
        $("#line-progress").css("width", "25%");
        $(".strategy").addClass("active").siblings().removeClass("active");
    });

    $(".step03").click(function() {
        $("#line-progress").css("width", "50%");
        $(".creative").addClass("active").siblings().removeClass("active");
    });

    $(".step04").click(function() {
        $("#line-progress").css("width", "75%");
        $(".production").addClass("active").siblings().removeClass("active");
    });

    $(".step05").click(function() {
        $("#line-progress").css("width", "100%");
        $(".analysis").addClass("active").siblings().removeClass("active");
    });
</script>
@endpush
@stop