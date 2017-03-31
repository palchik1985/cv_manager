<section class="pages2">
    <div class="container">
        <header class="header">
            <h5>Work experience</h5>
            <img src="{{ url('/') }}/img/itrex-logo.svg" alt="ITRex">
        </header>
        <div class="work">
            <h2>WORK EXPERIENCE</h2>
            @foreach($data_expirience as $expirience_item)
                <h5>{{ $expirience_item['dates']['date_start'] }} - {{ $expirience_item['dates']['date_end'] }}</h5>
                <ul class="work-list">
                    @foreach($expirience_item['fields'] as $field)
                        <li>
                            <p>{{ $field['name'] }}:</p>
                            <span>{{ $field['value'] }}</span>
                        </li>
                    @endforeach
                </ul>
            @endforeach

        </div>
        <footer class="footer">
            <h5>{{ $data['footer_text'] }}</h5>
        </footer>
    </div>
</section><!--end pages2-->
